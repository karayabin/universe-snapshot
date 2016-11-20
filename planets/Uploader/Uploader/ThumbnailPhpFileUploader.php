<?php

namespace Uploader\Uploader;

/*
 * LingTalfi 2016-01-06
 * 
 * Convert the uploaded file to a thumbnail
 * 
 */

use ThumbnailTools\ThumbnailTool;
use Uploader\File\PhpFile;

class ThumbnailPhpFileUploader extends PhpFileUploader
{

    private $thumbnailDimensions;
    private $getPathCb;
    /*
     * thumbnail dir is only used if getPathCb is NOT defined.
     * Actually, it MUST be defined if getPathCb is NOT defined.
     */
    private $thumbnailDir;

    public function __construct()
    {
        parent::__construct();
        $this->thumbnailDimensions = [null, null];
    }


    protected function processFile(PhpFile $f, array &$files)
    {
        list($maxWidth, $maxHeight) = $this->thumbnailDimensions;
        $path = $this->getDestination($f);
        if (true === ThumbnailTool::biggest($f->tmp_name, $path, $maxWidth, $maxHeight)) {
            $files[] = $path;
            parent::processFile($f, $files);
        }
        else {
            throw new \RuntimeException("The thumbnail couldn't be created");
        }
    }

    public function setMaxDimensions($maxWidth = null, $maxHeight = null)
    {
        $this->thumbnailDimensions = [$maxWidth, $maxHeight];
        return $this;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     * @return string
     */
    protected function getDestination(PhpFile $f)
    {
        if (null !== $this->getPathCb) {
            return call_user_func($this->getPathCb, $f);
        }
        if (null !== $this->thumbnailDir) {
            return $this->thumbnailDir . '/' . $f->name;
        }
        else {
            throw new \RuntimeException("Invalid setup: no way was provided to guess the destination");
        }
    }

    public function setGetPathCb(callable $getPathCb)
    {
        $this->getPathCb = $getPathCb;
        return $this;
    }

    public function setThumbnailDir($thumbnailDir)
    {
        $this->thumbnailDir = $thumbnailDir;
        return $this;
    }


}

