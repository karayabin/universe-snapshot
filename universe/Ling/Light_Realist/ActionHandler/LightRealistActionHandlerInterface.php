<?php


namespace Ling\Light_Realist\ActionHandler;


/**
 * The LightRealistActionHandlerInterface interface.
 * This tool is used by the LightRealistAjaxServiceController.
 *
 */
interface LightRealistActionHandlerInterface
{


    /**
     * Returns the array of handled action ids.
     *
     * @return array
     */
    public function getHandledIds(): array;


    /**
     * Executes the action identified by the given action id.
     *
     * If something goes wrong, throw an exception (it will be caught, and the error message will be sent
     * to the user).
     *
     * Otherwise, return whatever content you want, it will be translated to its json equivalent for you.
     *
     *
     * @param string $actionId
     * @param array $params
     * @return mixed
     * @throws \Exception
     */
    public function execute(string $actionId, array $params = []);
}