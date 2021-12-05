[Back to the Ling/Light_Kit_Admin_Kit_Editor api](https://github.com/lingtalfi/Light_Kit_Admin_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Admin_Kit_Editor.md)



The LkeEditorController class
================
2021-06-18 --> 2021-06-18






Introduction
============

The LkeEditorController class.



Class synopsis
==============


class <span class="pl-k">LkeEditorController</span> extends [AdminPageController](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/AdminPageController.md) implements [LightControllerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Controller/LightControllerInterface.md), [LightAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/LightAwareInterface.md), [RouteAwareControllerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Controller/RouteAwareControllerInterface.md) {

- Inherited properties
    - protected array [LightKitAdminController::$route](#property-route) ;
    - protected [Ling\Light\Core\Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) [LightController::$light](#property-light) ;

- Methods
    - public [render](https://github.com/lingtalfi/Light_Kit_Admin_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Admin_Kit_Editor/Controller/Editor/LkeEditorController/render.md)() : string | [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)
    - public [removeWebsite](https://github.com/lingtalfi/Light_Kit_Admin_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Admin_Kit_Editor/Controller/Editor/LkeEditorController/removeWebsite.md)(Ling\Light\Http\HttpRequestInterface $request) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)
    - public [updateKitStoreToken](https://github.com/lingtalfi/Light_Kit_Admin_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Admin_Kit_Editor/Controller/Editor/LkeEditorController/updateKitStoreToken.md)(Ling\Light\Http\HttpRequestInterface $request) : [HttpJsonResponse](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpJsonResponse.md)
    - public [addWebsite](https://github.com/lingtalfi/Light_Kit_Admin_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Admin_Kit_Editor/Controller/Editor/LkeEditorController/addWebsite.md)(Ling\Light\Http\HttpRequestInterface $request) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)
    - private [executeHandlerMethodByWebsiteIdentifier](https://github.com/lingtalfi/Light_Kit_Admin_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Admin_Kit_Editor/Controller/Editor/LkeEditorController/executeHandlerMethodByWebsiteIdentifier.md)(string $identifier, string $method, ?array $options = []) : mixed
    - private [clientError](https://github.com/lingtalfi/Light_Kit_Admin_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Admin_Kit_Editor/Controller/Editor/LkeEditorController/clientError.md)(string $errorMessage) : void
    - private [getKitEditorService](https://github.com/lingtalfi/Light_Kit_Admin_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Admin_Kit_Editor/Controller/Editor/LkeEditorController/getKitEditorService.md)() : [LightKitEditorService](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Editor/Service/LightKitEditorService.md)
    - private [handleHandyException](https://github.com/lingtalfi/Light_Kit_Admin_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Admin_Kit_Editor/Controller/Editor/LkeEditorController/handleHandyException.md)(Exception $e) : void

- Inherited methods
    - public AdminPageController::__construct() : void
    - public AdminPageController::renderAdminPage(string $page, ?array $options = []) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)
    - public LightKitAdminController::setRoute(array $route) : void
    - protected LightKitAdminController::getKitAdmin() : Ling\Light_Kit_Admin\Service\LightKitAdminService
    - protected LightKitAdminController::getFlasher() : Ling\Light_Flasher\Service\LightFlasherService
    - protected LightKitAdminController::getUser() : Ling\Light_User\LightWebsiteUser
    - protected LightKitAdminController::getValidWebsiteUser() : Ling\Light_User\LightWebsiteUser
    - public LightKitAdminController::renderPage(string $page, ?array $options = []) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)
    - public LightKitAdminController::renderDefaultPage() : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)
    - protected LightKitAdminController::getRedirectResponseByRoute(string $route, ?array $urlParams = []) : Ling\Light\Http\HttpRedirectResponse
    - protected LightKitAdminController::alcpResponse(callable $callable) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)
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

- [LkeEditorController::render](https://github.com/lingtalfi/Light_Kit_Admin_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Admin_Kit_Editor/Controller/Editor/LkeEditorController/render.md) &ndash; Renders the lke editor page and returns the result.
- [LkeEditorController::removeWebsite](https://github.com/lingtalfi/Light_Kit_Admin_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Admin_Kit_Editor/Controller/Editor/LkeEditorController/removeWebsite.md) &ndash; Ajax service to remove a website.
- [LkeEditorController::updateKitStoreToken](https://github.com/lingtalfi/Light_Kit_Admin_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Admin_Kit_Editor/Controller/Editor/LkeEditorController/updateKitStoreToken.md) &ndash; Updates the kit store token.
- [LkeEditorController::addWebsite](https://github.com/lingtalfi/Light_Kit_Admin_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Admin_Kit_Editor/Controller/Editor/LkeEditorController/addWebsite.md) &ndash; Ajax service to add a website.
- [LkeEditorController::executeHandlerMethodByWebsiteIdentifier](https://github.com/lingtalfi/Light_Kit_Admin_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Admin_Kit_Editor/Controller/Editor/LkeEditorController/executeHandlerMethodByWebsiteIdentifier.md) &ndash; Executes a method of the lke handler corresponding to the website which identifier is given.
- [LkeEditorController::clientError](https://github.com/lingtalfi/Light_Kit_Admin_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Admin_Kit_Editor/Controller/Editor/LkeEditorController/clientError.md) &ndash; Throws a ClientErrorException exception.
- [LkeEditorController::getKitEditorService](https://github.com/lingtalfi/Light_Kit_Admin_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Admin_Kit_Editor/Controller/Editor/LkeEditorController/getKitEditorService.md) &ndash; Returns the kit editor service instance.
- [LkeEditorController::handleHandyException](https://github.com/lingtalfi/Light_Kit_Admin_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Admin_Kit_Editor/Controller/Editor/LkeEditorController/handleHandyException.md) &ndash; Handles the given [handy exception](https://github.com/lingtalfi/TheBar/blob/master/discussions/handy-exception.md).
- AdminPageController::__construct &ndash; Builds the LightController instance.
- AdminPageController::renderAdminPage &ndash; if she is not connected yet.
- LightKitAdminController::setRoute &ndash; Sets the matching route to this controller instance.
- LightKitAdminController::getKitAdmin &ndash; Returns the kit admin service instance.
- LightKitAdminController::getFlasher &ndash; Returns a flasher instance.
- LightKitAdminController::getUser &ndash; Returns the current user.
- LightKitAdminController::getValidWebsiteUser &ndash; Returns a valid website user, or throws an exception.
- LightKitAdminController::renderPage &ndash; Renders the given page using the [kit service](https://github.com/lingtalfi/Light_Kit).
- LightKitAdminController::renderDefaultPage &ndash; Renders the default page, and returns the corresponding http response.
- LightKitAdminController::getRedirectResponseByRoute &ndash; Creates and returns an HttpRedirectResponse, based on the given arguments.
- LightKitAdminController::alcpResponse &ndash; Returns a response using the Ling.Light_AjaxHandler handler under the hood.
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
Ling\Light_Kit_Admin_Kit_Editor\Controller\Editor\LkeEditorController<br>
See the source code of [Ling\Light_Kit_Admin_Kit_Editor\Controller\Editor\LkeEditorController](https://github.com/lingtalfi/Light_Kit_Admin_Kit_Editor/blob/master/Controller/Editor/LkeEditorController.php)



SeeAlso
==============
Next class: [LkeBlockController](https://github.com/lingtalfi/Light_Kit_Admin_Kit_Editor/blob/master/doc/api/Ling/Light_Kit_Admin_Kit_Editor/Controller/Generated/LkeBlockController.md)<br>
