<?php

namespace Ling\Light\ServiceContainer;


use Ling\Light\Core\Light;
use Ling\Light\Exception\LightException;

/**
 * The LightDummyServiceContainer class.
 */
class LightDummyServiceContainer implements LightServiceContainerInterface
{

    /**
     * This property holds the light for this instance.
     * @var Light
     */
    protected $light;


    /**
     * Builds the LightDummyServiceContainer instance.
     */
    public function __construct()
    {
        $this->light = null;
    }


    /**
     * @implementation
     */
    public function get(string $service)
    {
        throw new LightException("Sorry, I'm a dummy container, I don't provide any service.");
    }

    /**
     * @implementation
     */
    public function has(string $service): bool
    {
        return false;
    }

    /**
     * @implementation
     */
    public function all(): array
    {
        return [];
    }

    /**
     * @implementation
     */
    public function getApplicationDir(): string
    {
        return '/dummy-app';
    }

    /**
     * @implementation
     */
    public function getLight(): Light
    {
        return $this->light;
    }

    /**
     * @implementation
     */
    public function setLight(Light $light)
    {
        $this->light = $light;
    }

}