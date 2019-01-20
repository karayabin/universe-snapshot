<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Mail\XMail;

use Komin\Component\Mail\XMail\XMailer\XMailerInterface;


/**
 * XMailer
 * @author Lingtalfi
 * 2014-12-07
 *
 */
class XMail extends XMailBase
{

    public function __construct(array $mailersConf = [], array $options = [])
    {
        $this->init($mailersConf, $options);
    }

}
