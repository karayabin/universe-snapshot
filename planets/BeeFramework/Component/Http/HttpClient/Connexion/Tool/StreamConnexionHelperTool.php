<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Http\HttpClient\Connexion\Tool;
use BeeFramework\Bat\StreamTool;


/**
 * StreamConnexionHelperTool
 * @author Lingtalfi
 * 2015-06-17
 * 
 */
class StreamConnexionHelperTool {

    
    
    public static function getExampleNotificationCallback(){
        return function ($notification_code, $severity, $message, $message_code, $bytes_transferred, $bytes_max) {
            if (STREAM_NOTIFY_PROGRESS === $notification_code) {
                echo "$bytes_transferred/$bytes_max" . "\n";
            }
            else {
                echo 'stream notification: ' . "\n";
                var_export([
                    'notificationCode' => StreamTool::$streamNotifyConstants[$notification_code],
                    'severity' => StreamTool::$streamNotifySeverityConstants[$severity],
                    'message' => $message,
                    'message_code' => $message_code,
                    'bytes_transferred' => $bytes_transferred,
                    'bytes_max' => $bytes_max,
                ]);
            }
        };
    }
}
