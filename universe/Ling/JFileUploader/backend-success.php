<?php


/**
 * This test backend returns a success message.
 *
 * The js client will trust the backend, and think that the /uploads/my-video.mp4 file really exists (but it doesn't
 * in this case).
 *
 * It doesn't matter here, because we just want to test the client side (not the backend side).
 *
 * In production though, you would implement an upload service here, and return the url of
 * an uploaded file which actually exist.
 *
 *
 */


$response = [
    "type" => "success",
    "url" => "/uploads/my-video.mp4",
];


echo json_encode($response);