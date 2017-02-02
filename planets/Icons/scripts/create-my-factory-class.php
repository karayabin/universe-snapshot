<?php

require_once "bigbang.php";


//------------------------------------------------------------------------------/
// CONFIG
//------------------------------------------------------------------------------/
/**
 * WATCH OUT!!
 * THIS WILL OVERWRITE THE CURRENT ICONS FACTORY !!
 * (This IconsFactory class is meant to be customized to your needs anyway...)
 *
 */
use Icons\Util\FactoryGenerator;

$className = 'IconsFactory';
$svgFiles = [
    __DIR__ . '/../svglibs/ling.svg',
];
$dstDir = __DIR__ . "/../";

//------------------------------------------------------------------------------/
// SCRIPT
//------------------------------------------------------------------------------/
FactoryGenerator::createFactory($className, $svgFiles, $dstDir);

