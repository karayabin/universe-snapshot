<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Mail\SmtpMailer\Message;


/**
 * SmtpMessageTool
 * @author Lingtalfi
 * 2015-05-24
 *
 */
class SmtpMessageTool
{

    public static function fromFile($file, array $tags = [])
    {
        $content = '';
        if (file_exists($file)) {
            $content = file_get_contents($file);
            $content = str_replace(array_keys($tags), array_values($tags), $content);
            $content = str_replace(PHP_EOL, "\r\n", $content);
            /**
             * Notice: The very last char is a dot,
             *      I tried adding \r\n after that dot, and the email was sent,
             *      but the server complained with a 502 unimplemented (#5.5.1)
             *      after the last QUIT smtp command
             */
            $content .= "\r\n.";
        }
        else {
            throw new \RuntimeException("File not found: $file");
        }
        return $content;
    }
}
