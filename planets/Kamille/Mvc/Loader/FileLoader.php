<?php


namespace Kamille\Mvc\Loader;


class FileLoader implements LoaderInterface
{


    private $dirs;
    private $extension;


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
                return file_get_contents($f);
            }
        }
        return false;
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