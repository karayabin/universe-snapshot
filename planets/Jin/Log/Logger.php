<?php


namespace Jin\Log;


/**
 * @info The Logger class provides a simple logging system.
 * It is designed to be the logger that the jin application would use to log
 * early message (occurring during the call to the app->init method, when the service
 * container is not yet created).
 *
 *
 * With this logging system, messages are sent to channels.
 * The message and the channel are defined when the message is emitted.
 *
 * This class will receive emitter message and channel and will make its own message (called logger message)
 * out of it, according to a format.
 *
 * The default format is:
 *      [{channel}]: {dateTime} -- {message}
 *
 * You can change the format using the setFormat method.
 *
 *
 *
 *
 * What you can do however, is decide which channel you want to subscribe to,
 * and the type of response you have when you receive the message (for instance: do you
 * write the message to a file, or do you send a mail, ...).
 *
 *
 * It's a standard observer/notifier system, where subscribers subscribe to
 * certain channel(s).
 *
 * The different channels are:
 *
 * - trace: when developing some complex objects, you might want to use this channel.
 *          It's the most low level detailed channel, it works as a tool for the developer.
 * - debug: helps having a linear overview of how the app thinks
 * - notice: message worth notifying
 * - warn: something not optimal just happened, it deserves your attention
 * - error: critical error, some measures need to be taken NOW
 * - fatal: the web application is not responding (uncaught exception), some measures need to be taken NOW!!!
 *
 * - ...: any other channel that you want...
 *      For instance:
 *      - stats: use this channel to collect statistic oriented info (for instance the url, ip combo...)
 *
 *
 *
 */
class Logger
{

    /**
     * @info This property holds the listeners.
     * It's an array of channel name => php callables.
     *
     * @type array
     */
    protected $listeners;

    /**
     * @info This property holds the format used by this class to transform the emitter message into the actual logger message sent to the listeners.
     * The following tags are available:
     *
     * - {channel}: the channel in uppercase
     * - {dateTime}: the date time string (for instance: 2019-01-16 16:33:15)
     * - {message}: the emitter (original) message
     *
     */
    private $format;


    /**
     * @info Constructs the logger.
     */
    public function __construct()
    {
        $this->listeners = [];
        $this->format = '[{channel}]: {dateTime} -- {message}';
    }


    /**
     * Registers a listener (defined by $callable) for the given $channel.
     *
     * @param $channel
     * @param callable $callable
     */
    public function listen($channel, callable $callable)
    {
        $this->listeners[$channel][] = $callable;
    }

    /**
     * @info Dispatches a log message on the given $channel
     * @param $msg
     */
    public function log($msg, $channel)
    {
        $this->dispatch($channel, $msg);
    }

    /**
     * @info Dispatches a log message on the "trace" channel
     * @param $msg
     */
    public function trace($msg)
    {
        $this->dispatch("trace", $msg);
    }

    /**
     * @info Dispatches a log message on the "debug" channel
     * @param $msg
     */
    public function debug($msg)
    {
        $this->dispatch("debug", $msg);
    }

    /**
     * @info Dispatches a log message on the "notice" channel
     * @param $msg
     */
    public function notice($msg)
    {
        $this->dispatch("notice", $msg);
    }

    /**
     * @info Dispatches a log message on the "warn" channel
     * @param $msg
     */
    public function warn($msg)
    {
        $this->dispatch("warn", $msg);
    }

    /**
     * @info Dispatches a log message on the "error" channel
     * @param $msg
     */
    public function error($msg)
    {
        $this->dispatch("error", $msg);
    }

    /**
     * @info Dispatches a log message on the "fatal" channel
     * @param $msg
     */
    public function fatal($msg)
    {
        $this->dispatch("fatal", $msg);
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @info Dispatches the given $msg to the $channel's listeners.
     * To set listeners, use the listen method.
     *
     * @seeMethod listen
     * @param $channel
     * @param $msg
     */
    protected function dispatch($channel, $msg)
    {
        if (array_key_exists($channel, $this->listeners)) {
            $listeners = $this->listeners[$channel];

            $loggerMsg = $this->getFormattedMessage($channel, $msg);


            foreach ($listeners as $listener) {
                call_user_func($listener, $loggerMsg, $channel);
            }
        }
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    private function getFormattedMessage($channel, $msg)
    {
        return str_replace([
            '{channel}',
            '{dateTime}',
            '{message}',
        ], [
            strtoupper($channel),
            date("Y-m-d H:i:s"),
            $msg,
        ], $this->format);
    }
}