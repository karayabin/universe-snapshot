<?php


require_once "bigbang.php";

//--------------------------------------------
// CONFIG
//--------------------------------------------
$dir = "test";
$dateStart = date('Y-m-d');
$nbDays = 50;


//--------------------------------------------
// SCRIPT
//--------------------------------------------
if (is_dir($dir) || false !== @mkdir($dir)) {

    $p = explode('-', $dateStart);
    $time = mktime(0, 0, 0, $p[1], $p[2], $p[0]);

    for ($i = 0; $i < $nbDays; $i++) {

        $prefix = date('Ymd--His--', $time);
        $fileName = $prefix . "backup.txt";
        $file = $dir . "/" . $fileName;
        file_put_contents($file, "doo");

        $time += 86400;
    }
}

