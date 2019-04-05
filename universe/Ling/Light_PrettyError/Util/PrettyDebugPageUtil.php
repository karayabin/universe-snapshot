<?php


namespace Ling\Light_PrettyError\Util;


/**
 * The PrettyDebugPageUtil class.
 */
class PrettyDebugPageUtil
{

    /**
     * Builds the PrettyDebugPageUtil instance.
     */
    public function __construct()
    {
        //
    }


    /**
     * Prints a beautiful error page showing the exception.
     * All credits goes to: https://github.com/filp/whoops
     *
     *
     * @param \Exception $e
     */
    public function print(\Exception $e){
        // composer require filp/whoops
        $whoops = new \Whoops\Run;
        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
        $whoops->handleException($e);
    }
}