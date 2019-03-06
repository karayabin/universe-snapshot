<?php


namespace Ling\OrmTools\Util\Chip\Processor;



use Ling\OrmTools\Util\Chip\Exception\ChipException;

class ChipProcessor
{


    protected function exception(\Exception $e)
    {
        throw $e;
    }

    protected function error($msg)
    {
        throw new ChipException($msg);
    }


    protected function mandatory($value, $name)
    {
        if (null === $value) {
            $this->error("$name not set");
        }
        return $value;
    }

    protected function notEmpty($value, $name)
    {
        if (empty($value)) {
            $this->error("$name empty");
        }
        return $value;
    }


    protected function notNull($value, $name)
    {
        if (null === $value) {
            $this->error("$name is null");
        }
        return $value;
    }
}