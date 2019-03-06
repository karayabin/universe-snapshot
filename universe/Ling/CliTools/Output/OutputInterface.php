<?php


namespace Ling\CliTools\Output;


/**
 * The OutputInterface interface.
 * The output is the medium between the program and/or application and the console screen.
 *
 * The program first writes messages to the output, which usually displays the message on the console screen.
 *
 *
 */
interface OutputInterface{


    /**
     * Writes a message to the output.
     * Usually, the message get printed on the console screen, but
     * this behaviour depends on the concrete output.
     *
     *
     * @param string $message
     * @return void
     */
    public function write(string $message);
}