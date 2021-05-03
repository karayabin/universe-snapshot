<?php


namespace Ling\Light_Kit\ConfigurationTransformer;


use Ling\Light\Helper\LightHelper;
use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;

/**
 * The LightExecuteNotationResolver class.
 */
class LightExecuteNotationResolver implements ConfigurationTransformerInterface, LightServiceContainerAwareInterface
{


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * Builds the LightExecuteNotationResolver instance.
     */
    public function __construct()
    {
        $this->container = null;
    }


    //--------------------------------------------
    // LightServiceContainerAwareInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }


    //--------------------------------------------
    // ConfigurationTransformerInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function transform(array &$conf)
    {
        $conf = LightHelper::executeParenthesisWrappersByArray($conf, $this->container, ['::']);
    }
}