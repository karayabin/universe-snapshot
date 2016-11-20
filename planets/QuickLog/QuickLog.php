<?php

namespace QuickLog;

/*
 * LingTalfi 2015-10-12
 * 
 * Lightweight object to quickly send a message to a log file.
 * 
 * Features:
 *      - quick setup
 *      - handles multiple log files in parallel  
 *      - handles rotation of the log file based on size (in bytes)  
 * 
 * 
 */
use Bat\FileSystemTool;

class QuickLog
{

    private static $inst;

    private $dir;
    private $defaultName;
    private $extensions;
    private $separators;
    private $maxSizes;
    private $onError;
    private $onRotates;
    private $errorPrefix;
    private $_started;

    public function __construct()
    {
        $this->_started = false;
        $this->errorPrefix = 'QuickLog: ';
        $this->dir = sys_get_temp_dir();
        $this->defaultName = 'quicklog';
        $this->extensions = [
            '*' => 'txt',
        ];
        $this->separators = [
            '*' => PHP_EOL,
        ];
        $this->maxSizes = [
            '*' => 1000000,
        ];
        $this->onRotates = [
            '*' => null,
        ];
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


    public function addEntry($msg, $logName = null)
    {
        $this->start();
        if (null === $logName) {
            $logName = $this->defaultName;
        }
        $ext = (array_key_exists($logName, $this->extensions)) ? $this->extensions[$logName] : $this->extensions['*'];

        $file = $this->dir . "/" . $logName . "." . $ext;
        if (!file_exists($file)) {
            if (false === touch($file)) {
                $this->error("Couldn't create the file: $file");
            }
            else {
                chmod($file, 0777);
            }
        }
        $maxSize = (array_key_exists($logName, $this->maxSizes)) ? $this->maxSizes[$logName] : $this->maxSizes['*'];

        $curSize = filesize($file);
        if ($curSize >= $maxSize) {
            // rotate
            $number = 2;
            $copy = $this->dir . "/" . $logName . "-$number" . "." . $ext;
            $max = 10000;
            $infLoop = false;
            while (file_exists($copy)) {
                $copy = $this->dir . "/" . $logName . "-$number" . "." . $ext;
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

                $onRotate = (array_key_exists($logName, $this->onRotates)) ? $this->onRotates[$logName] : $this->onRotates['*'];
                if (is_callable($onRotate)) {
                    call_user_func($onRotate, $logName, $maxSize, $msg);
                }
            }
        }


        // now add data in the file
        $sep = (array_key_exists($logName, $this->separators)) ? $this->separators[$logName] : $this->separators['*'];
        $msg .= $sep;
        if (0 === file_put_contents($file, $msg, FILE_APPEND)) {
            $this->error("Could not append content $msg to file $file");
        }
        return $this;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setDefaultName($defaultName)
    {
        $this->defaultName = (string)$defaultName;
        return $this;
    }

    public function setDir($dir)
    {
        $this->dir = $dir;
        return $this;
    }

    /**
     * @param string|array:extensions
     *                  string: the extension to use for every log file,
     *                  array: an array of logName => extension   (default is txt)
     *
     *
     * @return $this
     */
    public function setExtensions($extensions)
    {
        if (is_string($extensions)) {
            $this->extensions['*'] = $extensions;
        }
        elseif (is_array($extensions)) {
            $this->extensions = array_replace($this->extensions, $extensions);
        }
        else {
            $this->error(sprintf("extensions argument must be of type string or array, %s given", gettype($extensions)));
        }
        return $this;
    }

    /**
     * @param string|array:maxSizes
     *                  string: the max size for every log file,
     *                  array: an array of logName => max size (in bytes, default is 1000000 bytes = 1Mo)
     *
     *
     * @return $this
     */
    public function setMaxSizes($maxSizes)
    {
        if (is_numeric($maxSizes) || is_string($maxSizes)) {
            $this->maxSizes['*'] = (int)$maxSizes;
        }
        elseif (is_array($maxSizes)) {
            $this->maxSizes = array_replace($this->maxSizes, $maxSizes);
        }
        else {
            $this->error(sprintf("maxSizes argument must be of type string or array, %s given", gettype($maxSizes)));
        }
        return $this;
    }


    /**
     * @param string|array:separators
     *                  string: the separator for every log file,
     *                  array: an array of logName => separator (default is PHP_EOL)
     *
     *
     * @return $this
     */
    public function setSeparators($separators)
    {
        if (is_string($separators)) {
            $this->separators['*'] = $separators;
        }
        elseif (is_array($separators)) {
            $this->separators = array_replace($this->separators, $separators);
        }
        else {
            $this->error(sprintf("separators argument must be of type string or array, %s given", gettype($separators)));
        }
        return $this;
    }

    public function setOnError(callable $onError)
    {
        $this->onError = $onError;
        return $this;
    }

    public function setOnRotates($onRotates)
    {
        if (is_callable($onRotates)) {
            $this->onRotates['*'] = $onRotates;
        }
        elseif (is_array($onRotates)) {
            foreach ($onRotates as $k => $f) {
                if (is_callable($f)) {
                    $this->onRotates[$k] = $f;
                }
                else {
                    $this->error(sprintf("onRotates argument must be of either a callable or an array of callables, %s given", gettype($onRotates)));
                    break;
                }
            }
        }
        else {
            $this->error(sprintf("onRotates argument must be of either a callable or an array of callables, %s given", gettype($onRotates)));
        }
        return $this;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function error($m)
    {
        call_user_func($this->onError, $this->errorPrefix . $m);
    }

    private function start()
    {
        if (false === $this->_started) {
            if (is_string($this->dir)) {
                if (true === FileSystemTool::mkdir($this->dir, 0777, true)) {
                    if (is_writable($this->dir)) {
                        // ok
                    }
                    else {
                        $this->error("Dir is not writable (" . $this->dir . ")");
                    }
                }
                else {
                    $this->error("Cannot create dir " . $this->dir);
                }
            }
            else {
                $this->error(sprintf("dir must be a string, %s given", gettype($this->dir)));
            }
            $this->_started = true;
        }
    }

}
