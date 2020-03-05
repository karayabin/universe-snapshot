[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)



The CustomLudUserController class
================
2019-05-17 --> 2019-12-17






Introduction
============

The CustomLudUserController class.



Class synopsis
==============


class <span class="pl-k">CustomLudUserController</span> extends [LudUserController](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/Generated/LudUserController.md) implements [LightAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/LightAwareInterface.md), [LightControllerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Controller/LightControllerInterface.md), [RouteAwareControllerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Controller/RouteAwareControllerInterface.md) {

- Inherited properties
    - protected string [RealGenController::$iframeSignal](#property-iframeSignal) ;
    - protected array [LightKitAdminController::$route](#property-route) ;
    - protected [Ling\Light\Core\Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) [LightController::$light](#property-light) ;

- Inherited methods
    - public [LudUserController::renderList](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/Generated/LudUserController/renderList.md)() : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md) | string
    - public [LudUserController::renderForm](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/Generated/LudUserController/renderForm.md)() : string | [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)
    - public [RealGenController::__construct](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/Generated/Base/RealGenController/__construct.md)() : void
    - public [RealGenController::render](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/Generated/Base/RealGenController/render.md)() : string | [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)
    - protected [RealGenController::processForm](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/Generated/Base/RealGenController/processForm.md)(string $realformIdentifier, string $table, string $pluginName) : [Chloroform](https://github.com/lingtalfi/Chloroform/blob/master/doc/api/Ling/Chloroform/Form/Chloroform.md)
    - public [RealGenController::setOnSuccessIframeSignal](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/Generated/Base/RealGenController/setOnSuccessIframeSignal.md)(string $iframeSignal) : void
    - public [AdminPageController::renderAdminPage](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/AdminPageController/renderAdminPage.md)(string $page, ?$params = [], ?Ling\Light_Kit\PageConfigurationUpdator\PageConfUpdator $updator = null) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)
    - public [LightKitAdminController::setRoute](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/LightKitAdminController/setRoute.md)(array $route) : void
    - protected [LightKitAdminController::getKitAdmin](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/LightKitAdminController/getKitAdmin.md)() : [LightKitAdminService](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Service/LightKitAdminService.md)
    - protected [LightKitAdminController::getFlasher](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/LightKitAdminController/getFlasher.md)() : [LightFlasherService](https://github.com/lingtalfi/Light_Flasher/blob/master/doc/api/Ling/Light_Flasher/Service/LightFlasherService.md)
    - protected [LightKitAdminController::getUser](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/LightKitAdminController/getUser.md)() : [WebsiteLightUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser.md)
    - public [LightKitAdminController::renderPage](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/LightKitAdminController/renderPage.md)(string $page, ?array $dynamicVariables = [], ?Ling\Light_Kit\PageConfigurationUpdator\PageConfUpdator $updator = null) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)
    - protected [LightKitAdminController::redirectByRoute](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/LightKitAdminController/redirectByRoute.md)(string $redirectRoute) : void
    - protected [LightKitAdminController::checkRight](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/LightKitAdminController/checkRight.md)(string $right) : void
    - protected [LightKitAdminController::checkMicroPermission](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/LightKitAdminController/checkMicroPermission.md)(string $microPermission) : void
    - protected [LightKitAdminController::error](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/LightKitAdminController/error.md)(string $msg) : void
    - public LightController::setLight([Ling\Light\Core\Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) $light) : void
    - protected LightController::getLight() : [Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md)
    - protected LightController::getContainer() : [LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md)
    - protected LightController::getHttpRequest() : Ling\Light\Http\HttpRequestInterface

}






Methods
==============

- [LudUserController::renderList](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/Generated/LudUserController/renderList.md) &ndash; Renders the user list page.
- [LudUserController::renderForm](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/Generated/LudUserController/renderForm.md) &ndash; Renders the user form page.
- [RealGenController::__construct](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/Generated/Base/RealGenController/__construct.md) &ndash; Builds the instance.
- [RealGenController::render](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/Generated/Base/RealGenController/render.md) &ndash; Renders a page to interact with a table data.
- [RealGenController::processForm](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/Generated/Base/RealGenController/processForm.md) &ndash; Applies a standard routine to the form identified by the given realformIdentifier, and returns a chloroform instance.
- [RealGenController::setOnSuccessIframeSignal](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/Generated/Base/RealGenController/setOnSuccessIframeSignal.md) &ndash; Sets the iframeSignal to use in case of a valid form.
- [AdminPageController::renderAdminPage](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/AdminPageController/renderAdminPage.md) &ndash; if she is not connected yet.
- [LightKitAdminController::setRoute](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/LightKitAdminController/setRoute.md) &ndash; Sets the matching route to this controller instance.
- [LightKitAdminController::getKitAdmin](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/LightKitAdminController/getKitAdmin.md) &ndash; Returns the kit admin service instance.
- [LightKitAdminController::getFlasher](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/LightKitAdminController/getFlasher.md) &ndash; Returns a flasher instance.
- [LightKitAdminController::getUser](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/LightKitAdminController/getUser.md) &ndash; Returns the current user.
- [LightKitAdminController::renderPage](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/LightKitAdminController/renderPage.md) &ndash; Renders the given page using the [kit service](https://github.com/lingtalfi/Light_Kit_Admin).
- [LightKitAdminController::redirectByRoute](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/LightKitAdminController/redirectByRoute.md) &ndash; Redirects the user to the given route.
- [LightKitAdminController::checkRight](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/LightKitAdminController/checkRight.md) &ndash; Ensures that the current user is connected and has the right provided in the arguments.
- [LightKitAdminController::checkMicroPermission](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/LightKitAdminController/checkMicroPermission.md) &ndash; redirects to the access_denied page.
- [LightKitAdminController::error](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/LightKitAdminController/error.md) &ndash; Throws an exception.
- LightController::setLight &ndash; Sets the light instance.
- LightController::getLight &ndash; Returns the light application.
- LightController::getContainer &ndash; Returns the service container.
- LightController::getHttpRequest &ndash; Returns the http request bound to the light instance.





Location
=============
Ling\Light_Kit_Admin\Controller\Generated\Custom\CustomLudUserController<br>
See the source code of [Ling\Light_Kit_Admin\Controller\Generated\Custom\CustomLudUserController](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/Controller/Generated/Custom/CustomLudUserController.php)



SeeAlso
==============
Previous class: [CustomLudPermissionGroupHasPermissionController](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/Generated/Custom/CustomLudPermissionGroupHasPermissionController.md)<br>Next class: [CustomLudUserHasPermissionGroupController](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/Generated/Custom/CustomLudUserHasPermissionGroupController.md)<br>
