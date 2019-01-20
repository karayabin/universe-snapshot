<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Mail\XMail\XMailer;


/**
 * XMailerInterface
 * @author Lingtalfi
 * 2014-12-07
 *
 */
interface XMailerInterface
{

    /**
     * @return bool: whether or not the configuration went ok
     */
    public function configure(array $params = []);


    /**
     * @return int: number of sent emails
     */
    public function sendMail(array $params = []);
}
