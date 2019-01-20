<?php


namespace BabyYaml\Helper\InlineVariableUtil\Adaptor;


/**
 * InlineVariableUtilAdaptor
 * @author Lingtalfi
 * 2015-04-26
 *
 */
abstract class InlineVariableUtilAdaptor implements InlineVariableUtilAdaptorInterface
{

    public function __construct()
    {
    }

    abstract protected function getStringVersion($var, $type);


    /**
     * @return false|string,
     *              returns false if this adaptor is not adapted for the var,
     *              or the string representation of the var otherwise.
     */
    public function toString($var, $type)
    {
        if (false !== $s = $this->getStringVersion($var, $type)) {
            $var = $s;
            return $this->decorate($var);
        }
        return false;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function decorate($var)
    {
        return $var;
    }

}
