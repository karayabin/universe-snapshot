<?php


namespace DirTransformer\Transformer;


/**
 *
 *
 * Converts <regular expression matches> to  <transformed expressions>.
 *
 *
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


    /**
     * The pattern must have one and only one group of capturing parentheses.
     */
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
        $content = preg_replace_callback($this->_regex, function (array $matches) {
            return call_user_func($this->onMatchCallback, $matches[1]);

        }, $content);
    }
}