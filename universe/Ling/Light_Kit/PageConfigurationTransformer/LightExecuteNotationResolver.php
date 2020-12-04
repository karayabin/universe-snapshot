<?php


namespace Ling\Light_Kit\PageConfigurationTransformer;


use Ling\Light\Helper\LightHelper;
use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;

/**
 * The LightExecuteNotationResolver class.
 */
class LightExecuteNotationResolver implements PageConfigurationTransformerInterface, LightServiceContainerAwareInterface
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
    // PageConfigurationTransformerInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function transform(array &$pageConfiguration)
    {
        $pageConfiguration = LightHelper::executeParenthesisWrappersByArray($pageConfiguration, $this->container, ['::']);
    }
}