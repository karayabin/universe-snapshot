<?php


namespace Ling\Light_ErrorHandler\Service;


use Ling\Bat\ConvertTool;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Logger\LightLoggerService;

/**
 * The LightErrorHandlerService class.
 *
 *
 * https://www.php.net/manual/en/errorfunc.constants.php
 */
class LightErrorHandlerService
{

    /**
     * Internal flat to know whether the error handling functions are already registered.
     * @var bool
     */
    private $functionsRegistered;


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * This property holds the options for this instance.
     * The options are:
     *
     * - handleFatalErrors: bool=true, whether to handle fatal errors
     * - handleErrors: bool=true, whether to handle regular php errors (i.e. not fatal errors)
     *
     *
     * @var array
     */
    protected $options;


    /**
     * Builds the LightErrorHandlerService instance.
     */
    public function __construct()
    {
        $this->functionsRegistered = false;
        $this->container = null;
        $this->options = [];
    }

    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * Sets the options.
     *
     * @param array $options
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
    }

    /**
     * Returns the options of this instance.
     *
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }




    /**
     * Registers the error handling functions based on the service configuration.
     * See the @page(Light_ErrorHandler conception notes) for more details.
     *
     */
    public function registerFunctions()
    {


        if (false === $this->functionsRegistered) {
            $this->functionsRegistered = true;

            $handleErrors = $this->options['handleErrors'] ?? true;
            $handleFatalErrors = $this->options['handleFatalErrors'] ?? true;

            if (true === $handleErrors) {
                set_error_handler([$this, "fatalErrorHandler"]);
            }

            if (true === $handleFatalErrors) {
                register_shutdown_function([$this, "errorHandler"]);
            }
        }
    }


    /**
     * The fatal handler method for this service.
     * Will send our custom phpError array to the "fatal_error_handler" channel of the Light_Logger.
     */
    public function fatalErrorHandler()
    {
        $last = error_get_last();
        if (null !== $last) {
            if (\E_ERROR === $last['type']) {

                $this->sendError([
                    "level" => $last['type'],
                    "levelh" => ConvertTool::getPhpErrorLabel($last['type']),
                    "msg" => $last['message'],
                    "file" => $last['file'],
                    "line" => $last['line'],
                ], 'fatal_error_handler');
            }
        }
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     *
     * The error handler function.
     *
     * https://www.php.net/manual/en/function.set-error-handler.php
     *
     * Note that we return false (as for now): we don't want to interfere with php error handler, we just
     * want to log the errors.
     *
     * @param int $errno
     * @param string $errstr
     * @param string $errfile
     * @param int $errline
     * @return bool
     */
    protected function errorHandler(int $errno, string $errstr, string $errfile, int $errline): bool
    {
        $this->sendError([
            "level" => $errno,
            "levelh" => ConvertTool::getPhpErrorLabel($errno),
            "msg" => $errstr,
            "file" => $errfile,
            "line" => $errline,
        ]);
        return false;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sends the given phpError to the error_handler channel of the Light_Logger.
     *
     * @param array $phpError
     * @param string|null $channel
     * @throws \Exception
     */
    private function sendError(array $phpError, string $channel = null)
    {

        if (null === $channel) {
            $channel = "error_handler";
        }
        /**
         * @var $logger LightLoggerService
         */
        $logger = $this->container->get('logger');
        $logger->log($phpError, $channel);
    }
}