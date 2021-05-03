Ling/Light_Nugget
================
2020-08-21 --> 2021-03-15




Table of contents
===========

- [LightNuggetException](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/api/Ling/Light_Nugget/Exception/LightNuggetException.md) &ndash; The LightNuggetException class.
- [LightNuggetSecurityHandlerInterface](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/api/Ling/Light_Nugget/SecurityHandler/LightNuggetSecurityHandlerInterface.md) &ndash; The LightNuggetSecurityHandlerInterface interface.
    - [LightNuggetSecurityHandlerInterface::isGranted](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/api/Ling/Light_Nugget/SecurityHandler/LightNuggetSecurityHandlerInterface/isGranted.md) &ndash; Returns whether the current user is granted an action defined the given parameters.
- [LightNuggetService](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/api/Ling/Light_Nugget/Service/LightNuggetService.md) &ndash; The LightNuggetService class.
    - [LightNuggetService::__construct](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/api/Ling/Light_Nugget/Service/LightNuggetService/__construct.md) &ndash; Builds the LightNuggetService instance.
    - [LightNuggetService::setContainer](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/api/Ling/Light_Nugget/Service/LightNuggetService/setContainer.md) &ndash; Sets the container.
    - [LightNuggetService::getNuggetByPath](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/api/Ling/Light_Nugget/Service/LightNuggetService/getNuggetByPath.md) &ndash; Returns the nugget configuration from its path.
    - [LightNuggetService::getNugget](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/api/Ling/Light_Nugget/Service/LightNuggetService/getNugget.md) &ndash; Returns the output of the [getNuggetByPath method](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/api/Ling/Light_Nugget/Service/LightNuggetService/getNuggetByPath.md).
    - [LightNuggetService::getNuggetDirective](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/api/Ling/Light_Nugget/Service/LightNuggetService/getNuggetDirective.md) &ndash; Returns the value of the directive identified by the given nuggetDirectiveId and relPath.
    - [LightNuggetService::checkSecurity](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/api/Ling/Light_Nugget/Service/LightNuggetService/checkSecurity.md) &ndash; Check that the user is granted the permission to execute an action, and throws an exception if that's not the case.
    - [LightNuggetService::resolveVariables](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/api/Ling/Light_Nugget/Service/LightNuggetService/resolveVariables.md) &ndash; Resolve the variables in place in the given nugget.


Dependencies
============
- [ArrayVariableResolver](https://github.com/lingtalfi/ArrayVariableResolver)
- [BabyYaml](https://github.com/lingtalfi/BabyYaml)
- [Bat](https://github.com/lingtalfi/Bat)
- [Light](https://github.com/lingtalfi/Light)
- [Light_MicroPermission](https://github.com/lingtalfi/Light_MicroPermission)
- [Light_UserManager](https://github.com/lingtalfi/Light_UserManager)


