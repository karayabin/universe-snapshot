<?php


namespace Ling\Light_Crud\CrudRequestHandler;

/**
 * The LightCrudRequestHandlerInterface interface.
 */
interface LightCrudRequestHandlerInterface
{

    /**
     * Executes the sql request identified by the given arguments,
     * and throws an exception if a problem occurs.
     *
     * The params depend on the action, we suggest the following:
     *
     *
     * - create:
     *      - data: array of key/value pairs
     * - update:
     *      - data: array of key/value pairs
     *      - updateRic: array of key/value pairs representing the ric
     * - delete:
     *      - ric: array of key/value pairs representing the ric of the row to delete
     * - deleteMultiple:
     *      - rics: array of ric items, each of which being an array of key/value pairs representing the ric of a row to delete
     *
     *
     * Other params might be added by plugin authors when necessary.
     *
     *
     *
     * @param string $pluginContextIdentifier
     * @param string $table
     * @param string $action
     * @param array $params
     * @return mixed
     * @throws \Exception
     */
    public function execute(string $pluginContextIdentifier, string $table, string $action, array $params = []);
}