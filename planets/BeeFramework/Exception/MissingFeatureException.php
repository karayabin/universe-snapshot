<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Exception;


/**
 * MissingFeatureException
 * @author Lingtalfi
 * 2015-03-11
 * 
 * This exception should be thrown when the process wants to use a feature that the local machine doesn't have,
 * like a program for instance. 
 *
 */
class MissingFeatureException extends \Exception
{

}
