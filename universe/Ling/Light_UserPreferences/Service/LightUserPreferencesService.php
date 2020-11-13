<?php


namespace Ling\Light_UserPreferences\Service;


use Ling\Light_LingStandardService\Service\LightLingStandardService01;
use Ling\Light_UserPreferences\Api\Custom\CustomLightUserPreferencesApiFactory;

/**
 * The LightUserPreferencesService class.
 */
class LightUserPreferencesService extends LightLingStandardService01
{


    /**
     * This property holds the factory for this instance.
     * @var CustomLightUserPreferencesApiFactory
     */
    protected $factory;


    /**
     * Builds the LightUserPreferencesService instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->factory = null;
    }




    /**
     * Returns the factory for this plugin's api.
     *
     * @return CustomLightUserPreferencesApiFactory
     */
    public function getFactory(): CustomLightUserPreferencesApiFactory
    {
        if (null === $this->factory) {
            $this->factory = new CustomLightUserPreferencesApiFactory();
            $this->factory->setContainer($this->container);
            $this->factory->setPdoWrapper($this->container->get("database"));
        }
        return $this->factory;
    }
}