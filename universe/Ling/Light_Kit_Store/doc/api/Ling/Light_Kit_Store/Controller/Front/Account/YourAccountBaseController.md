[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)



The YourAccountBaseController class
================
2021-04-06 --> 2021-08-02






Introduction
============

The YourAccountBaseController class.



Class synopsis
==============


class <span class="pl-k">YourAccountBaseController</span> extends [StoreBaseController](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/StoreBaseController.md) implements [LightControllerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Controller/LightControllerInterface.md), [LightAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/LightAwareInterface.md) {

- Inherited properties
    - protected [Ling\Light\Core\Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) [LightController::$light](#property-light) ;

- Methods
    - protected [renderAccountPage](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/Front/Account/YourAccountBaseController/renderAccountPage.md)(string $page, ?array $options = []) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)
    - protected [getUserRow](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/Front/Account/YourAccountBaseController/getUserRow.md)() : array

- Inherited methods
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

- [YourAccountBaseController::renderAccountPage](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/Front/Account/YourAccountBaseController/renderAccountPage.md) &ndash; Renders the given page using the [kit service](https://github.com/lingtalfi/Light_Kit).
- [YourAccountBaseController::getUserRow](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/Front/Account/YourAccountBaseController/getUserRow.md) &ndash; Returns the user row for the connected user.
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
Ling\Light_Kit_Store\Controller\Front\Account\YourAccountBaseController<br>
See the source code of [Ling\Light_Kit_Store\Controller\Front\Account\YourAccountBaseController](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Controller/Front/Account/YourAccountBaseController.php)



SeeAlso
==============
Previous class: [LightKitStoreApiFactory](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/LightKitStoreApiFactory.md)<br>Next class: [YourAccountBillingInfoController](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/Front/Account/YourAccountBillingInfoController.md)<br>
