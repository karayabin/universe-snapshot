<?php


namespace Ling\Light_Realform\Service;


/**
 * The LightRealformLateServiceRegistrationInterface interface.
 */
interface LightRealformLateServiceRegistrationInterface
{


    /**
     *
     * Registers the plugin to the realform service.
     *
     * This is part of our late registration system.
     * See the @page(late registration concept) for more details.
     *
     *
     * @param string $identifier
     * @return mixed
     */
    public function registerRealformByIdentifier(string $identifier);
}