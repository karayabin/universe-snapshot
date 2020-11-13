<?php


namespace Ling\Light_Nugget\SecurityHandler;


/**
 * The LightNuggetSecurityHandlerInterface interface.
 */
interface LightNuggetSecurityHandlerInterface
{


    /**
     * Returns whether the current user is granted an action defined the given parameters.
     * The concrete parameters are defined by the concrete class.
     *
     *
     * @param array $params
     * @return bool
     */
    public function isGranted(array $params = [] ): bool;
}