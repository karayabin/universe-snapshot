<?php

namespace Colis\InfoHandler;

/*
 * LingTalfi 2016-01-12
 */
abstract class InfoHandler implements InfoHandlerInterface
{
    private $error;

    public function __construct()
    {
        //
    }

    protected function setError($error)
    {
        $this->error = $error;
        return $this;
    }

    protected function getError()
    {
        return $this->error;
    }

    public function getInfo($name, &$err)
    {
        if (false !== ($info = $this->doGetInfo($name))) {
            return $info;
        }
        if (null !== $this->error) {
            $err = $this->error;
        }
        return false;
    }

    abstract protected function doGetInfo($name);
}
