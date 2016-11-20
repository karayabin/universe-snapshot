<?php

namespace Meredith\ValidatorJsUserCode;

/**
 * LingTalfi 2015-12-29
 */
class ValidatorJsUserCode implements ValidatorJsUserCodeInterface
{
    private $dir;

    public function __construct()
    {
        $this->dir = '/tmp';
    }


    public static function create()
    {
        return new static();
    }

    public function render($section, $formId)
    {
        $f = $this->dir . "/" . $section . "/" . $formId . '.js';
        if(file_exists($f)){
            return file_get_contents($f);
        }
    }

    public function setDir($dir)
    {
        $this->dir = $dir;
        return $this;
    }


}