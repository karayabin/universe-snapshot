<?php


namespace Ling\Light_TaskScheduler\Service;


use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Logger\LightLoggerService;

/**
 * The LightTaskSchedulerService class.
 */
class LightTaskSchedulerService
{

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;

    /**
     * This property holds the options for this instance.
     *
     * Available options are:
     *
     * - executionMode: string (lastOnly|firstOnly|allRemaining) = lastOnly
     * - useDebug: bool = false, whether to use the debug log
     *
     *
     *
     * See the @page(Light_TaskScheduler conception notes) for more details.
     *
     *
     * @var array
     */
    protected $options;


    /**
     * Builds the LightTaskSchedulerService instance.
     */
    public function __construct()
    {
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
     *
     * This method IS the task manager.
     * See the @page(Light_TaskScheduler conception notes) for more details.
     *
     */
    public function run()
    {


        /**
         * todo: use ClassCooker to create a task for logDebug
         * todo: use ClassCooker to create a task for logDebug
         * todo: use ClassCooker to create a task for logDebug
         * todo: use ClassCooker to create a task for logDebug
         * todo: use ClassCooker to create a task for logDebug
         * todo: use ClassCooker to create a task for logDebug
         */
        $executionMode = $this->options['executionMode'] ?? "lastOnly";
        $this->logDebug("the execution mode is moo");




    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sends a message to the debug log, only if the useDebug option is set to true.
     * If useDebug is set to false, this method does nothing.
     *
     * @param string $msg
     * @throws \Exception
     */
    public function logDebug(string $msg)
    {
        $useDebug = $this->options['useDebug'] ?? false;
        if (true === $useDebug) {
            /**
             * @var $logger LightLoggerService
             */
            $logger = $this->container->get("logger");
            $logger->log($msg, "task_scheduler.debug");
        }
    }


    /**
     * Sends a message to the error log
     *
     * @param string $msg
     * @throws \Exception
     */
    public function logError(string $msg)
    {
        $this->container->get("logger")->log($msg, "task_scheduler.error");
    }


}