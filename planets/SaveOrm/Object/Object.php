<?php


namespace SaveOrm\Object;

use QuickPdo\QuickPdo;
use SaveOrm\Generator\Helper\SaveOrmGeneratorHelper;
use SaveOrm\ObjectManager\ObjectManager;

/**
 * This is the base object extended by all saveOrm objects.
 * So that if we want to add a method to all objects at once, we can.
 */
class Object
{
    protected $_tableProps = [];
    protected $_changedProperties = [];
    protected $_mode = 'insert';
    protected $_where = [];
    protected $_whereSuccess = false;
    protected $_whereQuery = '';
    protected $_identifierType = null;
    protected $_whereIsResolved = false;

    public static function create()
    {
        return new static();
    }


    public static function createByArray(array $info)
    {
        $o = new static();
        foreach ($o->_tableProps as $prop) {
            if (array_key_exists($prop, $info)) {
                $setMethod = "set" . SaveOrmGeneratorHelper::toPascal($prop);
                $o->$setMethod($info[$prop]);
            }
        }
        return $o;
    }


    /**
     * Equivalent of createUpdate followed by feedByArray.
     */
    public static function createUpdateByArray(array $info)
    {
        $o = new static();
        foreach ($o->_tableProps as $prop) {
            if (array_key_exists($prop, $info)) {
                $setMethod = "set" . SaveOrmGeneratorHelper::toPascal($prop);
                $o->$setMethod($info[$prop]);
            }
        }

//        ObjectManager::getInstanceInfo($o);
        $o->_mode = 'update';
        $o->_where = null;
        return $o;
    }

    public function feedByArray(array $info)
    {
        foreach ($this->_tableProps as $prop) {
            if (array_key_exists($prop, $info)) {
                $setMethod = "set" . SaveOrmGeneratorHelper::toPascal($prop);
                $this->$setMethod($info[$prop]);
            }
        }
        return $this;
    }

    /**
     * @param $identifierType string|null,
     *              - ai: auto-incremented field
     *              - pk: primary key
     *              - uq: first unique index found
     *              - ric: ric values
     *              - pr: object properties
     *              - prm: object properties minus the primary key
     *
     * @return static
     */
    public static function createUpdate($identifierType = null)
    {
        $o = new static();
        $o->_mode = 'update';
        $o->_whereSuccess = null;
        $o->_whereQuery = '';
        $o->_where = null;
        $o->_identifierType = $identifierType;
        return $o;
    }


    public function _getManagerInfo()
    {
        $this->_resolveUpdate();
        return [
            'changedProperties' => $this->_changedProperties,
            'mode' => $this->_mode,
            'where' => $this->_where,
            'whereSuccess' => $this->_whereSuccess,
            'whereQuery' => $this->_whereQuery,
            'identifierType' => $this->_identifierType,
        ];
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    protected function _resolveUpdate()
    {
        if (
            false === $this->_whereIsResolved &&
            'update' === $this->_mode &&
            '' !== $this->_whereQuery // filtering createUpdate calls
        ) {
            $this->_whereIsResolved = true;
            $params = $this->_where;
            $row = QuickPdo::fetch($this->_whereQuery, $params);
            if (false !== $row) {
                foreach ($this->_tableProps as $prop) {
                    if (!in_array($prop, $this->_changedProperties)) {
                        $set = "set" . SaveOrmGeneratorHelper::toPascal($prop);
                        $this->$set($row[$prop]);
                    }
                }
                $this->_whereSuccess = true;
            } else {
                foreach ($params as $key => $param) {
                    if (!in_array($key, $this->_changedProperties)) {
                        $set = "set" . SaveOrmGeneratorHelper::toPascal($key);
                        $this->$set($param);
                    }
                }
                $this->_whereSuccess = false;
            }
            return $this;
        }
    }


}

