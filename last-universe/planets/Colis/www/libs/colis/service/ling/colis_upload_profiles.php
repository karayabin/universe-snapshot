<?php


use Tim\TimServer\OpaqueTimServer;
use Tim\TimServer\TimServerInterface;

//------------------------------------------------------------------------------/
// COLIS LING - UPLOAD SERVICE - PROFILES VERSION
//------------------------------------------------------------------------------/

require_once __DIR__ . '/inc/colis_init_profiles.php'; // replace this with your application init in prod



/**
 *
 * COLIS LING UPLOAD SERVICE
 * ==============================
 * 2016-01-13       LingTalfi
 *
 *
 *
 *
 *
 *
 * Disclaimer
 * ---------------
 * This service is designed to handle upload of web assets.
 *
 * If you want to upload files that are not web accessible, you need to modify the
 * part when the file has been uploaded...
 *
 *
 *
 * Nomenclature and colis ling specific concepts
 * ----------------------------------------------
 *
 * ### info array
 *
 * The info array is described in the official colis documentation (https://github.com/lingtalfi/Colis#colis-info-array).
 * 
 * However, in colis ling, by convention, when no info can be found, we return an info array with a single "type" property
 * which value is set to "none".
 *
 *
 * ### profile
 *
 * The profile governs the behaviour of the upload.
 * It's an array containing the following keys:
 *
 *      - maxChunks: int, how many chunks max. Chunks are numbered, and if the chunk number is more than this number,
 *                      it gets automatically rejected.
 *                      You have to calculate yourself how many chunks do you want, depending on the chunk size that
 *                      your configured on the client side (tip: use 1Mo chunk for easy calculation);
 *                      this strategy's goal is to have the minimum amount of computing to do here (because chunking costs a lot of performance)
 *
 *      - extensions: array|null, what are the allowed extensions. If null, all extensions are allowed
 *      - targetDir: str, in which web directory will the file be put? It has to be writable.
 * 
 * 
 * To use a profile, the client passes a profileId to the server, so that the profile information cannot be 
 * created by a malicious user. 
 *
 *
 *
 * The service
 * ---------------
 *
 *
 * ### profileId
 *
 * The service works with a profileId ($_REQUEST["id"] in the code).
 * The profileId is used to access the profile (see above).
 * This is required.
 *
 *
 * ### functions
 *
 * This service uses two functions:
 *
 *       - false|array:profile  colis_get_profile ( str:profileId )
 *
 *                                      Return the profile that should be used to handle the handle
 *
 *
 *       - void                 colis_on_upload_after ( str:filePath, str:profileId )
 *
 *                                      This is an opportunity for you to acknowledge the upload in your application,
 *                                      or create thumbnails with desired dimensions for instance.
 *
 *       - array:info     colis_get_info ( str:name , str:profileId )
 *
 *                                      The name parameter is the name of the item as it appear on the client side's selector.
 *                                      The name can be a relative path to a local file as well as an external url.
 *                                      In the case of a relative path, the root dir is defined server side (for obvious security reasons).
 *
 *                                      It returns the info array (see above).
 *                                      If no info could be found, by convention, colis-ling return an array with
 *                                      a single "type" property set to "none" (and the convention also applies to the client-side, of course).
 *
 *
 *
 *
 *
 *
 * These functions are defined in the inc/colis_init.php file.
 * The recommended way of doing things (how it was designed at least) is either to update the require_once statement at the top
 * of this file and require the init that you want in your application, or you can even leave the service file (THIS file) alone
 * and update/use/recreate the inc/colis_init.php file.
 *
 * Whatever solution you choose, you HAVE TO define the three functions (colis_get_profile, colis_on_upload_after, and colis_get_info)
 * in order for this service to work properly.
 *
 *
 * Don't hesitate to throw out the inc/colis_init.php and make your own from scratch (or save it as inc/colis_init.back.php just in case you
 * want to copy some code from it later), because that script was coded without performances in mind at all.
 *
 *
 *
 *
 * On chunk failed (403): interaction with colis-ling.js
 * ---------------------------------------
 * The default implementation of colis-ling.js will listen to the http status code.
 * If 403 is returned (by convention), then on the client side, by default, the server message
 * will be used as an error message, instead of plupload's default "Http error" message.
 * This is why the 403 status code is sent all over the place, in this implementation.
 *
 *
 *
 *
 *
 *
 */

$serviceName = "";
OpaqueTimServer::create()
    ->setServiceName('colis.ling_upload_profiles')
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


    if (isset($_REQUEST["id"])) {
        $profileId = $_REQUEST['id'];
        if (false !== ($profile = colis_get_profile($profileId))) {

            $maxChunk = $profile['maxChunks'];
            $extensions = $profile['extensions'];
            $targetDir = $profile['targetDir'];


            @set_time_limit(5 * 60);
            // Settings


            $cleanupTargetDir = true; // Remove old files
            $maxFileAge = 5 * 3600; // Temp file age in seconds


            // Create target dir
            if (!file_exists($targetDir)) {
                if (false === @mkdir($targetDir, 0777, true)) {
                    throw new \RuntimeException("Couldn't create dir $targetDir");
                }
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

            $extension = '';
            if ($extensions && 0 !== ($pos = strrpos($fileName, '.'))) {
                $extension = strtolower(substr($fileName, $pos + 1));
                if ($extensions && false === in_array($extension, $extensions)) {
                    http_response_code(403);
                    $s->error("Invalid extension");
                    return false;
                }
            }

            $filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;


            // Chunking might be enabled
            $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
            $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;


            if ($chunks > $maxChunk) {
                http_response_code(403);
                $s->error("Too much chunks");
                return false;
            }


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

                colis_on_upload_after($filePath, $profileId);


                $name = basename($filePath);
                if (false !== $info = colis_get_info($name, $profileId)) {
                    $s->success([
                        'name' => $name,
                        'info' => $info,
                    ]);
                }
            }

            if ($chunks && $chunk !== $chunks - 1) {
                die('chunk...');
            }

        }
        else {
            http_response_code(403);
            $s->error("invalid id");
            return false;
        }
    }
    else {
        /**
         * Note: if your php.ini's upload_max_filesize or/and post_max_size are too low, 
         * you'll get that message too.
         * You can configure them from your .htaccess instead of opening the php.ini, put the following lines
         * in your .htaccess:
         * 
         *      php_value upload_max_filesize 50M
         *      php_value post_max_size 50M
         * 
         */
        http_response_code(403);
        $s->error("id not set");
        return false;
    }


})
    ->output();