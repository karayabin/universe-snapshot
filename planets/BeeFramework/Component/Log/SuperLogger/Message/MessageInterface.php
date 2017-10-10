<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Log\SuperLogger\Message;


/**
 * MessageInterface
 * @author Lingtalfi
 * 2014-10-28
 *
 *
 */
interface MessageInterface
{

    public function getMessage();

    /**
     * @return iso 8601  (2014-10-21T07:11:31+00:00)
     */
    public function getDate();

    public function getId();
}
