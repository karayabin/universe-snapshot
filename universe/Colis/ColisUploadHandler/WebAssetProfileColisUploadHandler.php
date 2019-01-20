<?php

namespace Colis\ColisUploadHandler;

/*
 * LingTalfi 2016-01-14
 */
use Tim\TimServer\TimServerInterface;

class WebAssetProfileColisUploadHandler implements ColisUploadHandlerInterface
{

    private $profiles;
    private $onUploadAfterCb;
    private $getInfoCb;

    public function __construct()
    {
        $this->profiles = [];
    }


    public static function create()
    {
        return new static();
    }


    public function handle(TimServerInterface $s)
    {

        // Make sure file is not cached (as it happens for example on iOS devices)
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");


        if (isset($_REQUEST["id"])) {
            $profileId = $_REQUEST['id'];
            if (array_key_exists($profileId, $this->profiles)) {
                $profile = $this->profiles[$profileId];

                $maxChunk = (array_key_exists('maxChunks', $profile)) ? $profile['maxChunks'] : 1000;
                $extensions = (array_key_exists('extensions', $profile)) ? $profile['extensions'] : [];
                $targetDir = (array_key_exists('targetDir', $profile)) ? $profile['targetDir'] : 'uploads';


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

                    $this->onUploadAfter($filePath, $profileId);


                    $name = basename($filePath);
                    if (false !== ($info = $this->getInfo($name, $profile)) ){
                        $s->success([
                            'name' => $name,
                            'info' => $info,
                        ]);
                    }
                    else{
                        // assuming that a tim error was set
                        http_response_code(403);
                        return false;
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
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setGetInfoCb(callable $getInfoCb)
    {
        $this->getInfoCb = $getInfoCb;
        return $this;
    }

    public function setOnUploadAfterCb(callable $onUploadAfterCb)
    {
        $this->onUploadAfterCb = $onUploadAfterCb;
        return $this;
    }

    public function setProfiles(array $profiles)
    {
        $this->profiles = $profiles;
        return $this;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function onUploadAfter($filePath, $profileId)
    {
        if (null !== $this->onUploadAfterCb) {
            call_user_func($this->onUploadAfterCb, $filePath, $profileId);
        }
    }
    
    protected function getInfo($name, array $profile){
        $ret = false;
        if (null !== $this->getInfoCb) {
            $ret = call_user_func($this->getInfoCb, $name, $profile, $this);
        }
        return $ret;
    }


    
    

}
