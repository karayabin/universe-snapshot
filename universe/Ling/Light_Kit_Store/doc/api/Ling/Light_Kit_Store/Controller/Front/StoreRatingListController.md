[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)



The StoreRatingListController class
================
2021-04-06 --> 2021-08-02






Introduction
============

The StoreRatingListController class.



Class synopsis
==============


class <span class="pl-k">StoreRatingListController</span> extends [StoreProductPageController](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/Front/StoreProductPageController.md) implements [LightAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/LightAwareInterface.md), [LightControllerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Controller/LightControllerInterface.md) {

- Inherited properties
    - protected [Ling\Light\Core\Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) [LightController::$light](#property-light) ;

- Methods
    - public [render](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/Front/StoreRatingListController/render.md)(Ling\Light\Http\HttpRequestInterface $request) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)
    - public [renderRatings](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/Front/StoreRatingListController/renderRatings.md)(Ling\Light\Http\HttpRequestInterface $request) : [HttpJsonResponse](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpJsonResponse.md)
    - private [getRatingFilterMap](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/Front/StoreRatingListController/getRatingFilterMap.md)() : array

- Inherited methods
    - protected [StoreProductPageController::getItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/Front/StoreProductPageController/getItem.md)(int $itemId, ?array $options = []) : array | null
    - public [StoreBaseController::renderPage](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/StoreBaseController/renderPage.md)(string $page, ?array $options = []) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)
    - public [StoreBaseController::getLink](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/StoreBaseController/getLink.md)(string $routeName, ?array $urlParams = [], ?bool $useAbsolute = false) : string
    - protected [StoreBaseController::setControllerGlobalVar](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/StoreBaseController/setControllerGlobalVar.md)(string $key, $value) : void
    - protected [StoreBaseController::getKitStoreService](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/StoreBaseController/getKitStoreService.md)() : [LightKitStoreService](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Service/LightKitStoreService.md)
    - protected [StoreBaseController::getRedirectResponse](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/StoreBaseController/getRedirectResponse.md)(string $type) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)
    - public LightController::__construct() : void
    - public LightController::setLight([Ling\Light\Core\Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) $light) : void
    - protected LightController::getLight() : [Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md)
    - protected LightController::getContainer() : [LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md)
    - protected LightController::getHttpRequest() : Ling\Light\Http\HttpRequestInterface
    - protected LightController::hasService(string $serviceName) : bool
    - protected LightController::logError($msg) : void

}






Methods
==============

- [StoreRatingListController::render](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/Front/StoreRatingListController/render.md) &ndash; Renders the home page, and returns the appropriate http response.
- [StoreRatingListController::renderRatings](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/Front/StoreRatingListController/renderRatings.md) &ndash; This returns the array of information about ratings.
- [StoreRatingListController::getRatingFilterMap](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/Front/StoreRatingListController/getRatingFilterMap.md) &ndash; Returns the rating filter map.
- [StoreProductPageController::getItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/Front/StoreProductPageController/getItem.md) &ndash; Returns an array of information about the item which id is given, or null if no item was found.
- [StoreBaseController::renderPage](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/StoreBaseController/renderPage.md) &ndash; Renders the given page using the [kit service](https://github.com/lingtalfi/Light_Kit).
- [StoreBaseController::getLink](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/StoreBaseController/getLink.md) &ndash; Proxy to the reverse router's getUrl method.
- [StoreBaseController::setControllerGlobalVar](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/StoreBaseController/setControllerGlobalVar.md) &ndash; Sets a variable globally, with the "controller" namespace.
- [StoreBaseController::getKitStoreService](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/StoreBaseController/getKitStoreService.md) &ndash; Returns the kit store service instance.
- [StoreBaseController::getRedirectResponse](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/StoreBaseController/getRedirectResponse.md) &ndash; Returns a redirect response based on the given type.
- LightController::__construct &ndash; Builds the LightController instance.
- LightController::setLight &ndash; Sets the light instance.
- LightController::getLight &ndash; Returns the light application.
- LightController::getContainer &ndash; Returns the service container.
- LightController::getHttpRequest &ndash; Returns the http request bound to the light instance.
- LightController::hasService &ndash; Returns whether the container contains the service which name is given.
- LightController::logError &ndash; Sends a log message to the logger service's error channel.





Location
=============
Ling\Light_Kit_Store\Controller\Front\StoreRatingListController<br>
See the source code of [Ling\Light_Kit_Store\Controller\Front\StoreRatingListController](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Controller/Front/StoreRatingListController.php)



SeeAlso
==============
Previous class: [StoreProductPageController](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/Front/StoreProductPageController.md)<br>Next class: [StoreSearchResultsController](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/Front/StoreSearchResultsController.md)<br>