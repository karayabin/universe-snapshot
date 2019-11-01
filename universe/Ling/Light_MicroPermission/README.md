Light_MicroPermission
===========
2019-09-26



A light service to handle permissions with an extra layer of organization.

This is a [Light framework plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_MicroPermission
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_MicroPermission api](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/api/Ling/Light_MicroPermission.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/pages/conception-notes.md)
    - [Recommended micro permission notation](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/pages/recommended-micropermission-notation.md)
- [Services](#services)



Services
=========


This plugin provides the following services:

- micro_permission (returns a LightMicroPermissionService instance)



Here is an example of the service configuration:

```yaml
micro_permission:
    instance: Ling\Light_MicroPermission\Service\LightMicroPermissionService
    methods:
        setContainer:
            container: @container()

```



History Log
=============

- 1.1.2 -- 2019-10-30

    - add "Recommended micro permission notation" document
    
- 1.1.1 -- 2019-09-27

    - fix typo
    
- 1.1.0 -- 2019-09-27

    - add BabyYamlMicroPermissionResolver
    - fix LightMicroPermissionResolverInterface using microPermissionId instead of microPermission
    
- 1.0.0 -- 2019-09-26

    - initial commit