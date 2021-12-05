[Back to the Ling/Light_MicroPermission api](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission.md)



The LightMicroPermissionService class
================
2019-09-26 --> 2021-06-17






Introduction
============

The LightMicroPermissionService class.



Class synopsis
==============


class <span class="pl-k">LightMicroPermissionService</span>  {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected array [$map](#property-map) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/Service/LightMicroPermissionService/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/Service/LightMicroPermissionService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [registerMicroPermissionsToOpenSystemByProfile](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/Service/LightMicroPermissionService/registerMicroPermissionsToOpenSystemByProfile.md)(string $file) : void
    - public [unregisterMicroPermissionsToOpenSystemByProfile](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/Service/LightMicroPermissionService/unregisterMicroPermissionsToOpenSystemByProfile.md)(string $file) : void
    - public [registerMicroPermissionsByFile](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/Service/LightMicroPermissionService/registerMicroPermissionsByFile.md)(string $file) : void
    - public [registerMicroPermissionsByProfile](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/Service/LightMicroPermissionService/registerMicroPermissionsByProfile.md)(string $file) : void
    - public [checkMicroPermission](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/Service/LightMicroPermissionService/checkMicroPermission.md)(string $microPermission) : void
    - public [hasMicroPermission](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/Service/LightMicroPermissionService/hasMicroPermission.md)(string $microPermission) : bool
    - private [cleanUpAsterisks](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/Service/LightMicroPermissionService/cleanUpAsterisks.md)(array &$arr) : void
    - private [cleanUpEmptyArrays](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/Service/LightMicroPermissionService/cleanUpEmptyArrays.md)(array &$arr, ?array $testedArray = [], ?string $path = ) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-map"><b>map</b></span>

    This property holds the map for this instance.
    It's an array of micro-permission => (array of) permissions.
    
    



Methods
==============

- [LightMicroPermissionService::__construct](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/Service/LightMicroPermissionService/__construct.md) &ndash; Builds the LightMicroPermissionService instance.
- [LightMicroPermissionService::setContainer](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/Service/LightMicroPermissionService/setContainer.md) &ndash; Sets the container.
- [LightMicroPermissionService::registerMicroPermissionsToOpenSystemByProfile](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/Service/LightMicroPermissionService/registerMicroPermissionsToOpenSystemByProfile.md) &ndash; Registers the micro-permissions profile using our open system.
- [LightMicroPermissionService::unregisterMicroPermissionsToOpenSystemByProfile](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/Service/LightMicroPermissionService/unregisterMicroPermissionsToOpenSystemByProfile.md) &ndash; Unregisters the micro-permissions profile from our open system.
- [LightMicroPermissionService::registerMicroPermissionsByFile](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/Service/LightMicroPermissionService/registerMicroPermissionsByFile.md) &ndash; Register the micro-permission bindings defined in the given file.
- [LightMicroPermissionService::registerMicroPermissionsByProfile](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/Service/LightMicroPermissionService/registerMicroPermissionsByProfile.md) &ndash; Registers the micro-permissions profile.
- [LightMicroPermissionService::checkMicroPermission](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/Service/LightMicroPermissionService/checkMicroPermission.md) &ndash; Checks that the user has the given micro-permission, and throws an exception if that's not the case.
- [LightMicroPermissionService::hasMicroPermission](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/Service/LightMicroPermissionService/hasMicroPermission.md) &ndash; Returns whether the current user has the given micro-permission.
- [LightMicroPermissionService::cleanUpAsterisks](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/Service/LightMicroPermissionService/cleanUpAsterisks.md) &ndash; Cleans up asterisks recursively in the given array.
- [LightMicroPermissionService::cleanUpEmptyArrays](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/Service/LightMicroPermissionService/cleanUpEmptyArrays.md) &ndash; Cleans up empty arrays recursively in the given array.





Location
=============
Ling\Light_MicroPermission\Service\LightMicroPermissionService<br>
See the source code of [Ling\Light_MicroPermission\Service\LightMicroPermissionService](https://github.com/lingtalfi/Light_MicroPermission/blob/master/Service/LightMicroPermissionService.php)



SeeAlso
==============
Previous class: [LightMicroPermissionException](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/Exception/LightMicroPermissionException.md)<br>Next class: [TestLightMicroPermissionService](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/Service/TestLightMicroPermissionService.md)<br>
