<?php


namespace Ling\Light_PrettyError\Util;


/**
 * The PrettyDebugPageUtil class.
 */
class PrettyDebugPageUtil
{
    public function __construct()
    {
        //
    }

    public function print(\Exception $e){
        // composer require filp/whoops
        $whoops = new \Whoops\Run;
        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
        $whoops->handleException($e);
    }
}