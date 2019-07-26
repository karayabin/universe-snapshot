<?php

namespace Ling\Light_Initializer\Initializer;


use Ling\Light\Core\Light;
use Ling\Light\Http\HttpRequestInterface;

/**
 * The LightInitializerInterface interface.
 */
interface LightInitializerInterface
{


    /**
     * Initializes a service with the given Light instance and HttpRequestInterface instance.
     *
     * @param Light $light
     * @param HttpRequestInterface $httpRequest
     * @return mixed
     */
    public function initialize(Light $light, HttpRequestInterface $httpRequest);
}