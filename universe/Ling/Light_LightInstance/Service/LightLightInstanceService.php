<?php


namespace Ling\Light_LightInstance\Service;

use Ling\Light\Core\Light;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Initializer\Initializer\LightInitializerInterface;

/**
 * The LightLightInstanceService class.
 */
class LightLightInstanceService implements LightInitializerInterface
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
     * @implementation
     */
    public function initialize(Light $light, HttpRequestInterface $httpRequest)
    {
        $this->light = $light;
        $this->httpRequest = $httpRequest;
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