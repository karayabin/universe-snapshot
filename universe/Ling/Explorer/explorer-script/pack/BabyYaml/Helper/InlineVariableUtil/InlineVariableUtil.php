<?php

namespace BabyYaml\Helper\InlineVariableUtil;

use Ling\BabyYaml\Helper\InlineVariableUtil\Adaptor\CallableInlineVariableUtilAdaptor;
use Ling\BabyYaml\Helper\InlineVariableUtil\Adaptor\ClosureInlineVariableUtilAdaptor;
use Ling\BabyYaml\Helper\InlineVariableUtil\Adaptor\InlineVariableUtilAdaptorInterface;
use Ling\BabyYaml\Helper\InlineVariableUtil\Adaptor\PhpTypeInlineVariableUtilAdaptor;


/**
 * InlineVariableUtil
 * @author Lingtalfi
 * 2015-04-26
 *
 *
 * Helps representing a variable in a string.
 * We can use for representing a variable inside an error message for instance.
 *
 *
 */
class InlineVariableUtil
{


    protected $adaptors;

    public function __construct()
    {
        $this->adaptors = $this->getDefaultAdaptors();
    }

    protected function getDefaultAdaptors(){
        return [
            new ClosureInlineVariableUtilAdaptor(),
            new CallableInlineVariableUtilAdaptor(),
            new PhpTypeInlineVariableUtilAdaptor(),
        ];
    }

    public function toString($var)
    {
        $ret = '';
        $type = gettype($var);
        foreach ($this->adaptors as $adaptor) {
            /**
             * @var InlineVariableUtilAdaptorInterface $adaptor
             */
            if (false !== $s = $adaptor->toString($var, $type)) {
                $ret = $s;
                break;
            }
        }
        return $ret;
    }

    public function getAdaptors()
    {
        return $this->adaptors;
    }

    public function setAdaptors($adaptors)
    {
        $this->adaptors = $adaptors;
    }

    public function addAdaptor(InlineVariableUtilAdaptorInterface $adaptor)
    {
        $this->adaptors[] = $adaptor;
    }


}
