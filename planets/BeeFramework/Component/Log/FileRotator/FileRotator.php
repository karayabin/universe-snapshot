<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Log\FileRotator;

use BeeFramework\Bat\FileSystemTool;
use BeeFramework\Bat\FileTool;


/**
 * FileRotator
 * @author Lingtalfi
 * 2015-05-25
 *
 * This class all files in a rootDir directory.
 * By default, archives are named after the datetime, and are zipped.
 *
 *
 *
 */
abstract class FileRotator implements FileRotatorInterface
{

    protected $rootDir;
    protected $baseName;
    private $useZipForArchives;

    public function __construct()
    {
        $this->useZipForArchives = true;
    }



    //------------------------------------------------------------------------------/
    // IMPLEMENTS FileRotatorInterface
    //------------------------------------------------------------------------------/
    public function addMessage($plainText, $appendCarriageReturn = true)
    {
        $this->checkInstanceSettings();
        $file = $this->rootDir . '/' . $this->baseName;

        $file = $this->rotate($file, $plainText, $appendCarriageReturn);
        if (true === $appendCarriageReturn) {
            $plainText .= PHP_EOL;
        }
        FileSystemTool::filePutContents($file, $plainText, FILE_APPEND);
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setBaseName($baseName)
    {
        $this->baseName = $baseName;
        return $this;
    }

    public function setRootDir($rootDir)
    {
        $this->rootDir = $rootDir;
        return $this;
    }

    public function setUseZipForArchives($useZipForArchives)
    {
        $this->useZipForArchives = $useZipForArchives;
        return $this;
    }
    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function rotate($file, $plainText, $appendCarriageReturn)
    {
        return $file;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function checkInstanceSettings()
    {
        if (null === $this->rootDir) {
            throw new \RuntimeException("undefined rootDir");
        }
        if (null === $this->baseName) {
            throw new \RuntimeException("undefined baseName");
        }
        if (false === FileSystemTool::isValidDirPath($this->rootDir)) {
            throw new \RuntimeException(sprintf("rootDir is not valid (%s given)", gettype($this->rootDir)));
        }
    }

}
