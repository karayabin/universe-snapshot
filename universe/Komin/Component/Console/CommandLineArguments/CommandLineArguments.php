<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Console\CommandLineArguments;


/**
 * CommandLineArguments
 * @author Lingtalfi
 * 2015-05-10
 *
 */
abstract class CommandLineArguments implements CommandLineArgumentsInterface
{

    private $arguments;
    private $_init;

    public function __construct()
    {
        $this->arguments = [];
        $this->_init = false;
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS CommandLineArgumentsInterface
    //------------------------------------------------------------------------------/
    public function hasArgument($name)
    {
        $this->prepareOnce();
        return (array_key_exists($name, $this->arguments));
    }


    public function getArgument($name, $default = null)
    {
        $this->prepareOnce();
        if (array_key_exists($name, $this->arguments)) {
            return $this->arguments[$name];
        }
        return $default;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function getArguments()
    {
        $this->prepareOnce();
        return $this->arguments;
    }



    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function setArguments(array $arguments)
    {
        $this->arguments = $arguments;
    }

    protected function prepareOnce()
    {

    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function _prepareOnce()
    {
        if (false === $this->_init) {
            $this->_init = true;
            $this->prepareOnce();
        }
    }
}
