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
 * FileSystemException
 * @author Lingtalfi
 * 2015-03-08
 *
 * All i/o related problems should throw this exception.
 * It's then easier for the application to spot those kind of problems.
 * 
 * This exception should be thrown for:
 * 
 *      - file create/remove problems (no permission)
 * 
 * 
 * It shouldn't be used for a non existing file.
 * 
 *
 */
class FileSystemException extends \Exception
{

}
