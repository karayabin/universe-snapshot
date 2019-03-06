<?php


namespace Ling\SaveOrm\Test;


use Ling\SaveOrm\Object\Object;
use Ling\SaveOrm\Test\GeneratedObjectManager;


class CoumeGeneratedBaseObject extends Object
{

    private $_savedResults;

    public function save(array &$savedResults = [])
    {
        $om = GeneratedObjectManager::create();
        $ret = $om->save($this);
        $savedResults = $om->getSaveResults();
        $this->_savedResults = $savedResults;
        return $ret;
    }


    public function getSaveResults()
    {
        return $this->_savedResults;
    }
}