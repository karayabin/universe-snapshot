<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Console\StreamWrapper\ProgramStreamWrappers;

use Komin\Component\Console\StreamWrapper\Readable\InputStreamWrapper\InputStreamWrapper;
use Komin\Component\Console\StreamWrapper\Readable\InputStreamWrapper\InputStreamWrapperInterface;
use Komin\Component\Console\StreamWrapper\Writable\ErrorStreamWrapper\ErrorStreamWrapper;
use Komin\Component\Console\StreamWrapper\Writable\ErrorStreamWrapper\ErrorStreamWrapperInterface;
use Komin\Component\Console\StreamWrapper\Writable\OutputStreamWrapper\OutputStreamWrapper;
use Komin\Component\Console\StreamWrapper\Writable\OutputStreamWrapper\OutputStreamWrapperInterface;


/**
 * ProgramStreamWrappers
 * @author Lingtalfi
 * 2015-03-14
 *
 */
class ProgramStreamWrappers implements ProgramStreamWrappersInterface
{


    /**
     * @var InputStreamWrapperInterface
     */
    protected $in;

    /**
     * @var OutputStreamWrapperInterface
     */
    protected $out;

    /**
     * @var ErrorStreamWrapperInterface
     */
    protected $err;

    public function __construct(array $options = [])
    {
        $options = array_replace([
            'in' => null,
            'out' => null,
            'err' => null,
        ], $options);
        if (null === $options['in']) {
            $options['in'] = new InputStreamWrapper();
        }
        if (null === $options['out']) {
            $options['out'] = new OutputStreamWrapper();
        }
        if (null === $options['err']) {
            $options['err'] = new ErrorStreamWrapper();
        }

        $this->in = $options['in'];
        $this->out = $options['out'];
        $this->err = $options['err'];

    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS ProgramStreamWrappersInterface
    //------------------------------------------------------------------------------/

    /**
     * @return InputStreamWrapperInterface
     */
    public function in()
    {
        return $this->in;
    }

    /**
     * @return OutputStreamWrapperInterface
     */
    public function out()
    {
        return $this->out;
    }

    /**
     * @return ErrorStreamWrapperInterface
     */
    public function error()
    {
        return $this->err;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     * @param ErrorStreamWrapperInterface $err
     */
    public function setErrorStreamWrapper(ErrorStreamWrapperInterface $err)
    {
        $this->err = $err;
        return $this;
    }

    /**
     * @param InputStreamWrapperInterface $in
     */
    public function setInputStreamWrapper(InputStreamWrapperInterface $in)
    {
        $this->in = $in;
        return $this;
    }

    /**
     * @param OutputStreamWrapperInterface $out
     */
    public function setOuttputStreamWrapper(OutputStreamWrapperInterface $out)
    {
        $this->out = $out;
        return $this;
    }

}
