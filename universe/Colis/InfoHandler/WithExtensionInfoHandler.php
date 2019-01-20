<?php

namespace Colis\InfoHandler;

/*
 * LingTalfi 2016-01-11
 */

use Bat\FileSystemTool;

class WithExtensionInfoHandler extends InfoHandler
{


    private $extensions2Types;
    private $collectInfoCb;

    public function __construct()
    {
        $this->extensions2Types = [];
    }

    public static function create()
    {
        return new static();
    }


    protected function doGetInfo($name)
    {
        $ext = strtolower(FileSystemTool::getFileExtension($name));
        if (array_key_exists($ext, $this->extensions2Types)) {
            $type = $this->extensions2Types[$ext];
            $info = [];
            $this->collectInfo($name, $ext, $info);
            $info['type'] = $type;
            return $info;
        }
        return false;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setExtension2Type($ext, $type)
    {
        $this->extensions2Types[$ext] = $type;
        return $this;
    }

    public function setExtensions2Types(array $extensions2Types)
    {
        $this->extensions2Types = $extensions2Types;
        return $this;
    }

    public function setCollectInfoCb(callable $collectInfoCb)
    {
        $this->collectInfoCb = $collectInfoCb;
        return $this;
    }



    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function collectInfo($name, $ext, array &$info)
    {
        if (null !== $this->collectInfoCb) {
            call_user_func_array($this->collectInfoCb, [$name, $ext, &$info]);
        }
    }


}
