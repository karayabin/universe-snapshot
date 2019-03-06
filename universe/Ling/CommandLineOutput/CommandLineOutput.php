<?php


namespace Ling\CommandLineOutput;


use Ling\CommandLineOutput\Adaptor\AdaptorInterface;
use Ling\CommandLineOutput\Adaptor\BashtmlAdaptor;

class CommandLineOutput implements CommandLineOutputInterface
{


    public function output(string $message, bool $newLine = true)
    {
        echo $this->format($message);
        if (true === $newLine) {
            echo PHP_EOL;
        }
        return $this;
    }


    public function error(string $message, bool $newLine = true)
    {
        $this->output('<red>' . $message . '</red>', $newLine);
        return $this;
    }

    public function success(string $message, bool $newLine = true)
    {
        $this->output('<green>' . $message . '</green>', $newLine);
        return $this;
    }

    public function info(string $message, bool $newLine = true)
    {
        $this->output('<blue>' . $message . '</blue>', $newLine);
        return $this;
    }

    public function warning(string $message, bool $newLine = true)
    {
        $this->output('<yellow>' . $message . '</yellow>', $newLine);
        return $this;
    }


    public static function create()
    {
        return new static();
    }

    //--------------------------------------------
    // ALL THE CODE BELOW WAS STOLEN FROM
    // https://github.com/lingtalfi/Komin
    // planets/Komin/Component/Console/StreamWrapper/Writable/Formatter/BashtmlFormatter.php
    // I stole it because I needed a more accessible companion for the very useful [CommandLineInput](https://github.com/lingtalfi/CommandLineInput)
    //--------------------------------------------
    /**
     * @var AdaptorInterface
     */
    protected $adaptor;


    private $parents = [];


    public function __construct()
    {
        $this->adaptor = new BashtmlAdaptor();
    }
    //------------------------------------------------------------------------------/
    // IMPLEMENTS FormatterInterface
    //------------------------------------------------------------------------------/
    /**
     *
     * @return string, the formatted message
     */
    public function format($expression)
    {
        $pattern = '!</?([a-zA-Z0-9:_]+)>!Usm';
        return preg_replace_callback($pattern, function ($matches) {
            $ret = '';
            $isClosing = ('</' === substr($matches[0], 0, 2));
            $style = $matches[1];


            if (false === $isClosing) {
                if (false === $ret = $this->adaptor->getStartTag($style, $this->parents)) {
                    // don't touch the string if it's an unknown code
                    return $matches[0];
                }
                $this->addParent($style);
            } else {
                $this->removeParent($style);
                if (false === $ret = $this->adaptor->getStopTag($style, $this->parents)) {
                    // don't touch the string if it's an unknown code
                    return $matches[0];
                }
            }
            return $ret;
        }, $expression);
    }


    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    private function addParent($name)
    {
        $this->parents[] = $name;
    }

    private function removeParent($name)
    {
        foreach ($this->parents as $k => $v) {
            if ($v === $name) {
                unset($this->parents[$k]);
            }
        }
    }
}