<?php


namespace Ling\Light_Train\Service;


use Ling\Light_LingStandardService\Service\LightLingStandardService01;
use Ling\Light_Train\Api\Custom\CustomLightTrainApiFactory;
use Ling\Light_Train\Exception\LightTrainException;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;

/**
 * The LightTrainService class.
 */
class LightTrainService extends LightLingStandardService01
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
     * See the @page(Light_Train conception notes) for more details.
     *
     *
     * @var array
     */
    protected $options;
    
    


    /**
     * This property holds the factory for this instance.
     * @var CustomLightTrainApiFactory
     */
    protected $factory;


    /**
     * Builds the LightTrainService instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->factory = null;
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
     * Returns the factory for this plugin's api.
     *
     * @return CustomLightTrainApiFactory
     */
    public function getFactory(): CustomLightTrainApiFactory
    {
        if (null === $this->factory) {
            $this->factory = new CustomLightTrainApiFactory();
            $this->factory->setContainer($this->container);
            $this->factory->setPdoWrapper($this->container->get("database"));
        }
        return $this->factory;
    }

}