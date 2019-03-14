<?php

namespace Ling\Uni2\ErrorSummary;

use Ling\CliTools\Output\OutputInterface;
use Ling\Uni2\Helper\OutputHelper as H;


/**
 * The ErrorSummary class.
 *
 * This class is used by complex commands to recap all the errors that occurred during their execution.
 * It basically gathers all errors that occur during the execution of a command,
 * and displays them when the user (i.e. dev) wants, usually at the end of the command.
 *
 *
 *
 */
class ErrorSummary
{

    /**
     * This property holds an array of error messages.
     * @var array
     */
    protected $errorMessages;


    /**
     * Builds the ErrorSummary instance.
     */
    public function __construct()
    {
        $this->errorMessages = [];
    }


    /**
     * Adds an error message.
     *
     * @param string $errorMessage
     */
    public function addErrorMessage(string $errorMessage)
    {
        $this->errorMessages[] = $errorMessage;
    }


    /**
     * Writes the "error recap widget" to the given output.
     *
     * @param OutputInterface $output
     */
    public function displayErrorRecap(OutputInterface $output)
    {
        $indentLevel = 0;
        if ($this->errorMessages) {
            H::error(H::i($indentLevel) . "<bold:underlined>ERROR RECAP</bold:underlined>:" . PHP_EOL, $output);
            foreach ($this->errorMessages as $errMsg) {
                H::error(H::i($indentLevel) . "- " . $errMsg . PHP_EOL, $output);
            }
        }
    }
}