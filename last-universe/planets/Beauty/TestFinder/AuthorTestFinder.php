<?php

namespace Beauty\TestFinder;

/*
 * LingTalfi 2015-10-27
 */
class AuthorTestFinder implements TestFinderInterface
{


    private $dirs;
    private $extensions;


    /**
     * string:url      f ( str:absolutePath, str:relativePath )
     *
     */
    private $fileToUrl;

    public function __construct()
    {
        $this->dirs = [];
        $this->extensions = null; // null means all extensions are allowed
        $this->fileToUrl = function ($file, $relativePath) {
            return 'http://undefined/' . trim($relativePath, '/');
        };
    }

    public static function create()
    {
        return new static();
    }

    public function addDir($dir)
    {
        $this->dirs[] = $dir;
        return $this;
    }

    public function addDirContainer($dir)
    {
        if (is_dir($dir)) {
            $files = scandir($dir);
            foreach ($files as $file) {
                $path = $dir . '/' . $file;
                if ('.' !== $file && '..' !== $file && is_dir($path)) {
                    $this->dirs[] = $path;
                }
            }

        }
        else {
            trigger_error("dir is not a directory: $dir", E_USER_WARNING);
        }
        return $this;
    }

    public function setExtensions(array $extensions)
    {
        $this->extensions = $extensions;
        return $this;
    }

    public function setFileToUrl(callable $fileToUrl)
    {
        $this->fileToUrl = $fileToUrl;
        return $this;
    }




    //------------------------------------------------------------------------------/
    // IMPLEMENTS TestFinderInterface
    //------------------------------------------------------------------------------/
    /**
     * @return array
     *
     *      Returns an array of <item>.
     *      An <item> is either:
     *          - an array of test urls
     *          - an array of <item>
     *
     */
    public function getTestPageUrls()
    {
        $ret = [];
        foreach ($this->dirs as $dir) {
            $cont = [];
            $base = basename($dir);
            $this->collectTests($dir, $cont, $base);
            $ret[$base] = $cont;
        }
        return $ret;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function collectTests($dir, array &$container, $relPath = null)
    {
        $files = scandir($dir);
        $nextRelPath = '';
        foreach ($files as $name) {
            $file = $dir . '/' . $name;
            if ('.' !== $name && '..' !== $name) {
                if (null === $relPath) {
                    $nextRelPath = $name;
                }
                else {
                    $nextRelPath = $relPath . '/' . $name;
                }

                if (is_dir($file)) {
                    $cont = [];
                    $this->collectTests($file, $cont, $nextRelPath);
                    $container[$name] = $cont;
                }
                else {

                    $extMatch = false;
                    if (null === $this->extensions) {
                        $extMatch = true;
                    }
                    elseif (is_array($this->extensions)) {
                        foreach ($this->extensions as $ext) {
                            if (true === $this->endsWith($file, $ext)) {
                                $extMatch = true;
                                break;
                            }
                        }
                    }

                    if (true === $extMatch) {
                        $container[] = call_user_func($this->fileToUrl, $file, $nextRelPath);
                    }
                }
            }
        }
    }


    private function endsWith($haystack, $needle)
    {
        return (substr($haystack, -strlen($needle)) === $needle);
    }

}
