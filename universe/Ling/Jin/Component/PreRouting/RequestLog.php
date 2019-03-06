<?php


namespace Ling\Jin\Component\PreRouting;


use Ling\ArrayToString\ArrayToStringTool;
use Ling\Jin\Http\HttpRequest;
use Ling\Jin\Registry\Access;


/**
 * @info The RequestLog class is a {-component-} which provides an opportunity for logging statistical information
 * about the http request. It uses the main logger system under the hood.
 * This means that the message is (partially) formatted by the main Logger instance using the
 * the config/logger.yml -> logger.format configuration variable.
 *
 *
 * Instantiation
 * --------------
 * The RequestLog should be called during the pre_routing phase (config/http_request_lifecycle.yml).
 * Like this for instance:
 *
 * ```yml
 * pre_routing:
 *     -
 *         instance: Jin\Component\PreRouting\RequestLog
 *         callable_method: handleRequest
 * ```
 *
 *
 * The RequestLog will make use of the Logger system and dispatch messages to the "stat" channel;
 * therefore you should add a listener in the config/logger.yml file.
 * In the example below, I add three listeners, preparing for three channels I want to listen to (stat, browser and trace):
 *
 * ```yml
 * listeners:
 *     - :
 *         instance: Jin\Log\Listener\FileLoggerListener
 *         methods:
 *             configure:
 *                 -
 *                     file: ${appDir}/log/stat.log
 *         channels: stat
 *     - :
 *         instance: Jin\Log\Listener\FileLoggerListener
 *         methods:
 *             configure:
 *                 -
 *                     file: ${appDir}/log/stat_browser.log
 *         channels: browser
 *     - :
 *         instance: Jin\Log\Listener\FileLoggerListener
 *         methods:
 *             configure:
 *                 -
 *                     file: ${appDir}/log/trace.log
 *         channels: trace
 * ```
 *
 *
 *
 *
 *
 * Configuration
 * --------------
 * The RequestLog is configured from the config/variables/app.yml file, under the logging.request_log section.
 *
 * logging:
 *      request_log:
 *          channels: an array of channel => log format. Each entry will trigger a call to the main logger's log method.
 *              The log format define the message to send as the emitter message (see Jin\Log\Logger for more info).
 *
 *              The following tags are available (note that tags must be wrapped by curly braces):
 *              - uri: the uri of the http request
 *              - uri_path: the uri path of the http request (see Jin\Http\HttpRequest for more info)
 *              - query_string: the query string of the http request
 *              - scheme: http|https
 *              - port: the port of the http request
 *              - method: the http request's method (GET, POST, ...)
 *              - time: the http request's time
 *              - host: the http request's host
 *              - referer: the http request's referer
 *              - ip: the ip of the client sending the http request
 *              - header_user_agent: the http request's user-agent header if defined, or an empty string otherwise
 *              - header_accept: the http request's accept header if defined, or an empty string otherwise
 *              - header_accept_language: the http request's accept-language header if defined, or an empty string otherwise
 *              - get_trace: the $_GET array as a trace (using inline array notation)
 *              - post_trace: the $_POST array as a trace (using inline array notation)
 *              - files_trace: the $_FILES array as a trace (using inline array notation)
 *              - cookie_trace: the $_COOKIE array as a trace (using inline array notation)
 *
 *
 *
 * ### Example:
 *
 * In the following example, I define the format of the emitter log for three arbitrary channels (stat, browser and trace)
 *
 * ```yml
 * logging:
 *     request_log:
 *         channels:
 *             stat: [{method}]:{port} - {uri} -- {ip} -- {referer}
 *             browser: [{method}]:{port} - {uri} -- {header_user_agent}
 *             trace: [{method}]:{port} - {uri} -- {ip} -- get={get_trace}; post={post_trace}; files={files_trace}; cookie={cookie_trace}
 * ```
 *
 *
 *
 *
 * @seeClass: Jin\Log\Logger
 *
 *
 *
 *
 */
class RequestLog
{

    /**
     * @info Handles the given http request.
     *
     * @param HttpRequest $request
     */
    public function handleRequest(HttpRequest $request)
    {
        $logger = Access::log();
        $channels = Access::conf()->get("app.logging.request_log.channels", []);
        foreach ($channels as $channel => $format) {
            $msg = $this->getLogMessage($format, $request);
            $logger->log($msg, $channel);
        }
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @info Returns a formatted log message, based on the given $format.
     *
     * @param $format
     * @param HttpRequest $request
     * @return string
     */
    protected function getLogMessage($format, HttpRequest $request)
    {

        return preg_replace_callback('!\{([^}]*)\}!', function ($val) use ($request) {
            $key = $val[1];
            $ret = "";
            switch ($key) {
                case "uri":
                case "port":
                case "method":
                case "time":
                case "host":
                case "ip":
                case "referer":
                    $ret = $request->$key;
                    break;
                case "uri_path":
                    $ret = $request->uriPath;
                    break;
                case "query_string":
                    $ret = $request->queryString;
                    break;
                case "scheme":
                    $ret = $request->isHttps ? "https" : "http";
                    break;
                case "get_trace":
                    $ret = ArrayToStringTool::toInlinePhpArray($request->get);
                    break;
                case "post_trace":
                    $ret = ArrayToStringTool::toInlinePhpArray($request->post);
                    break;
                case "files_trace":
                    $ret = ArrayToStringTool::toInlinePhpArray($request->files);
                    break;
                case "cookie_trace":
                    $ret = ArrayToStringTool::toInlinePhpArray($request->cookie);
                    break;
                default:
                    if (0 === strpos($key, "header_")) {
                        $header = str_replace('_', '-', substr($key, 7));
                        $ret = $request->header($header, "");
                    }
                    break;
            }
            return $ret;
        }, $format);
    }
}