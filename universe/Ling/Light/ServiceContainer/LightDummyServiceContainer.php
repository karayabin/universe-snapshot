<?php

namespace Ling\Light\ServiceContainer;


/**
 * The LightDummyServiceContainer class.
 */
class LightDummyServiceContainer implements LightServiceContainerInterface
{

    public function get(string $service)
    {

    }

    public function has(string $service): bool
    {
        return false;
    }


}