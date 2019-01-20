<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Console\StreamWrapper\Writable;

use Komin\Component\Console\StreamWrapper\Writable\Formatter\FormatterInterface;


/**
 * WritableStreamWrapper
 * @author Lingtalfi
 * 2015-03-14
 *
 * This class echoes anything to the output, which by default should be stdou
 *
 */
abstract class WritableStreamWrapper implements WritableStreamWrapperInterface
{

    /**
     * @var $resource , a php stream wrapper resource, successfully opened in write only mode (wb)
     */
    protected $resource;
    /**
     * @var FormatterInterface
     */
    protected $formatter;

    abstract protected function getStreamWrapperResource();

    public function __construct()
    {
        $this->resource = $this->getStreamWrapperResource();
    }



    //------------------------------------------------------------------------------/
    // IMPLEMENTS WritableStreamWrapperInterface
    //------------------------------------------------------------------------------/
    public function write($msg, $newLine = false)
    {
        if (null !== $this->formatter) {
            $msg = $this->formatter->format($msg);
        }
        if (true === $newLine) {
            $msg .= PHP_EOL;
        }
        fwrite($this->resource, $msg);
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function setFormatter(FormatterInterface $formatter)
    {
        $this->formatter = $formatter;
    }
}
