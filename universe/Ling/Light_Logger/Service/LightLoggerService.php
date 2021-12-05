<?php


namespace Ling\Light_Logger\Service;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Logger\Listener\LightLoggerListenerInterface;
use Ling\SicTools\HotServiceResolver;
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
     * This property holds the container for this instance.
     * @var ?LightServiceContainerInterface
     */
    private ?LightServiceContainerInterface $container;


    /**
     * This property holds the listeners.
     * It's an array of channel name => listeners.
     * A listener can be either a callable or a LightLoggerListenerInterface instance.
     *
     *
     * @var array
     */
    protected array $listeners;

    /**
     * This property holds the listeners registered with the open registration system.
     * @var array
     */
    private array $openListeners;


    /**
     * Builds the LightLoggerService instance.
     */
    public function __construct()
    {
        $this->listeners = [];
        $this->openListeners = [];
        $this->container = null;
    }

    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
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
     * @param mixed $msg
     */
    protected function dispatch(string $channel, $msg)
    {

        //--------------------------------------------
        // OPEN SYSTEM
        //--------------------------------------------

        $channelFile = $this->container->getApplicationDir() . "/config/open/Ling.Light_Logger/channels/$channel.byml";

        if (true === file_exists($channelFile)) {


            $o = new HotServiceResolver();
            $o->setCustomResolveNotationCallback(function ($value, &$isCustomNotation = false) {
                if (is_string($value)) { // value could be anything
                    if ('@container()' === $value) {
                        $isCustomNotation = true;
                        return $this->container;
                    } elseif (
                        0 === strpos($value, '@s')
                        && preg_match('!@service\(([a-zA-Z._0-9]*)\)!', $value, $match)
                    ) {
                        $isCustomNotation = true;
                        $service = $match[1];
                        return $this->container->get($service);
                    }
                }

                return null;
            });

            $arr = BabyYamlUtil::readFile($channelFile);


            // replacing ${app_dir} manually
            $appDir = $this->container->getApplicationDir();
            array_walk_recursive($arr, function (&$v) use ($appDir) {
                if (true === is_string($v)) {
                    $v = str_replace('${app_dir}', $appDir, $v);

                }
            });


            foreach ($arr as $planetDotName => $entries) {
                foreach ($entries as $instanceId => $sicBlock) {
                    if (true === array_key_exists($instanceId, $this->openListeners)) {
                        $listener = $this->openListeners[$instanceId];
                    } else {
                        $listener = $o->getService($sicBlock);
                        $listener = [$listener, "listen"];
                        $this->openListeners[$instanceId] = $listener;
                    }
                    call_user_func($listener, $msg, $channel);
                }
            }
        }


        //--------------------------------------------
        // CLOSE SYSTEM
        //--------------------------------------------
        if (array_key_exists($channel, $this->listeners)) {
            $listeners = $this->listeners[$channel];
            foreach ($listeners as $listener) {
                call_user_func($listener, $msg, $channel);
            }
        }

        // handling the * symbol
        foreach ($this->listeners as $chan => $listeners) {
            if (0 === strpos($chan, '*')) {
                if ("*" !== $chan) {
                    list($asterisk, $sMinus) = explode('-', $chan, 2);
                    $minus = explode(",", $sMinus);
                    if (in_array($chan, $minus, true)) {
                        continue;
                    }
                }

                foreach ($listeners as $listener) {
                    call_user_func($listener, $msg, $channel);
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
     * @param mixed $msg
     * A string or an object with the __toString method.
     */
    public function trace($msg)
    {
        $this->dispatch("trace", $msg);
    }

    /**
     * Dispatches a log message on the "debug" channel.
     *
     * @param mixed $msg
     * A string or an object with the __toString method.
     */
    public function debug($msg)
    {
        $this->dispatch("debug", $msg);
    }

    /**
     * Dispatches a log message on the "notice" channel.
     *
     * @param mixed $msg
     * A string or an object with the __toString method.
     */
    public function notice($msg)
    {
        $this->dispatch("notice", $msg);
    }

    /**
     * Dispatches a log message on the "warn" channel.
     *
     * @param mixed $msg
     * A string or an object with the __toString method.
     */
    public function warn($msg)
    {
        $this->dispatch("warn", $msg);
    }


    /**
     * Dispatches a log message on the "error" channel.
     *
     * @param mixed $msg
     * A string or an object with the __toString method.
     */
    public function error($msg)
    {
        $this->dispatch("error", $msg);
    }


    /**
     * Dispatches a log message on the "fatal" channel.
     *
     * @param mixed $msg
     * A string or an object with the __toString method.
     */
    public function fatal($msg)
    {
        $this->dispatch("fatal", $msg);
    }
}