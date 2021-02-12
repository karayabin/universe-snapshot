Light_Initializer
===========
2019-04-05



2019-12-16: deprecated since Light 0.50, which provides a multi-level initializer system.


An initializer system for the [Light](https://github.com/lingtalfi/Light) framework.

This is a [Light framework plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

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
- [Initializer conception notes](https://github.com/lingtalfi/Light_Initializer/blob/master/doc/pages/initializer-conception-notes.md)
- [Services](#services)






Services
=========

Here is the content of the service configuration file:

```yaml
initializer:
    instance: Ling\Light_Initializer\Util\LightInitializerUtil

```


The "initializer" service is called by the Light instance, at the beginning of the **run** method,
just after the http request object is ready.

It allows for other plugins to initialize themselves using the Light instance, or the HttpRequest instance.

Examples of use includes:

- collecting statistical data using the http request instance (browser country origin, ip, etc...)
- registering routes and/or error handlers using the Light instance


An initializer must implement the [LightInitializerInterface](https://github.com/lingtalfi/Light_Initializer/blob/master/doc/api/Ling/Light_Initializer/Initializer/LightInitializerInterface.md) interface provided by this planet.


The initializer util can now handle the concept of slots and dependency.
See more in the [initializer conception notes](https://github.com/lingtalfi/Light_Initializer/blob/master/doc/pages/initializer-conception-notes.md) document.





History Log
=============

- 1.3.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.3.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.3.0 -- 2019-12-16

    - deprecation notice
    
- 1.2.2 -- 2019-09-11

    - fix LightInitializerUtil->initializeItemRecursive careless mistake
    
- 1.2.1 -- 2019-09-10

    - fix typos
    
- 1.2.0 -- 2019-09-10

    - add slots and dependency concepts
    - removed setInitializers method

- 1.1.2 -- 2019-07-18

    - update docTools documentation, add links to source code for classes and methods
    
- 1.1.1 -- 2019-07-17

    - removed response argument from LightInitializerInterface.initialize method
    
- 1.1.0 -- 2019-07-16

    - add response argument to LightInitializerInterface.initialize method
    
- 1.0.0 -- 2019-04-05

    - initial commit