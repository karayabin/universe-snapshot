<?php


namespace Ling\Light_LightInstance\Service;

use Ling\Light\Core\Light;
use Ling\Light\Events\LightEvent;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;

/**
 * The LightLightInstanceService class.
 */
class LightLightInstanceService
{

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * This property holds the light for this instance.
     * @var Light
     */
    protected $light;

    /**
     * This property holds the httpRequest for this instance.
     * @var HttpRequestInterface
     */
    protected $httpRequest;

    /**
     * Builds the LightLightInstanceService instance.
     */
    public function __construct()
    {
        $this->container = null;
        $this->light = null;
        $this->httpRequest = null;
    }


    /**
     * Listener for the @page(Light.initialize_1 event).
     * It stores the light instance and the http request instance for other plugins to use.
     *
     * @param LightEvent $event
     * @return void
     */
    public function initialize(LightEvent $event)
    {
        $this->light = $event->getLight();
        $this->httpRequest = $event->getHttpRequest();
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the current light instance.
     * @return Light
     */
    public function getLight(): Light
    {
        return $this->light;
    }

    /**
     * Returns the current http request instance.
     * @return HttpRequestInterface
     */
    public function getHttpRequest(): HttpRequestInterface
    {
        return $this->httpRequest;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }


}