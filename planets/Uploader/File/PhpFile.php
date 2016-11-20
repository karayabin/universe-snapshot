<?php

namespace Uploader\File;

/*
 * LingTalfi 2016-01-06
 */
class PhpFile
{

    public $name;
    public $type;
    public $size;
    public $tmp_name;
    public $error;

    public static function create()
    {
        return new static();
    }

}
