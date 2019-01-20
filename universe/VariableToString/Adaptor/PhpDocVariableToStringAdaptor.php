<?php

namespace VariableToString\Adaptor;

/*
 * LingTalfi 2015-10-27
 */
use ArrayToString\ArrayToStringUtil;
use ArrayToString\SymbolManager\InlineArgsArrayToStringSymbolManager;

class PhpDocVariableToStringAdaptor implements VariableToStringAdaptorInterface
{


    /**
     *    bool   f ( array:theArray )
     *
     * Returns true if the array content should be displayed, or false if not.
     * The default is that the array content is displayed if there is less
     * than 4 root items in the array
     *
     */
    private $showArrayContent;

    public function __construct()
    {
        $this->showArrayContent = function (array $var) {
            return (count($var) < 4);
        };
    }


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
                $ret = $var;
                break;
            case 'string':
                $ret = '"' . str_replace('"', '\"', $var) . '"';
                break;
            case 'array':
                $showArrayContent = (bool)call_user_func($this->showArrayContent, $var);
                if (false === $showArrayContent) {
                    $ret = 'Array';
                }
                else {
                    $ret = ArrayToStringUtil::create()->setSymbolManager(new InlineArgsArrayToStringSymbolManager())->toString($var);
                }
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

    public function setShowArrayContent(callable $showArrayContent)
    {
        $this->showArrayContent = $showArrayContent;
        return $this;
    }


}
