<?php

namespace VariableToString;

/*
 * LingTalfi 2015-10-27
 */
use VariableToString\Adaptor\CallableVariableToStringAdaptor;
use VariableToString\Adaptor\PhpTypeVariableToStringAdaptor;

class AuthorVariableToStringUtil extends VariableToStringUtil
{
    public function __construct()
    {
        parent::__construct();
        // order of elements matter because closure is not considered as a callable by the CallableVariableToStringAdaptor.
        $this->addAdaptor(new CallableVariableToStringAdaptor());
        $this->addAdaptor(new PhpTypeVariableToStringAdaptor());
    }


}
