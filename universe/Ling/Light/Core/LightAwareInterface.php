<?php


namespace Ling\Light\Core;

/**
 * The LightAwareInterface interface.
 */
interface LightAwareInterface
{

    /**
     * Sets the light instance.
     *
     * @param Light $light
     * @return void
     */
    public function setLight(Light $light);
}