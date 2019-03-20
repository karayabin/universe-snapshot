<?php


namespace Ling\DirScanner;


/**
 * The DirScanner class.
 *
 * @author Lingtalfi
 * 2015-11-03
 *
 */
class DirScanner
{

    /**
     * This property holds the rootDir for this instance.
     * @var string
     */
    private $rootDir;

    /**
     * This property holds the followLinks for this instance.
     * Whether to follow symlinks directories.
     *
     * @var bool = false
     */
    private $followLinks;


    /**
     * Builds the DirScanner instance.
     */
    public function __construct()
    {
        $this->followLinks = false;
    }


    /**
     * A static way of instantiating the class.
     *
     * @return DirScanner
     */
    public static function create()
    {
        return new static();
    }

    /**
     * Scans a directory, and collect items (using to the given callable) along the way.
     *
     * @param $dir
     * @param $callable :   mixed  function ( str:path, str:relativePath, int:level, bool:&skipDir )
     *
     *                              level starts at 0.
     *                              Any value except that the callback returns (except the null value) will
     *                              be appended to the returned array.
     *                              The null value is not collected.
     *                              If the skipDir variable is set to true and the item is a directory,
     *                              then the directory will be skipped recursively.
     *
     *
     * @return array
     * Array of whatever was returned by the callback (except if it is null)
     */
    public function scanDir($dir, $callable)
    {
        $ret = [];
        if (is_callable($callable)) {
            if (is_string($dir)) {
                if (file_exists($dir)) {
                    $dir = realpath($dir);
                    $this->rootDir = $dir;
                    $relDir = null;
                    $this->doScanDir($dir, $relDir, $callable, 0, $ret);
                } else {
                    throw new \RuntimeException("Dir not found: $dir");
                }
            } else {
                throw new \InvalidArgumentException(sprintf("dir argument must be of type string, %s given", gettype($dir)));
            }
        } else {
            throw new \InvalidArgumentException(sprintf("callable argument must be a callable, %s given", gettype($callable)));
        }
        return $ret;
    }


    /**
     * Sets the followLinks property for this instance.
     *
     * @param bool $followLinks
     * @return $this
     */
    public function setFollowLinks(bool $followLinks)
    {
        $this->followLinks = (bool)$followLinks;
        return $this;
    }



    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     * The working horse behind the scanDir method.
     * It will scan the directory recursively, and collect information along the way.
     *
     *
     * @param $dir
     * @param $relDir
     * @param $callable
     * @param $level
     * @param array $ret
     */
    private function doScanDir($dir, $relDir, $callable, $level, array &$ret)
    {
        if (file_exists($dir)) {
            $files = scandir($dir);
            foreach ($files as $file) {
                if ('.' !== $file && '..' !== $file) {
                    $path = $dir . '/' . $file;
                    if (null !== $relDir) {
                        $rPath = $relDir . '/' . $file;
                    } else {
                        $rPath = $file;
                    }

                    $skipDir = false;
                    if (null !== ($res = call_user_func_array($callable, [$path, $rPath, $level, &$skipDir]))) {
                        $ret[] = $res;
                    }

                    if (is_dir($path) &&
                        false === $skipDir &&
                        (
                            !is_link($path) ||
                            true === $this->followLinks
                        )
                    ) {
                        $this->doScanDir($path, $rPath, $callable, $level + 1, $ret);
                    }
                }
            }
        } else {
            $this->error("dir does not exist: $dir");
        }
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Throws a runtime exception.
     *
     * @param $msg
     * @throws \RuntimeException
     */
    protected function error($msg)
    {
        throw new \RuntimeException($msg);
    }
}
