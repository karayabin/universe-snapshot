<?php


namespace Ling\CliTools\Output;


use Ling\CliTools\Formatter\BashtmlFormatter;
use Ling\CliTools\Formatter\FormatterInterface;

/**
 * The Output class.
 * This is a basic implementation of the output interface.
 *
 *
 * This output has a default @object(bashtml formatter),
 * which can be turned off by manually setting a @object(dumb formatter) using
 * the setFormatter method.
 *
 *
 *
 */
class Output implements OutputInterface
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
     * Sets the formatter.
     *
     * @param FormatterInterface $formatter
     */
    public function setFormatter(FormatterInterface $formatter)
    {
        $this->formatter = $formatter;
    }


    /**
     * @implementation
     */
    public function write(string $message)
    {
        $this->messages[] = $message;
        echo $this->formatter->format($message);
    }
}