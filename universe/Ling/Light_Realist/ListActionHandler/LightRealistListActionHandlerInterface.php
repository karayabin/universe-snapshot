<?php


namespace Ling\Light_Realist\ListActionHandler;


/**
 * The LightRealistListActionHandlerInterface interface.
 */
interface LightRealistListActionHandlerInterface
{


    /**
     * Returns whether we should display the trigger of the action identified by actionId to the current user.
     *
     * @param string $actionId
     * @param string $requestId
     * @return bool
     */
    public function doWeShowTrigger(string $actionId, string $requestId): bool;


    /**
     * Prepares the given listAction for the given actionId.
     *
     * The goal is to transform the list action in a form that the list renderer will understand.
     *
     * See more in @page(details about the list actions).
     *
     *
     * @param string $actionId
     * @param string $requestId
     * @param array $listAction
     * @return void
     */
    public function prepareListAction(string $actionId, string $requestId, array &$listAction): void;


    /**
     * Executes the list action (called via ajax) identified by the given action id and returns the ajax response in alcp format.
     * See more about [alcp protocol](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/pages/ajax-light-communication-protocol.md).
     *
     * @param string $actionId
     * @param array $params
     * @return array
     * @throws \Exception
     */
    public function execute(string $actionId, array $params = []): array;


}