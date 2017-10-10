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

use BeeFramework\Bat\ArrayTool;


/**
 * PhpDocInlineVariableUtilAdaptor
 * @author Lingtalfi
 * 2015-04-30
 *
 */
class PhpDocInlineVariableUtilAdaptor extends InlineVariableUtilAdaptor
{


    protected $defaultValue;
    protected $options;

    function __construct(array $options = [])
    {
        parent::__construct();
        $this->defaultValue = "(unknown value type)";
        $this->options = array_replace([
            /**
             * whether or not to show the content of the array.
             * If not, the keyword "Array" will be displayed.
             */
            'arrayContent' => true,
        ], $options);
    }


    protected function getStringVersion($var, $type)
    {
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
                if (true === $this->options['arrayContent']) {
                    if (empty($var)) {
                        $ret = '[]';
                    }
                    else {
                        $ret = ArrayTool::export($var, true, 'inlineArgs');
                    }
                }
                else {
                    $ret = 'Array';
                }
                break;
            case 'object':
                $ret = "object(" . get_class($var) . ')';
                break;
            case 'resource':
                $ret = "resource(" . get_resource_type($var) . ')';
                break;
            case 'NULL':
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
