[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)



The StoreApiController class
================
2021-04-06 --> 2021-05-31






Introduction
============

The StoreApiController class.

All methods of this class are alcp ends for clients.



Class synopsis
==============


class <span class="pl-k">StoreApiController</span> extends LightController implements LightAwareInterface, LightControllerInterface {

- Inherited properties
    - protected Ling\Light\Core\Light [LightController::$light](#property-light) ;

- Methods
    - public [registerWebsite](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/StoreApiController/registerWebsite.md)(Ling\Light\Http\HttpRequestInterface $request) : Ling\Light\Http\HttpJsonResponse
    - public [signUp](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/StoreApiController/signUp.md)(Ling\Light\Http\HttpRequestInterface $request) : void

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

- [StoreApiController::registerWebsite](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/StoreApiController/registerWebsite.md) &ndash; Registers a website to the store database, and returns an alcp response.
- [StoreApiController::signUp](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/StoreApiController/signUp.md) &ndash; 
- LightController::__construct &ndash; Builds the LightController instance.
- LightController::setLight &ndash; Sets the light instance.
- LightController::getLight &ndash; Returns the light application.
- LightController::getContainer &ndash; Returns the service container.
- LightController::getHttpRequest &ndash; Returns the http request bound to the light instance.
- LightController::hasService &ndash; Returns whether the container contains the service which name is given.





Location
=============
Ling\Light_Kit_Store\Controller\StoreApiController<br>
See the source code of [Ling\Light_Kit_Store\Controller\StoreApiController](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Controller/StoreApiController.php)



SeeAlso
==============
Next class: [StoreFrontController](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/StoreFrontController.md)<br>
