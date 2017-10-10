<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Arrays\ArrayExportUtil;


/**
 * ArrayExportUtil
 * @author Lingtalfi
 * 2015-04-26
 *
 */
class ArrayExportUtilOld
{


    private $styles;
    private $options;
    private $style;
    private $nonArrayExportCallback;

    /**
     * @param string|array $input ,
     *                          if string, it's the name of a style to use
     *                          if an array, it's the array of options to use
     */
    public function __construct($input = null)
    {
        $this->options = [];
        $this->styles = $this->getDefaultStyles();

        if (is_string($input)) {
            $this->useStyle($input);
        }
        elseif (is_array($input)) {
            $this->setOptions($input);
        }
        else {
            $this->useStyle('html');
        }
        $this->setNonArrayExportCallback(function ($val) {
            return var_export($val, true);
        });

    }

    public static function create()
    {
        return new static();
    }

    public function arrayExport(array $array, $return = false, array $extraOptions = [])
    {

        $options = [];
        if (null !== $this->style) {
            $options = $this->getStyleOptions($this->style);
        }
        $options = array_replace($options, $this->options, $extraOptions);


        $sp = $options['space'];
        $eol = $options['eol'];
        $nbSpaces = $options['nbSpaces'];
        $kvSep = $options['kvSep'];
        $entrySep = $options['entrySep'];
        $arrayStartSymbol = $options['arrayStartSymbol'];
        $arrayEndSymbol = $options['arrayEndSymbol'];
        $trailingComma = $options['trailingComma'];
        $showKeysMode = $options['showKeysMode']; // true|false|assoc (only if assoc)

        $export = function ($array, $level = 1) use (&$export, $sp, $eol, $nbSpaces, $kvSep, $entrySep, $arrayStartSymbol, $arrayEndSymbol, $trailingComma, $showKeysMode) {
            $s = $arrayStartSymbol;
            $nbItems = count($array);
            $c = 1;
            foreach ($array as $k => $v) {
                $s .= $eol;
                $s .= str_repeat($sp, $nbSpaces * $level);

                $showKey = true;
                if (true === $showKeysMode) {
                    $showKey = true;
                }
                elseif (false === $showKeysMode) {
                    $showKey = false;
                }
                elseif ('assoc' === $showKeysMode) {
                    if (!is_string($k)) {
                        $showKey = false;
                    }
                }

                if (true === $showKey) {
                    $s .= call_user_func($this->nonArrayExportCallback, $k);
                    $s .= $kvSep;
                }
                if (is_array($v)) {
                    $s .= $export($v, $level + 1);
                }
                else {
                    $s .= call_user_func($this->nonArrayExportCallback, $v);
                }
                if (true === $trailingComma || $nbItems !== $c) {
                    $s .= $entrySep;
                }
                $c++;
            }

            $s .= $eol;
            $s .= str_repeat($sp, $nbSpaces * ($level - 1));
            $s .= $arrayEndSymbol;
            return $s;
        };


        $s = $export($array);
        if (true === $return) {
            return $s;
        }
        echo $s;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     * @param callable $nonArrayExportCallback
     *                  string      callable ( scalarVar )
     *                                  returns the representation of the scalar variable
     * @return $this
     */
    public function setNonArrayExportCallback(callable $nonArrayExportCallback)
    {
        $this->nonArrayExportCallback = $nonArrayExportCallback;
        return $this;
    }

    public function useStyle($style)
    {
        $this->style = $style;
        return $this;
    }

    public function setStyle($name, array $options)
    {
        $this->styles[$name] = $options;
        return $this;
    }

    public function setStyles(array $styles)
    {
        $this->styles = $styles;
        return $this;
    }

    public function getOptions()
    {
        return $this->options;
    }

    public function setOptions(array $options)
    {
        $this->options = $options;
    }


    public function setOption($name, $value)
    {
        $this->options[$name] = $value;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/

    private function getStyleOptions($style)
    {
        if (!array_key_exists($style, $this->styles)) {
            throw new \RuntimeException("Undefined style: $style");
        }
        return $this->styles[$style];
    }

    private function getDefaultStyles()
    {

        return [
            // to display in a browser
            'html' => [
                'space' => '&nbsp;',
                'eol' => '<br />',
                'nbSpaces' => 4,
                'numericKeys' => true,
                'kvSep' => ' => ',
                'entrySep' => ',',
                'arrayStartSymbol' => '[',
                'arrayEndSymbol' => ']',
                'trailingComma' => true,
                'showKeysMode' => 'assoc',
            ],
            // php method arg style
            'arg' => [
                'space' => ' ',
                'eol' => '',
                'nbSpaces' => 0,
                'numericKeys' => true,
                'kvSep' => ' => ',
                'entrySep' => ',',
                'arrayStartSymbol' => '[',
                'arrayEndSymbol' => ']',
                'trailingComma' => false,
                'showKeysMode' => 'assoc',
            ],
            // to insert in php code
            'php' => [
                'space' => ' ',
                'eol' => PHP_EOL,
                'nbSpaces' => 4,
                'numericKeys' => true,
                'kvSep' => ' => ',
                'entrySep' => ',',
                'arrayStartSymbol' => '[',
                'arrayEndSymbol' => ']',
                'trailingComma' => true,
                'showKeysMode' => 'assoc',
            ],
        ];
    }

}
