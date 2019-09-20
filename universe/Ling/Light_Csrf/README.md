Light_Csrf
===========
2019-09-20



A csrf protection service for the [Light](https://github.com/lingtalfi/Light) framework.

This is a [Light framework plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_Csrf
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_Csrf api](https://github.com/lingtalfi/Light_Csrf/blob/master/doc/api/Ling/Light_Csrf.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)




Services
=========


This plugin provides the following services:

- csrf (returns a LightCsrfService instance)



Here is an example of the service configuration:

```yaml
csrf:
    instance: Ling\Light_Csrf\Service\LightCsrfService
    methods:
        setUsePage:
            bool: true

```



History Log
=============

- 1.0.0 -- 2019-09-20

    - initial commit