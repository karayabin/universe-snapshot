<?php


namespace Ling\Light_MicroPermission\Light_Database;


use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Database\EventHandler\LightDatabaseEventHandlerInterface;
use Ling\Light_Database\Helper\LightDatabaseHelper;
use Ling\Light_MicroPermission\Exception\LightMicroPermissionException;
use Ling\Light_MicroPermission\Service\LightMicroPermissionService;

/**
 * The LightMicroPermissionDatabaseEventHandler class.
 */
class LightMicroPermissionDatabaseEventHandler implements LightDatabaseEventHandlerInterface
{


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * Builds the LightMicroPermissionDatabaseListener instance.
     */
    public function __construct()
    {
        $this->container = null;
    }

    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @implementation
     */
    public function handle(string $eventName, ...$args)
    {
        /**
         * @var $microService LightMicroPermissionService
         */
        $microService = $this->container->get('micro_permission');

        switch ($eventName) {
            case "insert.before":
                $types = ["create"];
                $tables = $args[0];
                break;
            case "replace.before":
                $types = ["create", "delete"];
                $tables = $args[0];
                break;
            case "update.before":
                $types = ["update"];
                $tables = $args[0];
                break;
            case "delete.before":
                $types = ["delete"];
                $tables = $args[0];
                break;
            case "fetch.before":
            case "fetchAll.before":
                $q = $args[0];
                $tables = LightDatabaseHelper::getTablesByQuery($q);
                $types = ["read"];
                break;
            default:
                throw new LightMicroPermissionException("Unknown eventName \"$eventName\".");
                break;
        }

        if (false === is_array($tables)) {
            $tables = [$tables];
        }
        foreach ($tables as $tableName) {
            foreach ($types as $type) {
                $microPermission = "tables.$tableName.$type";
                if (false === $microService->hasMicroPermission($microPermission)) {
                    throw new LightMicroPermissionException("Micro-permission denied: you don't have the \"$microPermission\" micro-permission.");
                }
            }
        }

    }


}