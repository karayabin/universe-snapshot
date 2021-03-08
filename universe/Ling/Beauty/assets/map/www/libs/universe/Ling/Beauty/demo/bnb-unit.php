<?php

//--------------------------------------------
// BNB UNIT SCRIPT
//--------------------------------------------
/**
 * This script will render a single test url.
 * This is part of the bnb planet system.
 * See the conception notes for more details.
 */
if (
    true === array_key_exists("pdot", $_GET) &&
    true === array_key_exists("rpath", $_GET)
) {
    $planetDot = $_GET['pdot'];
    $relPath = str_replace('..', '', $_GET['rpath']);

    $uniDir = __DIR__ . "/../universe";

    $planetSlash = str_replace(".", "/", $planetDot);
    $testPath = $uniDir . "/$planetSlash/bnb/$relPath";
    if (true === file_exists($testPath)) {
        require_once $testPath;
    }
}

