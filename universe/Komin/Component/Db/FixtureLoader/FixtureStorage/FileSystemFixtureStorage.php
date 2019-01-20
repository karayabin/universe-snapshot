<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Db\FixtureLoader\FixtureStorage;

use BeeFramework\Component\FileSystem\Finder\FileInfo\FinderFileInfo;
use BeeFramework\Component\FileSystem\Finder\Finder;
use Komin\Component\Db\FixtureLoader\Fixture\FixtureInterface;


/**
 * FileSystemFixtureStorage
 * @author Lingtalfi
 * 2015-05-30
 *
 */
abstract class FileSystemFixtureStorage implements FixtureStorageInterface
{
    private $rootDir;
    private $allowedExtensions;

    public function __construct()
    {
        $this->rootDir = '';
        $this->allowedExtensions = [];
    }

    public static function create()
    {
        return new static();
    }

    /**
     * @return FixtureInterface|false
     */
    abstract protected function fileToFixture($file);


    //------------------------------------------------------------------------------/
    // IMPLEMENTS FixtureStorageInterface
    //------------------------------------------------------------------------------/
    /**
     * @param $path , to a fixture or to a fixture container
     * @return false|array of FixtureInterface
     */
    public function find($path)
    {
        $ret = false;
        if ('' !== $this->rootDir) {
            $path = $this->rootDir . '/' . $path;
        }
        if (file_exists($path)) {
            $ret = [];
            if (is_dir($path)) {
                Finder::create($path)->extensions($this->allowedExtensions)->files()->maxDepth(0)->find(function (FinderFileInfo $f) use (&$ret) {
                    if (false !== $fix = $this->fileToFixture($f->getRealPath())) {
                        $ret[] = $fix;
                    }
                });
            }
            elseif (is_file($path)) {
                if (false !== $fix = $this->fileToFixture($path)) {
                    $ret[] = $fix;
                }
            }
            else {
                $ret = false;
            }
        }
        return $ret;
    }



    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setRootDir($rootDir)
    {
        $this->rootDir = $rootDir;
        return $this;
    }

    public function setAllowedExtensions(array $allowedExtensions)
    {
        $this->allowedExtensions = $allowedExtensions;
        return $this;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/


}
