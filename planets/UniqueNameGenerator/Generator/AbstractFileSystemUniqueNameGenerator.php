<?php

namespace UniqueNameGenerator\Generator;

/*
 * LingTalfi 2016-01-07
 */
abstract class AbstractFileSystemUniqueNameGenerator extends BaseUniqueNameGenerator 
{

    protected $dir;

    
    public function generate($name)
    {
        $this->dir = dirname($name);
        return parent::generate($name);
    }


    protected function exist($name)
    {
        return file_exists($name);
    }

}
