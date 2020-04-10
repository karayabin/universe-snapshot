<?php


namespace Ling\Light_AjaxHandler\Handler;


use Ling\Light\Http\HttpRequestInterface;

/**
 * The LightAjaxHandlerInterface interface.
 */
interface LightAjaxHandlerInterface
{


    /**
     * Handles the given action and returns an @page(alcp response), or throws an exception in case of problems.
     *
     *
     * @param string $action
     * @param HttpRequestInterface $request
     * @return array
     * @throws \Exception
     */
    public function handle(string $action, HttpRequestInterface $request): array;
}