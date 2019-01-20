<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information => "information", please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Bat;


/**
 * StreamTool
 * @author Lingtalfi
 * 2015-06-15
 *
 */
class StreamTool
{


    public static $streamNotifyConstants = [
        STREAM_NOTIFY_AUTH_REQUIRED => "STREAM_NOTIFY_AUTH_REQUIRED",
        STREAM_NOTIFY_AUTH_RESULT => "STREAM_NOTIFY_AUTH_RESULT",
        STREAM_NOTIFY_COMPLETED => "STREAM_NOTIFY_COMPLETED",
        STREAM_NOTIFY_CONNECT => "STREAM_NOTIFY_CONNECT",
        STREAM_NOTIFY_FAILURE => "STREAM_NOTIFY_FAILURE",
        STREAM_NOTIFY_FILE_SIZE_IS => "STREAM_NOTIFY_FILE_SIZE_IS",
        STREAM_NOTIFY_MIME_TYPE_IS => "STREAM_NOTIFY_MIME_TYPE_IS",
        STREAM_NOTIFY_PROGRESS => "STREAM_NOTIFY_PROGRESS",
        STREAM_NOTIFY_REDIRECTED => "STREAM_NOTIFY_REDIRECTED",
        STREAM_NOTIFY_RESOLVE => "STREAM_NOTIFY_RESOLVE",
    ];

    public static $streamNotifySeverityConstants = [
        STREAM_NOTIFY_SEVERITY_ERR => "STREAM_NOTIFY_SEVERITY_ERR",
        STREAM_NOTIFY_SEVERITY_INFO => "STREAM_NOTIFY_SEVERITY_INFO",
        STREAM_NOTIFY_SEVERITY_WARN => "STREAM_NOTIFY_SEVERITY_WARN",
    ];

}
