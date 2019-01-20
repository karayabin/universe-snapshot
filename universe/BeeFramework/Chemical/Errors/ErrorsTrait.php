<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Chemical\Errors;


/**
 * ErrorsTrait
 * @author Lingtalfi
 * 2015-05-16
 * 
 * 
 * In this class,
 * an error is something that prevent the script from working correctly.
 * 
 *
 */
trait ErrorsTrait
{

    private $_errors;

    public function getErrors()
    {
        $this->_prepareErrorsOnce();
        return $this->_errors;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function hasError()
    {
        $this->_prepareErrorsOnce();
        return (!empty($this->_errors));
    }


    protected function addError($m)
    {
        $this->_prepareErrorsOnce();
        $this->_errors[] = $m;
        return $this;
    }


    protected function setErrors(array $errors)
    {
        $this->_prepareErrorsOnce();
        $this->_errors[] = $errors;
        return $this;
    }



    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function _prepareErrorsOnce()
    {
        if (null === $this->_errors) {
            $this->_errors = [];
        }
    }


}
