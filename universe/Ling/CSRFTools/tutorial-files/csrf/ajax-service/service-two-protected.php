<?php


use Ling\CSRFTools\CSRFProtector;

require_once __DIR__ . "/../setup.php";


$tokenName = "token-s2";

if (array_key_exists($tokenName, $_GET)) {
    $getTokenValue = $_GET[$tokenName];
    if (true === CSRFProtector::inst()->isValid($tokenName, $getTokenValue, true)) {
        success_message_service('two', $getTokenValue);
    } else {
        error_message("The given csrf token is not valid ($getTokenValue).");
    }
} else {
    error_message("Access to service two denied.");
}



