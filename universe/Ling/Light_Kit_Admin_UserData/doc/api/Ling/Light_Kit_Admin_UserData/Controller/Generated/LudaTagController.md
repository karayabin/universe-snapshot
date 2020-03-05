[Back to the Ling/Light_Kit_Admin_UserData api](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData.md)



The LudaTagController class
================
2020-02-28 --> 2020-03-05






Introduction
============

The LudaTagController class.



Class synopsis
==============


class <span class="pl-k">LudaTagController</span> extends [RealGenController](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Controller/Generated/Base/RealGenController.md) implements [RouteAwareControllerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Controller/RouteAwareControllerInterface.md), [LightControllerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Controller/LightControllerInterface.md), [LightAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/LightAwareInterface.md) {

- Inherited properties
    - protected string [RealGenController::$iframeSignal](#property-iframeSignal) ;
    - protected array [LightKitAdminController::$route](#property-route) ;
    - protected [Ling\Light\Core\Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) [LightController::$light](#property-light) ;

- Methods
    - public [renderList](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Controller/Generated/LudaTagController/renderList.md)() : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md) | string
    - public [renderForm](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Controller/Generated/LudaTagController/renderForm.md)() : string | [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)

- Inherited methods
    - public [RealGenController::__construct](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Controller/Generated/Base/RealGenController/__construct.md)() : void
    - public [RealGenController::render](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Controller/Generated/Base/RealGenController/render.md)() : string | [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)
    - protected [RealGenController::processForm](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Controller/Generated/Base/RealGenController/processForm.md)(string $realformIdentifier, string $table) : [Chloroform](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform.md)
    - public [RealGenController::setOnSuccessIframeSignal](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Controller/Generated/Base/RealGenController/setOnSuccessIframeSignal.md)(string $iframeSignal) : void
    - public AdminPageController::renderAdminPage(string $page, ?$params = [], ?Ling\Light_Kit\PageConfigurationUpdator\PageConfUpdator $updator = null) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)
    - public LightKitAdminController::setRoute(array $route) : void
    - protected LightKitAdminController::getKitAdmin() : Ling\Light_Kit_Admin\Service\LightKitAdminService
    - protected LightKitAdminController::getFlasher() : Ling\Light_Flasher\Service\LightFlasherService
    - protected LightKitAdminController::getUser() : Ling\Light_User\WebsiteLightUser
    - public LightKitAdminController::renderPage(string $page, ?array $dynamicVariables = [], ?Ling\Light_Kit\PageConfigurationUpdator\PageConfUpdator $updator = null) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)
    - protected LightKitAdminController::redirectByRoute(string $redirectRoute) : void
    - protected LightKitAdminController::checkRight(string $right) : void
    - protected LightKitAdminController::checkMicroPermission(string $microPermission) : void
    - protected LightKitAdminController::error(string $msg) : void
    - public LightController::setLight([Ling\Light\Core\Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) $light) : void
    - protected LightController::getLight() : [Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md)
    - protected LightController::getContainer() : [LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md)
    - protected LightController::getHttpRequest() : Ling\Light\Http\HttpRequestInterface

}






Methods
==============

- [LudaTagController::renderList](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Controller/Generated/LudaTagController/renderList.md) &ndash; Renders the tag list page.
- [LudaTagController::renderForm](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Controller/Generated/LudaTagController/renderForm.md) &ndash; Renders the tag form page.
- [RealGenController::__construct](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Controller/Generated/Base/RealGenController/__construct.md) &ndash; Builds the instance.
- [RealGenController::render](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Controller/Generated/Base/RealGenController/render.md) &ndash; Renders a page to interact with a table data.
- [RealGenController::processForm](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Controller/Generated/Base/RealGenController/processForm.md) &ndash; Applies a standard routine to the form identified by the given realformIdentifier, and returns a chloroform instance.
- [RealGenController::setOnSuccessIframeSignal](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Controller/Generated/Base/RealGenController/setOnSuccessIframeSignal.md) &ndash; Sets the iframeSignal to use in case of a valid form.
- AdminPageController::renderAdminPage &ndash; if she is not connected yet.
- LightKitAdminController::setRoute &ndash; Sets the matching route to this controller instance.
- LightKitAdminController::getKitAdmin &ndash; Returns the kit admin service instance.
- LightKitAdminController::getFlasher &ndash; Returns a flasher instance.
- LightKitAdminController::getUser &ndash; Returns the current user.
- LightKitAdminController::renderPage &ndash; Renders the given page using the [kit service](https://github.com/lingtalfi/Light_Kit).
- LightKitAdminController::redirectByRoute &ndash; Redirects the user to the given route.
- LightKitAdminController::checkRight &ndash; Ensures that the current user is connected and has the right provided in the arguments.
- LightKitAdminController::checkMicroPermission &ndash; redirects to the access_denied page.
- LightKitAdminController::error &ndash; Throws an exception.
- LightController::setLight &ndash; Sets the light instance.
- LightController::getLight &ndash; Returns the light application.
- LightController::getContainer &ndash; Returns the service container.
- LightController::getHttpRequest &ndash; Returns the http request bound to the light instance.





Location
=============
Ling\Light_Kit_Admin_UserData\Controller\Generated\LudaTagController<br>
See the source code of [Ling\Light_Kit_Admin_UserData\Controller\Generated\LudaTagController](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/Controller/Generated/LudaTagController.php)



SeeAlso
==============
Previous class: [LudaResourceHasTagController](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/Controller/Generated/LudaResourceHasTagController.md)<br>Next class: [LightKitAdminUserDataControllerHubHandler](https://github.com/lingtalfi/Light_Kit_Admin_UserData/blob/master/doc/api/Ling/Light_Kit_Admin_UserData/ControllerHub/LightKitAdminUserDataControllerHubHandler.md)<br>
