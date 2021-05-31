<?php


namespace Ling\CliTools\Program;


use Ling\CliTools\Command\CommandInterface;
use Ling\CliTools\Exception\ApplicationException;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;

/**
 * The Application class.
 * This is my implementation of a base application.
 *
 * You can reuse it as is, or use it as an inspiration to create your own application instances.
 *
 * An application is a program composed of multiple commands.
 * When we call an application via the terminal, the first parameter is always an alias for the command to execute.
 *
 * If you use this class, it is recommended that your command classes complain by throwing exceptions.
 * That's because exceptions will be caught by this class for free and will be logged if a logger instance
 * is attached to the program (see more details in the @object(AbstractProgram class)).
 *
 * And so it's a good idea to re-use what's already in place.
 *
 *
 *
 */
class Application extends AbstractProgram
{

    /**
     * This property holds the array of commands for this instance.
     *
     * It's an array of command alias => command class name.
     *
     * Note: multiple aliases can reference the same command class name.
     *
     *
     *
     * @var array
     */
    protected $commands;


    /**
     * This property holds the defaultCommandAlias for this instance.
     * @var string
     */
    protected $defaultCommandAlias;


    /**
     * Builds the Application instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->commands = [];
        $this->defaultCommandAlias = "help";
    }


    /**
     * Registers a command with the given aliases.
     *
     *
     *
     * @param string $commandClassName
     * @param string|array $aliases
     */
    public function registerCommand(string $commandClassName, $aliases)
    {
        if (!is_array($aliases)) {
            $aliases = [$aliases];
        }
        foreach ($aliases as $alias) {
            $this->commands[$alias] = $commandClassName;
        }
    }

    /**
     * @implementation
     */
    protected function runProgram(InputInterface $input, OutputInterface $output)
    {
        $ret = 0;
        $commandAlias = $input->getParameter(1);
        if (null === $commandAlias) {
            $commandAlias = $this->defaultCommandAlias;
        }


        if (null !== $commandAlias) {
            if (array_key_exists($commandAlias, $this->commands)) {
                $commandClassName = $this->commands[$commandAlias];
                try {
                    $instance = new $commandClassName;
                    $this->onCommandInstantiated($instance);


                    if ($instance instanceof CommandInterface) {
                        $ret = $instance->run($input, $output);
                    } else {
                        throw new ApplicationException("The given instance is not a CliTools\Command\CommandInterface");
                    }
                } catch (\Error $e) {
                    throw new ApplicationException($e->getMessage());
                }
            } else {
                $ret = $this->onCommandNotFound($commandAlias, $input, $output);
            }
        } else {
            throw new ApplicationException("The name of the command to execute was not found in the given command line.");
        }

        return $ret;
    }


    /**
     * Can decorate the command after it has just been instantiated.
     *
     * @param CommandInterface $command
     * @overrideMe
     */
    protected function onCommandInstantiated(CommandInterface $command)
    {

    }

    /**
     * Hook called if a command was not found.
     *
     * This method returns the "return status" to return to the unix command.
     *
     * By default, it throws an exception.
     *
     * @param string $commandAlias
     * @param InputInterface $input
     * @param OutputInterface $output
     * @throws \Exception
     * @overrideMe
     */
    protected function onCommandNotFound(string $commandAlias, InputInterface $input, OutputInterface $output): int
    {
        throw new ApplicationException("Command $commandAlias not registered.");
    }
}