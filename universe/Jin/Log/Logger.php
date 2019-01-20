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
     * @info This property holds the list of the whitelist channels. If defined (i.e. not empty), this logger instance will only
     * dispatch messages on those defined channels.
     * This mechanism has precedence over the mutedChannels mechanism (see property mutedChannels below).
     * Meaning if both the whitelist and mutedChannels properties are not empty, mutedChannels is ignored.
     *
     *
     * @type array
     */
    protected $whitelist;

    /**
     * @info This property holds the muted channels. A muted channel simply drops any message that it
     * receive (i.e. no dispatching). We can use muted channels to quickly turn on/off some channels.
     * Also, a muted channel saves some cpu cycles.
     * Muted channels system only works if the whitelist is empty (see whitelist property in this class)
     *
     *
     * @type array
     */
    protected $mutedChannels;
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
        $this->whitelist = [];
        $this->mutedChannels = [];
        $this->format = '[{channel}]: {dateTime} -- {message}';
    }


    /**
     * @info Registers a listener (defined by $callable) for the given $channel(s).
     *
     * @param $channel , if the special channel "*" is specified, the listener will be notified
     *              of every message on every channel.
     *          If channel is a string, the listener will be subscribing messages for that particular channel.
     *          An array of channels can also be passed, to subscribe to multiple channels at the same time.
     *
     *
     * @param callable $callable
     */
    public function listen($channel, callable $callable)
    {
        if (!is_array($channel)) {
            $channel = [$channel];
        }
        foreach ($channel as $chan) {
            $this->listeners[$chan][] = $callable;
        }
    }


    /**
     * @info Sets the format of the log messages passed to the listeners.
     * @param $format
     */
    public function setFormat($format)
    {
        $this->format = $format;
    }

    /**
     * @info Sets the whitelist of channels for this instance.
     * @param array $whitelist
     */
    public function setWhitelist(array $whitelist)
    {
        $this->whitelist = $whitelist;
    }

    /**
     * @info Sets the muted channels for this instance.
     * @param array $mutedChannels
     */
    public function setMutedChannels(array $mutedChannels)
    {
        $this->mutedChannels = $mutedChannels;
    }

    /**
     * @info Dispatches a log message on the given $channel.
     * @param $msg
     */
    public function log($msg, $channel)
    {
        $this->dispatch($channel, $msg);
    }

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
        $whitelistPass = false;
        if (!empty($this->whitelist)) {
            if (false === in_array($channel, $this->whitelist, true)) {
                return;
            }
            $whitelistPass = true;
        }

        if (true === $whitelistPass || false === in_array($channel, $this->mutedChannels, true)) {

            $loggerMsg = $this->getFormattedMessage($channel, $msg);

            if (array_key_exists($channel, $this->listeners)) {
                $listeners = $this->listeners[$channel];
                foreach ($listeners as $listener) {
                    call_user_func($listener, $loggerMsg, $channel);
                }
            }


            // handling the * symbol
            $listeners = $this->listeners["*"];
            foreach ($listeners as $listener) {
                call_user_func($listener, $loggerMsg, $channel);
            }
        }
    }

    /**
     * @info Returns the formatted message to dispatch to the listeners.
     *
     * @param $channel
     * @param $msg
     * @return mixed
     */
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

    /**
     * @info Dispatches a log message on the "trace" channel.
     * @param $msg
     */
    public function trace($msg)
    {
        $this->dispatch("trace", $msg);
    }

    /**
     * @info Dispatches a log message on the "debug" channel.
     * @param $msg
     */
    public function debug($msg)
    {
        $this->dispatch("debug", $msg);
    }

    /**
     * @info Dispatches a log message on the "notice" channel.
     * @param $msg
     */
    public function notice($msg)
    {
        $this->dispatch("notice", $msg);
    }

    /**
     * @info Dispatches a log message on the "warn" channel.
     * @param $msg
     */
    public function warn($msg)
    {
        $this->dispatch("warn", $msg);
    }


    /**
     * @info Dispatches a log message on the "error" channel.
     * @param $msg
     */
    public function error($msg)
    {
        $this->dispatch("error", $msg);
    }



    /**
     * @info Dispatches a log message on the "fatal" channel.
     * @param $msg
     */
    public function fatal($msg)
    {
        $this->dispatch("fatal", $msg);
    }
}