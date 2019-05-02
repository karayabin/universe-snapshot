<?php

namespace Ling\Light\ServiceContainer;


use Ling\Light\Exception\LightException;

/**
 * The LightDummyServiceContainer class.
 */
class LightDummyServiceContainer implements LightServiceContainerInterface
{


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


}