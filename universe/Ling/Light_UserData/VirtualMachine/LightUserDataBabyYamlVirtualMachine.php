<?php


namespace Ling\Light_UserData\VirtualMachine;

use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\FileSystemTool;
use Ling\Light_UserData\Exception\LightUserDataVirtualMachineException;
use Ling\Light_UserData\Service\LightUserDataService;

/**
 * The LightUserDataVirtualStorage class.
 *
 * In this class I use a special structure, which is helpful for debugging (tmp is the rootDir here):
 *
 *
 * ```txt
 * /$root/__vm__/$userIdentifier/$contextId/
 * - operations.byml
 * - storage/
 *      - ...user files which are added to the vm
 * - original/
 *      - ...original of the user files which are added to the vm
 * ```
 *
 *
 * The operations.byml file has this structure.
 * The goal is to provide a map of operations to commit.
 *
 *
 * ```yaml
 * - initial:
 *      - $resourceIdentifier: $url
 * - inserts:
 *      -
 *          resourceIdentifier: string, the resource identifier
 *          row: array, the row to insert
 *          tags: array, the tags to insert
 *          options:
 *              keep_original: bool=false
 *          path: the relative path from the user dir to the file
 * - updates:
 *      $resourceIdentifier:
 *          row: array, the row to update
 *          tags: array, the tags to replace
 *          options:
 *              keep_original: bool=false
 *          path: the relative path from the user dir to the file
 * - deletes:
 *      $resourceIdentifier:
 *          path: string, relative path from the user dir to the file
 *
 * ```
 *
 * Note: if the user deletes an entry that's in the **inserts** section, then that entry is removed.
 * In other words, the **deletes** section only contains the original files to remove, there are no virtual files, because the
 * virtual files are removed directly by the vm when the user deletes one (we want the commit operations to be as thin as possible,
 * so we don't keep track of the whole history of operations performed by the user).
 *
 * Same with updates: it only contains the updates on original files, as the virtual files are updated on the fly.
 *
 *
 *
 *
 *
 */
class LightUserDataBabyYamlVirtualMachine implements LightUserDataVirtualMachineInterface
{

    /**
     * This property holds the virtualDirName for this instance.
     * @var string
     */
    protected $virtualDirName;

    /**
     * This property holds the userDataService for this instance.
     * @var LightUserDataService
     */
    protected $userDataService;


    /**
     * Builds the LightUserDataVirtualStorage instance.
     */
    public function __construct()
    {
        $this->virtualDirName = "__vm__";
        $this->userDataService = null;
    }

    /**
     * Sets the userDataService.
     *
     * @param LightUserDataService $userDataService
     */
    public function setUserDataService(LightUserDataService $userDataService)
    {
        $this->userDataService = $userDataService;
    }


    //--------------------------------------------
    // todo: put in interface
    //--------------------------------------------
    /**
     * Initializes the virtual machine.
     *
     * @param string $virtualContextId
     * @param array $urls
     * @throws \Exception
     */
    public function initialize(string $virtualContextId, array $urls)
    {
        $dir = $this->getDirectory($virtualContextId);
        FileSystemTool::remove($dir);
        FileSystemTool::mkdir($dir);
        $rUrls = [];
        foreach ($urls as $url) {
            $resourceId = $this->userDataService->getIdentifierByUrl($url);
            $rUrls[$resourceId] = $url;
        }
        $arr = [
            "initial" => $rUrls,
            "inserts" => [],
            "updates" => [],
            "deletes" => [],
        ];
        $file = $dir . "/operations.byml";
        BabyYamlUtil::writeFile($arr, $file);
    }


    /**
     * Commits the operations stored in the virtual machine to the actual system.
     * @param string $virtualContextId
     * @throws \Exception
     */
    public function commit(string $virtualContextId)
    {
        list($inserts, $updates, $deletes) = $this->getOperationsByVirtualContextId($virtualContextId);

        /**
         * No operations registered? nothing to commit
         */
        if (
            empty($inserts) &&
            empty($updates) &&
            empty($deletes)
        ) {
            return;
        }

    }

