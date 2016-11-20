<?php

namespace VariableToString\Adaptor;

/*
 * LingTalfi 2015-10-26
 */
interface VariableToStringAdaptorInterface
{


    /**
     * @return string|null
     *          If a string is returned, it's the representation of the variable.
     *          Otherwise, it means that this adaptor doesn't handle the given variable.
     * 
     */
    public function toString($var);
}
