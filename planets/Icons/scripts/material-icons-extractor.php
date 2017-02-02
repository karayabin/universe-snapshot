<?php

require_once "bigbang.php";

use Bat\FileSystemTool;
use DirScanner\DirScanner;


//------------------------------------------------------------------------------/
// CONFIG
//------------------------------------------------------------------------------/
$file = "~/Downloads/material-design-icons-master";
$dstDir = __DIR__ . "/../svglibs/auto";


//------------------------------------------------------------------------------/
// SCRIPT
//------------------------------------------------------------------------------/
$spriteDir = $file . "/sprites/svg-sprite";
$files = DirScanner::create()->scanDir($spriteDir, function ($path, $rPath, $level) {
    if ('svg' === FileSystemTool::getFileExtension($rPath)) {
        if ('-symbol.svg' !== substr($rPath, -11)) {
            return $rPath;
        }
    }
    return null;
});


foreach ($files as $fileName) {

    //------------------------------------------------------------------------------/
    // WRITE ONE FILE
    //------------------------------------------------------------------------------/
    $s = '<svg>
    <defs>' . PHP_EOL;
    $s8 = str_repeat(' ', 8);
    $s12 = str_repeat(' ', 12);
    $content = file_get_contents($spriteDir . "/" . $fileName);
    if (preg_match_all('!<svg width="24"[^>]+id="([^"]*)"[^>]+>(.*)</svg>!U', $content, $matches)) {
        foreach ($matches[1] as $k => $id) {
            // ids have the ic_<IconName>_24px format
            $id = substr($id, 3, -5);
            $paths = $matches[2][$k];
            $s .= $s8 . '<g id="' . $id . '">' . PHP_EOL;
            $s .= $s12 . $paths . PHP_EOL;
            $s .= $s8 . '</g>' . PHP_EOL;
        }
    }
    $s .= '    </defs>
</svg>' . PHP_EOL;

    file_put_contents($dstDir . "/" . $fileName, $s);

}
