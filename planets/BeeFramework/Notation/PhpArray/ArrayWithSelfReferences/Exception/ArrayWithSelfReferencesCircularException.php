<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\PhpArray\ArrayWithSelfReferences\Exception;

use Exception;


/**
 * ArrayWithSelfReferencesCircularException
 * 2014-08-16
 *
 */
class ArrayWithSelfReferencesCircularException extends \Exception
{

    private $value;

    public function __construct($value, $message = "", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->value = $value;
    }


    public function getValue()
    {
        return $this->value;
    }
}
