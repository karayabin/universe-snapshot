<?php


namespace XiaoApi\Api;


use XiaoApi\Exception\XiaoApiException;
use XiaoApi\Object\CrudObject;
use XiaoApi\Observer\Observer;
use XiaoApi\Observer\ObserverInterface;

class XiaoApi
{
    private $objects;
    private $observer;
    private $objectNamespace;


    protected function __construct()
    {
        $this->objects = [];
        $p = explode('\\', get_called_class());
        array_pop($p);
        $this->objectNamespace = implode('\\', $p);
    }



    /**
     * @return ObserverInterface
     */
    public function getObserver()
    {
        if (null === $this->observer) {
            $this->observer = new Observer();
        }
        return $this->observer;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    protected function log($type, $message) // override me
    {

    }


    //--------------------------------------------
    //
    //--------------------------------------------
    protected function getObject($objectName)
    {
        return $this->doGetObject($objectName, 'getObjectInstance');
    }

    protected function getLayer($objectName)
    {
        return $this->doGetObject($objectName, 'getLayerInstance');
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    private function getObjectInstance($objectName)
    {
        $class = $this->objectNamespace . '\\Object\\' . ucfirst($objectName);
        if (class_exists($class)) {
            return new $class;
        }
        return false;
    }

    private function getLayerInstance($objectName)
    {
        $class = $this->objectNamespace . '\\Layer\\' . ucfirst($objectName);
        if (class_exists($class)) {
            return new $class;
        }
        return false;
    }

    private function error($msg)
    {
        $this->log("error", $msg);
        throw new XiaoApiException($msg);
    }

    private function doGetObject($objectName, $method)
    {
        if (false === array_key_exists($objectName, $this->objects)) {
            if (false !== ($inst = $this->$method($objectName))) {
                if ($inst instanceof CrudObject) {
                    $inst->setObserver($this->getObserver());
                }
                $this->objects[$objectName] = $inst;
            } else {
                $this->error("object instance not found with object name $objectName");
            }
        }
        return $this->objects[$objectName];
    }

}