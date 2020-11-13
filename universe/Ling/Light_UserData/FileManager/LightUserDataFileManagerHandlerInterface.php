<?php


namespace Ling\Light_UserData\FileManager;


use Ling\Light\Http\HttpRequestInterface;

/**
 * The LightUserDataFileManagerHandler class.
 *
 * The goal of this class is to handle the @page(file manager protocol) for the Light_UserData plugin.
 * The concrete might/might not use a virtual server under the hood.
 *
 *
 *
 */
interface LightUserDataFileManagerHandlerInterface
{

    /**
     * Handles the given @page(file manager protocol) action, and returns the appropriate response.
     *
     * Or throws an exception in case of error.
     *
     * @param string $action
     * @param HttpRequestInterface $request
     * @throws \Exception
     */
    public function handle(string $action, HttpRequestInterface $request);
}