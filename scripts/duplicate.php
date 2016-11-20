<?php



//------------------------------------------------------------------------------/
// Duplicate
// LingTalfi - 2016-02-08
//------------------------------------------------------------------------------/
/**
 * This script will duplicate the given universe, and put it in another given directory.
 * It will also clean the copy from the following:
 *
 * - private/
 * - .git/
 * - .gitignore
 * - .DS_Store
 *
 */


//------------------------------------------------------------------------------/
// CONFIG
//------------------------------------------------------------------------------/

$universe = "last-universe";

$universeDir = "/pathto/php/projects/universe/planets";
$universeCopyDir = "/pathto/php/projects/universe-snapshots/$universe/planets";

$bigbangSrc = "/pathto/php/projects/universe/bigbang.php";
$bigbangDst = "/pathto/php/projects/universe-snapshots/$universe/bigbang.php";



//------------------------------------------------------------------------------/
// SCRIPT
//------------------------------------------------------------------------------/
use Bat\FileSystemTool;
use DirScanner\DirScanner;

require_once "bigbang.php";



/**
 * First create a fresh copy of the universe.
 */
FileSystemTool::remove($universeCopyDir);
FileSystemTool::copyDir($universeDir, $universeCopyDir);


/**
* Then copy the bigbang.php script
*/
FileSystemTool::remove($bigbangDst);
copy($bigbangSrc, $bigbangDst);





function line($m){
    if('cli' === PHP_SAPI){
        echo "\n";
    }
    else{
        echo "<br>";
    }
    echo $m;
}

function hr(){
    if('cli' === PHP_SAPI){
        echo "\n----------------------------";
    }
    else{
        echo "<hr>";
    }   
}


/**
 * Then clean that out
 */
$files2Remove = [
    '.DS_Store',
    '.gitignore',
];
$dirs2Remove = [
    'private',
    '.git',
];
DirScanner::create()->scanDir($universeCopyDir, function ($path, $rPath) use ($files2Remove, $dirs2Remove) {
//    echo $rPath;
    $base = basename($rPath);
    if (in_array($base, $files2Remove, true) && is_file($path)) {
        line("removing $rPath");
        FileSystemTool::remove($path);
    }
    if (in_array($base, $dirs2Remove, true) && is_dir($path)) {
        line("removing dir $rPath");
        FileSystemTool::remove($path);
    }
    //hr();
});

