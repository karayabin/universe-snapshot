<?php


namespace Ling\Light_Realist\ListActionHandler;


/**
 * The LightRealistListActionHandlerInterface interface.
 */
interface LightRealistListActionHandlerInterface
{

    /**
     * Returns the array of handled list action ids.
     *
     * @return array
     */
    public function getHandledIds(): array;


    /**
     * Executes the list action identified by the given action id.
     *
     * If something goes wrong, throw an exception (it will be caught, and the error message will be sent
     * to the user).
     *
     * Otherwise, return a standard @page(ajax communication protocol) response.
     *
     *
     * @param string $actionId
     * @param array $params
     * @return array
     * @throws \Exception
     */
    public function execute(string $actionId, array $params = []): array;



    /**
     * Returns the html code for the (list action) button.
     *
     * @param string $actionId
     * @return string
     */
    public function getButton(string $actionId): string;


    /**
     * Returns the js action code for this list action.
     *
     * @param string $actionId
     * @return string
     */
    public function getJsActionCode(string $actionId): string;


}