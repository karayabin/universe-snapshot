<?php


namespace Ling\Light_Kit_Store\Controller;


use Ling\Light\Controller\LightController;
use Ling\Light\Http\HttpJsonResponse;
use Ling\Light\Http\HttpRequestInterface;


/**
 * The StoreApiController class.
 *
 * All methods of this class are alcp ends for clients.
 *
 *
 */
class StoreApiController extends LightController
{


    /**
     * Registers a website to the store database, and returns an @page(alcp response).
     *
     *
     * @param HttpRequestInterface $request
     * @return HttpJsonResponse
     */
    public function registerWebsite(HttpRequestInterface $request): HttpJsonResponse
    {
        /**
         * todo: here... open new window (kit_store), and continue implementing "install item process", see config/open/Ling.Light_Kit_Editor to resume ideas...
         * todo: here... open new window (kit_store), and continue implementing "install item process", see config/open/Ling.Light_Kit_Editor to resume ideas...
         * todo: here... open new window (kit_store), and continue implementing "install item process", see config/open/Ling.Light_Kit_Editor to resume ideas...
         * todo: here... open new window (kit_store), and continue implementing "install item process", see config/open/Ling.Light_Kit_Editor to resume ideas...
         */

//        az($request);
        return HttpJsonResponse::create([
            "type" => "success",
            "content" => "Boris à la plage",
        ]);
    }


    public function signUp(HttpRequestInterface $request): HttpJsonResponse
    {
        return HttpJsonResponse::create([
            "type" => "error",
            "content" => "There is a problem with the database, please retry later",
        ]);
    }

}

