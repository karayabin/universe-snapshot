Light_Initializer
===========
2019-04-05



An initializer system for the [Light](https://github.com/lingtalfi/Light) framework.

This is a [Light framework plugin](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_Initializer
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_Initializer api](https://github.com/lingtalfi/Light_Initializer/blob/master/doc/api/Ling/Light_Initializer.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)






Services
=========

Here is the content of the service configuration file:

```yaml
initializer:
    instance: Ling\Light_Initializer\Util\LightInitializerUtil
    methods:
        setInitializers:
            initializers: []

```


The "initializer" service is called by the Light instance, at the beginning of the **run** method,
just after the http request object is ready.





History Log
=============

- 1.0.0 -- 2019-04-05

    - initial commit