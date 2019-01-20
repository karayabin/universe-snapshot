<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Server\FileServer;

use BeeFramework\Bat\FileSystemTool;
use BeeFramework\Bat\FileTool;
use BeeFramework\Bat\SanitizerTool;


/**
 * HasherFileServer
 * @author Lingtalfi
 * 2015-04-20
 *
 *
 *
 * This server stores a file using the following mechanism:
 *
 * - element id has the following format elementId: <extension> <:> <fileId>
 * - take the fileId id, create one dir per letter
 * - rename the file to <fileId> <.> <extension>
 *
 *
 *
 *
 *
 */
class HasherFileServer implements FileServerInterface
{

    protected $maxBasenameLength;
    protected $rootDir;
    protected $replacements;

    public function __construct($rootDir)
    {
        $this->setRootDir($rootDir);
        $this->replacements = [
            '/' => '_slash',
            '.' => '_dot',
        ];
    }




    //------------------------------------------------------------------------------/
    // IMPLEMENTS FileWithMetaServerInterface
    //------------------------------------------------------------------------------/
    /**
     * The elementId has the following notation:
     *
     *  - elementId: <extension> <:> <fileId>
     *          With:
     *          - extension: string, the extension of the file
     *          - fileId: string, an arbitrary unique identifier
     *
     *
     *
     * @return bool
     */
    public function putFile($elementId, $file)
    {

        if (file_exists($file)) {
            list($extension, $fileId) = $this->getElementIdInfo($elementId);
            $ext = FileTool::getExtension($file);
            if ($extension === $ext) {
                $this->init();
                $dir = $this->getElementDir($fileId);
                FileSystemTool::mkdir($dir);
                $filePath = $dir . '/' . SanitizerTool::sanitizeFileName($fileId) . '.' . $ext;
                if (copy($file, $filePath)) {
                    return true;
                }
            }
            else {
                throw new \RuntimeException(sprintf("Invalid elementId, the given extension %s doesn't match with the file extension %s", $ext, $p[0]));
            }

        }
        else {
            throw new \InvalidArgumentException(sprintf("file not found: %s", $file));
        }


        return false;
    }


    /**
     * @return string|false, path to the file, or false if not found
     */
    public function getFile($elementId)
    {
        $this->init();
        list($extension, $fileId) = $this->getElementIdInfo($elementId);
        $dir = $this->getElementDir($fileId);
        $path = $dir . '/' . SanitizerTool::sanitizeFileName($fileId) . '.' . $extension;
        if (file_exists($path)) {
            return $path;
        }
        return false;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function getRootDir()
    {
        return $this->rootDir;
    }

    public function setRootDir($rootDir)
    {
        if (!empty($rootDir)) {
            $this->rootDir = $rootDir;
        }
        else {
            throw new \InvalidArgumentException("rootDir argument must not be empty");
        }
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function getElementDir($fileId)
    {
        $path = $this->hash($fileId);
        return $this->rootDir . '/' . $path;
    }

    protected function init()
    {
        if (!file_exists($this->rootDir)) {
            FileSystemTool::mkdir($this->rootDir);
        }
    }

    protected function hash($string)
    {
        if (is_string($string)) {
            $letters = str_split($string);
            $aLetters = [];
            array_walk($letters, function (&$v) use (&$aLetters) {
                if(array_key_exists($v, $this->replacements)){
                	$v = $this->replacements[$v];
                }
                $aLetters[] = $v;
            });
            $string = implode('/', $aLetters);

        }
        else {
            throw new \InvalidArgumentException(sprintf("string argument must be a string, %s given", gettype($string)));
        }
        return $string;
    }

    protected function getElementIdInfo($elementId)
    {

        if (is_string($elementId)) {
            $p = explode(':', $elementId, 2);
            if (2 === count($p)) {
                return $p;
            }
            else {
                throw new \RuntimeException("Invalid elementId: it must have the following form: extension:fileId");
            }
        }
        else {
            throw new \InvalidArgumentException("elementId must be of type string");
        }
    }
}
