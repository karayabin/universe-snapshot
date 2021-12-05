[Back to the Ling/Light_Kit_Admin_UserPreferences api](https://github.com/lingtalfi/Light_Kit_Admin_UserPreferences/blob/master/doc/api/Ling/Light_Kit_Admin_UserPreferences.md)



The LightKitAdminUserPreferencesControllerHubHandler class
================
2020-08-13 --> 2021-06-18






Introduction
============

The LightKitAdminUserPreferencesControllerHubHandler class.



Class synopsis
==============


class <span class="pl-k">LightKitAdminUserPreferencesControllerHubHandler</span> extends [LightBaseControllerHubHandler](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/ControllerHubHandler/LightBaseControllerHubHandler.md) implements [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md), [LightControllerHubHandlerInterface](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/ControllerHubHandler/LightControllerHubHandlerInterface.md) {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightBaseControllerHubHandler::$container](#property-container) ;

- Methods
    - public [handle](https://github.com/lingtalfi/Light_Kit_Admin_UserPreferences/blob/master/doc/api/Ling/Light_Kit_Admin_UserPreferences/Light_ControllerHub/Generated/LightKitAdminUserPreferencesControllerHubHandler/handle.md)(string $controllerIdentifier, Ling\Light\Http\HttpRequestInterface $request) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)

- Inherited methods
    - public LightBaseControllerHubHandler::__construct() : void
    - public LightBaseControllerHubHandler::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - protected LightBaseControllerHubHandler::doHandle(string $controllerDir, string $controllerIdentifier, Ling\Light\Http\HttpRequestInterface $request) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)

}






Methods
==============

- [LightKitAdminUserPreferencesControllerHubHandler::handle](https://github.com/lingtalfi/Light_Kit_Admin_UserPreferences/blob/master/doc/api/Ling/Light_Kit_Admin_UserPreferences/Light_ControllerHub/Generated/LightKitAdminUserPreferencesControllerHubHandler/handle.md) &ndash; Process the given controllerIdentifier and returns an appropriate http response.
- LightBaseControllerHubHandler::__construct &ndash; Builds the LightKitAdminControllerHubHandler instance.
- LightBaseControllerHubHandler::setContainer &ndash; Sets the light service container interface.
- LightBaseControllerHubHandler::doHandle &ndash; Executes the controller identified by the given controllerDir and controllerIdentifier, and returns the appropriate http response.





Location
=============
Ling\Light_Kit_Admin_UserPreferences\Light_ControllerHub\Generated\LightKitAdminUserPreferencesControllerHubHandler<br>
See the source code of [Ling\Light_Kit_Admin_UserPreferences\Light_ControllerHub\Generated\LightKitAdminUserPreferencesControllerHubHandler](https://github.com/lingtalfi/Light_Kit_Admin_UserPreferences/blob/master/Light_ControllerHub/Generated/LightKitAdminUserPreferencesControllerHubHandler.php)



SeeAlso
==============
Previous class: [LupUserPreferenceController](https://github.com/lingtalfi/Light_Kit_Admin_UserPreferences/blob/master/doc/api/Ling/Light_Kit_Admin_UserPreferences/Controller/Generated/LupUserPreferenceController.md)<br>Next class: [LightKitAdminUserPreferencesPlanetInstaller](https://github.com/lingtalfi/Light_Kit_Admin_UserPreferences/blob/master/doc/api/Ling/Light_Kit_Admin_UserPreferences/Light_PlanetInstaller/LightKitAdminUserPreferencesPlanetInstaller.md)<br>
