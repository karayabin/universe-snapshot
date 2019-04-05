<?php


namespace Ling\Light_Initializer\Util;


use Ling\Light\Core\Light;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light_Initializer\Initializer\LightInitializerInterface;

/**
 * The LightInitializerUtil class.
 */
class LightInitializerUtil
{


    /**
     * This property holds the callbacks for this instance.
     * @var LightInitializerInterface[]
     */
    protected $initializers;


    /**
     * Builds the LightInitializer instance.
     */
    public function __construct()
    {
        $this->initializers = [];
    }


    /**
     * Registers an initializer to this instance.
     *
     * @param LightInitializerInterface $initializer
     */
    public function registerInitializer(LightInitializerInterface $initializer)
    {
        $this->initializers[] = $initializer;
    }


    /**
     * Registers all initializers at once.
     *
     * @param LightInitializerInterface[] $initializers
     */
    public function setInitializers(array $initializers)
    {
        $this->initializers = $initializers;
    }


    /**
     * Triggers the initialize method on all registered initializers.
     *
     * @param Light $light
     * @param HttpRequestInterface $httpRequest
     */
    public function initialize(Light $light, HttpRequestInterface $httpRequest)
    {
        foreach ($this->initializers as $initializer) {
            $initializer->initialize($light, $httpRequest);
        }
    }

}
