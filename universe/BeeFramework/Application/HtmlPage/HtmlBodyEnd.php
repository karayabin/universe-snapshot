<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Application\HtmlPage;

use BeeFramework\Bat\HtmlTool;


/**
 * HtmlBodyEnd
 * @author Lingtalfi
 * 2014-10-21
 *
 */
class HtmlBodyEnd implements HtmlBodyEndInterface
{

    private static $inst;
    protected $scripts;
    protected $jsCodes;
    protected $contents;
    protected $options;

    private function __construct()
    {
        $this->scripts = [];
        $this->jsCodes = [];
        $this->contents = [];
        $this->options = [];
    }


    public static function getInst()
    {
        if (null === self::$inst) {
            self::$inst = new static();
        }
        return self::$inst;
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS HtmlHeadInterface
    //------------------------------------------------------------------------------/
    public function render()
    {
        /**
         * In this implementation, for contents (posX) and jsCodes (scopeX):
         *
         * - pos0
         * - scripts
         * - pos1
         * - jsCodes
         * ----- global
         * ----- jqueryBeforeDocumentReady
         * ----- jqueryInsideDocumentReady
         * - pos2
         *
         * Also, we assume that html5 is used, so script tags holding js code don't need attributes.
         */
        $s = '';
        if (array_key_exists(0, $this->contents)) {
            foreach ($this->contents[0] as $content) {
                $s .= $content . PHP_EOL;
            }
        }
        foreach ($this->scripts as $attr) {
            $attr = array_replace([
                'text' => 'text/javascript',
            ], $attr);
            $s .= '<script' . HtmlTool::toAttributesString($attr) . '></script>' . PHP_EOL;
        }
        if (array_key_exists(1, $this->contents)) {
            foreach ($this->contents[1] as $content) {
                $s .= $content . PHP_EOL;
            }
        }
        $c = '';
        $j1 = '';
        $j2 = '';
        $sep = '//-----------------------' . PHP_EOL;
        foreach ($this->jsCodes as $scope => $codes) {
            if ('jqueryBeforeDocumentReady' === $scope) {
                foreach ($codes as $code) {
                    $j1 .= $sep;
                    $j1 .= $code . PHP_EOL;
                }
            }
            elseif ('jqueryInsideDocumentReady' === $scope) {
                foreach ($codes as $code) {
                    $j2 .= $sep;
                    $j2 .= $code . PHP_EOL;
                }
            }
            else {
                foreach ($codes as $code) {
                    $c .= $sep;
                    $c .= $code . PHP_EOL;
                }
            }
        }
        if ($c || $j1 || $j2) {
            $s .= '<script>';
            if ($c) {
                $s .= $c . PHP_EOL;
            }
            if ($j1 || $j2) {
                $s .= '
                (function ($) {

                    ' . $j1 . '

                    $(document).ready(function () {
                        ' . $j2 . '
                    });
                })(jQuery);
                ';
            }
            $s .= '</script>';
        }


        if (array_key_exists(2, $this->contents)) {
            foreach ($this->contents[2] as $content) {
                $s .= $content . PHP_EOL;
            }
        }
        return $s . PHP_EOL;
    }


    /**
     * @return HtmlBodyEndInterface
     */
    public function addScript($src)
    {
        $this->scripts[] = [
            'src' => $src,
        ];
        return $this;
    }

    /**
     * @return HtmlBodyEndInterface
     */
    public function addJsCode($code)
    {
        if (is_string($code)) {
            $code = [
                'global' => $code,
            ];
        }
        foreach ($code as $scope => $c) {
            if (!array_key_exists($scope, $this->jsCodes)) {
                $this->jsCodes[$scope] = [];
            }
            $this->jsCodes[$scope][] = $c;
        }
        return $this;
    }

    /**
     * @return HtmlBodyEndInterface
     */
    public function setOption($key, $value)
    {
        $this->options[$key] = $value;
        return $this;
    }

    /**
     * @return HtmlBodyEndInterface
     */
    public function addContent($content, $pos = 0)
    {
        if (!array_key_exists($pos, $this->contents)) {
            $this->contents[$pos] = [];
        }
        $this->contents[$pos][] = $content;
        return $this;
    }


    /**
     * @return array of attributes
     */
    public function getScripts()
    {
        return $this->scripts;
    }


    public function getJsCodes($scope = null)
    {
        if (null === $scope) {
            return $this->jsCodes;
        }
        else {
            if (array_key_exists($scope, $this->jsCodes)) {
                return $this->jsCodes[$scope];
            }
        }
        return [];
    }

    public function getOption($k, $defaultValue = null)
    {
        if (array_key_exists($k, $this->options)) {
            return $this->options[$k];
        }
        return $defaultValue;
    }

    public function getContent($pos)
    {
        if (array_key_exists($pos, $this->contents)) {
            return $this->contents[$pos];
        }
        return '';
    }


}
