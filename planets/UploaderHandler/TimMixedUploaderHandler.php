<?php

namespace UploaderHandler;

/*
 * LingTalfi 2016-01-11
 *
 * 
 * 
 * This MixedUploaderHandler uses a tim server to populate error/success messages.
 * Also, certain parameters are expected, read below.
 * 
 * 
 * 
 * Strategy
 * -----------
 * 
 * if the name of the file is passed, using $_FILE[file][name] or $_REQUEST[name] (post|get),
 * then it is used, otherwise, a random name will be chosen by the server.
 * 
 * 
 * ### Chunking 
 * 
 * Chunking is performed by the server by passing the following parameters via $_REQUEST:
 *  
 * - chunks - the total number of chunks in the file
 * - chunk - the ordinal number of the current chunk in the set (starts with zero)
 * - ?name - the name of file (usually used to associate the chunk with the actual file)
 *
 * 
 * ### the ".part" suffix
 * 
 * While the file is uploaded, it's suffixed with a suffix, which by default is ".part".
 * For instance: /path/to/myfile.mp4.part is the file that contains the bits of the upload until the (theoretically )last bit 
 * of data has arrived. When the file's uploading is complete (either using chunking or regular upload), 
 * then the file /path/to/myfile.mp4.part is moved to /path/to/myfile.mp4. 
 * 
 * 
 * Note: this strategy is actually the original strategy used by the plupload jquery plugin.                  
 *
 * 
 * Also, beside of inheriting the MixedUploaderHandler's strategy (prepare and filter), this uploader emphasizes 
 * the fact that the file is first uploaded to a tmp dir (probably outside web server's root dir?),
 * before it gets processed by the onFileAccepted callback (and possible moved to the web server's root directory).
 * This is a security measure.
 * 
 * 
 * webRootDir
 * -------------
 * 
 * By default, the tim success msg is the uploaded file path.
 * However, if the webRootDir is set, then the tim's default success message is the url to the uploaded file,
 * assuming that the dstDir (see class properties) is under the web root dir.
 * 
 * 
 * 
 * Credits
 * ----------
 * 
 * This handler uses tim communication protocol (https://github.com/lingtalfi/Tim).
 * It is based on a script provided by pluploader (http://plupload.com/).
 * 
 * 
 * 
 * 
 */
use Bat\FileSystemTool;
use Tim\TimServer\TimServerInterface;

class TimMixedUploaderHandler extends MixedUploaderHandler
{

    private $tmpFileSuffix;
    private $tmpDir; // folder while creating the file (should be we inaccessible for security)
    private $dstDir; // the directory where the uploaded and checked file ends
    private $webRootDir;
    private $randomSeed;
    // watch out for those two variables if you extend this class!, they are only defined inside THIS prepare method
    private $isLastChunk;
    private $fileName;

    /**
     * @var TimServerInterface
     */
    protected $timServer;

    public function __construct()
    {
        parent::__construct();
        $this->tmpDir = '/tmp';
        $this->dstDir = '/tmp';
        $this->tmpFileSuffix = '.part';
        $this->randomSeed = '_file__';
        $this->isLastChunk = false;
    }

    public function setTmpDir($tmpDir)
    {
        $this->tmpDir = $tmpDir;
        return $this;
    }

    public function setDstDir($dstDir)
    {
        $this->dstDir = $dstDir;
        return $this;
    }


    public function setTimServer(TimServerInterface $timServer)
    {
        $this->timServer = $timServer;
        return $this;
    }

    public function setTmpFileSuffix($tmpFileSuffix)
    {
        $this->tmpFileSuffix = $tmpFileSuffix;
        return $this;
    }

