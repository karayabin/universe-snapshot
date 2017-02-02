<?php


//------------------------------------------------------------------------------/
// EXPLORER
//------------------------------------------------------------------------------/
/**
 *
 * Dependency:
 * --------------
 *
 * This script (as of 2016-12-29) requires the following softwares:
 * - unzip
 * - curl
 *
 *
 * How to use?
 * ----------------
 * 1. Move the whole "explorer-script" directory to your home directory.
 *
 *      Note: the "explorer-script" directory is a stand alone directory (it contains all the dependencies it needs,
 *      except for the software mentioned at the beginning of this document).
 *
 * 2. Create an alias (in your .bashrc or .bash_profile...):
 *      alias explorer='php -f explorer.php --'
 * 3. "refresh" your terminal aliases (source .bash_profile)
 *
 *
 * Then, you can do something like:
 *
 *      cd myapp
 *      explorer install lingtalfi/Bat
 *
 *
 */


define('DOC', "

Explorer Help
=====================
2016-12-29


Examples:
--------------
explorer install lingtalfi/Bat              
explorer install lingtalfi/Bat -f                      
explorer install lingtalfi/Bat -f -i                      
explorer install lingtalfi/Bat -d                      
explorer install lingtalfi/Bat /path/to/my/app             
explorer install lingtalfi/Bat /path/to/my/app -f             
explorer install lingtalfi/Bat /path/to/my/app -fi             
explorer import lingtalfi/Bat -f              
explorer import lingtalfi/Bat -f              
explorer import lingtalfi/Bat -f -d   



Command Line Syntax
-------------------
explorer install <planetIdentifier|dependency> <targetDirectory>? <installOptions>?
     - this command imports and installs the planet and its dependencies
         inside the <targetDirectory>/planets directory if found, or inside the
         <targetDirectory>/class-planets directory otherwise (it's created if it doesn't exist)
     - planetIdentifier: the git <importerType> will be assumed. To choose the <importerType>, use the <dependency> instead
     - targetDirectory: if omitted, the current directory will be used
     - installOptions:
         - -i: force the re-install (overwrite the planet dir in the target directory)
         - -f: force the re-import (fetch from the web and overwrite the planet dir in the <warp> directory)
         - -q: quiet mode (no explanations)
         - -d: debug mode: shows the exceptions in your face rather than catching them

explorer import <planetIdentifier> <importOptions>?
     - imports the planet to the <warp> directory, which location you can define in this script,
         and defaults to a \"warp\" directory next to this script.
         Basically, the <warp> directory is a cache directory to avoid fetching planets from the web.
     - importOptions:
         - -f: force the re-import (fetch from the web and overwrite the planet dir in the <warp> directory)
         - -q: quiet mode (no explanations)
         - -d: debug mode: shows the exceptions in your face rather than catching them





Nomenclature
-----------------
- dependency: <importerType> <::/> <planetIdentifier>
- planetIdentifier: <authorName> </> <planetName>
- authorName: string, not colon, no slash
- planetName: string, not colon, no slash
- planetSnapshotIdentifier: <planetIdentifier> (<:> <version>)?
- version: <versionNumber> (<(> <versionComment> <)>)?
          
");

//------------------------------------------------------------------------------/
// CONFIG
//------------------------------------------------------------------------------/
use Bat\FileSystemTool;
use BumbleBee\Autoload\ButineurAutoloader;
use Explorer\Explorer\NeoMaculusExplorer;
use Explorer\Log\ExplorerScriptLog;

$warpDir = __DIR__ . "/warp";


//------------------------------------------------------------------------------/
// INTERNAL CONFIG
//------------------------------------------------------------------------------/
define('FATAL_ERROR_COLOR', 'red');
define('FATAL_ERROR_COLOR_BG', null);
define('HELP_KEYWORD_COLOR', 'blue');
define('HELP_KEYWORD_COLOR_BG', null);


//------------------------------------------------------------------------------/
// SCRIPT
//------------------------------------------------------------------------------/


//------------------------------------------------------------------------------/
// UNIVERSE AUTOLOADER (bigbang)
//------------------------------------------------------------------------------/
require_once __DIR__ . '/pack/BumbleBee/Autoload/BeeAutoloader.php';
require_once __DIR__ . '/pack/BumbleBee/Autoload/ButineurAutoloader.php';
ButineurAutoloader::getInst()
    ->addLocation(__DIR__ . "/pack");
ButineurAutoloader::getInst()->start();


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

class Colors
{
    private static $inst = null;

    private $foreground_colors = array();
    private $background_colors = array();

    private function __construct()
    {
        // Set up shell colors
        $this->foreground_colors['black'] = '0;30';
        $this->foreground_colors['dark_gray'] = '1;30';
        $this->foreground_colors['blue'] = '0;34';
        $this->foreground_colors['light_blue'] = '1;34';
        $this->foreground_colors['green'] = '0;32';
        $this->foreground_colors['light_green'] = '1;32';
        $this->foreground_colors['cyan'] = '0;36';
        $this->foreground_colors['light_cyan'] = '1;36';
        $this->foreground_colors['red'] = '0;31';
        $this->foreground_colors['light_red'] = '1;31';
        $this->foreground_colors['purple'] = '0;35';
        $this->foreground_colors['light_purple'] = '1;35';
        $this->foreground_colors['brown'] = '0;33';
        $this->foreground_colors['yellow'] = '1;33';
        $this->foreground_colors['light_gray'] = '0;37';
        $this->foreground_colors['white'] = '1;37';

        $this->background_colors['black'] = '40';
        $this->background_colors['red'] = '41';
        $this->background_colors['green'] = '42';
        $this->background_colors['yellow'] = '43';
        $this->background_colors['blue'] = '44';
        $this->background_colors['magenta'] = '45';
        $this->background_colors['cyan'] = '46';
        $this->background_colors['light_gray'] = '47';
    }

    // Returns colored string
    public function format($string, $foreground_color = null, $background_color = null)
    {
        $colored_string = "";

        // Check if given foreground color found
        if (isset($this->foreground_colors[$foreground_color])) {
            $colored_string .= "\033[" . $this->foreground_colors[$foreground_color] . "m";
        }
        // Check if given background color found
        if (isset($this->background_colors[$background_color])) {
            $colored_string .= "\033[" . $this->background_colors[$background_color] . "m";
        }

        // Add string and end coloring
        $colored_string .= $string . "\033[0m";

        return $colored_string;
    }

    public static function inst()
    {
        if (null === self::$inst) {
            self::$inst = new self();
        }
        return self::$inst;
    }
}


function msg($msg, $color = null, $bgColor = null)
{
    return Colors::inst()->format($msg, $color, $bgColor) . PHP_EOL;
}

function fatalError($m)
{
    echo msg($m, FATAL_ERROR_COLOR, FATAL_ERROR_COLOR_BG);
    exit;
}

function helpKey($m)
{
    return Colors::inst()->format('<' . $m . '>', HELP_KEYWORD_COLOR, HELP_KEYWORD_COLOR_BG);
}

function help()
{
//    $planetIdentifierOrDependency = helpKey('planetIdentifier|dependency');
//    $planetIdentifier = helpKey('planetIdentifier');
//    $targetDirectory = helpKey('targetDirectory');
//    $installOptions = helpKey('installOptions');
//    $importOptions = helpKey('importOptions');
//    $importerType = helpKey('importerType');
//    $dependency = helpKey('dependency');
//    $warp = helpKey('warp');


    echo DOC;
    exit;
}


function hasOption($letter, $args)
{
    foreach ($args as $arg) {
        if (preg_match('!-([a-zA-Z]+)!', $arg, $match)) {
            if (false !== strpos($match[1], $letter)) {
                return true;
            }
        }
    }
    return false;
}


$hasF = false;
$hasI = false;
$currentDir = getcwd();
$args = $argv;
array_shift($args);


function onLog($msg, $level, $hasQ)
{
    if (false === $hasQ) {
        if ('error' === $level) {
            echo "\033[31m" . $msg . "\033[0m" . PHP_EOL;
        } else {
            echo $msg . PHP_EOL;
        }
    }
}

$command = array_shift($args);
if ('install' == $command) {
    $planetIdentifier = array_shift($args);
    $appDir = $currentDir;

    if (array_key_exists(0, $args)) {
        $potentialTargetDir = $args[0];
        if ('-' !== substr($potentialTargetDir, 0, 1)) {
            array_shift($args);
            $appDir = $potentialTargetDir;
        }
    }

    $hasF = hasOption('f', $args);
    $hasI = hasOption('i', $args);
    $hasQ = hasOption('q', $args);
    $hasD = hasOption('d', $args);

    // do we use the default git importer type?
    $p = explode('::/', $planetIdentifier);
    if (1 === count($p)) {
        $planetIdentifier = 'git::/' . $planetIdentifier;
    }


    $workingUniverseDir = $appDir . "/planets";
    if (!file_exists($workingUniverseDir)) {
        $workingUniverseDir = $appDir . "/class-planets";
        if (!file_exists($workingUniverseDir)) {
            FileSystemTool::mkdir($workingUniverseDir, 0777, true);
        }
    }
    $explorer = NeoMaculusExplorer::create()
        ->setLogger(new ExplorerScriptLog(function ($msg, $level) use ($hasQ) {
            call_user_func('onLog', $msg, $level, $hasQ);
        }))
        ->setDebug($hasD)
        ->setWarpZone($warpDir);
    $explorer->install($planetIdentifier, $workingUniverseDir, $hasF, $hasI);


} elseif ('import' == $command) {
    $planetIdentifier = array_shift($args);
    $appDir = $currentDir;

    $hasF = hasOption('f', $args);
    $hasQ = hasOption('q', $args);
    $hasD = hasOption('d', $args);

    // do we use the default git importer type?
    $p = explode('::/', $planetIdentifier);
    if (1 === count($p)) {
        $planetIdentifier = 'git::/' . $planetIdentifier;
    }

    $explorer = NeoMaculusExplorer::create()
        ->setLogger(new ExplorerScriptLog(function ($msg, $level) use ($hasQ) {
            call_user_func('onLog', $msg, $level, $hasQ);
        }))
        ->setDebug($hasD)
        ->setWarpZone($warpDir);
    $explorer->import($planetIdentifier, $hasF);


} else {
    if ("" === trim($command)) {
        help();
    } else {
        fatalError("Unknown command: $command");
    }
}

