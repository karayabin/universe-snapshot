<?php

namespace Colis\InfoHandler;

/*
 * LingTalfi 2016-01-12
 */

use Bat\FileSystemTool;
use Colis\Exception\ColisException;
use DirScanner\DirScanner;
use DirScanner\YorgDirScannerTool;

class LingLocalWithExtensionInfoHandler extends LocalWithExtensionInfoHandler
{

    /**
     * @var array of video extensions, 
     *              the class will fetch duration from those
     */
    private $videoExtensions; 

    public function __construct()
    {
        parent::__construct();
        $this->videoExtensions = [
            'mp4',
        ];
        $this->setExtensions2Types([
            'mp4' => 'video',
            'jpg' => 'image',
            'jpeg' => 'image',
            'png' => 'image',
            'gif' => 'image',
        ]);
    }


    protected function onCollectInfoAfter($path, $relativePath, $ext, $level, array &$info)
    {
        if (in_array($ext, $this->videoExtensions, true)) {
            $info['duration'] = $this->getVideoDuration($path);
        }
    }

    public function setVideoExtensions(array $videoExtensions)
    {
        $this->videoExtensions = $videoExtensions;
        return $this;
    }


    private function getVideoDuration($file)
    {
        $cmd = '/opt/local/bin/ffprobe -v error -show_entries format=duration -of default=noprint_wrappers=1:nokey=1 "' . str_replace('"', '\"', $file) . '"';
        $ret = 0;
        ob_start();
        passthru($cmd, $ret);
        return ob_get_clean();
    }
}

