<?php


namespace DirTransformer\Transformer;


/**
 *
 *
 * Converts <regular expression matches> to  <transformed expressions>.
 *
 *
 * When the regular expression matches, it creates an itemArray.
 * - the itemArray's first index contains the matched regular expression
 * - if the regular expression uses capturing groups, each capturing group is added to the itemArray in the order of matching (see preg_replace_callback for more info)
 *
 * The onMatch callback receives the itemArray as its sole argument, and returns the expression to replace the matched expression with.
 *
 */
class RegexTransformer implements TransformerInterface
{


    private $_regex;
    private $onMatchCallback;


    protected function __construct()
    {
        $this->_regex = null;
        $this->onMatchCallback = function () {
        };
    }

    public static function create()
    {
        return new self();
    }


    public function regex($pattern)
    {
        $this->_regex = $pattern;
        return $this;
    }

    public function onMatch($func)
    {
        $this->onMatchCallback = $func;
        return $this;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    public function transform(&$content)
    {
        $content = preg_replace_callback($this->_regex, $this->onMatchCallback, $content);
    }
}