    public function setRandomSeed($randomSeed)
    {
        $this->randomSeed = $randomSeed;
        return $this;
    }





    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function prepare(&$path, &$isChunk)
    {
        $this->isLastChunk = false;
        if (false === parent::prepare($path, $isChunk)) {
            return false;
        }
        if (null === $this->timServer) {
            throw new \RuntimeException("Invalid object: timServer not set");
        }


        // Make sure file is not cached (as it happens for example on iOS devices)
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");


        @set_time_limit(5 * 60);

        // Settings
        $targetDir = realpath($this->tmpDir);


        $cleanupTargetDir = true; // Remove old files
        $maxFileAge = 5 * 3600; // Temp file age in seconds


        // Create target dir
        if (false === FileSystemTool::mkdir($targetDir, 0777, true)) {
            $this->timServer->error("The target dir couldn't be created");
            return false;
        }

        // Create destination dir
        if (false === FileSystemTool::mkdir($this->dstDir, 0777, true)) {
            $this->timServer->error("The destination dir couldn't be created");
            return false;
        }

        // Get a file name
        if (isset($_REQUEST["name"])) {
            $fileName = $_REQUEST["name"];
        }
        elseif (isset($_FILES["file"]["name"])) {
            $fileName = $_FILES["file"]["name"];
        }
        else {
            $fileName = uniqid($this->randomSeed);
        }

        $fileName = preg_replace('!\.+!', '.', $fileName); // prevent parent access
        $this->fileName = $fileName;

        $filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;


        // Chunking might be enabled
        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;


        // Remove old temp files	
        if ($cleanupTargetDir) {
            if (!$dir = opendir($targetDir)) {
                $this->timServer->error("Failed to open temp directory.");
                return false;
            }

            while (($file = readdir($dir)) !== false) {
                $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;

                // If temp file is current file proceed to the next
                if ($tmpfilePath == "{$filePath}" . $this->tmpFileSuffix) {
                    continue;
                }

                // Remove temp file if it is older than the max age and is not the current file
                if (preg_match('/' . preg_quote($this->tmpFileSuffix, '/') . '$/', $file) && (filemtime($tmpfilePath) < time() - $maxFileAge)) {
                    @unlink($tmpfilePath);
                }
            }
            closedir($dir);
        }


        // Open temp file
        if (!$out = @fopen("{$filePath}" . $this->tmpFileSuffix, $chunks ? "ab" : "wb")) {
            $this->timServer->error("Failed to open output stream.");
            return false;
        }

        if (!empty($_FILES)) {
            if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
                $this->timServer->error("Failed to move uploaded file.");
                return false;
            }

            // Read binary input stream and append it to temp file
            if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
                $this->timServer->error("Failed to open input stream.");
                return false;
            }
        }
        else {
            if (!$in = @fopen("php://input", "rb")) {
                $this->timServer->error("Failed to open input stream.");
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
            if (!$chunks) {
                $isChunk = false;
            }
            else {
                $isChunk = true;
                $this->isLastChunk = true;
            }
            $path = $filePath . $this->tmpFileSuffix;
        }
        else {
            // chunking, but not the last part
            $isChunk = true;
            $path = $filePath . $this->tmpFileSuffix;
        }

    }


    protected function accept($path, $isChunk)
    {
        parent::accept($path, $isChunk);
        $dst = $this->dstDir . "/" . $this->fileName;
        if (false === $isChunk || true === $this->isLastChunk) {
            /**
             * if path and dst are on different drives,
             * the rename might generate warnings, but from what I've tested, the file was renamed anyway,
             * so I removed the warnings.
             */
            @rename($path, $dst);
        }

        $this->onAccept($dst);
    }

    protected function refute($path, $isChunk, array $errors)
    {
        parent::refute($path, $isChunk, $errors);
        // by default, just display the first error found
        if ($errors) { // this condition shouldn't be checked actually, but just in case
            $error = array_shift($errors);
            $this->timServer->error($error);
        }
    }


    protected function onAccept($dst)
    {
        if (null === $this->webRootDir) {
            $this->timServer->success($dst);
        }
        else {
            $url = str_replace(realpath($this->webRootDir), '', realpath($dst));
            $this->timServer->success($url);
        }
    }

}
