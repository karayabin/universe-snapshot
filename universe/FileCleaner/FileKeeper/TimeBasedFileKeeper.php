<?php


namespace FileCleaner\FileKeeper;


/**
 * There are two types of time based file keepers,
 * depending on which question they ask:
 *
 * - does the date match a certain pattern?
 *          for instance is the date the first of a month
 * - is the date in a given range?
 *          for instance is the date inside the month of february
 *
 *  As for now, because of my needs, I'm just implementing the "range" version.
 *
 */
class TimeBasedFileKeeper extends AbstractFileKeeper
{

    protected $extractor;

    /**
     * The extractor should return false when something goes wrong
     */
    public function setExtractor(\Closure $fn)
    {
        $this->extractor = $fn;
        return $this;
    }

    public function listen($baseName, $absolutePath)
    {
        if (false !== ($date = call_user_func($this->extractor, $baseName))) {
            $p = explode('-', $date);
            $this->dateListen($p[0], $p[1], $p[2], $absolutePath);
        }
    }

    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    protected function dateListen($year, $month, $day, $file)
    {
        // override this, and update the "keepList"
    }
}