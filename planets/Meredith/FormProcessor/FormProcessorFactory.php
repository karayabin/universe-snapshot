<?php

namespace Meredith\FormProcessor;

/*
 * LingTalfi 2015-12-21
 */
class FormProcessorFactory
{

    /**
     * @var FormProcessorInterface[]
     */
    private $processors;
    private $findProcessorCb;

    private static $inst;

    private function __construct()
    {
        $this->processors = [];
    }

    public static function inst()
    {
        if (null === self::$inst) {
            self::$inst = new static;
        }
        return self::$inst;
    }


    /**
     * @param $formId
     * @return false|FormProcessorInterface
     */
    public static function getProcessor($formId)
    {
        return static::inst()->get($formId);
    }


    public function setProcessor($formId, FormProcessorInterface $formProcessor)
    {
        $this->processors[$formId] = $formProcessor;
        return $this;
    }

    public function setProcessors(array $processors)
    {
        $this->processors = $processors;
        return $this;
    }

    public function setFindProcessorCb(callable $findProcessorCb)
    {
        $this->findProcessorCb = $findProcessorCb;
        return $this;
    }




    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function get($formId)
    {
        if (array_key_exists($formId, $this->processors)) {
            return $this->processors[$formId];
        }
        elseif (is_callable($this->findProcessorCb)) {
            return call_user_func($this->findProcessorCb, $formId);
        }
        return false;
    }

}
