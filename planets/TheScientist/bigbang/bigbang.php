<?php




//------------------------------------------------------------------------------/
// THIS IS BIG BANG SCRIPT, from whence the universe can be used
//------------------------------------------------------------------------------/
/**
 * Your structure should look like this:
 * 
 * - universe/
 * ----- bigbang.php
 * ----- planets/
 * 
 * 
 * Portable Autoloader
 * -------------------------
 * If you want to use the portable autoloader technique, do the following setup 
 * per host.
 * Make sure your php.ini knows the universe location:
 * 
 *      include_path=".:/usr/local/share/universe:/opt/local/share/pear"
 * 
 * Then you can init the universe in any scripts of your machine:
 * 
 * require_once "bigbang.php"
 * 
 * (this tends to make applications portable)
 * 
 * 
 */
use BumbleBee\Autoload\ButineurAutoloader;


require_once __DIR__ . '/planets/BumbleBee/Autoload/BeeAutoloader.php';
require_once __DIR__ . '/planets/BumbleBee/Autoload/ButineurAutoloader.php';

ButineurAutoloader::getInst()
    ->addLocation(__DIR__ . "/planets")
    // ->addLocation(__DIR__ . "/myclasses") // we could use multiple directories if needed 
    ->start();


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
            }
            else {
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