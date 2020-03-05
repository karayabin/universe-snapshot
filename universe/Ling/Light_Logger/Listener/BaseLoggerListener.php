<?php


namespace Ling\Light_Logger\Listener;


use Ling\ArrayToString\ArrayToStringTool;
use Ling\Bat\DebugTool;
use Ling\Bat\ExceptionTool;

/**
 * The BaseLoggerListener class.
 */
abstract class BaseLoggerListener implements LightLoggerListenerInterface
{


    /**
     * This property holds the format used by this class to transform the emitter message into the actual logger message.
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
    protected $format;


    /**
     * This property holds whether to use expand the array (multi-line) or not (single line).
     * Default is true (as it's more readable).
     *
     * @var bool=true
     */
    protected $expandArray;

    /**
     * Builds the BaseLoggerListener instance.
     */
    public function __construct()
    {
        $this->format = '[{channel}]: {dateTime} -- {message}';
        $this->expandArray = true;
    }

    /**
     *
     *
     * Configures this instance.
     * The available options are:
     *
     * - format: string. Default to:
     *
     *                  [{channel}]: {dateTime} -- {message}
     *
     *          The format to use to convert the logger message into its formatted form.
     *          For more details, see the format property of this class.
     *
     * - expand_array: bool=true. If an array is passed, whether to convert into a one line array (false)
     *              or a multi-line string (true).
     *
     *
     * @param array $options
     */
    public function configure(array $options)
    {
        if (array_key_exists("format", $options)) {
            $this->format = $options['format'];
        }
        if (array_key_exists("expand_array", $options)) {
            $this->expandArray = $options['expand_array'];
        }
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
        if (true === $this->expandArray && is_array($msg)) {
            $msg = ArrayToStringTool::toPhpArray($msg);
        } elseif ($msg instanceof \Exception) {
            $msg = ExceptionTool::toString($msg);
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