<?php


namespace DirTransformer\Transformer;


/**
 * This class can not only apply a transformation to your custom notations,
 * but also tell you whether or not the transformation was successful on a per-file basis.
 *
 *
 * The algorithm used by the class is:
 *
 * - it scans the document using the given regex
 *      - the regex pattern MUST have a capturing group
 * - when a match is found (and for every match), the capture of the pattern is tested against the capture2Value map
 * - if the capture is found in the capture2Value map, a <value> is returned, and an entry is added to the foundList
 *      - the <value> is then passed to the onFound callback, which returns the <final value>: expression to replace the original matching expression with
 * - if the capture is not found in the capture2Value map, an entry is added to the unfoundList
 *
 *
 * The format of the foundList and unfoundList
 * ----------------------------------------------
 *
 * foundList: an array of filePath => foundItem
 *      - the filePath is the absolute path of the containing file
 *      - each foundItem is an array containing 4 entries:
 *          - 0: the original regex match
 *          - 1: the capture
 *          - 2: the value
 *          - 3: the final value
 *
 * unfoundList: an array of filePath => unfoundItem
 *      - the filePath is the absolute path of the containing file
 *      - each unfoundItem is an array containing 2 entries:
 *          - 0: the original regex match
 *          - 1: the capture
 *
 */
class TrackingMapRegexTransformer extends RegexTransformer implements TrackingInterface
{


    private $curFile;
    private $foundList;
    private $unfoundList;
    private $capture2Value;
    private $onFoundMatch;


    protected function __construct()
    {
        parent::__construct();
        $this->curFile = null;
        $this->foundList = [];
        $this->unfoundList = [];
        $this->capture2Value = [];
        $this->onFoundMatch = null; // function

        $this->onMatch(function (array $matches) {
            $capture = $matches[1];
            if (array_key_exists($capture, $this->capture2Value)) {
                $value = $this->capture2Value[$capture];
                $ret = call_user_func($this->onFoundMatch, $capture, $value);
                $this->foundList[$this->curFile][] = [$matches[0], $capture, $value, $ret];
                return $ret;
            } else {
                $this->unfoundList[$this->curFile][] = [$matches[0], $capture];
            }
            return $matches[0];
        });
    }

    public static function create()
    {
        return new self();
    }

    public function getFoundList()
    {
        return $this->foundList;
    }

    public function getUnfoundList()
    {
        return $this->unfoundList;
    }

    public function map(array $capture2Value)
    {
        $this->capture2Value = $capture2Value;
        return $this;
    }

    public function onFound($func)
    {
        $this->onFoundMatch = $func;
        return $this;
    }


    //--------------------------------------------
    //
    //--------------------------------------------

    // implements TrackingInterface
    public function setPath($file)
    {
        $this->curFile = $file;
    }


}