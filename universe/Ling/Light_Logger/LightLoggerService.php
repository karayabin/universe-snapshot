<?php


namespace Ling\Light_Logger;


use Ling\ArrayToString\ArrayToStringTool;
use Ling\Bat\DebugTool;
use Ling\Light_Logger\Listener\LightLoggerListenerInterface;
use Ling\UniversalLogger\UniversalLoggerInterface;

/**
 * The LightLoggerService class provides a simple logging system for a light application.
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
 * This logging system is a standard observer/notifier system, where subscribers/listeners subscribe to
 * certain channel(s).
 *
 * Listeners decide which channel they want to subscribe to, and how to react if a message is sent on a channel
 * they are listening to (for instance: they can write the message to a file, or do send a mail to an admin, ...).
 *
 *
 * A channel is just any string. Traditional channels are:
 *
 * - trace: when developing some complex objects, you might want to use this channel.
 *          It's the most low level detailed channel, it works as a tool for the developer.
 * - debug: helps having a linear overview of how the app thinks
 * - notice: message worth notifying
 * - warn: something not optimal just happened, it deserves your attention
 * - error: critical error, some measures need to be taken NOW
 * - fatal: the web application is not responding (uncaught exception), some measures need to be taken NOW!!!
 *
 * But you can create any other channel. For instance:
 * - stats: use this channel to collect statistic oriented info (for instance the url, ip combo...)
 * - test_one
 * - ...
 *
 *
 * Note: at the moment, the time part of the logger message depends on the default timezone,
 * so be sure to set the timezone correctly before you run this logger (for instance add the following
 * statement
 *
 * - date_default_timezone_set("Europe/Paris");
 *
 * towards the beginning of your app).
 *
 *
 *
 */
class LightLoggerService implements UniversalLoggerInterface
{

    /**
     * This property holds the listeners.
     * It's an array of channel name => listeners.
     * A listener can be either a callable or a LightLoggerListenerInterface instance.
     *
     *
     * @var array
     */
    protected $listeners;


    /**
     * This property holds the format used by this class to transform the emitter message into the
     * actual logger message sent to the listeners.
     *
     *
     * The following tags are available:
     *
     * - {channel}: the channel in uppercase
     * - {dateTime}: the date time string (for instance: 2019-01-16 16:33:15)
     * - {message}: the emitter (original) message
     *
     * @var string
     */
    private $format;

    /**
     * This property holds whether to use the useExpandedArray for this instance.
     * With useExpandedArray on, the arrays will be indented with tab and return chars in the log file,
     * whereas with useExpandedArray off, the array will fit on a single line.
     *
     * Default is true (as it's more readable).
     *
     * @var bool=true
     */
    private $useExpandedArray;


    /**
     * Builds the LightLoggerService instance.
     */
    public function __construct()
    {
        $this->listeners = [];
        $this->format = '[{channel}]: {dateTime} -- {message}';
        $this->useExpandedArray = true;
    }


    /**
     * Registers a listener (callable) for the given $channel(s).
     *
     *
     * If channel is a string, the listener will be subscribing messages for that particular channel.
     * An array of channels can also be passed, to subscribe to multiple channels at the same time.
     *
     * If the special channel "*" is specified, the listener will be notified of every message on every channel.
     * In that case, it's possible to remove some channels from the "*" using the minus argument.
     * The minus argument is an array of channels to remove from the "*".
     *
     *
     *
     * @param string|array $channel
     * @param array $minus
     *
     * @param LightLoggerListenerInterface|callable $listener
     */
    public function addListener($channel, $listener, array $minus = [])
    {
        if ($listener instanceof LightLoggerListenerInterface) {
            $listener = [$listener, "listen"];
        }

        if (!is_array($channel)) {
            $channel = [$channel];
        }
        foreach ($channel as $chan) {
            if ('*' === $chan && (false === empty($minus))) {
                $chan .= '-' . implode(',', $minus);
            }
            $this->listeners[$chan][] = $listener;
        }
    }


    /**
     * Sets the format of the log messages passed to the listeners.
     * @param string $format
     */
    public function setFormat(string $format)
    {
        $this->format = $format;
    }

    /**
     * Sets the useExpandedArray.
     *
     * @param bool $useExpandedArray
     */
    public function setUseExpandedArray(bool $useExpandedArray)
    {
        $this->useExpandedArray = $useExpandedArray;
    }


    /**
     * @implementation
     */
    public function log($message, string $channel): void
    {
        $this->dispatch($channel, $message);
    }

    /**
     * Dispatches the given $msg to the $channel's listeners.LightLoggerListenerInterface
     *
     *
     * @param string $channel
     * @param string|object $msg
     */
    protected function dispatch(string $channel, $msg)
    {

        $loggerMsg = $this->getFormattedMessage($channel, $msg);

        if (array_key_exists($channel, $this->listeners)) {
            $listeners = $this->listeners[$channel];
            foreach ($listeners as $listener) {
                call_user_func($listener, $loggerMsg, $channel);
            }
        }

        // handling the * symbol
        foreach ($this->listeners as $chan => $listeners) {
            if (0 === strpos('*', $chan)) {
                if ("*" !== $chan) {
                    list($asterisk, $sMinus) = explode('-', $chan);
                    $minus = explode(",", $sMinus);
                    if (in_array($chan, $minus, true)) {
                        continue;
                    }
                }


                foreach ($listeners as $listener) {
                    call_user_func($listener, $loggerMsg, $channel);
                }
            }
        }
    }


    //--------------------------------------------
    // SHORTCUT METHODS FOR COMMON LOG CHANNELS
    //--------------------------------------------
    /**
     * Dispatches a log message on the "trace" channel.
     *
     * @param string|object $msg
     * A string or an object with the __toString method.
     */
    public function trace($msg)
    {
        $this->dispatch("trace", $msg);
    }

    /**
     * Dispatches a log message on the "debug" channel.
     *
     * @param string|object $msg
     * A string or an object with the __toString method.
     */
    public function debug($msg)
    {
        $this->dispatch("debug", $msg);
    }

    /**
     * Dispatches a log message on the "notice" channel.
     *
     * @param string|object $msg
     * A string or an object with the __toString method.
     */
    public function notice($msg)
    {
        $this->dispatch("notice", $msg);
    }

    /**
     * Dispatches a log message on the "warn" channel.
     *
     * @param string|object $msg
     * A string or an object with the __toString method.
     */
    public function warn($msg)
    {
        $this->dispatch("warn", $msg);
    }


    /**
     * Dispatches a log message on the "error" channel.
     *
     * @param string|object $msg
     * A string or an object with the __toString method.
     */
    public function error($msg)
    {
        $this->dispatch("error", $msg);
    }


    /**
     * Dispatches a log message on the "fatal" channel.
     *
     * @param string|object $msg
     * A string or an object with the __toString method.
     */
    public function fatal($msg)
    {
        $this->dispatch("fatal", $msg);
    }



    //--------------------------------------------
    //
    //--------------------------------------------

    /**
     * Returns the formatted message to dispatch to the listeners.
     *
     * @param string $channel
     * @param string|object $msg
     * @return string
     */
    protected function getFormattedMessage(string $channel, $msg): string
    {
        if (true === $this->useExpandedArray && is_array($msg)) {
            $msg = ArrayToStringTool::toPhpArray($msg);
        } else {
            $msg = DebugTool::toString($msg);
        }
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