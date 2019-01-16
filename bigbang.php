<?php

//------------------------------------------------------------------------------/
// THIS IS BIG BANG SCRIPT FOR A JIN (aka modern uni) APP, from whence the universe can be used
//------------------------------------------------------------------------------/
use BumbleBee\Autoload\ButineurAutoloader;

require_once __DIR__ . '/BumbleBee/Autoload/BeeAutoloader.php';
require_once __DIR__ . '/BumbleBee/Autoload/ButineurAutoloader.php';

ButineurAutoloader::getInst()
    ->addLocation(__DIR__)// planets from universe
    ->addLocation(__DIR__ . "/../class"); // class for the application

ButineurAutoloader::getInst()->start();





//------------------------------------------------------------------------------/
// BONUS FUNCTIONS, SO HANDFUL... (a huge time saver in the end)
//------------------------------------------------------------------------------/
if (!function_exists('a')) {
    function a()
    {
        foreach (func_get_args() as $arg) {
            ob_start();
            var_dump($arg);
            $output = ob_get_clean();
            if ('1' !== ini_get('xdebug.default_enable')) {
                $output = preg_replace("!\]\=\>\n(\s+)!m", "] => ", $output);
            }
            if ('cli' === PHP_SAPI) {
                echo $output;
            } else {
                echo '<pre>' . $output . '</pre>';
            }
        }
    }

    function az()
    {
        call_user_func_array('a', func_get_args());
        exit;
    }
}



