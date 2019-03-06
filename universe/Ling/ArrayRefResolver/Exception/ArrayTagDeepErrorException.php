<?php


namespace Ling\ArrayRefResolver\Exception;


/**
 * The ArrayTagDeepErrorException class is used by the ArrayTagResolver class,
 * as a signal and way to quickly interrupt an error that occurs at deep levels.
 *
 */
class ArrayTagDeepErrorException extends ArrayRefResolverException
{

    /**
     * This property holds the name of the culprit deep-level variable.
     */
    private $varName;


    /**
     * Returns the culprit variable name.
     * @return string
     */
    public function getVarName()
    {
        return $this->varName;
    }


    /**
     * Sets the culprit variable name.
     */
    public function setVarName($varName)
    {
        $this->varName = $varName;
    }


}