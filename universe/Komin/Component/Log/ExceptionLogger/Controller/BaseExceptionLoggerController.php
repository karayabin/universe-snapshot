<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Log\ExceptionLogger\Controller;

use Komin\Component\Log\ExceptionLogger\ExceptionLogger;


/**
 * BaseExceptionLoggerController
 * @author Lingtalfi
 * 2015-05-25
 *
 */
class BaseExceptionLoggerController extends ExceptionLogger implements ExceptionLoggerControllerInterface
{

    private $bindures;

    public function __construct()
    {
        parent::__construct();
        $this->bindures = [];
    }


    public function setBindures(array $bindures)
    {
        foreach ($bindures as $k => $v) {
            if (array_key_exists(0, $v) && array_key_exists(1, $v)) {
                $this->setBindure($v[0], $v[1], $k);
            }
            else {
                throw new \RuntimeException("Invalid bindure: a bindure must be an array with two keys: 0 => conditions, 1 => listeners");
            }
        }
        return $this;
    }

    public function setBindure($conditions, $listeners, $index = null)
    {
        if (null === $index) {
            $this->bindures[] = [$conditions, $listeners];
        }
        else {
            $this->bindures[$index] = [$conditions, $listeners];
        }
        return $this;
    }

    public function unsetBindure($index)
    {
        unset($this->bindures[$index]);
        return $this;
    }

    public function unsetBindures()
    {
        $this->bindures = [];
        return $this;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function getBindures()
    {
        return $this->bindures;
    }

}
