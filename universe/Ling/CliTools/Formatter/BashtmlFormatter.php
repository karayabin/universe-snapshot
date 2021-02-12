<?php


namespace Ling\CliTools\Formatter;


use Ling\Bat\CurrentProcessTool;
use Ling\CliTools\Exception\CliToolsException;

/**
 * The BashtmlFormatter class.
 *
 * It interprets bashtml language described below, which basically allows you to write html like tags to get
 * colors and basic formatting (bold, underline, ...) in your console output, or your html output (it detects automatically
 * whether your are in the console environment or the browser environment).
 *
 * ![example screenshot](http://lingtalfi.com/img/universe/CliTools/bashtml-formatter-example.png)
 *
 *
 *
 *
 * Bashtml
 * ----------
 * The bashtml notation uses html like tags to format text.
 * So for instance, in the following sentence:
 *
 *
 * - The word <red>red</red> and the word <yellow>yellow</yellow> would be colored as expected.
 *
 *
 * The list of available tags is presented below.
 * You can also extend this class to create your own tags.
 *
 *
 *
 * - (logging)
 *      - success
 *      - info
 *      - warning
 *      - error
 * - (specials)
 *      - bold
 *      - b (alias for bold)
 *      - dim
 *      - underlined
 *      - blink
 *      - reverse
 *      - hidden
 * - (foreground colors)
 *      - default
 *      - black
 *      - red
 *      - green
 *      - yellow
 *      - blue
 *      - magenta
 *      - cyan
 *      - lightGray
 *      - darkGray
 *      - lightRed
 *      - lightGreen
 *      - lightYellow
 *      - lightBlue
 *      - lightMagenta
 *      - lightCyan
 *      - white
 * - (background colors)
 *      - bgDefault
 *      - bgBlack
 *      - bgRed
 *      - bgGreen
 *      - bgYellow
 *      - bgBlue
 *      - bgMagenta
 *      - bgCyan
 *      - bgLightGray
 *      - bgDarkGray
 *      - bgLightRed
 *      - bgLightGreen
 *      - bgLightYellow
 *      - bgLightBlue
 *      - bgLightMagenta
 *      - bgLightCyan
 *      - bgWhite
 *
 *
 * Nested tags will also work, as you would expect.
 *
 * So for instance:
 *
 * - <bold>this sentence is in bold, and the word <red>red</red> is also colored.</bold>
 *
 *
 * Bashtml also let you combine tags using the colon (:) separator.
 *
 * So for instance:
 *
 * - The word <red:bgBlue>red with blue background</red:bgBlue> is equivalent to <bgBlue><red>red with blue background</red></bgBlue>.
 *
 *
 *
 *
 *
 *
 *
 * How to use?
 * ---------------
 *
 *
 * ```php
 * #!/usr/bin/env php
 * <?php
 *
 *
 * use Ling\CliTools\Formatter\BashtmlFormatter;
 *
 * require_once __DIR__ . "/../universe/bigbang.php"; // activate universe
 *
 *
 *
 * // See ![the resulting screenshot](http://lingtalfi.com/img/universe/CliTools/bashtml-formatter-example.png)
 *
 * $f = new BashtmlFormatter();
 * echo $f->format("Hello" . PHP_EOL); // prints hello in black
 * echo $f->format("<red>Hello</red>" . PHP_EOL); // prints hello in red
 * echo $f->format("<red>Hello</red>, how are you?" . PHP_EOL); // prints hello in red, and the rest of the sentence
 * echo $f->format("<red:bgLightGray>Hello</red:bgLightGray>" . PHP_EOL); // prints hello in red with a light gray background
 * echo $f->format("<black:bgYellow:bold>Hello</black:bgYellow:bold>" . PHP_EOL); // prints yellow in bold and black with a yellow background
 * echo $f->format("Hello, I'm <dim>dimmed</dim>" . PHP_EOL); // prints "Hello, I'm " in black, and "dimmed" with a dim formatting
 * echo $f->format("<underlined>Hello</underlined>" . PHP_EOL); // prints "Hello", underlined
 * echo $f->format("<blink>Hello</blink>" . PHP_EOL); // prints the word "Hello", blinking
 * echo $f->format("<reverse>Hello</reverse>" . PHP_EOL); // prints the word "Hello" in white, with black background
 * echo $f->format("<bold>All this is bold, <red>Hello</red> then.</bold>" . PHP_EOL); // prints "All this is bold, Hello then." in bold, and "Hello" in bold red
 * echo $f->format("<success>This is a success</success>" . PHP_EOL); // prints "This is a success" in green
 * echo $f->format("<info>This is an info</info>" . PHP_EOL); // prints "This is an info" in blue
 * echo $f->format("<warning>This is a warning</warning>" . PHP_EOL); // prints "This is a warning" in orange
 * echo $f->format("<error>This is an error</error>" . PHP_EOL); // prints "This is a warning" in orange
 * ```
 *
 *
 *
 *
 */
