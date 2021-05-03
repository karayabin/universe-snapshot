<?php

namespace Ling\Light_Kit\ConfigurationTransformer\LazyReferenceResolver;


use Ling\Light\Helper\LightHelper;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;

/**
 * The MethodCallResolver class.
 */
class MethodCallResolver
{


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * Builds the MethodCallResolver instance.
     */
    public function __construct()
    {
        $this->container = null;
    }

    /**
     * Interprets the given $expr and returns the result.
     *
     * See the @page(LightHelper::executeMethod) for more details.
     *
     * @param string $expr
     * @return mixed
     * @throws \Exception
     */
    public function resolve(string $expr)
    {
        return LightHelper::executeMethod($expr, $this->container);
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