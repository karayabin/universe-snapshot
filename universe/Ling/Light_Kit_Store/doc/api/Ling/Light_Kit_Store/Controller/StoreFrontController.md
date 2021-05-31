[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)



The StoreFrontController class
================
2021-04-06 --> 2021-05-31






Introduction
============

The StoreFrontController class.



Class synopsis
==============


class <span class="pl-k">StoreFrontController</span> extends LightController implements LightAwareInterface, LightControllerInterface {

- Inherited properties
    - protected Ling\Light\Core\Light [LightController::$light](#property-light) ;

- Methods
    - public [index](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/StoreFrontController/index.md)(Ling\Light\Http\HttpRequestInterface $request) : Ling\Light\Http\HttpResponseInterface

- Inherited methods
    - public LightController::__construct() : void
    - public LightController::setLight(Ling\Light\Core\Light $light) : void
    - protected LightController::getLight() : Ling\Light\Core\Light
    - protected LightController::getContainer() : Ling\Light\ServiceContainer\LightServiceContainerInterface
    - protected LightController::getHttpRequest() : Ling\Light\Http\HttpRequestInterface
    - protected LightController::hasService(string $serviceName) : bool

}






Methods
==============

- [StoreFrontController::index](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/StoreFrontController/index.md) &ndash; Renders the store front page.
- LightController::__construct &ndash; Builds the LightController instance.
- LightController::setLight &ndash; Sets the light instance.
- LightController::getLight &ndash; Returns the light application.
- LightController::getContainer &ndash; Returns the service container.
- LightController::getHttpRequest &ndash; Returns the http request bound to the light instance.
- LightController::hasService &ndash; Returns whether the container contains the service which name is given.





Location
=============
Ling\Light_Kit_Store\Controller\StoreFrontController<br>
See the source code of [Ling\Light_Kit_Store\Controller\StoreFrontController](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Controller/StoreFrontController.php)



SeeAlso
==============
Previous class: [StoreApiController](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/StoreApiController.md)<br>Next class: [LightKitStoreException](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Exception/LightKitStoreException.md)<br>
