<?php


namespace Ling\Light_Database\Traits;


use Ling\Light_Database\Service\LightDatabaseService;

/**
 * Trait LightDatabaseTrait
 */
trait LightDatabaseTrait
{

    /**
     * Activates the micro-permissions checking for database interactions.
     */
    protected function activateDatabaseMicroPermission()
    {

        /**
         * @var $db LightDatabaseService
         */
        $db = $this->container->get('database');
        $db->setUseMicroPermission(true);

    }

    /**
     * Deactivates the micro-permissions checking for database interactions.
     */
    protected function deactivateDatabaseMicroPermission()
    {
        /**
         * @var $db LightDatabaseService
         */
        $db = $this->container->get('database');
        $db->setUseMicroPermission(false);
    }
}