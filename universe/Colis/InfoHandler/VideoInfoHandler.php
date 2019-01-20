<?php

namespace Colis\InfoHandler;

/*
 * LingTalfi 2016-01-14
 * 
 * Important note:
 *          This default implementation uses the ffprobe tool to get the duration of local videos.
 */

use Bat\FileSystemTool;

class VideoInfoHandler implements InfoHandlerInterface
{


    private $extensions;
    private $ffprobePath;
    private $dir;
    private $webRootDir;

    public function __construct()
    {
        $this->extensions = ['mp4'];
        $this->ffprobePath = '/opt/local/bin/ffprobe';
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
                    'type' => 'externalVideo',
                    'src' => $name,
                ];
            }
            else {
                if (null !== $this->dir && null !== $this->webRootDir) {
                    $realPath = $this->dir . '/' . preg_replace('!\.+!', '.', $name);
                    if (file_exists($realPath)) {

                        $realPath = realpath($realPath);
                        $url = str_replace(realpath($this->webRootDir), '', $realPath);


                        $duration = $this->getVideoDuration($realPath);
                        return [
                            'type' => 'localVideo',
                            'src' => $url,
                            'duration' => $duration,
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

    public function setFfprobePath($ffprobePath)
    {
        $this->ffprobePath = $ffprobePath;
        return $this;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function getVideoDuration($file)
    {
        $cmd = $this->ffprobePath . ' -v error -show_entries format=duration -of default=noprint_wrappers=1:nokey=1 "' . str_replace('"', '\"', $file) . '"';
        $ret = 0;
        ob_start();
        passthru($cmd, $ret);
        return ob_get_clean();
    }

}
