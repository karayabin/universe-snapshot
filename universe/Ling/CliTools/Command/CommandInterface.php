<?php


namespace Ling\CliTools\Command;


use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;


/**
 * The CommandInterface interface.
 * A command is like a sub-program of an @object(application).
 *
 * A command is stand-alone, and participates to make the application more modular.
 *
 *
 *
 *
 */
interface CommandInterface
{

    /**
     * Runs the command.
     *
     * Important note:
     * The input object passed to the commands is the same as the input object passed to the application itself.
     * This means that the parameter index used by commands should start at 2 (because 1 is already the name of the command).
     *
     * So, remember, when you're inside a command, if you want to get a parameter, starts with 2 (and not 0 or 1).
     *
     *
     *
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return mixed
     * If an int is returned, it should be assumed to be the exit status.
     * If no value is returned, 0 should be assumed (meaning exit status=0, meaning the program executed correctly).
     * Other return value types might be added in the future
     *
     */
    public function run(InputInterface $input, OutputInterface $output);
}