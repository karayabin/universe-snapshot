<?php


namespace Ling\TemporaryVirtualFileSystem;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\CaseTool;
use Ling\Bat\FileSystemTool;
use Ling\TemporaryVirtualFileSystem\Exception\TemporaryVirtualFileSystemException;

/**
 * The TemporaryVirtualFileSystem class.
 *
 * With this class, I store files in @page(babyYaml) files, each context dir looks like this:
 *
 *
 * - $contextDir/
 * ----- operations.byml
 * ----- files/
 *
 *
 *
 *
 * The operations.byml file contains the operations to return when the commit method is called (i.e. redundant information
 * is handled). It's an array of operations, each operation:
 *
 * - type: string (add|remove|update). The operation type (to execute on the real system).
 * - id: string. The file identifier.
 * - path: string. The relative path (from the contextDir's files directory) to the uploaded file
 * - meta: array. An array of meta containing whatever you want.
 *
 *
 *
 * Heuristics
 * -----------
 *
 * See the heuristic section of the @page(TemporaryVirtualFileSystem conception notes).
 *
 * For the **add** operation, in case an add operation already exists with the same id, we update the operation (rather than
 * rejecting the request).
 *
 *
 *
 *
 *
 */
abstract class TemporaryVirtualFileSystem implements TemporaryVirtualFileSystemInterface
{

    /**
     * This property holds the rootDir for this instance.
     * @var string
     */
    protected $rootDir;


    /**
     * Builds the TemporaryVirtualFileSystem instance.
     */
    public function __construct()
    {
        $this->rootDir = '/tmp';
    }

