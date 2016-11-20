<?php

namespace MyAppTools\ApplicationEngine;

/*
 * LingTalfi 2015-12-15
 * 
 * 
 */
use Bat\FileSystemTool;
use MyAppTools\Application\Application;

class TurtleApplicationEngine
{
    private static $inst;
    private $onCacheFileRequestedCb;
    private $onExceptionCaughtCb;
    private $onPageNotFoundCb;
    private $onPageRequestedCb;
    private $onSafePageNotFoundCb;
    private $cacheDir;
    private $pagesDir;


    private function __construct()
    {
        $this->cacheDir = '/tmp';
        $this->pagesDir = '/tmp';
    }

    public static function inst()
    {
        if (null === self::$inst) {
            self::$inst = new static;
        }
        return self::$inst;
    }


    public function start()
    {

        try {


            //------------------------------------------------------------------------------/
            // ROUTER AND CACHE
            //------------------------------------------------------------------------------/
            $safePage = $this->onPageRequested();
            if (false !== $safePage) {
                Application::inst()->set('safePage', $safePage);
                define('TURTLE_APP_ENGINE_NOCACHE', Application::inst()->getOr('noCache', false));


                //------------------------------------------------------------------------------/
                // SOURCING THE PAGE (possibly taking it from the cache)
                //------------------------------------------------------------------------------/
                define('TURTLE_APP_ENGINE_CACHEPATH', $this->onCacheFileRequested());
                if (false === TURTLE_APP_ENGINE_NOCACHE && file_exists(TURTLE_APP_ENGINE_CACHEPATH)) {
                    require_once TURTLE_APP_ENGINE_CACHEPATH;
                }
                else {

                    ob_start();
                    $file = $this->pagesDir . "/" . $safePage;
                    if (file_exists($file)) {
                        require_once $file;
                    }
                    else {
                        $this->onSafePageNotFound($safePage, $file);
                    }
                    $data = ob_get_clean();
                    echo $data;

                    // saving data to cache 
                    if (false === TURTLE_APP_ENGINE_NOCACHE) {
                        FileSystemTool::mkfile(TURTLE_APP_ENGINE_CACHEPATH, $data);
                    }
                }

            }
            else {
                $this->onPageNotFound();
            }
        } catch (\Exception $e) {
            $data = null;
            if (ob_get_level()) {
                $data = ob_get_contents();
                ob_end_clean();
            }
            $this->onExceptionCaught($e, $data);
        }
    }

    public function setOnExceptionCaughtCb(callable $onExceptionCaughtCb)
    {
        $this->onExceptionCaughtCb = $onExceptionCaughtCb;
        return $this;
    }

    public function setOnPageNotFoundCb(callable $onPageNotFoundCb)
    {
        $this->onPageNotFoundCb = $onPageNotFoundCb;
        return $this;
    }

    public function setOnPageRequestedCb(callable $onPageRequestedCb)
    {
        $this->onPageRequestedCb = $onPageRequestedCb;
        return $this;
    }

    public function setOnSafePageNotFoundCb(callable $onSafePageNotFoundCb)
    {
        $this->onSafePageNotFoundCb = $onSafePageNotFoundCb;
        return $this;
    }

    public function setPagesDir($pagesDir)
    {
        $this->pagesDir = $pagesDir;
        return $this;
    }

    public function setCacheDir($cacheDir)
    {
        $this->cacheDir = $cacheDir;
        return $this;
    }






    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function onCacheFileRequested()
    {
        if (is_callable($this->onCacheFileRequestedCb)) {
            return call_user_func($this->onCacheFileRequestedCb, $this->cacheDir);
        }
        return $this->cacheDir . '/' . str_replace(['%', '.'], '_', $_SERVER['REQUEST_URI']) . '.html';
    }

    private function onExceptionCaught(\Exception $e, $bufferedData)
    {
        if (is_callable($this->onExceptionCaughtCb)) {
            call_user_func($this->onExceptionCaughtCb, $e, $bufferedData);
        }
    }

    private function onPageNotFound()
    {
        if (is_callable($this->onPageNotFoundCb)) {
            call_user_func($this->onPageNotFoundCb);
        }
    }

    private function onPageRequested()
    {
        if (is_callable($this->onPageRequestedCb)) {
            return call_user_func($this->onPageRequestedCb);
        }
        return false;
    }

    private function onSafePageNotFound($safePage, $file)
    {
        if (is_callable($this->onSafePageNotFoundCb)) {
            call_user_func($this->onSafePageNotFoundCb, $safePage, $file);
        }
    }
}
