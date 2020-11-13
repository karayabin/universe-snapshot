[Back to the Ling/Light_Kit_Admin_TaskScheduler api](https://github.com/lingtalfi/Light_Kit_Admin_TaskScheduler/blob/master/doc/api/Ling/Light_Kit_Admin_TaskScheduler.md)



The RealGenController class
================
2020-07-31 --> 2020-08-28






Introduction
============

The RealGenController class.



Class synopsis
==============


abstract class <span class="pl-k">RealGenController</span> extends [AdminPageController](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/AdminPageController.md) implements [LightAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/LightAwareInterface.md), [LightControllerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Controller/LightControllerInterface.md), [RouteAwareControllerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Controller/RouteAwareControllerInterface.md) {

- Properties
    - protected string [$iframeSignal](#property-iframeSignal) ;

- Inherited properties
    - protected array [LightKitAdminController::$route](#property-route) ;
    - protected [Ling\Light\Core\Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) [LightController::$light](#property-light) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit_Admin_TaskScheduler/blob/master/doc/api/Ling/Light_Kit_Admin_TaskScheduler/Controller/Generated/Base/RealGenController/__construct.md)() : void
    - public [render](https://github.com/lingtalfi/Light_Kit_Admin_TaskScheduler/blob/master/doc/api/Ling/Light_Kit_Admin_TaskScheduler/Controller/Generated/Base/RealGenController/render.md)() : string | [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)
    - protected [processForm](https://github.com/lingtalfi/Light_Kit_Admin_TaskScheduler/blob/master/doc/api/Ling/Light_Kit_Admin_TaskScheduler/Controller/Generated/Base/RealGenController/processForm.md)(string $realformIdentifier, string $table, ?array $options = []) : [Chloroform](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform.md) | [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)
    - public [setOnSuccessIframeSignal](https://github.com/lingtalfi/Light_Kit_Admin_TaskScheduler/blob/master/doc/api/Ling/Light_Kit_Admin_TaskScheduler/Controller/Generated/Base/RealGenController/setOnSuccessIframeSignal.md)(string $iframeSignal) : void
    - protected [lateRealFormRegistration](https://github.com/lingtalfi/Light_Kit_Admin_TaskScheduler/blob/master/doc/api/Ling/Light_Kit_Admin_TaskScheduler/Controller/Generated/Base/RealGenController/lateRealFormRegistration.md)(string $identifier) : void

- Inherited methods
    - public AdminPageController::renderAdminPage(string $page, ?$params = [], ?Ling\Light_Kit\PageConfigurationUpdator\PageConfUpdator $updator = null) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)
    - public LightKitAdminController::setRoute(array $route) : void
    - protected LightKitAdminController::getKitAdmin() : Ling\Light_Kit_Admin\Service\LightKitAdminService
    - protected LightKitAdminController::getFlasher() : Ling\Light_Flasher\Service\LightFlasherService
    - protected LightKitAdminController::getUser() : Ling\Light_User\LightWebsiteUser
    - public LightKitAdminController::renderPage(string $page, ?array $dynamicVariables = [], ?Ling\Light_Kit\PageConfigurationUpdator\PageConfUpdator $updator = null) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)
    - protected LightKitAdminController::getRedirectResponseByRoute(string $route, ?array $urlParams = []) : Ling\Light\Http\HttpRedirectResponse
    - protected LightKitAdminController::checkRight(string $right) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md) | null
    - protected LightKitAdminController::checkMicroPermission(string $microPermission) : void
    - protected LightKitAdminController::error(string $msg) : void
    - public LightController::setLight([Ling\Light\Core\Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) $light) : void
    - protected LightController::getLight() : [Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md)
    - protected LightController::getContainer() : [LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md)
    - protected LightController::getHttpRequest() : Ling\Light\Http\HttpRequestInterface
    - protected LightController::hasService(string $serviceName) : bool

}




Properties
=============

- <span id="property-iframeSignal"><b>iframeSignal</b></span>

    This property holds the iframeSignal for this instance.
    
    

- <span id="property-route"><b>route</b></span>

    This property holds the route for this instance.
    See [the route page](https://github.com/lingtalfi/Light/blob/master/doc/pages/route.md) for more information.
    
    

- <span id="property-light"><b>light</b></span>

    This property holds the light for this instance.
    
    



Methods
==============

- [RealGenController::__construct](https://github.com/lingtalfi/Light_Kit_Admin_TaskScheduler/blob/master/doc/api/Ling/Light_Kit_Admin_TaskScheduler/Controller/Generated/Base/RealGenController/__construct.md) &ndash; Builds the instance.
- [RealGenController::render](https://github.com/lingtalfi/Light_Kit_Admin_TaskScheduler/blob/master/doc/api/Ling/Light_Kit_Admin_TaskScheduler/Controller/Generated/Base/RealGenController/render.md) &ndash; Renders a page to interact with a table data.
- [RealGenController::processForm](https://github.com/lingtalfi/Light_Kit_Admin_TaskScheduler/blob/master/doc/api/Ling/Light_Kit_Admin_TaskScheduler/Controller/Generated/Base/RealGenController/processForm.md) &ndash; or a response directly.
- [RealGenController::setOnSuccessIframeSignal](https://github.com/lingtalfi/Light_Kit_Admin_TaskScheduler/blob/master/doc/api/Ling/Light_Kit_Admin_TaskScheduler/Controller/Generated/Base/RealGenController/setOnSuccessIframeSignal.md) &ndash; Sets the iframeSignal to use in case of a valid form.
- [RealGenController::lateRealFormRegistration](https://github.com/lingtalfi/Light_Kit_Admin_TaskScheduler/blob/master/doc/api/Ling/Light_Kit_Admin_TaskScheduler/Controller/Generated/Base/RealGenController/lateRealFormRegistration.md) &ndash; Potentially register the plugin to the realform service.
- AdminPageController::renderAdminPage &ndash; if she is not connected yet.
- LightKitAdminController::setRoute &ndash; Sets the matching route to this controller instance.
- LightKitAdminController::getKitAdmin &ndash; Returns the kit admin service instance.
- LightKitAdminController::getFlasher &ndash; Returns a flasher instance.
- LightKitAdminController::getUser &ndash; Returns the current user.
- LightKitAdminController::renderPage &ndash; Renders the given page using the [kit service](https://github.com/lingtalfi/Light_Kit).
- LightKitAdminController::getRedirectResponseByRoute &ndash; Creates and returns an HttpRedirectResponse, based on the given arguments.
- LightKitAdminController::checkRight &ndash; Ensures that the current user is connected and has the right provided in the arguments.
- LightKitAdminController::checkMicroPermission &ndash; redirects to the access_denied page.
- LightKitAdminController::error &ndash; Throws an exception.
- LightController::setLight &ndash; Sets the light instance.
- LightController::getLight &ndash; Returns the light application.
- LightController::getContainer &ndash; Returns the service container.
- LightController::getHttpRequest &ndash; Returns the http request bound to the light instance.
- LightController::hasService &ndash; Returns whether the container contains the service which name is given.





Location
=============
Ling\Light_Kit_Admin_TaskScheduler\Controller\Generated\Base\RealGenController<br>
See the source code of [Ling\Light_Kit_Admin_TaskScheduler\Controller\Generated\Base\RealGenController](https://github.com/lingtalfi/Light_Kit_Admin_TaskScheduler/blob/master/Controller/Generated/Base/RealGenController.php)



SeeAlso
==============
Next class: [LtsTaskScheduleController](https://github.com/lingtalfi/Light_Kit_Admin_TaskScheduler/blob/master/doc/api/Ling/Light_Kit_Admin_TaskScheduler/Controller/Generated/LtsTaskScheduleController.md)<br>