class BashtmlFormatter implements FormatterInterface
{


    /**
     * This property holds the formatCodes for this instance.
     * It's an array of html tag => "bash code".
     *
     * "Bash codes" are defined here (for instance): http://misc.flogisoft.com/bash/tip_colors_and_formatting?&#comment_8210c4fe2c90858ae913fd908184a2b2
     *
     * @var array
     */
    protected $formatCodes;


    /**
     * This property holds the escapeSequence for this instance.
     * It shouldn't be changed, except for testing purposes.
     *
     * @var string
     */
    protected $escapeSequence;


    /**
     * This property holds the parents for this instance.
     * It's basically a stack to handle nested tags.
     *
     *
     * @var array
     */
    private $parents;


    /**
     * This property holds the isCli for this instance.
     * @var bool
     */
    private $isCli;


    /**
     * Builds the BashtmlFormatter instance.
     */
    public function __construct()
    {
        $this->formatCodes = [
            //--------------------------------------------
            // LOGGING
            //--------------------------------------------
            "success" => ['color: green', "32"], // green
            "info" => ['color: blue', "34"], // blue
            "warning" => ['color: orange', "35"], // magenta
            "error" => ['color: red', "31"], // red
            //--------------------------------------------
            // SPECIALS
            //--------------------------------------------
            'b' => ['font-weight: bold', '1'],
            'bold' => ['font-weight: ', '1'],
            'dim' => ['color: #ddd', '2'],
            'underlined' => ['text-decoration: underline', '4'],
            'blink' => ['color: black', '5'],
            'reverse' => ['color: black', '7'],
            'hidden' => ['color: white', '8'],
            'default' => ['color: black', '39'],
            //--------------------------------------------
            // COLORS
            //--------------------------------------------
            'black' => ['color: black', '30'],
            'red' => ['color: red', '31'],
            'green' => ['color: green', '32'],
            'yellow' => ['color: yellow', '33'],
            'blue' => ['color: blue', '34'],
            'magenta' => ['color: magenta', '35'],
            'cyan' => ['color: cyan', '36'],
            'lightGray' => ['color: lightGray', '37'],
            'darkGray' => ['color: darkGray', '90'],
            'lightRed' => ['color: #ffcccb', '91'],
            'lightGreen' => ['color: #90ee90', '92'],
            'lightYellow' => ['color: #ffffe0', '93'],
            'lightBlue' => ['color: #add8e6', '94'],
            'lightMagenta' => ['color: #e78be7', '95'],
            'lightCyan' => ['color: #e0ffff', '96'],
            'white' => ['color: white', '97'],
            'bgDefault' => ['background-color: black', '49'],
            'bgBlack' => ['background-color: black', '40'],
            'bgRed' => ['background-color: red', '41'],
            'bgGreen' => ['background-color: green', '42'],
            'bgYellow' => ['background-color: yellow', '43'],
            'bgBlue' => ['background-color: blue', '44'],
            'bgMagenta' => ['background-color: magenta', '45'],
            'bgCyan' => ['background-color: cyan', '46'],
            'bgLightGray' => ['background-color: lightGray', '47'],
            'bgDarkGray' => ['background-color: darkGray', '100'],
            'bgLightRed' => ['background-color: #ffcccb', '101'],
            'bgLightGreen' => ['background-color: #90ee90', '102'],
            'bgLightYellow' => ['background-color: #ffffe0', '103'],
            'bgLightBlue' => ['background-color: #add8e6', '104'],
            'bgLightMagenta' => ['background-color: #e78be7', '105'],
            'bgLightCyan' => ['background-color: #e0ffff', '106'],
            'bgWhite' => ['background-color: white', '107'],
        ];
        $this->escapeSequence = "\033";
        $this->parents = [];
        $this->isCli = CurrentProcessTool::isCli();
    }


