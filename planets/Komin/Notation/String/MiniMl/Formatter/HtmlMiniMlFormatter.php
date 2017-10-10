<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Notation\String\MiniMl\Formatter;


/**
 * HtmlMiniMlFormatter
 * @author Lingtalfi
 * 2015-05-21
 *
 * Converts miniMl to html notation using spans.
 *
 */
class HtmlMiniMlFormatter implements MiniMlFormatterInterface
{
    private $tag2Style;

    public function __construct()
    {
        $this->tag2Style = [
            // text effects
            'bold' => 'font-weight: bold',
            'underline' => 'text-decoration: underline',
            // colors
            'black' => 'color: black',
            'white' => 'color: white',
            'red' => 'color: red',
            'green' => 'color: green',
            'blue' => 'color: blue',
            'orange' => 'color: orange',
            'yellow' => 'color: yellow',
            'purple' => 'color: purple',
            // background colors
            'blackBg' => 'background-color: black',
            'whiteBg' => 'background-color: white',
            'redBg' => 'background-color: red',
            'greenBg' => 'background-color: green',
            'blueBg' => 'background-color: blue',
            'orangeBg' => 'background-color: orange',
            'yellowBg' => 'background-color: yellow',
            'purpleBg' => 'background-color: purple',
            // miscellaneous 
            'emergency' => 'color: red; background-color: black',
            'alert' => 'color: yellow; background-color: black',
            'critical' => 'color: white; background-color: black',
            'error' => 'color: red',
            'warning' => 'color: orange',
            'notice' => 'color: purple',
            'info' => 'color: blue',
            'debug' => 'color: gray; font-weight: bold',
            'success' => 'color: green',
        ];
    }

    public static function create()
    {
        return new static();
    }

    public function format($string)
    {
        $miniMlWasUsed = false;

        $string = preg_replace_callback('!<([a-zA-Z0-9]+)>(.*?)</\1>!s', function ($match) use (&$miniMlWasUsed) {

            $tag = $match[1];
            $content = $match[2];
            if (array_key_exists($tag, $this->tag2Style)) {
                $miniMlWasUsed = true;
                return '<span style="' . $this->tag2Style[$tag] . '">'. htmlspecialchars($content) .'</span>';
            }
            return $match[0];

        }, $string);

        if (true === $miniMlWasUsed) {
            $string = str_replace(["\n", '\n'], '<br>', $string);
        }
        return $string;
    }
}
