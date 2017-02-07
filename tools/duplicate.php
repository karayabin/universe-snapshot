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


$universeDir = "/myphp/universe/planets";
$universeCopyDir = "/myphp/universe-snapshot/planets";

$bigbangSrc = "/myphp/universe/bigbang.php";
$bigbangDst = "/myphp/universe-snapshot/bigbang.php";

$readmeSrc = "/myphp/universe/README.md";
$readmeDst = "/myphp/universe-snapshot/README.md";



//------------------------------------------------------------------------------/
// SCRIPT
//------------------------------------------------------------------------------/
use Bat\FileSystemTool;
use DirScanner\DirScanner;

require_once "/myphp/universe/bigbang.php";



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


/**
* Then copy the README.md file
*/
FileSystemTool::remove($readmeDst);
copy($readmeSrc, $readmeDst);





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

