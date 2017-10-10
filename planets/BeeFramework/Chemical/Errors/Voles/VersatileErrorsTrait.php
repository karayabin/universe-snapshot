<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Chemical\Errors\Voles;


/**
 * VersatileErrorsTrait
 * @author Lingtalfi
 * 2015-05-24
 *
 */
trait VersatileErrorsTrait
{

    private $_volesErrorMode;
    private $_volesErrors;
    private $_volesDefaultException;

    /**
     * @param string $mode , one of the following
     *          - quiet: will collect error silently. User can access the errors through the getErrors method
     *          - strict: will throw an exception when an error occur, the error is available through the getErrors method
     *
     * @return $this
     */
    public function setErrorMode($mode)
    {
        $this->__constructVoles();
        if (in_array($mode, ['quiet', 'strict'])) {
            $this->_volesErrorMode = $mode;
        }
        else {
            throw new \RuntimeException("Invalid errorMode argument: $mode");
        }
        return $this;
    }

    public function getErrors()
    {
        $this->__constructVoles();
        return $this->_volesErrors;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function setDefaultException($exception)
    {
        $this->__constructVoles();
        if ($exception instanceof \Exception) {
            $exception = get_class($exception);
        }
        return $this->_volesDefaultException = $exception;
    }

    protected function error($msg, $allowException = 1, $exception = null)
    {
        $this->__constructVoles();
        $this->_volesErrors[] = $msg;
        if (1 === (int)$allowException && 'strict' === $this->_volesErrorMode) {
            if ($exception instanceof \Exception) {
                throw $exception;
            }
            else {
                throw new $this->_volesDefaultException($msg);
            }
        }
        return false;
    }

    protected function hasError()
    {
        return (!empty($this->_volesErrors));
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function __constructVoles()
    {
        if (null === $this->_volesErrorMode) {
            $this->_volesErrorMode = 'quiet';
            $this->_volesErrors = [];
            $this->_volesDefaultException = '\RuntimeException';
        }
    }
}
