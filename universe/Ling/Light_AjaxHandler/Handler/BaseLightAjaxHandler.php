<?php


namespace Ling\Light_AjaxHandler\Handler;


use Ling\Light_AjaxHandler\Exception\LightAjaxHandlerException;
use Ling\Light_CsrfSession\Service\LightCsrfSessionService;

/**
 * The BaseLightAjaxHandler class.
 * The main idea of this class is to ensure that every action is csrf protected.
 *
 *
 */
abstract class BaseLightAjaxHandler extends ContainerAwareLightAjaxHandler
{

    /**
     * Handles the action identified by actionId and params,
     * and returns a json array as specified in the @page(ajax communication protocol).
     *
     *
     * @param string $actionId
     * @param array $params
     * @return mixed
     */
    abstract protected function doHandle(string $actionId, array $params);

    /**
     * @implementation
     */
    public function handle(string $actionId, array $params): array
    {
        if (false === array_key_exists('csrf_token', $params)) {
            throw new LightAjaxHandlerException("Csrf token not provided for action $actionId.");
        }


        /**
         * @var $csrfService LightCsrfSessionService
         */
        $csrfService = $this->container->get('csrf_session');
        if (false === $csrfService->isValid($params['csrf_token'])) {
            throw new LightAjaxHandlerException("Invalid csrf token provided: " . $params['csrf_token'] . " for action $actionId.");
        }

        return $this->doHandle($actionId, $params);
    }


}