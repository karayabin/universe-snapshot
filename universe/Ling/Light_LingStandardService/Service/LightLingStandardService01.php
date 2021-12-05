<?php


namespace Ling\Light_LingStandardService\Service;


use Ling\Light\Helper\LightNamesAndPathHelper;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Logger\Service\LightLoggerService;
use Ling\Light_UserDatabase\Service\LightUserDatabaseService;
use Ling\UniverseTools\PlanetTool;

/**
 * The LightLingStandardService01 class.
 */
abstract class LightLingStandardService01
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
     * - useDebug: bool, whether to enable the debug log (more about that in https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/pages/conventions.md#logdebug-method)
     *
     *
     * @var array
     */
    protected $options;


    /**
     * The concrete class name.
     * This is only available after a call to the prepareNames method.
     * @var string
     */
    private $_className;

    /**
     * The service name.
     * This is only available after a call to the prepareNames method.
     * @var string
     */
    private $_serviceName;

    /**
     * The exception class name.
     * This is only available after a call to the prepareNames method.
     * @var string
     */
    private $_exceptionClassName;


    /**
     * The plugin name (aka planet name).
     * This is only available after a call to the prepareNames method.
     * @var string
     */
    private $_pluginName;


    /**
     * Builds the LightLingStandardService01 instance.
     */
    public function __construct()
    {
        $this->options = [];
        $this->container = null;
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


    //--------------------------------------------
    //
    //--------------------------------------------

    /**
     * Sends a message to the debug log, only if the useDebug option is set to true.
     * If useDebug is set to false, this method does nothing.
     *
     * @param mixed $msg
     * @throws \Exception
     */
    public function logDebug($msg)
    {
        $useDebug = $this->options['useDebug'] ?? false;
        if (true === $useDebug) {
            /**
             * @var $logger LightLoggerService
             */
            $logger = $this->container->get("logger");
            $this->prepareNames();
            $logger->log($msg, "$this->_serviceName.debug");
        }
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Throws an exception.
     *
     * @param string $msg
     */
    protected function error(string $msg)
    {
        $this->prepareNames();
        throw new $this->_exceptionClassName($msg);
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Prepare names used by this class.
     */
    private function prepareNames()
    {
        if (null === $this->_className) {
            $className = get_class($this);
            $this->_className = $className;
            $p = explode('\\', $className);
            $galaxy = array_shift($p);
            $planet = array_shift($p);
            $this->_pluginName = $planet;
            $tightPlanetName = PlanetTool::getTightPlanetName($planet);
            $this->_serviceName = LightNamesAndPathHelper::getServiceName($planet);
            $this->_exceptionClassName = implode('\\', [
                $galaxy,
                $planet,
                'Exception',
                $tightPlanetName . "Exception",
            ]);

        }
    }

}