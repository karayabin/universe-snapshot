<?php

require_once "bigbang.php";


//------------------------------------------------------------------------------/
// CONFIG
//------------------------------------------------------------------------------/
use Ling\DirScanner\YorgDirScannerTool;
use Ling\Icons\Util\FactoryGenerator;

$className = 'MaterialIconsFactory';
$svgFiles = YorgDirScannerTool::getFiles(__DIR__ . "/../svglibs/auto");
$dstDir = __DIR__ . "/../";

//------------------------------------------------------------------------------/
// SCRIPT
//------------------------------------------------------------------------------/
FactoryGenerator::createFactory($className, $svgFiles, $dstDir);

