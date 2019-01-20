<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\Variable\InlineVariableUtil\Adaptor;


/**
 * PhpTypeInlineVariableUtilAdaptor
 * @author Lingtalfi
 * 2015-04-27
 *
 */
class PhpTypeInlineVariableUtilAdaptor extends InlineVariableUtilAdaptor
{


    protected $defaultValue;

    function __construct()
    {
        parent::__construct();
        $this->defaultValue = "(unknown value type)";
    }


    protected function getStringVersion($var, $type)
    {
        $type = strtolower($type);
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
                $ret = $this->defaultValue;
                break;
        }
        return $ret;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/

    public function getDefaultValue()
    {
        return $this->defaultValue;
    }

    public function setDefaultValue($defaultValue)
    {
        $this->defaultValue = $defaultValue;
    }

}
