<?php

namespace QuickPdoMysqlDump\BackupOptions;

/*
 * LingTalfi 2016-01-26
 */
class BackupOptions implements BackupOptionsInterface
{

    private $options;

    public function __construct()
    {
        $this->options = [];
    }


    public static function create()
    {
        return new static();
    }

    public function getOr($key, $default = null)
    {
        if (array_key_exists($key, $this->options)) {
            return $this->options[$key];
        }
        return $default;
    }


}
