<?php

use Ling\DirScanner\YorgDirScannerTool;
use Ling\MikeMagicTools\File\MikeFileStripLinesTool;

require_once "bigbang.php"; // start the local universe


//------------------------------------------------------------------------------/
// CONFIG
//------------------------------------------------------------------------------/
$dir = "/path/to/app/www/libs";


//------------------------------------------------------------------------------/
// SCRIPT
//------------------------------------------------------------------------------/
$files = YorgDirScannerTool::getFilesWithExtension($dir, 'js', false, true);
a($files);
MikeFileStripLinesTool::strip($files, 'lingosiris');