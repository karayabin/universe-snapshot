<?php

namespace Colis\InfoHandler;

/*
 * LingTalfi 2016-01-14
 * 
 */

use Bat\FileSystemTool;

class ImageInfoHandler implements InfoHandlerInterface
{


    private $extensions;
    private $dir;
    private $webRootDir;

    public function __construct()
    {
        $this->extensions = ['jpg', 'jpeg', 'png', 'gif'];
    }

    public static function create()
    {
        return new static();
    }


    public function getInfo($name, &$err)
    {
        $ext = strtolower(FileSystemTool::getFileExtension($name));
        if (in_array($ext, $this->extensions, true)) {

            if (
                0 === strpos($name, 'http://') ||
                0 === strpos($name, 'https://')
            ) {
                return [
                    'type' => 'image',
                    'src' => $name,
                ];
            }
            else {
                if (null !== $this->dir && null !== $this->webRootDir) {
                    $realPath = $this->dir . '/' . preg_replace('!\.+!', '.', $name);
                    if (file_exists($realPath)) {

                        $realPath = realpath($realPath);
                        $url = str_replace(realpath($this->webRootDir), '', $realPath);
                        return [
                            'type' => 'image',
                            'src' => $url,
                        ];
                    }
                }
                else {
                    $err = "VideoInfoHandler: dir or webRootDir not set";
                }
            }
        }
        return false;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setExtensions(array $extensions)
    {
        $this->extensions = $extensions;
        return $this;
    }

    public function setDir($dir)
    {
        $this->dir = $dir;
        return $this;
    }

    public function setWebRootDir($webRootDir)
    {
        $this->webRootDir = $webRootDir;
        return $this;
    }
}
