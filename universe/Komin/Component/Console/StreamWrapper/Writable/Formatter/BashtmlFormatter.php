<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Console\StreamWrapper\Writable\Formatter;
use Komin\Component\Console\StreamWrapper\Writable\Formatter\BashtmlFormatter\BashtmlFormatterAdaptor;


/**
 * BashtmlFormatter
 * @author Lingtalfi
 * 2015-03-11
 *
 */
class BashtmlFormatter implements FormatterInterface
{

    /**
     * @var BashtmlFormatterAdaptor
     */
    protected $adaptor;


    private $parents = [];


    public function __construct()
    {
        $this->adaptor = new BashtmlFormatterAdaptor();
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
            }
            else {
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
