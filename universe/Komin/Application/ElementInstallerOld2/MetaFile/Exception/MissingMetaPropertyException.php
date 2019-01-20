<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Application\ElementInstaller\MetaFile\Exception;

use Exception;


/**
 * MissingMetaPropertyException
 * @author Lingtalfi
 * 2015-05-21
 *
 */
class MissingMetaPropertyException extends \Exception
{


    public function __construct(array $missingProperties, $code = 0, Exception $previous = null)
    {
        $msg = "The following properties were missing: " . implode(', ', $missingProperties);
        parent::__construct($msg, $code, $previous);
    }


}
