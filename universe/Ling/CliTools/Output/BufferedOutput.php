<?php


namespace Ling\CliTools\Output;


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
class BufferedOutput extends Output
{

    /**
     * @implementation
     */
    public function write(string $message)
    {
        $this->messages[] = $message;
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