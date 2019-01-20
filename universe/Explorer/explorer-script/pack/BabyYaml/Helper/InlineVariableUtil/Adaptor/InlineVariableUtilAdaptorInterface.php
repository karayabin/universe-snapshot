<?php


namespace BabyYaml\Helper\InlineVariableUtil\Adaptor;


/**
 * InlineVariableUtilAdaptorInterface
 * @author Lingtalfi
 * 2015-04-26
 *
 */
interface InlineVariableUtilAdaptorInterface
{

    /**
     * @return false|string,
     *              returns false if this adaptor is not adapted for the var,
     *              or the string representation of the var otherwise.
     */
    public function toString($var, $type);
}
