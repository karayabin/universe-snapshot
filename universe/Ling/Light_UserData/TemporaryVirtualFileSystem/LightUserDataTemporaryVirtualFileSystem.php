<?php


namespace Ling\Light_UserData\TemporaryVirtualFileSystem;


use Ling\Bat\FileSystemTool;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_UploadGems\GemHelper\GemHelperInterface;
use Ling\Light_UserData\Exception\LightUserDataException;
use Ling\TemporaryVirtualFileSystem\TemporaryVirtualFileSystem;


/**
 * The LightUserDataTemporaryVirtualFileSystem class.
 *
 * This class knows to handle original files.
 * The file structure is this:
 *
 *
 * - $contextDir/
 * ----- operations.byml
 * ----- files/
 * --------- $fileId
 * ----- original/
 * --------- $fileId
 *
 *
 *
 *
 *
 */
class LightUserDataTemporaryVirtualFileSystem extends TemporaryVirtualFileSystem
{

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * Builds the LightUserDataTemporaryVirtualFileSystem instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->container = null;
    }

    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }


    /**
     * @overrides
     */
    public function commit(string $contextId, array $options = []): array
    {

        $remove = $options['reset'] ?? true;
        $ops = $this->getRawOperations($contextId);
        foreach ($ops as $k => $op) {
            if ('remove' !== $op['type']) {


                $ops[$k]['abs_path'] = $this->doGetEntryRealPathByOperation($contextId, $op);

                $meta = $op["meta"];
                $contextDir = $this->getContextDir($contextId);


                //--------------------------------------------
                // ORIGINAL
                //--------------------------------------------
                $hasOriginal = $meta['has_original'] ?? false;
                $originalPath = null;
                if (true === $hasOriginal) {
                    $originalPath = $contextDir . "/original/" . $op['path'];
                }
                $ops[$k]['meta']['original_abs_path'] = $originalPath;


                //--------------------------------------------
                // RELATED FILES
                //--------------------------------------------
                $related = $meta['related'] ?? [];

                if ($related) {
                    foreach ($related as $index => $relatedEntry) {
                        $relatedPath = $contextDir . "/files/" . $op['path'] . "-/$index";
                        $ops[$k]['meta']['related'][$index]['abs_path'] = $relatedPath;
                    }
                }


            }
        }

        if (true === $remove) {
            $this->reset($contextId);
        }
        return $ops;
    }


    /**
     * Returns the size in bytes of all the files contained in the given context directory.
     *
     * This includes the original files if any by default.
     *
     *
     * @param string $contextId
     * @param array $options
     *
     * - add: bool=false.
     *      If true, will only return the size of the files referenced by the add operations.
     *
     * @return int
     */
    public function getCurrentCapacity(string $contextId, array $options = []): int
    {

        $useAddOnly = $options['add'] ?? false;


        $total = 0;
        $baseDir = $this->getContextDir($contextId) . "/files";
        $originalDir = $this->getContextDir($contextId) . "/original";

        if (false === $useAddOnly) {
            $total += FileSystemTool::getDirectorySize($baseDir);
            $total += FileSystemTool::getDirectorySize($originalDir);
        } else {
            $ops = $this->getRawOperations($contextId);
            foreach ($ops as $op) {
                if ('add' === $op['type']) {
                    $relPath = $op['path'];

                    // regular file
                    if (file_exists($baseDir . "/" . $relPath)) {
                        $size = filesize($baseDir . "/" . $relPath);
                        if (false === $size) {
                            $this->error("Cannot get the size of the file \"$relPath\" in contextId=\"$contextId\".");
                        }
                        $total += $size;

                    }

                    // original file
                    if (file_exists($originalDir . "/" . $relPath)) {
                        $size = filesize($originalDir . "/" . $relPath);
                        if (false === $size) {
                            $this->error("Cannot get the size of the original file \"$relPath\" in contextId=\"$contextId\".");
                        }
                        $total += $size;
                    }
                }
            }
        }
        return $total;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @overrides
     */
    protected function getFileId(string $contextId, string $path, array $meta): string
    {
        return $this->container->get("user_data")->getNewResourceIdentifier();
    }


    /**
     * @overrides
     */
    protected function getFileRelativePath(string $contextId, string $id, string $path, array $meta): string
    {
        return $id;
    }


    /**
     * @overrides
     */
    protected function onFileAddedAfter(string $contextId, array &$operation, ?string $path, ?string $dst, array $options = [])
    {

        if (null !== $dst) {
            $keepOriginal = $options['keepOriginal'] ?? false;

            if (true === $keepOriginal) {
                $id = $operation['id'];
                $copyDst = $this->getContextDir($contextId) . "/original/$id";
                FileSystemTool::copyFile($dst, $copyDst);
                $operation["meta"]["has_original"] = true;
            }


            $gemHelper = $options['gemHelper'] ?? null;
            if ($gemHelper instanceof GemHelperInterface) {

                $fileId = $operation['id'];
                $prefixDir = $this->getContextDir($contextId) . "/files/";
                $relatedFilesDir = $prefixDir . $fileId . "-";

                //--------------------------------------------
                // IMPLEMENT RELATED FILES
                //--------------------------------------------
                /**
                 * See the related files document for more info.
                 * Our strategy here is to first remove all related copies, then recreate them all.
                 *
                 */
                $gemHelper->applyCopies($dst, [
                    'onBeforeCopy' => function () use ($relatedFilesDir, &$operation) {
                        $operation["meta"]['related'] = [];
                        FileSystemTool::remove($relatedFilesDir);

                    },
                    'onDstReady' => function (&$dst, $copyIndex, $copyItem) use ($prefixDir, $contextId, &$operation, $relatedFilesDir) {

                        $p = explode($prefixDir, $dst);
                        if (2 === count($p)) {
                            $path = array_pop($p);

                            $dirname = $copyItem['dir'] ?? dirname($path);
                            $filename = $copyItem['filename'] ?? basename($path);

                            $operation["meta"]['related'][] = [
                                "filename" => $filename,
                                "directory" => $dirname,
                            ];
                            $dst = $relatedFilesDir . "/$copyIndex";

                        } else {
                            $this->error("The copy does not seem to be located under the vfs' files directory, contextId=$contextId, copy index=$copyIndex.");
                        }

                    },
                ]);
            }
        }
    }

    /**
     * @overrides
     */
    protected function onFileRemovedAfter(string $contextId, string $id, ?array $op, ?string $realpath)
    {
        $contextDir = $this->getContextDir($contextId);
        $relatedFilesDir = $contextDir . "/files/" . $id . "-";
        $originalFile = $contextDir . "/original/$id";
        FileSystemTool::remove($relatedFilesDir);
        FileSystemTool::remove($originalFile);
    }


    /**
     * @overrides
     */
    protected function doGetEntryRealPathByOperation(string $contextId, array $operation, array $options = [])
    {
        $useOriginal = $options['original'] ?? false;
        $relPath = '/files/';
        if (true === $useOriginal) {
            $relPath = '/original/';
        }
        if (null === $operation['path']) {
            $ret = null;
        } else {
            $ret = $this->getContextDir($contextId) . $relPath . $operation['path'];
            if (true === $useOriginal && false === file_exists($ret)) {
                $this->error("Original not found with contextId=\"$contextId\" and path=\"" . $operation['path'] . "\".");
            }
        }
        return $ret;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Throws an exception.
     *
     * @param string $msg
     * @throws LightUserDataException
     */
    private function error(string $msg)
    {
        throw new LightUserDataException($msg);
    }

}