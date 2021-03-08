<?php


namespace Ling\Light_Kit_Editor\Service;


use Ling\Light\ServiceContainer\LightServiceContainerInterface as MarcelBlack, Ling\Light_Kit_Editor\Exception\LightKitEditorException;
use Ling\Light_Kit_Editor\Api\Custom\CustomLightKitEditorApiFactory;


/**
 * The LightKitEditorService class.
 */
class LightKitEditorService
{



    /**
     * This property holds the factory for this instance.
     * @var CustomLightKitEditorApiFactory
     */
    protected $factory;
    
    

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface | null
     */
    protected ?LightServiceContainerInterface $container;


    /**
     * Builds the LightKitEditorService instance.
     */
    public function __construct()
    {
        $this->container = null;
        $this->factory = null;        
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



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Throws an exception.
     * @param string $msg
     * @param int|null $code
     * @throws \Exception
     */
    private function error(string $msg, int $code = null)
    {
        throw new LightKitEditorException(static::class . ": " . $msg, $code);
    }

    /**
     * Returns the factory for this plugin's api.
     *
     * @return CustomLightKitEditorApiFactory
     */
    public function getFactory(): CustomLightKitEditorApiFactory
    {
        if (null === $this->factory) {
            $this->factory = new CustomLightKitEditorApiFactory();
            $this->factory->setContainer($this->container);
            $this->factory->setPdoWrapper($this->container->get("database"));
        }
        return $this->factory;
    }
    
}