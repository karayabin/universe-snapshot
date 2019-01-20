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

use BeeFramework\Bat\DateTool;


/**
 * Message
 * @author Lingtalfi
 * 2014-10-28
 *
 *
 */
class Message implements MessageInterface
{

    protected $id;
    protected $date;
    protected $message;


    public function __construct($id, $message)
    {
        $this->id = $id;
        $this->message = $message;
        $this->date = DateTool::getIso8601Date();
    }


    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return iso 8601  (2014-10-21T07:11:31+00:00)
     */
    public function getDate()
    {
        return $this->date;
    }

    public function getId()
    {
        return $this->id;
    }

}
