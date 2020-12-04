[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)



The RealformMultipleEditController class
================
2019-05-17 --> 2020-12-01






Introduction
============

The MultipleFormEditController class.



Class synopsis
==============


class <span class="pl-k">RealformMultipleEditController</span> extends [AdminPageController](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/AdminPageController.md) implements [LightAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/LightAwareInterface.md), [LightControllerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Controller/LightControllerInterface.md), [RouteAwareControllerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Controller/RouteAwareControllerInterface.md) {

- Properties
    - private array [$_conf](#property-_conf) ;

- Inherited properties
    - protected array [LightKitAdminController::$route](#property-route) ;
    - protected [Ling\Light\Core\Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) [LightController::$light](#property-light) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/Tools/RealformMultipleEditController/__construct.md)() : void
    - public [render](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/Tools/RealformMultipleEditController/render.md)(Ling\Light\Http\HttpRequestInterface $request) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)
    - protected [processForm](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/Tools/RealformMultipleEditController/processForm.md)(string $realformIdentifier, array $rics, ?array $options = []) : [Chloroform](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform.md) | [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)
    - private [getProperty](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/Tools/RealformMultipleEditController/getProperty.md)(string $key, array $conf, string $realformIdentifier) : mixed
    - private [getConfByRealformId](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/Tools/RealformMultipleEditController/getConfByRealformId.md)(string $realformIdentifier) : array

- Inherited methods
    - public [AdminPageController::renderAdminPage](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/AdminPageController/renderAdminPage.md)(string $page, ?$params = [], ?Ling\Light_Kit\PageConfigurationUpdator\PageConfUpdator $updator = null) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)
    - public [LightKitAdminController::setRoute](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/LightKitAdminController/setRoute.md)(array $route) : void
    - protected [LightKitAdminController::getKitAdmin](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/LightKitAdminController/getKitAdmin.md)() : [LightKitAdminService](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService.md)
    - protected [LightKitAdminController::getFlasher](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/LightKitAdminController/getFlasher.md)() : [LightFlasherService](https://github.com/lingtalfi/Light_Flasher/blob/master/doc/api/Ling/Light_Flasher/Service/LightFlasherService.md)
    - protected [LightKitAdminController::getUser](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/LightKitAdminController/getUser.md)() : [LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md)
    - protected [LightKitAdminController::getValidWebsiteUser](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/LightKitAdminController/getValidWebsiteUser.md)() : [LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md)
    - public [LightKitAdminController::renderPage](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/LightKitAdminController/renderPage.md)(string $page, ?array $dynamicVariables = [], ?Ling\Light_Kit\PageConfigurationUpdator\PageConfUpdator $updator = null) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)
    - protected [LightKitAdminController::getRedirectResponseByRoute](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/LightKitAdminController/getRedirectResponseByRoute.md)(string $route, ?array $urlParams = []) : [HttpRedirectResponse](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpRedirectResponse.md)
    - protected [LightKitAdminController::checkRight](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/LightKitAdminController/checkRight.md)(string $right) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md) | null
    - protected [LightKitAdminController::checkMicroPermission](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/LightKitAdminController/checkMicroPermission.md)(string $microPermission) : void
    - protected [LightKitAdminController::error](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/LightKitAdminController/error.md)(string $msg) : void
    - public LightController::setLight([Ling\Light\Core\Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) $light) : void
    - protected LightController::getLight() : [Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md)
    - protected LightController::getContainer() : [LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md)
    - protected LightController::getHttpRequest() : Ling\Light\Http\HttpRequestInterface
    - protected LightController::hasService(string $serviceName) : bool

}




Properties
=============

- <span id="property-_conf"><b>_conf</b></span>

    This property holds the conf cache for this instance.
    
    

- <span id="property-route"><b>route</b></span>

    This property holds the route for this instance.
    See [the route page](https://github.com/lingtalfi/Light/blob/master/doc/pages/route.md) for more information.
    
    

- <span id="property-light"><b>light</b></span>

    This property holds the light for this instance.
    
    



Methods
==============

- [RealformMultipleEditController::__construct](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/Tools/RealformMultipleEditController/__construct.md) &ndash; Builds the LightController instance.
- [RealformMultipleEditController::render](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/Tools/RealformMultipleEditController/render.md) &ndash; Returns the http response, which body contains a multiple form edit page.
- [RealformMultipleEditController::processForm](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/Tools/RealformMultipleEditController/processForm.md) &ndash; and returns a chloroform instance.
- [RealformMultipleEditController::getProperty](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/Tools/RealformMultipleEditController/getProperty.md) &ndash; Returns the value of the property identified by the given key, in the given conf array.
- [RealformMultipleEditController::getConfByRealformId](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/Tools/RealformMultipleEditController/getConfByRealformId.md) &ndash; Returns the nugget conf attached to the given realform identifier.
- [AdminPageController::renderAdminPage](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/AdminPageController/renderAdminPage.md) &ndash; if she is not connected yet.
- [LightKitAdminController::setRoute](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/LightKitAdminController/setRoute.md) &ndash; Sets the matching route to this controller instance.
- [LightKitAdminController::getKitAdmin](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/LightKitAdminController/getKitAdmin.md) &ndash; Returns the kit admin service instance.
- [LightKitAdminController::getFlasher](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/LightKitAdminController/getFlasher.md) &ndash; Returns a flasher instance.
- [LightKitAdminController::getUser](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/LightKitAdminController/getUser.md) &ndash; Returns the current user.
- [LightKitAdminController::getValidWebsiteUser](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/LightKitAdminController/getValidWebsiteUser.md) &ndash; Returns a valid website user, or throws an exception.
- [LightKitAdminController::renderPage](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/LightKitAdminController/renderPage.md) &ndash; Renders the given page using the [kit service](https://github.com/lingtalfi/Light_Kit).
- [LightKitAdminController::getRedirectResponseByRoute](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/LightKitAdminController/getRedirectResponseByRoute.md) &ndash; Creates and returns an HttpRedirectResponse, based on the given arguments.
- [LightKitAdminController::checkRight](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/LightKitAdminController/checkRight.md) &ndash; Ensures that the current user is connected and has the right provided in the arguments.
- [LightKitAdminController::checkMicroPermission](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/LightKitAdminController/checkMicroPermission.md) &ndash; redirects to the access_denied page.
- [LightKitAdminController::error](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/LightKitAdminController/error.md) &ndash; Throws an exception.
- LightController::setLight &ndash; Sets the light instance.
- LightController::getLight &ndash; Returns the light application.
- LightController::getContainer &ndash; Returns the service container.
- LightController::getHttpRequest &ndash; Returns the http request bound to the light instance.
- LightController::hasService &ndash; Returns whether the container contains the service which name is given.





Location
=============
Ling\Light_Kit_Admin\Controller\Tools\RealformMultipleEditController<br>
See the source code of [Ling\Light_Kit_Admin\Controller\Tools\RealformMultipleEditController](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/Controller/Tools/RealformMultipleEditController.php)



SeeAlso
==============
Previous class: [TestPageController](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/TestPageController.md)<br>Next class: [MessagesDataExtractor](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/DataExtractor/MessagesDataExtractor.md)<br>
