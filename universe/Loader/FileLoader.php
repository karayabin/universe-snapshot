<?php


namespace Loader;


class FileLoader implements PublicFileLoaderInterface
{


    private $dirs;
    private $extension;
    private $file;


    public function __construct()
    {
        $this->dirs = [];
        $this->extension = 'tpl.php';

    }

    public static function create()
    {
        return new static();
    }


    public function load($templateName)
    {

        // sanitize the templateName
        $templateName = str_replace('..', '', $templateName);

        foreach ($this->dirs as $dir) {
            $f = $dir . "/" . $templateName . '.' . $this->extension;
            if (file_exists($f)) {
                $this->file = $f;
                return file_get_contents($f);
            }
        }
        return false;
    }

    public function getFile()
    {
        return $this->file;
    }

    public function setExtension($extension)
    {
        $this->extension = $extension;
        return $this;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    public function addDir($dir)
    {
        $this->dirs[] = $dir;
        return $this;
    }


}