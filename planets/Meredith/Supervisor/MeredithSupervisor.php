<?php

namespace Meredith\Supervisor;

/*
 * LingTalfi 2016-01-02
 */
use Meredith\Exception\MeredithException;
use Meredith\FormProcessor\FormProcessorInterface;
use Meredith\MainController\MainControllerInterface;

class MeredithSupervisor
{


    private $getMainControllerCb;
    private $getFormProcessorCb;
    private $isGrantedCb;
    private $translateCb;
    private $logCb;
    private $formId;
    private $urlPrefix;
    //
    private static $inst;

    private function __construct()
    {
        $this->urlPrefix = "/libs/meredith/service"; // wass0
    }

    public static function inst()
    {
        if (null === self::$inst) {
            self::$inst = new static;
        }
        return self::$inst;
    }

    /**
     * @return MainControllerInterface
     * @throws MeredithException
     */
    public function getMainController($formId)
    {
        if (null !== $this->getMainControllerCb) {
            return call_user_func($this->getMainControllerCb, $formId);
        }
        else {
            throw new MeredithException("no callable defined for getMainController");
        }
    }
    

    public function getFormId()
    {
        return $this->formId;
    }


    /**
     * Use this only if you want to manually code the handling of the form data and you don't want
     * to use the default automated FormDataProcessor class (FormProcessor != FormDataProcessor).
     *
     * @return FormProcessorInterface|false
     */
    public function getFormProcessor($formId)
    {
        if (null !== $this->getFormProcessorCb) {
            return call_user_func($this->getFormProcessorCb, $formId);
        }
        return false;
    }

    /**
     * Get the url of a service.
     *
     * Type can be one of:
     * - list
     * - fetchRow
     * - insertUpdate
     * - delete
     *
     * @return string
     */
    public function getUrl($type)
    {
        switch ($type) {
            case 'list':
                return $this->urlPrefix . '/datatables_server_side_processor.php?table=' . $this->formId;
                break;
            case 'fetchRow':
                return $this->urlPrefix . '/fetch_row.php';
                break;
            case 'insertUpdate':
                return $this->urlPrefix . '/insert_update_row.php';
                break;
            case 'delete':
                return $this->urlPrefix . '/delete_rows.php';
                break;
            default;
                throw new MeredithException("Unknown type: $type");
                break;
        }
    }

    /**
     * @param $formId
     * @param string $action , one of:
     *              - fetch
     *              - insert
     *              - update
     *              - delete
     *
     *
     *
     * @return bool
     */
    public function isGranted($formId, $action)
    {
        if (null !== $this->isGrantedCb) {
            return call_user_func($this->isGrantedCb, $formId, $action);
        }
        return false; // force the developer to implement a callback      
    }


    public function translate($msg)
    {
        if (null !== $this->translateCb) {
            return call_user_func($this->translateCb, $msg);
        }
        return $msg;
    }


    /**
     * @param mixed $msg
     * @return void
     */
    public function log($msg)
    {
        if (null !== $this->logCb) {
            call_user_func($this->logCb, $msg);
        }
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setGetMainControllerCb(callable $getMainControllerCb)
    {
        $this->getMainControllerCb = $getMainControllerCb;
        return $this;
    }

    public function setGetFormProcessorCb(callable $getFormProcessorCb)
    {
        $this->getFormProcessorCb = $getFormProcessorCb;
        return $this;
    }

    public function setIsGranted(callable $isGrantedCb)
    {
        $this->isGrantedCb = $isGrantedCb;
        return $this;
    }

    public function setTranslateCb(callable $translateCb)
    {
        $this->translateCb = $translateCb;
        return $this;
    }

    public function setLogCb(callable $logCb)
    {
        $this->logCb = $logCb;
        return $this;
    }

    public function setFormId($formId)
    {
        $this->formId = $formId;
        return $this;
    }

    public function setUrlPrefix($urlPrefix)
    {
        $this->urlPrefix = $urlPrefix;
        return $this;
    }


}
