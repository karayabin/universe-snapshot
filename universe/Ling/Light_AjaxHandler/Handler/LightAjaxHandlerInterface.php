<?php


namespace Ling\Light_AjaxHandler\Handler;


/**
 * The LightAjaxHandlerInterface interface.
 */
interface LightAjaxHandlerInterface
{


    /**
     * Handles the action identified by actionId and params,
     * and returns a json array as specified in the @page(ajax communication protocol).
     *
     *
     * @param string $actionId
     * @param array $params
     * @return array
     * @throws \Exception
     */
    public function handle(string $actionId, array $params): array;
}