    /**
     * Sets the rootDir.
     *
     * @param string $rootDir
     */
    public function setRootDir(string $rootDir)
    {
        $this->rootDir = $rootDir;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @implementation
     */
    public function getRootDir(): string
    {
        return $this->rootDir;
    }


    /**
     * @implementation
     */
    public function reset(string $contextId)
    {
        FileSystemTool::remove($this->getContextDir($contextId));
    }

    /**
     * @implementation
     */
    public function commit(string $contextId): array
    {
        // TODO: Implement commit() method.
    }

    /**
     * @implementation
     */
    public function get(string $contextId, string $id, array $options = []): array
    {
        return $this->getEntry($contextId, $id, $options);
    }

    /**
     * @implementation
     */
    public function has(string $contextId, string $id, array $allowedTypes = null): bool
    {
        return $this->hasEntry($contextId, $id, $allowedTypes);
    }


    /**
     * @implementation
     */
    public function add(string $contextId, string $path, array $meta, array $options = []): array
    {
        $id = $this->getFileId($contextId, $path, $meta);
        return $this->addEntry($contextId, $id, $path, $meta);
    }


    /**
     * @implementation
     */
    public function remove(string $contextId, string $id)
    {
        $this->removeEntry($contextId, $id);
    }


    /**
     * @implementation
     */
    public function update(string $contextId, string $id, string $path, array $meta, array $options = [])
    {
        $this->updateEntry($contextId, $id, $path, $meta, $options);
    }







    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Adds an entry to the operations.byml file of the given context, and returns the added entry.
     *
     *
     * The options are (all optional):
     *
     * - type: string. The possible values are:
     *      - update: means that the operation is an update for a file that is not registered yet in the vfs (but probably exists
     *          on the real server)
     * - move: bool=false. Whether to move or copy the file from the given path to the destination.
     *
     *
     *
     * @param string $contextId
     * @param string $id
     * @param string $path
     * @param array $meta
     * @param array $options
     * @return array
     */
    protected function addEntry(string $contextId, string $id, string $path, array $meta, array $options = []): array
    {
        $path = $this->getRealPath($path);

        $type = $options['type'] ?? 'add';
        $useMove = (bool)($options['move'] ?? false);


        $opFile = $this->getContextDir($contextId) . "/operations.byml";
        $ops = [];
        if (true === file_exists($opFile)) {
            $ops = BabyYamlUtil::readFile($opFile);
        }


        $relPath = $this->getFileRelativePath($contextId, $id, $path, $meta);
        $dst = $this->getContextDir($contextId) . "/files/" . $relPath;
        if (true === $useMove) {
            FileSystemTool::move($path, $dst);
        } else {
            FileSystemTool::copyFile($path, $dst);
        }


        $addOperation = [
            'type' => $type,
            'id' => $id,
            'path' => $relPath,
            'meta' => $meta,
        ];


        //--------------------------------------------
        // ADDING THE OPERATION (see heuristic notes for more details)
        //--------------------------------------------
        $found = false;
        foreach ($ops as $k => $op) {
            if ($id === $op['id']) {
                $found = true;
                $type = $op['type'];
                switch ($type) {
                    case "add":
                        $ops[$k] = $addOperation;
                        break;
                    default:
                        $this->error("Operation \"$type\" rejected. You cannot add this entry because it already exists with type=\"$type\" for id \"$id\".");
                        break;
                }
            }
        }
        if (false === $found) {
            $ops[] = $addOperation;
        }


        BabyYamlUtil::writeFile($ops, $opFile);


        $this->onFileAddedAfter($contextId, $id, $path, $meta, $type, $dst);

        return $addOperation;
    }


    /**
     * Returns whether there is an non-deleted entry found in the the operations.byml file of the given context that matches the given id.
     *
     * @param string $contextId
     * @param string $id
     * @param array|null $allowedTypes
     * @return bool
     */
    protected function hasEntry(string $contextId, string $id, array $allowedTypes = null): bool
    {
        $opFile = $this->getOperationsFile($contextId);
        $ops = BabyYamlUtil::readFile($opFile);
        $types = (null === $allowedTypes) ? ["add", "remove", "update"] : $allowedTypes;

        foreach ($ops as $k => $op) {
            if (false === in_array($op['type'], $types)) {
                continue;
            }
            if ($id === $op['id']) {
                return true;
            }
        }
        return false;
    }

    /**
     * Removes the entry from the operations.byml file of the given context that matches the given id.
     * If the entry didn't exist, the method will be silent.
     *
     * @param string $contextId
     * @param string $id
     */
    protected function removeEntry(string $contextId, string $id)
    {
        $opFile = $this->getOperationsFile($contextId);
        $ops = BabyYamlUtil::readFile($opFile);


        /**
         * If the entry is found, we remove it directly from the operations.
         */
        $addTheDeleteEntry = true;
        foreach ($ops as $k => $op) {
            if ($id === $op['id']) {
                $addTheDeleteEntry = false;
                $type = $op['type'];
                switch ($type) {
                    case "add":
                        $realpath = $this->getEntryRealPathByOperation($contextId, $op);
                        if (file_exists($realpath)) {
                            unlink($realpath);
                        }
                        unset($ops[$k]);
                        break;
                    case "update":
                        $realpath = $this->getEntryRealPathByOperation($contextId, $op);
                        if (file_exists($realpath)) {
                            unlink($realpath);
                        }
                        unset($ops[$k]);
                        $addTheDeleteEntry = true;
                        break;
                }
            }
        }


        if (true === $addTheDeleteEntry) {
            $ops[] = [
                'type' => "remove",
                'id' => $id,
            ];
        }

        $ops = array_merge($ops);
        BabyYamlUtil::writeFile($ops, $opFile);

    }

    /**
     * Updates the entry in the operations.byml file of the given context that matches the given id.
     *
     * Throws an exception if the file wasn't found, or in case of problems.
     *
     * The options are:
     *
     * - move: bool=false. Whether to move or copy the file from the given path to the destination.
     *
     *
     * @param string $contextId
     * @param string $id
     * @param string $path
     * @param array $meta
     * @param array $options
     */
    protected function updateEntry(string $contextId, string $id, string $path, array $meta, array $options = [])
    {
        $path = $this->getRealPath($path);

        $opFile = $this->getOperationsFile($contextId);
        $ops = BabyYamlUtil::readFile($opFile);
        $useMove = (bool)($options['move'] ?? false);


        $found = false;
        foreach ($ops as $k => $op) {
            if ($id === $op['id']) {
                $found = true;

                $relPath = $this->getFileRelativePath($contextId, $id, $path, $meta);
                $dst = $this->getContextDir($contextId) . "/files/" . $relPath;
                if (true === $useMove) {
                    FileSystemTool::move($path, $dst);
                } else {
                    FileSystemTool::copyFile($path, $dst);
                }


                $type = $op['type'];
                switch ($type) {
                    case "add":
                    case "update":


                        $op['meta'] = $meta;
                        $op['path'] = $relPath;
                        $ops[$k] = $op;


                        break;
                    case "remove":
                        $ops[$k] = [
                            "type" => "update",
                            "id" => $id,
                            "path" => $relPath,
                            "meta" => $meta,
                        ];
                        break;
                }


            }
        }

        if (false === $found) {
            $this->addEntry($contextId, $id, $path, $meta, [
                "type" => "update",
            ]);
        } else {
            $ops = array_merge($ops);
            BabyYamlUtil::writeFile($ops, $opFile);

            // we only call this when a file has been really added to our vfs
            $this->onFileAddedAfter($contextId, $id, $path, $meta, $type, $dst);
        }


    }

    /**
     * Returns the entry in the operations.byml file of the given context that matches the given id.
     *
     * The options are:
     * - realpath: bool=false. If true, the **realpath** entry is added to the returned array, and contains the
     *          realpath to the file. This only works if the operation type allows it (i.e. not delete).
     *
     *
     * @param string $contextId
     * @param string $id
     * @param array $options
     * @return array
     * @throws \Exception
     */
    protected function getEntry(string $contextId, string $id, array $options = []): array
    {

        $useRealpath = (bool)($options['realpath'] ?? false);

        $opFile = $this->getOperationsFile($contextId);
        $ops = BabyYamlUtil::readFile($opFile);
        foreach ($ops as $op) {
            if ($id === $op['id']) {

                if (true === $useRealpath) {

                    $op['realpath'] = $this->getEntryRealPathByOperation($contextId, $op);
                }

                return $op;
            }
        }

        $this->error("Entry not found with id=\"$id\" and contextId=\"$contextId\".");

    }


    /**
     * Returns the context dir for the given context id.
     *
     * @param string $contextId
     * @return string
     */
    protected function getContextDir(string $contextId): string
    {
        return $this->rootDir . "/" . CaseTool::toPortableFilename($contextId);
    }


    /**
     * Creates the operations.byml file if necessary (for the given context id) and returns its path.
     *
     * @param string $contextId
     * @return string
     */
    protected function getOperationsFile(string $contextId): string
    {
        $opFile = $this->getContextDir($contextId) . "/operations.byml";
        if (false === file_exists($opFile)) {
            $ops = [];
            BabyYamlUtil::writeFile($ops, $opFile);
        }
        return $opFile;
    }


    //--------------------------------------------
    // EXTEND
    //--------------------------------------------
    /**
     * Returns the relative path (from the contextDir's files directory) of the uploaded file located by the given path.
     *
     *
     *
     * @param string $contextId
     * @param string $id
     * @param string $path
     * @param array $meta
     * @return string
     */
    protected function getFileRelativePath(string $contextId, string $id, string $path, array $meta): string
    {
        return trim($path, '/');
    }


    /**
     * Hook called after the file has been added to the virtual file system.
     *
     * Path is the absolute path to the source file being copied;
     * dst is the absolute path to the copied file.
     *
     *
     * @param string $contextId
     * @param string $id
     * @param string $path
     * @param array $meta
     * @param string $type
     * @param string $dst
     */
    protected function onFileAddedAfter(string $contextId, string $id, string $path, array $meta, string $type, string $dst)
    {

    }


    /**
     * Returns the file id for the file identified by the given parameters.
     *
     * @param string $contextId
     * @param string $path
     * @param array $meta
     * @return string
     */
    abstract protected function getFileId(string $contextId, string $path, array $meta): string;


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Throws an exception.
     *
     * @param string $msg
     * @throws \Exception
     */
    private function error(string $msg)
    {
        throw new TemporaryVirtualFileSystemException($msg);
    }


    /**
     * Returns the realpath of the given path.
     *
     * If the file doesn't exist, an exception is thrown.
     *
     * @param string $path
     * @return string
     * @throws \Exception
     */
    private function getRealPath(string $path): string
    {
        if (false === ($ret = realpath($path))) {
            $this->error("File does not exist: \"$path\".");
        }
        return $ret;
    }


    /**
     * Returns the realpath of the file associated with the given operation entry.
     *
     * Throws an exception if the operation doesn't have a file associated with it (i.e. delete operation).
     *
     *
     * @param string $contextId
     * @param array $operation
     * @return string
     * @throws \Exception
     */
    private function getEntryRealPathByOperation(string $contextId, array $operation): string
    {
        if ('delete' === $operation['type']) {
            $id = $operation['id'];
            $this->error("Cannot get realpath from a delete operation, with contextId=\"$contextId\" and id=\"$id\".");
        }
        return $this->getContextDir($contextId) . "/files/" . $operation['path'];
    }
}