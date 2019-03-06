<?php

use Ling\DirScanner\YorgDirScannerTool;
use Ling\MikeMagicTools\File\MikeFilePreprenderTool;

require_once "bigbang.php"; // start the local universe


//------------------------------------------------------------------------------/
// CONFIG
//------------------------------------------------------------------------------/
$dir = "/path/to/app/www/libs";


//------------------------------------------------------------------------------/
// SCRIPT
//------------------------------------------------------------------------------/
$prependix = function ($file, $c) {

    if ("'lingosiris'" !== substr($c, 0, 12)) {
        return "'lingosiris' in window && console.log('" . basename($file) . " lib');" . PHP_EOL;
    }
    return '';
};
$files = YorgDirScannerTool::getFilesWithExtension($dir, 'js', false, true);
a($files);
MikeFilePreprenderTool::prependFiles($files, $prependix);