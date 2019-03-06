<?php


namespace Ling\OnTheFlyForm\DataAdaptor;


class DataAdaptor implements DataAdaptorInterface
{

    private $callback;


    public static function createByCallback($callback)
    {
        $o = new static();
        $o->setCallback($callback);
        return $o;
    }

    /**
     * @param array $data
     * @return array, an array of transformed data
     */
    public function transform(array $data)
    {
        return call_user_func($this->callback, $data);
    }


    public function setCallback(callable $callback)
    {
        $this->callback = $callback;
        return $this;
    }
}