<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\FileSystem\BabyTree\Forker;

use BeeFramework\Bat\FileSystemTool;
use BeeFramework\Notation\FileSystem\BabyTree\BabyTreeConst;


/**
 * ForkerUtil
 * @author Lingtalfi
 * 2015-04-28
 *
 */
class ForkerUtil
{

    // on per fork basis options
    protected $options;

    public function fork(array $tree, $rootDir, array $options = [])
    {

        $this->options = array_replace([
            /**
             * Whether or not to remove the rootDir before creating the entries
             */
            'replace' => true,
            /**
             * Whether or not to try to apply perms (if defined) on resources
             */
            'perms' => true,
            /**
             * Whether or not to try to apply ownership (if defined) on resources.
             * Must be root.
             * If you're not root, it's just skipped
             */
            'ownership' => true,
            /**
             * Array of relative paths to contents (only for files)
             */
            'contents' => [],
            /**
             * Array of basename to ignore
             */
            'ignoreBaseName' => [
                '.DS_Store',
            ],
        ], $options);

        if (is_string($rootDir) && !empty($rootDir)) {

            if (true === $this->options['replace']) {
                FileSystemTool::remove($rootDir);
            }
            FileSystemTool::mkdir($rootDir);

            foreach ($tree as $entry) {
                $path = $entry['path'];
                $baseName = basename($path);

                if (!in_array($baseName, $this->options['ignoreBaseName'], true)) {


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
                            $content = (array_key_exists($path, $this->options['contents'])) ? $this->options['contents'][$path] : '';
                            file_put_contents($absPath, $content);
                            $this->applyPerms($absPath, $perms, $owner, $ownerGroup);
                            break;
                        case 'dir':
                            mkdir($absPath, 0777, true);
                            $this->applyPerms($absPath, $perms, $owner, $ownerGroup);
                            break;
                        case 'link':
                            $linkTarget = $entry['linkTarget'];
                            if (is_string($linkTarget)) {
                                $linkTarget = str_replace(BabyTreeConst::SYMBOL_ROOTDIR_ALIAS, $rootDir, $linkTarget);
                                symlink($linkTarget, $absPath);
                                if (file_exists($linkTarget)) {
                                    $this->applyPerms($absPath, $perms, $owner, $ownerGroup);
                                }
                            }
                            break;
                        default:
                            throw new \UnexpectedValueException("Unknown type: $type");
                            break;
                    }
                }

            }
        }
        else {
            throw new \InvalidArgumentException("rootDir argument must be a non empty string");
        }
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function applyPerms($path, $perms, $owner, $ownerGroup)
    {
        if (false !== $perms && true === $this->options['perms']) {
            FileSystemTool::chmod($path, $perms);
        }
        if (false !== $owner && true === $this->options['ownership']) {
            if (true === extension_loaded('posix')) {
                if (posix_getuid() == 0) {
                    if (true === chown($path, $owner)) {
                        if (true === chgrp($path, $ownerGroup)) {
                            $this->log("A problem occurred while trying to chgrp with ownerGroup=$ownerGroup and path=$path");
                        }
                    }
                    else {
                        $this->log("A problem occurred while trying to chown with owner=$owner and path=$path");
                    }
                }
            }
            else {
                throw new \RuntimeException("Need posix module to perform ownership modification");
            }
        }
    }

    protected function log($msg)
    {

    }
}
