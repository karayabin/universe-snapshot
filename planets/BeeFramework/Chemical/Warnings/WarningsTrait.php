<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Chemical\Warnings;


/**
 * WarningsTrait
 * @author Lingtalfi
 * 2015-05-16
 *
 *
 * In this class,
 * a warning is something that is noticeable, but does not prevent the
 * script from working.
 *
 *
 */
trait WarningsTrait
{

    private $_warnings;

    public function getWarnings()
    {
        $this->_prepareWarningsOnce();
        return $this->_warnings;
    }


    public function hasWarning()
    {
        $this->_prepareWarningsOnce();
        return (!empty($this->_warnings));
    }


    protected function addWarning($m)
    {
        $this->_prepareWarningsOnce();
        $this->_warnings[] = $m;
        return $this;
    }


    protected function setWarnings(array $warnings)
    {
        $this->_prepareWarningsOnce();
        $this->_warnings[] = $warnings;
        return $this;
    }



    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function _prepareWarningsOnce()
    {
        if (null === $this->_warnings) {
            $this->_warnings = [];
        }
    }


}
