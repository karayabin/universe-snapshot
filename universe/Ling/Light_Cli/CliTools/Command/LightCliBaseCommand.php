<?php


namespace Ling\Light_Cli\CliTools\Command;

use Ling\CliTools\Command\CommandInterface;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Cli\CliTools\Program\LightCliApplication;
use Ling\Light_Cli\Exception\LightCliException;

/**
 * The LightCliBaseCommand class.
 */
abstract class LightCliBaseCommand implements CommandInterface, LightServiceContainerAwareInterface
{


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * This property holds the application for this instance.
     * @var LightCliApplication
     */
    protected LightCliApplication $application;


    /**
     * Cache for the output of the current command.
     * @var OutputInterface
     */
    protected OutputInterface $output;


    /**
     * Builds the LightCliBaseCommand instance.
     */
    public function __construct()
    {
        $this->container = null;
    }


    /**
     * Runs the command.
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    abstract protected function doRun(InputInterface $input, OutputInterface $output);


    //--------------------------------------------
    // LightServiceContainerAwareInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }

    //--------------------------------------------
    // CommandInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {
        $this->output = $output;
        try {
            $this->doRun($input, $output);
        } catch (\Exception $e) {
            $output->write($e);
        }
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the application.
     *
     * @param LightCliApplication $application
     */
    public function setApplication(LightCliApplication $application)
    {
        $this->application = $application;
    }






    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Writes a debug message to the current output.
     * @param string $msg
     */
    protected function debugMsg(string $msg)
    {
        $this->msg("<debug>$msg</debug>");
    }


    /**
     * Writes a warning message to the current output.
     * @param string $msg
     */
    protected function warningMsg(string $msg)
    {
        $this->msg("<warning>$msg</warning>");
    }

    /**
     * Writes an info message to the current output.
     * @param string $msg
     */
    protected function infoMsg(string $msg)
    {
        $this->msg("<info>$msg</info>");
    }


    /**
     * Writes a success message to the current output.
     * @param string $msg
     */
    protected function successMsg(string $msg)
    {
        $this->msg("<success>$msg</success>");
    }

    /**
     * Writes an error message to the current output.
     * @param string $msg
     */
    protected function errorMsg(string $msg)
    {
        $this->msg("<error>$msg</error>");
    }

    /**
     * Writes the given message to the current output.
     * @param string $msg
     */
    protected function msg(string $msg)
    {
        $this->output->write($msg);
    }


    /**
     * Throws an exception.
     *
     * @param string $msg
     */
    protected function error(string $msg)
    {

        throw new LightCliException(static::class . ": " . $msg);
    }
}