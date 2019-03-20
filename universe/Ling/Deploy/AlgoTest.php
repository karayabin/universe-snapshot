<?php


namespace Ling\Deploy;


use Ling\Bat\FileSystemTool;
use Ling\DirScanner\DirScanner;
use Ling\DirScanner\YorgDirScannerTool;

class AlgoTest
{

    protected $dir;
    protected $mapFile;


    public function __construct()
    {
        $this->dir = null;
        $this->mapFile = null;
    }

    /**
     * Sets the dir.
     *
     * @param null $dir
     */
    public function setDir($dir)
    {
        $this->dir = $dir;
    }

    /**
     * Sets the mapFile.
     *
     * @param null $mapFile
     */
    public function setMapFile($mapFile)
    {
        $this->mapFile = $mapFile;
    }


    public function average(string $perfFile)
    {
        $lines = file($perfFile);
        $sum = 0;
        $count = 0;
        foreach ($lines as $line) {
            $p = explode(":", $line);
            $n = trim(array_pop($p));
            $count++;
            $sum += $n;
        }
        return ($sum / $count);
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Based on heavy extensions
     *
     *
     * About 3 seconds the first time
     * avg(10) = float(0.91562221050262)
     *
     *
     */
    public function algoHeavyExtensions()
    {
        $files = YorgDirScannerTool::getFiles($this->dir, true, true);
        $c = 0;
        $lines = [];
        $heavyExtensions = ["mp4", 'jpg', 'jpeg', 'png', 'gif', 'bmp'];
        foreach ($files as $file) {
            $baseName = basename($file);


            $lastPos = strrpos($baseName, '.');
            if (false !== $lastPos) {
                $ext = strtolower(substr($baseName, $lastPos + 1));
                $absFile = $this->dir . "/" . $file;
                if (false === in_array($ext, $heavyExtensions)) {
                    $lines[] = $file . '::' . hash_file("haval160,4", $absFile);
                } else {
                    $size = filesize($absFile);
                    $lines[] = $file . ' : ' . $size;
                }

            }

        }

        FileSystemTool::mkfile($this->mapFile, implode(PHP_EOL, $lines));
    }


    /**
     * First time: 10.65350484848
     * avg(10) = float(0.9108412027359)
     *
     */
    public function algoHeavyExtensions2()
    {
        $files = YorgDirScannerTool::getFiles($this->dir, true, true);
        $lines = [];
        $heavyExtensions = ["mp4"];
        foreach ($files as $file) {
            $baseName = basename($file);


            $lastPos = strrpos($baseName, '.');
            if (false !== $lastPos) {
                $ext = strtolower(substr($baseName, $lastPos + 1));
                $absFile = $this->dir . "/" . $file;
                if (false === in_array($ext, $heavyExtensions, true)) {
                    $lines[] = $file . '::' . hash_file("haval160,4", $absFile);
                } else {
                    $size = filesize($absFile);
                    $lines[] = $file . ' : ' . $size;
                }

            }

        }

        FileSystemTool::mkfile($this->mapFile, implode(PHP_EOL, $lines));
    }


    /**
     * First time: 1.1047148704529
     * avg(10) = float(1.0385466098785)
     *
     */
    public function algoHeavyExtensions2b()
    {

        $lines = [];
        $heavyExtensions = ["mp4"];
        DirScanner::create()->setFollowLinks(false)->scanDir($this->dir,
            function ($path, $rPath, $level, &$skipDir) use (&$lines, $heavyExtensions) {

                // broken link
                if (is_link($path) && false === file_exists($path)) {
                    return;
                }
                $baseName = basename($rPath);
                $lastPos = strrpos($baseName, '.');
                if (false !== $lastPos) {
                    $ext = strtolower(substr($baseName, $lastPos + 1));
                    if (false === in_array($ext, $heavyExtensions, true)) {
                        $lines[] = $rPath . '::' . hash_file("haval160,4", $path);
                    } else {
                        $size = filesize($path);
                        $lines[] = $rPath . ' : ' . $size;
                    }

                }
            });
        FileSystemTool::mkfile($this->mapFile, implode(PHP_EOL, $lines));
    }


    /**
     *
     * First time: 24.049447059631
     * avg(10) = float(1.5600600957871)
     */
    public function algoFileSizeSplit()
    {
        $files = YorgDirScannerTool::getFiles($this->dir, true, true);
        $lines = [];

        foreach ($files as $file) {
            $absFile = $this->dir . "/" . $file;


            $size = filesize($absFile);
            if ($size <= 1000000) {
                $lines[] = $file . ' : ' . hash_file("haval160,4", $absFile);
            } else {
                $lines[] = $file . ' : ' . $size;
            }


        }

        FileSystemTool::mkfile($this->mapFile, implode(PHP_EOL, $lines));
    }


    /**
     *
     * First times:
     * - 1.6162939071655
     * - 23.642827033997
     *
     * avg(10) = float(1.460418510437)
     */
    public function algoAllHash()
    {
        $files = YorgDirScannerTool::getFiles($this->dir, true, true);
        $lines = [];

        foreach ($files as $file) {
            $absFile = $this->dir . "/" . $file;
            $lines[] = $file . ' : ' . hash_file("haval160,4", $absFile);
        }

        FileSystemTool::mkfile($this->mapFile, implode(PHP_EOL, $lines));
    }


    //--------------------------------------------
    //
    //--------------------------------------------

}