[Back to the Ling/Light_Kit_Admin_TaskScheduler api](https://github.com/lingtalfi/Light_Kit_Admin_TaskScheduler/blob/master/doc/api/Ling/Light_Kit_Admin_TaskScheduler.md)



The LtsTaskScheduleController class
================
2020-07-31 --> 2021-03-05






Introduction
============

The LtsTaskScheduleController class.



Class synopsis
==============


class <span class="pl-k">LtsTaskScheduleController</span> extends [RealAdminPageController](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/RealAdminPageController.md) implements [RouteAwareControllerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Controller/RouteAwareControllerInterface.md), [LightAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/LightAwareInterface.md), [LightControllerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Controller/LightControllerInterface.md) {

- Inherited properties
    - protected string [RealAdminPageController::$iframeSignal](#property-iframeSignal) ;
    - protected array [LightKitAdminController::$route](#property-route) ;
    - protected [Ling\Light\Core\Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) [LightController::$light](#property-light) ;

- Methods
    - public [renderList](https://github.com/lingtalfi/Light_Kit_Admin_TaskScheduler/blob/master/doc/api/Ling/Light_Kit_Admin_TaskScheduler/Controller/Generated/LtsTaskScheduleController/renderList.md)() : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md) | string
    - public [renderForm](https://github.com/lingtalfi/Light_Kit_Admin_TaskScheduler/blob/master/doc/api/Ling/Light_Kit_Admin_TaskScheduler/Controller/Generated/LtsTaskScheduleController/renderForm.md)() : string | [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)

- Inherited methods
    - public RealAdminPageController::__construct() : void
    - public RealAdminPageController::render() : string | [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)
    - protected RealAdminPageController::processForm(string $realformIdentifier, ?array &$nugget = [], ?array $options = []) : [Chloroform](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform.md) | [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)
    - public RealAdminPageController::setOnSuccessIframeSignal(string $iframeSignal) : void
    - public AdminPageController::renderAdminPage(string $page, ?$params = [], ?Ling\Light_Kit\PageConfigurationUpdator\PageConfUpdator $updator = null) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)
    - public LightKitAdminController::setRoute(array $route) : void
    - protected LightKitAdminController::getKitAdmin() : Ling\Light_Kit_Admin\Service\LightKitAdminService
    - protected LightKitAdminController::getFlasher() : Ling\Light_Flasher\Service\LightFlasherService
    - protected LightKitAdminController::getUser() : Ling\Light_User\LightWebsiteUser
    - protected LightKitAdminController::getValidWebsiteUser() : Ling\Light_User\LightWebsiteUser
    - public LightKitAdminController::renderPage(string $page, ?array $dynamicVariables = [], ?Ling\Light_Kit\PageConfigurationUpdator\PageConfUpdator $updator = null) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)
    - public LightKitAdminController::renderDefaultPage() : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)
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






Methods
==============

- [LtsTaskScheduleController::renderList](https://github.com/lingtalfi/Light_Kit_Admin_TaskScheduler/blob/master/doc/api/Ling/Light_Kit_Admin_TaskScheduler/Controller/Generated/LtsTaskScheduleController/renderList.md) &ndash; Renders the task schedule list page.
- [LtsTaskScheduleController::renderForm](https://github.com/lingtalfi/Light_Kit_Admin_TaskScheduler/blob/master/doc/api/Ling/Light_Kit_Admin_TaskScheduler/Controller/Generated/LtsTaskScheduleController/renderForm.md) &ndash; Renders the task schedule form page.
- RealAdminPageController::__construct &ndash; Builds the instance.
- RealAdminPageController::render &ndash; Renders a page to interact with a table data.
- RealAdminPageController::processForm &ndash; or a response directly.
- RealAdminPageController::setOnSuccessIframeSignal &ndash; Sets the iframeSignal to use in case of a valid form.
- AdminPageController::renderAdminPage &ndash; if she is not connected yet.
- LightKitAdminController::setRoute &ndash; Sets the matching route to this controller instance.
- LightKitAdminController::getKitAdmin &ndash; Returns the kit admin service instance.
- LightKitAdminController::getFlasher &ndash; Returns a flasher instance.
- LightKitAdminController::getUser &ndash; Returns the current user.
- LightKitAdminController::getValidWebsiteUser &ndash; Returns a valid website user, or throws an exception.
- LightKitAdminController::renderPage &ndash; Renders the given page using the [kit service](https://github.com/lingtalfi/Light_Kit).
- LightKitAdminController::renderDefaultPage &ndash; Renders the default page, and returns the corresponding http response.
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
Ling\Light_Kit_Admin_TaskScheduler\Controller\Generated\LtsTaskScheduleController<br>
See the source code of [Ling\Light_Kit_Admin_TaskScheduler\Controller\Generated\LtsTaskScheduleController](https://github.com/lingtalfi/Light_Kit_Admin_TaskScheduler/blob/master/Controller/Generated/LtsTaskScheduleController.php)



SeeAlso
==============
Previous class: [RealGenController](https://github.com/lingtalfi/Light_Kit_Admin_TaskScheduler/blob/master/doc/api/Ling/Light_Kit_Admin_TaskScheduler/Controller/Generated/Base/RealGenController.md)<br>Next class: [LightKitAdminTaskSchedulerLkaPlugin](https://github.com/lingtalfi/Light_Kit_Admin_TaskScheduler/blob/master/doc/api/Ling/Light_Kit_Admin_TaskScheduler/LightKitAdminPlugin/Generated/LightKitAdminTaskSchedulerLkaPlugin.md)<br>
