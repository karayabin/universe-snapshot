<?php


namespace Program;


use CommandLineInput\CommandLineInputInterface;
use Output\ProgramOutputInterface;
use Program\Exception\ProgramException;

class Program implements ProgramInterface
{

    /**
     * @var ProgramOutputInterface $output
     */
    protected $output;
    /**
     * @var CommandLineInputInterface $input
     */
    private $input;

    private $commands;
    private $defaultCommand;


    public function __construct()
    {
        $this->commands = [];
    }


    public static function create()
    {
        return new static();
    }

    /**
     * @return Program
     */
    public function setOutput(ProgramOutputInterface $output)
    {
        $this->output = $output;
        return $this;
    }

    /**
     * @return Program
     */
    public function setInput(CommandLineInputInterface $input)
    {
        $this->input = $input;
        return $this;
    }

    public function setDefaultCommand($defaultCommand)
    {
        $this->defaultCommand = $defaultCommand;
        return $this;
    }

    /**
     * fn ( CommandLineInputInterface $input, ProgramOutputInterface $output, ProgramInterface $program )
     */
    public function addCommand($name, callable $fn)
    {
        $this->commands[$name] = $fn;
        return $this;
    }


    public function executeCommand($name, $throwEx = true)
    {
        if (array_key_exists($name, $this->commands)) {
            $fn = $this->commands[$name];
            call_user_func($fn, $this->input, $this->output, $this);
        } else {
            if (true === $throwEx) {
                throw new ProgramException("Command not found: $name");
            } else {
                $this->error("undefinedCommand", $name);
            }
        }
        return $this;
    }


//    public function getHelpText()
//    {
//        $s = "";
//        return "\e[34m$s\e[0m";
//    }


    public function start()
    {
        if (null !== $command = $this->getCommand($this->input)) {
            $throwEx = false;
            $this->executeCommand($command, $throwEx);
        }
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    protected function getCommand(CommandLineInputInterface $input)
    {
        $c = $input->getParameter(1);
        if (null === $c) {
            $c = $this->defaultCommand;
            if (null === $c) {
                $this->error("commandNotFound");
            }
        }
        return $c;
    }


    protected function error($type, $param = null)
    {
        $msg = "";
        switch ($type) {
            case 'commandNotFound':
                $msg = "Command not found";
                break;
            case 'undefinedCommand':
                $msg = "Undefined command: $param";
                break;
            default:
                break;
        }
        $this->writeError($msg);
    }

    protected function writeError($msg)
    {
        $this->output->error($msg);
    }
}

