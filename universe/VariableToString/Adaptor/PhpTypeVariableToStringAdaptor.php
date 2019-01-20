<?php

namespace VariableToString\Adaptor;

/*
 * LingTalfi 2015-10-26
 */
class PhpTypeVariableToStringAdaptor implements VariableToStringAdaptorInterface
{


    /**
     * @return string|null
     *          If a string is returned, it's the representation of the variable.
     *          Otherwise, it means that this adaptor doesn't handle the given variable.
     *
     */
    public function toString($var)
    {
        $ret = null;
        $type = strtolower(gettype($var));
        switch ($type) {
            case 'boolean':
                if (true === $var) {
                    $ret = 'true';
                }
                else {
                    $ret = 'false';
                }
                break;
            case 'integer':
            case 'double':
                $ret = $type . '(' . $var . ')';
                break;
            case 'string':
                if (!empty($var)) {
                    $ret = $type . '(' . $var . ')';
                }
                else {
                    $ret = 'empty string';
                }
                break;
            case 'array':
                $ret = "array(" . count($var) . ')';
                break;
            case 'object':
                $ret = "object(" . get_class($var) . ')';
                break;
            case 'resource':
                $ret = "resource(" . get_resource_type($var) . ')';
                break;
            case 'null':
                $ret = "null";
                break;
            default:
                break;
        }
        return $ret;
    }
}
