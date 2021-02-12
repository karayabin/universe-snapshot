Light_PrettyError
===========
2019-04-05



An error message handler for the [Light](https://github.com/lingtalfi/Light) framework.
This is a [Light framework plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).




Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_PrettyError
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_PrettyError api](https://github.com/lingtalfi/Light_PrettyError/blob/master/doc/api/Ling/Light_PrettyError.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)



Services
=========

Here is the content of the service configuration file:

```yaml
pretty_error:
    instance: Ling\Light_PrettyError\Service\LightPrettyErrorService




# --------------------------------------
# hooks
# --------------------------------------
$events.methods_collection:
    -
        method: registerListener
        args:
            event: Light.on_exception_caught
            listener:
                instance: @service(pretty_error)
                callable_method: onLightExceptionCaught

```

Basically, those services will improve the visual appearance for:

- the error debug page (unknown error with Light debug mode=true)
- the 404 error page (error of type 404)


The **initializer** service is provided by the [Light_Initializer planet](https://github.com/lingtalfi/Light_Initializer), which this planet depends on.


The [PrettyErrorInitializer](https://github.com/lingtalfi/Light_PrettyError/blob/master/doc/api/Ling/Light_PrettyError/Initializer/PrettyErrorInitializer.md) class will
automatically register [error handlers](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md#error-handlers) for the following error types:

- 404

And will basically provide aesthetically pleasing templates for those errors.
 






History Log
=============
    

- 1.5.3 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.5.2 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.5.1 -- 2019-12-12

    - fix LightPrettyErrorService->onLightExceptionCaught calling non-existing service template
    
- 1.5.0 -- 2019-11-11

    - renamed service to pretty_error
    - move PrettyErrorInitializer to LightPrettyErrorService, to accommodate new Light exception handling system
    
- 1.4.2 -- 2019-09-10

    - update service instantiation to accommodate the new initializer interface
        
- 1.4.1 -- 2019-07-18

    - update docTools documentation, add links to source code for classes and methods
        
- 1.4.0 -- 2019-07-17

    - update PrettyErrorInitializer class to adapt the new LightInitializerInterface
    
- 1.3.0 -- 2019-07-17

    - update PrettyErrorInitializer class to adapt the new LightInitializerInterface
    
- 1.2.0 -- 2019-04-09

    - add PrettyErrorInitializer class
    
- 1.1.0 -- 2019-04-08

    - change PrettyDebugPageUtil->print method to renderPage
    
- 1.0.0 -- 2019-04-05

    - initial commit