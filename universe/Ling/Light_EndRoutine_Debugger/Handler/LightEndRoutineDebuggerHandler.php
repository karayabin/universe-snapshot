<?php


namespace Ling\Light_EndRoutine_Debugger\Handler;

use Ling\ArrayToString\ArrayToStringTool;
use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\BDotTool;
use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Logger\Service\LightLoggerService;

/**
 * The LightEndRoutineDebuggerHandler class.
 */
class LightEndRoutineDebuggerHandler implements LightServiceContainerAwareInterface
{


    /**
     * This property holds the options for this instance.
     * Options for this class.
     *
     * The  available options are:
     *
     * - showSession: bool=false, whether to add the session variables into the debug output
     * - sessionVars: array|null=null, what session vars to show in particular. If null, all session vars
     *                  are shown.
     * - path: string=null. The path where to write the debug output. If null,
     *          the @page(logger) service will be used with the method "debug".
     *
     *
     *
     *
     *
     *
     *
     *
     * @var array
     */
    protected $options;

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * Builds the LightEndRoutineDebuggerHandler instance.
     */
    public function __construct()
    {
        $this->options = [];
        $this->container = null;
    }

    /**
     * @implementation
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }


    /**
     * Listener for the @page(Ling.Light.end_routine event).
     *
     * Writes some debug variables into a file.
     * Both the debug variables and the file are defined in the service configuration.
     *
     */
    public function handle()
    {


        $showSession = $this->options['showSession'] ?? false;
        $sessionVars = $this->options['sessionVars'] ?? null;
        $path = $this->options['path'] ?? null;


        $array = [];

        if (true === $showSession) {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            $sessionArray = [];
            if (null === $sessionVars) {
                $sessionArray = $_SESSION;
            } else {
                if (false === is_array($sessionVars)) {
                    $sessionVars = [$sessionVars];
                }
                foreach ($sessionVars as $var) {
                    $value = BDotTool::getDotValue($var, $_SESSION);
                    $sessionArray[$var] = $value;
                }
            }
            $array['SESSION'] = $sessionArray;
        }


        if (null === $path) {

            /**
             * @var $logger LightLoggerService
             */
            $logger = $this->container->get("logger");
            $logger->debug(ArrayToStringTool::toPhpArray([
                "---LightEndRoutineDebuggerHandler---" => $array,
            ]));
        } else {
            BabyYamlUtil::writeFile($array, $path);
        }
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the options.
     *
     * @param array $options
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
    }


}