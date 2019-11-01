Ling/Light_MicroPermission
================
2019-09-26 --> 2019-10-30




Table of contents
===========

- [LightMicroPermissionException](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/Exception/LightMicroPermissionException.md) &ndash; The LightMicroPermissionException class.
- [BabyYamlMicroPermissionResolver](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/MicroPermissionResolver/BabyYamlMicroPermissionResolver.md) &ndash; The BabyYamlMicroPermissionResolver class.
    - [BabyYamlMicroPermissionResolver::__construct](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/MicroPermissionResolver/BabyYamlMicroPermissionResolver/__construct.md) &ndash; Builds the BabyYamlMicroPermissionResolver instance.
    - [BabyYamlMicroPermissionResolver::resolve](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/MicroPermissionResolver/BabyYamlMicroPermissionResolver/resolve.md) &ndash; Returns the permission corresponding to the given micro-permission.
    - [BabyYamlMicroPermissionResolver::setFile](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/MicroPermissionResolver/BabyYamlMicroPermissionResolver/setFile.md) &ndash; Sets the file.
- [LightMicroPermissionResolverInterface](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/MicroPermissionResolver/LightMicroPermissionResolverInterface.md) &ndash; The LightMicroPermissionResolverInterface interface.
    - [LightMicroPermissionResolverInterface::resolve](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/MicroPermissionResolver/LightMicroPermissionResolverInterface/resolve.md) &ndash; Returns the permission corresponding to the given micro-permission.
- [LightMicroPermissionService](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/Service/LightMicroPermissionService.md) &ndash; The LightMicroPermissionService class.
    - [LightMicroPermissionService::__construct](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/Service/LightMicroPermissionService/__construct.md) &ndash; Builds the LightMicroPermissionService instance.
    - [LightMicroPermissionService::setContainer](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/Service/LightMicroPermissionService/setContainer.md) &ndash; Sets the container.
    - [LightMicroPermissionService::registerMicroPermissionResolver](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/Service/LightMicroPermissionService/registerMicroPermissionResolver.md) &ndash; Registers a micro permission resolver for a given plugin.
    - [LightMicroPermissionService::hasMicroPermission](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission/Service/LightMicroPermissionService/hasMicroPermission.md) &ndash; Returns whether the current user has the given micro-permission.


Dependencies
============
- [BabyYaml](https://github.com/lingtalfi/BabyYaml)
- [Light](https://github.com/lingtalfi/Light)
- [Light_User](https://github.com/lingtalfi/Light_User)


