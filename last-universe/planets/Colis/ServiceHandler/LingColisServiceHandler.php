<?php

namespace Colis\ServiceHandler;

/*
 * LingTalfi 2016-01-14
 */
use Colis\InfoHandler\InfoHandlerInterface;
use Tim\TimServer\TimServerInterface;

class LingColisServiceHandler implements LingColisServiceHandlerInterface
{

    private $maxChunks;
    private $extensions;
    private $targetDir;
    private $onUploadAfterCb;
    private $getInfoCb;

    /**
     * @var InfoHandlerInterface[]
     */
    private $infoHandlers;

    public function __construct()
    {
        $this->extensions = [];
        $this->infoHandlers = [];
    }


    public static function create()
    {
        return new static();
    }


    public function handle(TimServerInterface $s)
    {


        @set_time_limit(5 * 60);
        // Settings


        $cleanupTargetDir = true; // Remove old files
        $maxFileAge = 5 * 3600; // Temp file age in seconds


        // Create target dir
        if (!file_exists($this->targetDir)) {
            if (false === @mkdir($this->targetDir, 0777, true)) {
                throw new \RuntimeException("Couldn't create dir $this->targetDir");
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
        if ($this->extensions && 0 !== ($pos = strrpos($fileName, '.'))) {
            $extension = strtolower(substr($fileName, $pos + 1));
            if ($this->extensions && false === in_array($extension, $this->extensions)) {
                http_response_code(403);
                $s->error("Invalid extension");
                return false;
            }
        }

        $filePath = $this->targetDir . DIRECTORY_SEPARATOR . $fileName;


        // Chunking might be enabled
        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;


        if ($chunks > $this->maxChunks) {
            http_response_code(403);
            $s->error("Too much chunks");
            return false;
        }


        // Remove old temp files	
        if ($cleanupTargetDir) {
            if (!is_dir($this->targetDir) || !$dir = opendir($this->targetDir)) {
                http_response_code(403);
                $s->error("Failed to open temp directory");
                return false;
            }

            while (($file = readdir($dir)) !== false) {
                $tmpfilePath = $this->targetDir . DIRECTORY_SEPARATOR . $file;

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

            $this->onUploadAfter($filePath);


            $name = basename($filePath);
            $err = '';
            if (false !== ($info = $this->getInfo($name, $err))) {
                $s->success([
                    'name' => $name,
                    'info' => $info,
                ]);
                return true;
            }
            else {
                // assuming that a tim error was set
                http_response_code(403);
                $s->error($err);
                return false;
            }
        }

        if ($chunks && $chunk !== $chunks - 1) {
            die('chunk...');
        }
    }

    public function getInfo($name, &$err)
    {
        $ret = false;
        if (null !== $this->getInfoCb) {
            $ret = call_user_func_array($this->getInfoCb, [$name, &$err, $this]);
        }
        else {
            foreach ($this->infoHandlers as $h) {
                if (false !== ($info = $h->getInfo($name, $err))) {
                    $ret = $info;
                    break;
                }
            }

            // colis-ling convention for not interpretable item
            if (false === $ret && empty($err)) {
                $ret = [
                    'type' => 'none',
                ];
            }
        }
        return $ret;
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

    public function setExtensions(array $extensions)
    {
        $this->extensions = $extensions;
        return $this;
    }

    public function setMaxChunks($maxChunks)
    {
        $this->maxChunks = $maxChunks;
        return $this;
    }

    public function setTargetDir($targetDir)
    {
        $this->targetDir = $targetDir;
        return $this;
    }

    public function addInfoHandler(InfoHandlerInterface $h)
    {
        $this->infoHandlers[] = $h;
        return $this;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function onUploadAfter($filePath)
    {
        if (null !== $this->onUploadAfterCb) {
            call_user_func($this->onUploadAfterCb, $filePath);
        }
    }


}
