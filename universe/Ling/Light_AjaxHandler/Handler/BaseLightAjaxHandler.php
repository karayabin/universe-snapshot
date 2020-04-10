<?php


namespace Ling\Light_AjaxHandler\Handler;


use Ling\Light\Http\HttpRequestInterface;
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
     * Handles the given action and returns an @page(alcp response), or throws an exception in case of problems.
     *
     * @param string $action
     * @param HttpRequestInterface $request
     * @return array
     */
    abstract protected function doHandle(string $action, HttpRequestInterface $request): array;




    /**
     * @implementation
     */
    public function handle(string $action, HttpRequestInterface $request): array
    {
        //--------------------------------------------
        // FORCED CSRF TOKEN VALIDATION
        //--------------------------------------------
        $csrfToken = $request->getPostValue("csrf_token", false);
        if (null === $csrfToken) {
            throw new LightAjaxHandlerException("Csrf token not provided for action \"$action\".");
        }


        /**
         * @var $csrfService LightCsrfSessionService
         */
        $csrfService = $this->container->get('csrf_session');
        if (false === $csrfService->isValid($csrfToken)) {
            throw new LightAjaxHandlerException("Invalid csrf token provided: " . $csrfToken . " for action \"$action\".");
        }
        return $this->doHandle($action, $request);
    }


}