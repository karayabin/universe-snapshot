<?php


namespace Tokens\TokenRepresentation;


class ReplacementSequenceToken
{

    private $_isOptional;
    private $_matchIf;


    public function __construct()
    {
        $this->_isOptional = false;
    }

    public static function create()
    {
        return new self();
    }

    public function optional()
    {
        $this->_isOptional = true;
        return $this;
    }

    /**
     * func receives a tokenIdentifier as its sole parameter.
     * func should return true if the given tokenIdentifier matches.
     * func should not try to handle optional cases as this is already handled in the ReplacementSequence object.
     */
    public function matchIf($func)
    {
        $this->_matchIf = $func;
        return $this;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    public function matches(&$tokenIdentifier)
    {
        return (true === call_user_func_array($this->_matchIf, [&$tokenIdentifier]));
    }

    public function isOptional()
    {
        return $this->_isOptional;
    }

}