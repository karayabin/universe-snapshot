<?php


namespace Ling\Light_Realist\ListActionHandler;


/**
 * The LightRealistListActionHandlerInterface interface.
 */
interface LightRealistListActionHandlerInterface
{


    /**
     * Decorates the given @page(generic action item) identified by the given action name (which will be used
     * by a renderer to display that item in the gui).
     *
     * If the handler discards the item (typically because the user doesn't have the right
     * to execute it), then this method returns false.
     *
     *
     * @param string $actionName
     * @param array $genericActionItem
     * @param string $requestId
     * @return null|false
     */
    public function prepare(string $actionName, array &$genericActionItem, string $requestId);



    /**
     * Executes the list action (called via ajax) identified by the given action name and returns the ajax response.
     *
     * @param string $actionName
     * @param array $params
     * @return array
     * @throws \Exception
     */
    public function execute(string $actionName, array $params): array;


}