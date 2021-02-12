<?php


namespace Ling\Light_Cli\Service;


use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Cli\CliTools\Program\LightCliApplicationInterface;
use Ling\Light_Cli\Exception\LightCliException;


/**
 * The LightCliService class.
 */
class LightCliService
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
     *
     *
     * See the @page(Light_Cli conception notes) for more details.
     *
     *
     * @var array
     */
    protected $options;

    /**
     * The registered cli apps.
     *
     * An array of appId => LightCliApplicationInterface.
     *
     * @var LightCliApplicationInterface[]
     */
    protected $cliApps;


    /**
     * Builds the LightCliService instance.
     */
    public function __construct()
    {
        $this->container = null;
        $this->options = [];
        $this->cliApps = [];
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
     * Register a light cli app.
     *
     * @param string $appId
     * @param LightCliApplicationInterface $cliApp
     */
    public function registerCliApp(string $appId, LightCliApplicationInterface $cliApp)
    {
        if (true === array_key_exists($appId, $this->cliApps)) {
            $this->error("A cli application with appId=$appId is already registered, please find another name.");
        }
        $this->cliApps[$appId] = $cliApp;
    }

    /**
     * Returns the cliApps of this instance.
     *
     * @return LightCliApplicationInterface[]
     */
    public function getCliApps(): array
    {
        return $this->cliApps;
    }










    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Throws an exception.
     *
     * @param string $msg
     * @throws \Exception
     */
    private function error(string $msg)
    {
        throw new LightCliException($msg);
    }

}