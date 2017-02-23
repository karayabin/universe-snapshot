<?php


namespace TimeFileUtil;


class TimeFileUtil
{

    private $extractor;
    private $isRecursive;


    public function __construct()
    {
        $this->isRecursive = true;
    }

    public static function create()
    {
        return new static();
    }

    public function setIsRecursive($isRecursive)
    {
        $this->isRecursive = $isRecursive;
        return $this;
    }

    /**
     * An extractor is a callback which takes the basename to a file (for instance myfile.txt) and returns
     * the date associated with it (for instance in mysql format: yyyy-mm-dd).
     */
    public function setExtractor(\Closure $extractor)
    {
        $this->extractor = $extractor;
        return $this;
    }


    /**
     * Returns the earliest date found on the files inside the given directory
     */
    public function getStartDateByDir($dir)
    {
        $items = $this->getItems($dir);

        if (count($items) > 0) {
            return $items[0][1];
        }
        return false;
    }

    /**
     * Returns the latest date found on the files inside the given directory
     */
    public function getEndDateByDir($dir)
    {
        $items = $this->getItems($dir);
        $item = array_pop($items);
        return $item[1];
    }


    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    /**
     * Returns the absolute path of the file which holds the first date, for a given directory
     */
    private function getItems($dir)
    {
        $items = [];
        $this->collectItems($dir, $items);
        usort($items, function ($a, $b) {
            return ($a[1] > $b[1]);
        });

        if (count($items) > 0) {
            return $items;
        }
        return false;
    }


    private function collectItems($dir, array &$items)
    {
        $files = scandir($dir);
        foreach ($files as $f) {
            if ('.' !== $f && '..' !== $f) {
                $file = $dir . "/" . $f;
                if (is_dir($file)) {
                    if (true === $this->isRecursive) {
                        $this->collectItems($file, $items);
                    }
                } else {
                    $items[] = [$dir . "/" . $f, call_user_func($this->extractor, $f)];
                }
            }
        }
    }


}