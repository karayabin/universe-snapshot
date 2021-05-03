<?php

//------------------------------------------------------------------------------/
// THIS IS THE BIG BANG SCRIPT FOR THE UNIVERSE FRAMEWORK
//------------------------------------------------------------------------------/
use Ling\BumbleBee\Autoload\ButineurAutoloader;

require_once __DIR__ . '/Ling/BumbleBee/Autoload/BeeAutoloader.php';
require_once __DIR__ . '/Ling/BumbleBee/Autoload/ButineurAutoloader.php';

$butineur = ButineurAutoloader::getInst();

$butineur->addLocation(__DIR__); // make this directory (universe) searchable
$classDir = __DIR__ . "/../class";
if (is_dir($classDir)) {
    $butineur->addLocation($classDir); // make the "class" directory searchable
}
ButineurAutoloader::getInst()->start();



// uncomment below if you use composer
//--------------------------------------------
// COMPOSER PLUGIN
//--------------------------------------------
// $composerFile = __DIR__ . "/../vendor/autoload.php";
// if (file_exists($composerFile)) {
//     require_once $composerFile;
// }



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


    function azf()
    {
        $args = func_get_args();
        $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 1);
        $args[] = $trace[0]['file'];
        call_user_func_array('a', $args);
        exit;
    }
}

