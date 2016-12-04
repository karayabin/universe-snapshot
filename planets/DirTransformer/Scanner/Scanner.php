<?php


namespace DirTransformer\Scanner;


use Bat\FileSystemTool;
use DirTransformer\Transformer\TrackingInterface;
use DirTransformer\Transformer\TransformerInterface;

class Scanner
{

    /**
     *
     * null(default)|array,
     * null means all extensions allowed.
     * array of case insensitive extensions.
     *
     */
    private $_allowedExtensions;

    /**
     * number|null(default)
     *
     * null means parse all files.
     * number means parse {number} files.
     *
     */
    private $_limit;

    private $transformers;

    protected function __construct()
    {
        $this->_allowedExtensions = null;
        $this->_limit = null;
        $this->transformers = [];
    }


    public static function create()
    {
        return new self();
    }

    /**
     * The dstDir will be removed before every copy.
     */
    public function copy($srcDir, $dstDir)
    {
        if (false === is_dir($srcDir)) {
            throw new \RuntimeException("source dir is not a directory: $srcDir");
        }
        FileSystemTool::clearDir($dstDir);


        $this->scanDir($srcDir, $dstDir);

    }
    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * case insensitive
     */
    public function allowedExtensions(array $ext)
    {
        $this->_allowedExtensions = array_map("strtolower", $ext);
        return $this;
    }

    public function addTransformer(TransformerInterface $transformer)
    {
        $this->transformers[] = $transformer;
        return $this;
    }

    public function limit($n)
    {
        $this->_limit = $n;
        return $this;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    private function scanDir($srcDir, $dstDir)
    {
        $n = 0;
        $files = scandir($srcDir);
        foreach ($files as $file) {
            if ('.' !== $file && '..' !== $file) {

                $realfile = $srcDir . "/" . $file;
                $targetFile = $dstDir . "/" . $file;

                if (is_dir($realfile)) {
                    mkdir($targetFile);
                    $this->scanDir($realfile, $targetFile);
                } else {

                    if ($n++ < $this->_limit) {

                        // extension filter
                        if (null !== $this->_allowedExtensions) {
                            $ext = strtolower(FileSystemTool::getFileExtension($file));
                            if (false === in_array($ext, $this->_allowedExtensions)) {
                                continue;
                            }
                        }

                        // process the transformer chain
                        $content = file_get_contents($realfile);
                        foreach ($this->transformers as $t) {
                            if ($t instanceof TrackingInterface) {
                                $t->setPath($realfile);
                            }
                            $t->transform($content);
                        }

                        // output the file to the destination directory
                        file_put_contents($targetFile, $content);
                    } else {
                        break;
                    }
                }
            }
        }
    }


}