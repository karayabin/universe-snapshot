<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ling\BeeFramework\Component\Mail\SmtpMailer;

use Ling\BeeFramework\Bat\VarTool;
use Ling\BeeFramework\Chemical\Errors\Voles\VersatileErrorsTrait;
use Ling\BeeFramework\Component\Mail\SmtpMailer\Exception\SmtpMailerException;


/**
 * SmtpSocket
 * @author Lingtalfi
 * 2015-05-24
 *
 */
class SmtpSocket extends Socket
{

    protected function isValidResponse($response)
    {
        if (preg_match('!(?:^|\n)\d{3} .+?\r\n!s', $response)) {
            return true;
        }
        return false;
    }
}
