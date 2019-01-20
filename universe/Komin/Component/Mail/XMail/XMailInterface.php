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
 * XMailInterface
 * @author Lingtalfi
 * 2014-12-07
 *
 */
interface XMailInterface
{

    public function init(array $mailersConf, array $options = []);

    /**
     * @return XMailerInterface|false
     */
    public function getMailer($mailerId);

    /**
     * @return int: number of sent emails
     */
    public function sendMail(array $params = []);
}
