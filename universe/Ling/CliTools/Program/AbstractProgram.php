<?php


namespace Ling\CliTools\Program;


use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\UniversalLogger\UniversalLoggerInterface;

/**
 * The Program class.
 * This is my implementation of a base program.
 *
 * You can reuse it as is, or use it as an inspiration to create your own program instances.
 *
 * If you use it, you need to override it (because this class is abstract).
 *
 * This program:
 *
 * - uses the @concept(bashtml language) internally for all messages intended to be printed.
 * - Catches all exceptions that might occur and displays them as errors (using the bashtml <error> tag) on the screen.
 *          If a @concept(logger) is set, will also log the exception.
 *
 *          The verbosity of this type of error, as well as the verbosity of the log message is controlled
 *          by the $errorIsVerbose property.
 *
 *          When a log message is sent, the channel used is the one defined with the $loggerChannel property.
 *
 *
 *
 *
 *
 *
 */
abstract class AbstractProgram implements ProgramInterface
{

    /**
     *
     * This property holds the logger for this instance.
     * If no instance is set (by default), no message will be logged.
     *
     * If an instance is set, log messages will be sent when an exception is intercepted.
     * The channel the log message is sent to is error by default, and can be changed using the loggerChannel property.
     *
     *
     * @var UniversalLoggerInterface
     */
    protected $logger;

    /**
     * This property holds the channel the log messages will be sent to.
     * See the $logger property for more details.
     *
     * @var string = error
     */
    protected $loggerChannel;

    /**
     * This property holds the error verbosity for this instance.
     * It controls the verbosity of the error messages displayed to the user when an exception is caught at the program
     * level.
     *
     *
     * If true:
     *      - the error message displayed to the console screen is the traceAsString of the exception.
     *      - the message sent to the log is also the traceAsString of the exception.
     * if false:
     *      - the error message displayed to the console screen is the exception message.
     *      - the message sent to the log is also the exception message.
     *
     *
     * @var bool = false
     */
    protected $errorIsVerbose;


    /**
     * This property holds the useExitStatus for this instance.
     *
     * If true, the run command will call the php exit function with the exit code returned by the runProgram method,
     * or 1 if an error occurred (an exception was thrown).
     * If false, the exit function will not be called.
     *
     *
     *
     *
     * @var bool = false
     */
    protected $useExitStatus;


    /**
     * Builds the AbstractProgram instance.
     */
    public function __construct()
    {
        $this->logger = null;
        $this->loggerChannel = "error";
        $this->errorIsVerbose = false;
        $this->useExitStatus = false;
    }

    /**
     * Sets the logger.
     *
     * @param UniversalLoggerInterface $logger
     */
    public function setLogger(UniversalLoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Sets the loggerChannel.
     *
     * @param string $loggerChannel
     */
    public function setLoggerChannel(string $loggerChannel)
    {
        $this->loggerChannel = $loggerChannel;
    }

    /**
     * Sets the errorIsVerbose.
     *
     * @param bool $errorIsVerbose
     */
    public function setErrorIsVerbose(bool $errorIsVerbose)
    {
        $this->errorIsVerbose = $errorIsVerbose;
    }

    /**
     * Sets the useExitStatus.
     *
     * @param bool $useExitStatus
     */
    public function setUseExitStatus(bool $useExitStatus)
    {
        $this->useExitStatus = $useExitStatus;
    }


    /**
     * Executes the program, and returns the exit code, if defined by the concrete class.
     *
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {

        try {
            $exitCode = $this->runProgram($input, $output);
        } catch (\Exception $e) {

            $exitCode = 1;
            if (true === $this->errorIsVerbose) {
                $errMsg = (string)$e;
            } else {
                $errMsg = $e->getMessage();
            }

            $output->write('<error>' . $errMsg . "</error>" . PHP_EOL);

            if (null !== $this->logger) {
                $this->logger->log($errMsg, $this->loggerChannel);
            }
        }


        if (true === $this->useExitStatus) {
            exit((int)$exitCode);
        }
        return $exitCode;
    }


    /**
     * Runs the program, and returns the exit status.
     *
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @overrideMe
     *
     * @return mixed
     * If int is returned, it's the exit status.
     * If nothing or null is returned, 0 should be assumed.
     * Other return types are free to be interpreted as you see fit.
     *
     *
     */
    abstract protected function runProgram(InputInterface $input, OutputInterface $output);


}