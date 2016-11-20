<?php

namespace ApplicationLog;

/*
 * LingTalfi 2015-10-25
 * 
 * Lightweight object to quickly send a message to a log file.
 * 
 * Features:
 *      - singleton  
 *      - auto-rotation of the log file based on size (in bytes)  
 *      - quick setup
 *      - log all messages in one file  
 *      - handle {datetime} dynamic tag
 *      - you can tag your messages
 *      - you can pass exceptions directly
 * 
 */
use Bat\FileSystemTool;

class ApplicationLog
{

    private static $inst;

    private $dir;

    /**
     * @var string can contain tag {datetime}.
     */
    private $baseName;
    private $separator;
    private $maxSize;

    /**
     * void    f ( str:errMsg )
     */
    private $onError;

    /**
     * void   f ( array:info )
     *
     * - info:
     * ----- src, path to original log file
     * ----- dst, path to copied log archive
     * ----- baseName, the baseName value of the ApplicationLog instance
     * ----- maxSize, the maxSize value of the ApplicationLog instance
     * ----- msg, the message that originated the rotation
     *
     */
    private $onRotate;

    /**
     * string       f ( str:logMessage, array:tags=null )
     */
    private $prepareMessage;
    private $errorPrefix;
    private $_started;

    public function __construct()
    {
        $this->_started = 0; // 0: not called; 1: accepted; 2: rejected
        $this->errorPrefix = 'AppLog: ';
        $this->dir = sys_get_temp_dir();
        $this->baseName = 'app.log';
        $this->separator = PHP_EOL;
        $this->maxSize = 1000000;
        $this->onRotate = null;
        $this->prepareMessage = function ($msg, array $tags = null) {
            $stags = '';
            if ($tags) {
                foreach ($tags as $tag) {
                    $stags .= '[' . $tag . ']';
                }
            }
            $sep = ' -- '; // sep will help parsers
            $msg = date("c") . $sep . $stags . $sep . $msg;
            return $msg;
        };
        $this->onError = function ($m) {
            throw new \Exception ($m);
        };
    }

    public static function inst()
    {
        if (null === self::$inst) {
            self::$inst = new static;
        }
        return self::$inst;
    }

    public static function add($msg, array $tags = null)
    {
        self::inst()->addEntry($msg, $tags);
    }

    public function addEntry($msg, array $tags = null)
    {
        if (true === $this->init()) {

            $file = $this->dir . "/" . $this->baseName;
            $curSize = filesize($file);

            $msg = call_user_func($this->prepareMessage, $msg, $tags);

            if ($curSize >= $this->maxSize) {
                // rotate
                $number = 2;


                $fileName = FileSystemTool::getFileName($this->baseName);
                $ext = FileSystemTool::getFileExtension($this->baseName);
                if ('' !== $ext) {
                    $ext = '.' . $ext;
                }

                $datetime = date('Y-m-d__H-i-s');
                $copy = $this->dir . "/" . $fileName . "-$number" . $ext;
                $copy = str_replace('{datetime}', $datetime, $copy);
                $max = 10000;

                $infLoop = false;
                while (file_exists($copy)) {
                    $copy = $this->dir . "/" . $fileName . "-$number" . $ext;
                    $number++;
                    if ($number > $max) {
                        $this->error("Couldn't find a unique filename, tried $number times");
                        $infLoop = true;
                        break;
                    }
                }
                if (false === $infLoop) {

                    rename($file, $copy);
                    touch($file);
                    chmod($file, 0777);

                    if (is_callable($this->onRotate)) {
                        $info = [
                            'src' => $file,
                            'dst' => $copy,
                            'baseName' => $this->baseName,
                            'maxSize' => $this->maxSize,
                            'msg' => $msg,
                        ];
                        call_user_func($this->onRotate, $info);
                    }
                }
            }


            // now add data in the file
            $msg .= $this->separator;
            if (0 === file_put_contents($file, $msg, FILE_APPEND)) {
                $this->error("Could not append content $msg to file $file");
            }
            return $this;
        }
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setBaseName($baseName)
    {
        $this->baseName = (string)$baseName;
        return $this;
    }

    public function setDir($dir)
    {
        $this->dir = $dir;
        return $this;
    }


    /**
     * @param int :bytes
     * @return $this
     */
    public function setMaxSize($maxSize)
    {
        $this->maxSize = (int)$maxSize;
        return $this;
    }


    /**
     * @param string :separator
     * @return $this
     */
    public function setSeparator($separator)
    {
        $this->separator = $separator;
        return $this;
    }

    public function setOnError(callable $onError)
    {
        $this->onError = $onError;
        return $this;
    }

    public function setOnRotate(callable $onRotate)
    {
        $this->onRotate = $onRotate;
        return $this;
    }

    public function setPrepareMessage(callable $prepareMessage)
    {
        $this->prepareMessage = $prepareMessage;
        return $this;
    }



    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function error($m)
    {
        call_user_func($this->onError, $this->errorPrefix . $m);
    }

    private function init()
    {
        if (1 === $this->_started) {
            return true;
        }
        elseif (2 === $this->_started) {
            return false;
        }
        if (is_string($this->dir)) {
            if (true === FileSystemTool::mkdir($this->dir, 0777, true)) {
                if (is_writable($this->dir)) {
                    // ok
                    $file = $this->dir . "/" . $this->baseName;
                    if (!file_exists($file)) {
                        if (false === touch($file)) {
                            $this->_started = 2;
                            $this->error("Couldn't create the file: $file");
                        }
                        else {
                            $this->_started = 1;
                            return true;
                        }
                    }
                    else {
                        $this->_started = 1;
                        return true;
                    }
                }
                else {
                    $this->_started = 2;
                    $this->error("Dir is not writable (" . $this->dir . ")");
                }
            }
            else {
                $this->_started = 2;
                $this->error("Cannot create dir " . $this->dir);
            }
        }
        else {
            $this->_started = 2;
            $this->error(sprintf("dir must be a string, %s given", gettype($this->dir)));
        }
        $this->_started = 2;
        return false;
    }

}
