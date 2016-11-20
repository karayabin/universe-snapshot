<?php


namespace BabyTree\Processor;

use BabyTree\Exception\BabyTreeException;
use Bat\ArrayTool;
use Bat\FileSystemTool;


/**
 * BabyTreeInfoProcessor
 * @author Lingtalfi
 * 2015-12-24
 *
 */
class BabyTreeInfoProcessor
{

    /**
     * Whether or not to delete then recreate the rootDir before creating the entries
     */
    private $removeRootDirAtBeginning;
    /**
     * Whether or not to apply perms (if defined) on resources
     */
    private $perms;
    /**
     * Whether or not to apply ownership (if defined) on resources.
     * Must be root. If you're not root, it's just skipped
     */
    private $ownership;
    /**
     * Array of relative paths to contents (only for files)
     */
    private $fileContents;

    /**
     * bool callable ( path )
     *      Whether or not to ignore the given path.
     */
    private $ignore;

    /**
     * A symbol to represent the root dir.
     * It helps to create portable representations of a structure.
     */
    private $rootDirAlias;


    public function __construct()
    {
        $this->removeRootDirAtBeginning = true;
        $this->perms = true;
        $this->ownership = true;
        $this->fileContents = [];
        $this->ignore = function ($path) {
            if ('.DS_Store' === basename($path)) {
                return true;
            }
            return false;
        };
        $this->rootDirAlias = '$';
    }

    public static function create()
    {
        return new static();
    }

    public function write(array $tree, $rootDir)
    {
        if (is_string($rootDir) && !empty($rootDir)) {

            if (true === $this->removeRootDirAtBeginning) {
                if (false === FileSystemTool::remove($rootDir, false)) {
                    $this->error("Couldn't remove the rootDir: $rootDir");
                }
            }
            if (true === FileSystemTool::mkdir($rootDir, 0777, true)) {

                $realPathRootDir = realpath($rootDir);

                foreach ($tree as $entry) {


                    $missing = ArrayTool::getMissingKeys($entry, ['path', 'type', 'linkTarget', 'perms', 'owner', 'ownerGroup']);
                    if (false === $missing) {
                        $path = $entry['path'];
                        if (false === call_user_func($this->ignore, $path)) {


                            $type = $entry['type'];
                            $absPath = $rootDir . DIRECTORY_SEPARATOR . $path;


                            $perms = (array_key_exists('perms', $entry)) ? $entry['perms'] : false;
                            $owner = (array_key_exists('owner', $entry)) ? $entry['owner'] : false;
                            $ownerGroup = (array_key_exists('ownerGroup', $entry)) ? $entry['ownerGroup'] : false;


                            //------------------------------------------------------------------------------/
                            // CREATING THE RESOURCE
                            //------------------------------------------------------------------------------/
                            switch ($type) {
                                case 'file':
                                    $content = (array_key_exists($path, $this->fileContents)) ? $this->fileContents[$path] : '';
                                    file_put_contents($absPath, $content);
                                    $this->applyPerms($absPath, $perms, $owner, $ownerGroup);
                                    break;
                                case 'dir':
                                    mkdir($absPath, 0777, true);
                                    $this->applyPerms($absPath, $perms, $owner, $ownerGroup);
                                    break;
                                case 'link':
                                    $linkTarget = $entry['linkTarget'];
                                    if (is_string($linkTarget) && is_string($this->rootDirAlias)) {
                                        if (0 === strpos($linkTarget, $this->rootDirAlias)) {
                                            $linkTarget = $realPathRootDir . mb_substr($linkTarget, mb_strlen($this->rootDirAlias));
                                        }
                                        symlink($linkTarget, $absPath);
                                        if (file_exists($linkTarget)) {
                                            $this->applyPerms($absPath, $perms, $owner, $ownerGroup);
                                        }
                                    }
                                    break;
                                default:
                                    throw new BabyTreeException("Unknown type: $type");
                                    break;
                            }
                        }
                    } else {
                        $this->error("Invalid entry: missing following keys: " . implode(', ', $missing));
                    }


                }
            } else {
                $this->error("Cannot create the rootDir: $rootDir");
            }
        } else {
            $this->error("rootDir argument must be a non empty string");
        }
    }

    public function setFileContents($fileContents)
    {
        $this->fileContents = $fileContents;
        return $this;
    }

    public function setIgnore($ignore)
    {
        $this->ignore = $ignore;
        return $this;
    }

    public function setOwnership($ownership)
    {
        $this->ownership = $ownership;
        return $this;
    }

    public function setPerms($perms)
    {
        $this->perms = $perms;
        return $this;
    }

    public function setRemoveRootDirAtBeginning($removeRootDirAtBeginning)
    {
        $this->removeRootDirAtBeginning = $removeRootDirAtBeginning;
        return $this;
    }

    public function setRootDirAlias($rootDirAlias)
    {
        $this->rootDirAlias = $rootDirAlias;
        return $this;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function applyPerms($path, $perms, $owner, $ownerGroup)
    {
        if (true === $this->perms && false !== $perms) {
            chmod($path, intval((string)$perms, 8));
        }
        if (true === $this->ownership && false !== $owner) {
            if (true === extension_loaded('posix')) {
                if (posix_getuid() == 0) {
                    if (true === chown($path, $owner)) {
                        if (true === chgrp($path, $ownerGroup)) {
                            $this->log("A problem occurred while trying to chgrp with ownerGroup=$ownerGroup and path=$path");
                        }
                    } else {
                        $this->log("A problem occurred while trying to chown with owner=$owner and path=$path");
                    }
                }
            } else {
                $this->error("Need posix module to perform ownership modification");
            }
        }
    }

    protected function log($msg)
    {

    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function error($m)
    {
        throw new BabyTreeException($m);
    }
}
