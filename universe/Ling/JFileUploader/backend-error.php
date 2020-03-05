<?php


/**
 * This test backend for returns an error.
 */


$response = [
    "type" => "error",
    "error" => "This is an error message from the php backend",
];



echo json_encode($response);