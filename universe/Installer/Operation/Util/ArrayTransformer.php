<?php


namespace Installer\Operation\Util;


class ArrayTransformer
{

    private $locationTransformer;


    public function setLocationTransformer($func)
    {
        $this->locationTransformer = $func;
        return $this;
    }

    protected function transform(array &$arr)
    {
        call_user_func_array($this->locationTransformer, [&$arr]);
    }
}