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
prettyDebugPage:
    instance: Ling\Light_PrettyError\Util\PrettyDebugPageUtil



# --------------------------------------
# hooks
# --------------------------------------
$initializer.methods.setInitializers.initializers:
    -
        instance: Ling\Light_PrettyError\Initializer\PrettyErrorInitializer



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