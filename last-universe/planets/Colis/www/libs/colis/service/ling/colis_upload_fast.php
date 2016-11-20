<?php


/**
 *
 * Colis ling original implementation
 * =========================================
 * 2016-01-14
 *
 * This is the first ling uploader implementation, it's fast but not very powerful.
 * It's based on plupload default uploader, like all colis ling uploader implementations.
 * This one is very close to the original pluploader implementation.
 *
 *
 *
 * Disclaimer
 * -------------
 *
 * This only works with web assets.
 *
 *
 *
 * How to
 * ------------
 *
 * To use it:
 *
 * - ?make a copy of this file for further reference to colis_upload_fast.back.php
 * - change the $targetDir variable value
 * - create the colis_get_info_by_name function, which should return an info array.
 *
 * See notes in [colis planet]/www/libs/colis/service/colis_upload_profiles.php for more details about info array.
 *
 *
 *
 */


use Tim\TimServer\OpaqueTimServer;
use Tim\TimServer\TimServerInterface;


require_once 'inc/colis_init_fast.php'; // replace this with your application init in prod



//------------------------------------------------------------------------------/
// COLIS LING - UPLOAD SERVICE - FAST VERSION
//------------------------------------------------------------------------------/
OpaqueTimServer::create()
    ->setServiceName('colis.ling_upload_fast')
    ->start(function (TimServerInterface $s) {


    //------------------------------------------------------------------------------/
    // PLUPLOAD CHUNK HANDLING EXAMPLE SERVER
    //------------------------------------------------------------------------------/

    #!! IMPORTANT: 
    #!! this file is just an example, it doesn't incorporate any security checks and 
    #!! is not recommended to be used in production environment as it is. Be sure to 
    #!! revise it and customize to your needs.


    // Make sure file is not cached (as it happens for example on iOS devices)
    header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");


    @set_time_limit(5 * 60);
    // Settings

    $targetDir = __DIR__ . '/../../../../uploads'; // this is demo setting
    
    
    $cleanupTargetDir = true; // Remove old files
    $maxFileAge = 5 * 3600; // Temp file age in seconds


    // Create target dir
    if (!file_exists($targetDir)) {
        @mkdir($targetDir);
    }

    // Get a file name
    if (isset($_REQUEST["name"])) {
        $fileName = $_REQUEST["name"];
    }
    elseif (!empty($_FILES)) {
        $fileName = $_FILES["file"]["name"];
    }
    else {
        $fileName = uniqid("file_");
    }

    $filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;

    // Chunking might be enabled
    $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
    $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;


    // Remove old temp files	
    if ($cleanupTargetDir) {
        if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
            http_response_code(403);
            $s->error("Failed to open temp directory");
            return false;
        }

        while (($file = readdir($dir)) !== false) {
            $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;

            // If temp file is current file proceed to the next
            if ($tmpfilePath == "{$filePath}.part") {
                continue;
            }

            // Remove temp file if it is older than the max age and is not the current file
            if (preg_match('/\.part$/', $file) && (filemtime($tmpfilePath) < time() - $maxFileAge)) {
                @unlink($tmpfilePath);
            }
        }
        closedir($dir);
    }


    // Open temp file
    if (!$out = @fopen("{$filePath}.part", $chunks ? "ab" : "wb")) {
        http_response_code(403);
        $s->error("Failed to open output stream");
        return false;
    }

    if (!empty($_FILES)) {
        if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
            http_response_code(403);
            $s->error("Failed to move uploaded file");
            return false;
        }

        // Read binary input stream and append it to temp file
        if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
            http_response_code(403);
            $s->error("Failed to open input stream");
            return false;
        }
    }
    else {
        if (!$in = @fopen("php://input", "rb")) {
            http_response_code(403);
            $s->error("Failed to open input stream");
            return false;
        }
    }

    while ($buff = fread($in, 4096)) {
        fwrite($out, $buff);
    }

    @fclose($out);
    @fclose($in);


    // Check if file has been uploaded
    if (!$chunks || $chunk == $chunks - 1) {
        // Strip the temp .part suffix off 
        rename("{$filePath}.part", $filePath);
        $name = basename($filePath);
        $err = '';
        if (false !== $info = colis_get_info_by_name($name, $err)) {
            $s->success([
                'name' => $name,
                'info' => $info,
            ]);
        }
        else {
            http_response_code(403);
            $s->error($err);
            return false;
        }
    }

    if ($chunks && $chunk !== $chunks - 1) {
        die('chunk...');
    }

})
    ->output();