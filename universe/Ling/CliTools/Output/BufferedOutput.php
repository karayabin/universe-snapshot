<?php


namespace Ling\CliTools\Output;


use Ling\CliTools\Formatter\BashtmlFormatter;
use Ling\CliTools\Formatter\FormatterInterface;

/**
 * The BufferedOutput class.
 * This output stores the messages in a buffer rather than spitting out every message right away.
 *
 * The client can then:
 *
 * - display the whole list of messages when she wants
 * - resets the messages list
 *
 */
class BufferedOutput implements OutputInterface
{

    /**
     * This property holds the list of all the non-formatted messages written to this instance.
     * It's an array of strings (each string being a message).
     *
     *
     * @var array
     */
    protected $messages;

    /**
     * This property holds the formatter to use for this instance.
     * The default value is the @class(Ling\CliTools\Formatter\BashtmlFormatter).
     *
     *
     * @var FormatterInterface
     */
    protected $formatter;

    /**
     * Builds the Output instance.
     */
    public function __construct()
    {
        $this->messages = [];
        $this->formatter = new BashtmlFormatter();
    }

    /**
     * @implementation
     */
    public function write(string $message)
    {
        $this->messages[] = $this->formatter->format($message);
    }


    /**
     * Resets the messages buffer.
     */
    public function reset()
    {
        $this->messages = [];
    }


    /**
     * Prints the buffered messages.
     */
    public function writeMessages()
    {
        /**
         * Messages so far have their own PHP_EOL at the end of them,
         * so I don't implode them using PHP_EOL.
         *
         */
        echo implode("", $this->messages);
    }


    /**
     * Returns the buffered messages.
     *
     * @return array
     * An array of the buffered messages.
     */
    public function getMessages(): array
    {
        return $this->messages;
    }

}