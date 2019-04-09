<?php


namespace Ling\Light_PrettyError\Util;


use Whoops\Exception\Inspector;

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
     * Returns the html code for a beautiful error page showing the exception.
     * All credits goes to: https://github.com/filp/whoops
     *
     * @param \Exception $e
     * @return string
     * @throws \Exception
     */
    public function renderPage(\Exception $e)
    {

        $whoops = new \Whoops\Run;
        $inspector = new Inspector($e);
        $handler = new \Whoops\Handler\PrettyPageHandler;
        $handler->setRun($whoops);
        $handler->setException($e);
        $handler->setInspector($inspector);
        ob_start();
        $handler->handle();
        return ob_get_clean();
    }
}