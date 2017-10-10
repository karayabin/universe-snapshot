<?php


namespace Module\My\Api;


class MyApi extends GeneratedMyApi
{
    private static $inst;

    public static function inst()
    {
        if (null === self::$inst) {
            self::$inst = new static();
        }
        return self::$inst;
    }


//    /**
//     * @return UserLayer
//     */
//    public function userLayer()
//    {
//        return $this->getLayer('userLayer');
//    }


}