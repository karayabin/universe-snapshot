<?php

namespace Colis\InfoHandler;

/*
 * LingTalfi 2016-01-11
 */

use Bat\FileSystemTool;
use Colis\Exception\ColisException;
use DirScanner\DirScanner;

class LocalWithExtensionInfoHandler extends WithExtensionInfoHandler
{

    /**
     * The absolute path to the web server's root dir (www)
     *
     * Consequences on info, by default:
     * If not set, info[path]= absolute path of the item
     * If set, info[src]= url of the file, assuming that (only works if) it's inside the webserver root
     *
     */
    private $webRoot;

    
    private $itemDir;
    private $extensions;

    public function __construct()
    {
        parent::__construct();
        $this->extensions = [];
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setExtensions(array $extensions)
    {
        $this->extensions = $extensions;
        return $this;
    }

    public function setItemDir($itemDir)
    {
        $this->itemDir = $itemDir;
        return $this;
    }

    public function setWebRoot($webRoot)
    {
        $this->webRoot = $webRoot;
        return $this;
    }



    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function collectInfo($name, $extension, array &$info)
    {
        parent::collectInfo($name, $extension, $info);
        if (null !== $this->itemDir) {

            if (is_dir($this->itemDir)) {
                DirScanner::create()->scanDir($this->itemDir, function ($path, $rPath, $level) use ($extension, &$info) {
                    $ext = strtolower(FileSystemTool::getFileExtension($path));
                    if ($extension === $ext) {
                        // info[src] is an url
                        if (null !== $this->webRoot) {
                            $info['src'] = str_replace($this->webRoot, '', $path);
                        }
                        // info[src] is an absolute path
                        else {
                            $info['src'] = $path;
                        }
                        $this->onCollectInfoAfter($path, $rPath, $extension, $level, $info);
                    }
                });
            }
            else {
                // if the dir doesn't exist yet, it's not a problem: we collect nothing
            }
        }
        else {
            throw new ColisException("itemDir is not set");
        }
    }


    protected function onCollectInfoAfter($path, $relativePath, $extension, $level, array &$info)
    {

    }
}