    /**
     * Returns the urls from the current state of the virtual machine.
     * @param string $virtualContextId
     * @return array
     * @throws \Exception
     */
    public function getUrlsFromCurrentState(string $virtualContextId): array
    {
        /**
         * The current state of the vm is composed of the sum of:
         *
         * - the initial urls that have not been deleted
         * - the urls found in the inserts section
         *
         * As for now, order of files is not handled,
         * todo: implement order of files
         *
         */
        list($inserts, $updates, $deletes, $initials) = $this->getOperationsByVirtualContextId($virtualContextId);
        $ret = [];
        foreach ($initials as $rid => $url) {
            if (false === array_key_exists($rid, $deletes)) {
                $ret[] = $url;
            }
        }
        foreach ($inserts as $info) {
            $rid = $info['resourceIdentifier'];
            $ret[] = $this->userDataService->getResourceUrlByResourceIdentifier($rid, [
                "virtual" => $virtualContextId,
            ]);

        }


        return $ret;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @implementation
     */
    public function reset(string $virtualContextId)
    {
        $dir = $this->getDirectory($virtualContextId);
        FileSystemTool::remove($dir);
    }

    /**
     * @implementation
     */
    public function getOriginalDirectory(string $virtualContextId): string
    {
        return $this->getDirectory($virtualContextId) . "/original";
    }

    /**
     * @implementation
     */
    public function getStorageDirectory(string $virtualContextId): string
    {
        return $this->getDirectory($virtualContextId) . "/storage";
    }


    /**
     * @implementation
     */
    public function getResourceRowByResourceIdentifier(string $virtualContextId, string $resourceIdentifier)
    {
        $dir = $this->getDirectory($virtualContextId);
        $file = $dir . "/operations.byml";
        list($inserts, $updates, $deletes) = $this->getOperationsByFile($file);
        if (array_key_exists($resourceIdentifier, $updates)) {
            return $updates[$resourceIdentifier];
        }
        foreach ($inserts as $arr) {
            if ($resourceIdentifier === $arr['resourceIdentifier']) {
                return $arr;
            }
        }
        $this->error("No file found with virtual context id \"$virtualContextId\" and resource identifier \"$resourceIdentifier\".");
    }


    /**
     * @implementation
     */
    public function executeInsert(string $virtualContextId, string $resourceIdentifier, string $path, string $data, array $insertRow, array $options = [])
    {


        $tags = $options['tags'] ?? [];
        $overwrite = $options['overwrite'] ?? false;
        $itemOptions = [];
        $keepOriginal = $options['keep_original'] ?? false;
        $itemOptions['keep_original'] = $keepOriginal;


        $dir = $this->getDirectory($virtualContextId);
        $userVmPath = $dir . "/storage/$path";
        list($inserts, $updates, $deletes) = $this->getOperationsByVirtualContextId($virtualContextId);


        //--------------------------------------------
        // IS THERE AN OVERWRITE CONFLICT?
        //--------------------------------------------
        /**
         * If overwrite is false AND:
         * - the file exists in the user dir and hasn't been deleted
         * - OR the file exists in the vm (which means it hasn't been deleted)
         *
         * then the operation is rejected.
         *
         */
        if (false === $overwrite) {
            $userDir = $this->userDataService->getUserDir(); // assuming the user calling the save method owns the file (for now...)
            $userPath = $userDir . "/$path";

            if (file_exists($userVmPath)) {
                $this->error("Permission denied. The virtual file already exists. You cannot overwrite the file; it's forbidden by the server configuration.");
            } elseif (file_exists($userPath)) {

                /**
                 * (with overwrite=false)
                 *
                 * If the user wants to delete a real file, she can't unless is has been virtually deleted.
                 */
                $throwError = true;
                foreach ($deletes as $info) {
                    if ($path === $info['path']) {
                        $throwError = false;
                        break;
                    }
                }

                if (true === $throwError) {
                    $this->error("Permission denied. The file already exists. You cannot overwrite the file; it's forbidden by the server configuration.");
                }
            }
        }


        //--------------------------------------------
        // EXECUTING THE OPERATION
        //--------------------------------------------
        FileSystemTool::mkfile($userVmPath, $data);


        if (true === $keepOriginal) {
            $originalPath = $dir . "/original/$path";
            FileSystemTool::mkfile($originalPath, $data);
        }


        /**
         * If the user uploads the same file (i.e. same path), we remove the oldest references.
         */
        $this->removeEntriesWithPath($inserts, $path);


        $inserts[] = [
            "resourceIdentifier" => $resourceIdentifier,
            "row" => $insertRow,
            "tags" => $tags,
            "options" => $itemOptions,
            "path" => $path,
        ];
        $this->updateOperation($virtualContextId, "insert", $inserts);

    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Throws an exception with the given message.
     *
     * @param string $message
     * @throws \Exception
     */
    protected function error(string $message)
    {
        throw new LightUserDataVirtualMachineException("VirtualMachine error: " . $message);
    }

    /**
     * Returns the virtual directory used for the given virtual context id.
     *
     * @param string $virtualContextId
     * @return string
     * @throws \Exception
     */
    protected function getDirectory(string $virtualContextId): string
    {
        $userIdentifier = $this->userDataService->getValidWebsiteUser()->getIdentifier();
        return $this->userDataService->getRootDir() . "/$this->virtualDirName/$userIdentifier/" . $virtualContextId;
    }


    /**
     * Returns the content of the file, if it exists.
     * In every case an array is returned with the following structure:
     *
     * - 0: inserts
     * - 1: updates
     * - 2: deletes
     * - 3: initials
     *
     * See the class comments for more details.
     *
     *
     * @param string $file
     * @return array
     */
    protected function getOperationsByFile(string $file): array
    {
        $arr = [];
        if (file_exists($file)) {
            $arr = BabyYamlUtil::readFile($file);
        }
        return [
            $arr['insert'] ?? [],
            $arr['delete'] ?? [],
            $arr['update'] ?? [],
            $arr['initial'] ?? [],
        ];
    }


    /**
     * Updates the operations list for the given type, which can be one of:
     *
     * - insert
     * - delete
     * - update
     * - initial
     *
     *
     * If the operations file is not found, an exception is thrown.
     *
     *
     * @param string $virtualContextId
     * @param string $type
     * @param $data
     * @throws \Exception
     */
    protected function updateOperation(string $virtualContextId, string $type, $data)
    {
        $file = $this->getFileByVirtualContextId($virtualContextId);

        if (false === file_exists($file)) {
            $this->error("Operations file not found: $file.");
        }
        $arr = BabyYamlUtil::readFile($file);

        /**
         * I use array merge here because of the removeEntriesByPath which can lead to weird numerical indexes in the insert array.
         */
        $arr[$type] = array_merge($data);
        BabyYamlUtil::writeFile($arr, $file);
    }


    /**
     * Returns the same info as @page(the getOperationsByFile method).
     *
     * @param string $virtualContextId
     * @return array
     * @throws \Exception
     */
    protected function getOperationsByVirtualContextId(string $virtualContextId): array
    {
        $file = $this->getFileByVirtualContextId($virtualContextId);
        return $this->getOperationsByFile($file);
    }


    /**
     * Returns the vm operations file path corresponding to the given virtualContextId.
     *
     * @param string $virtualContextId
     * @return string
     * @throws \Exception
     */
    protected function getFileByVirtualContextId(string $virtualContextId): string
    {
        return $this->getDirectory($virtualContextId) . "/operations.byml";
    }


    /**
     * Remove all the items from the given items array with the property path equal to the given path.
     *
     * @param array $items
     * @param string $path
     */
    protected function removeEntriesWithPath(array &$items, string $path)
    {
        foreach ($items as $k => $item) {
            if ($path === $item['path']) {
                unset($items[$k]);
            }
        }
    }
}