    /**
     * Sets the format mode.
     * Can be one of:
     * - cli
     * - web
     *
     * This affects how the messages are formatted, either for the cli or the web.
     * By default, our class makes its own guess based on what environment the call to the format was made from.
     * You can force a format using this method.
     *
     *
     *
     *
     *
     * @param string $mode
     */
    public function setFormatMode(string $mode)
    {
        if ('cli' === $mode) {
            $this->isCli = true;
        } elseif ('web' === $mode) {
            $this->isCli = false;
        } else {
            throw new CliToolsException("Unknown format mode: \"$mode\".");
        }
    }


    /**
     * @implementation
     */
    public function format(string $expression): string
    {
        $pattern = '!</?([a-zA-Z0-9:_]+)>!Usm';
        $res = preg_replace_callback($pattern, function ($matches) {
            $ret = '';
            $isClosing = ('</' === substr($matches[0], 0, 2));
            $style = $matches[1];


            if (false === $isClosing) {
                if (false === $ret = $this->getStartTag($style, $this->parents)) {
                    // don't touch the string if it's an unknown code
                    return $matches[0];
                }
                if (true === $this->isCli) {
                    $this->addParent($style);
                }
            } else {
                if (true === $this->isCli) {
                    $this->removeParent($style);
                }
                if (false === $ret = $this->getStopTag($style, $this->parents)) {
                    // don't touch the string if it's an unknown code
                    return $matches[0];
                }
            }

            return $ret;
        }, $expression);

        if (false === $this->isCli) {
            $res = nl2br($res);
        }
        return $res;
    }



    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    /**
     * Adds a parent to the stack.
     *
     * @param string $name
     */
    private function addParent(string $name)
    {
        $this->parents[] = $name;
    }

    /**
     * Removes a parent from the stack.
     *
     * @param string $name
     */
    private function removeParent(string $name)
    {
        foreach ($this->parents as $k => $v) {
            if ($v === $name) {
                unset($this->parents[$k]);
            }
        }
    }


    /**
     * Returns the formatted equivalent of the opening $name tag.
     * False is returned in case the tag was not defined.
     *
     * @param string $name
     * @param array $parents
     * @return false|string
     */
    private function getStartTag(string $name, array $parents = [])
    {
        if (false === $this->checkCode($name)) {
            return false;
        }
        $parents[] = $name;
        return $this->getFormatExpression($parents, true);
    }

    /**
     * Returns the formatted equivalent of the closing $name tag.
     * False is returned in case the tag was not defined.
     *
     * @param $name
     * @param array $parents
     * @return bool|string
     */
    private function getStopTag(string $name, array $parents = [])
    {
        if (false === $this->checkCode($name)) {
            return false;
        }
        $ret = '';
        if (true === $this->isCli) {
            $ret .= $this->escapeSequence . "[0m";
        }
        $ret .= $this->getFormatExpression($parents, false);
        return $ret;
    }

    /**
     * Converts the given $codes to the bash code equivalent.
     *
     *
     * @param array $codes
     * An array of tag names.
     * @param bool $isStart
     *
     * @return string
     */
    private function getFormatExpression(array $codes, bool $isStart): string
    {
        $isCli = (int)$this->isCli;

        $formats = [];
        foreach ($codes as $alias) {
            if (false !== strpos($alias, ':')) {
                $p = explode(':', $alias);
                foreach ($p as $_alias) {
                    if (array_key_exists($_alias, $this->formatCodes)) {
                        $formats[] = $this->formatCodes[$_alias][$isCli];
                    }
                }
            } else {
                if (array_key_exists($alias, $this->formatCodes)) {
                    $formats[] = $this->formatCodes[$alias][$isCli];
                }
            }
        }


        if ($formats) {
            if (true === $this->isCli) {
                // bash
                return $this->escapeSequence . "[" . implode(';', $formats) . "m";
            } else {
                // html
                if (true === $isStart) {
                    return '<span style="' . implode(';', $formats) . '">';
                }
            }
        } else {
            if (false === $this->isCli && false === $isStart) {
                return '</span>';
            }
        }


        return '';
    }


    /**
     * Returns whether the given $code will resolve.
     *
     *
     * @param string $code
     * Either a tag name or a colon ":" separated tag list.
     * @return bool
     */
    private function checkCode(string $code)
    {
        if (false !== strpos($code, ':')) {
            $p = explode(':', $code);
            foreach ($p as $_code) {
                if (!array_key_exists($_code, $this->formatCodes)) {
                    return false;
                }
            }
        } else {
            return (array_key_exists($code, $this->formatCodes));
        }
        return true;
    }
}