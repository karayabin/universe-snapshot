Light_AjaxHandler
===========
2019-09-19



A global ajax handler for the [Light](https://github.com/lingtalfi/Light) framework.


This is a [Light framework plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_AjaxHandler
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_AjaxHandler api](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/pages/conception-notes.md)
- [Services](#services)





Services
=========


This plugin provides the following services:

- ajax_handler (returns a LightAjaxHandlerService instance)



Here is an example of the service configuration:

```yaml
ajax_handler:
    instance: Ling\Light_AjaxHandler\Service\LightAjaxHandlerService
    methods:
        setContainer:
            container: @container()



# --------------------------------------
# hooks
# --------------------------------------

$easy_route.methods_collection:
    -
        method: registerBundleFile
        args:
            file: config/data/Light_AjaxHandler/Light_EasyRoute/lah_routes.byml
```







History Log
=============

- 1.2.0 -- 2019-09-19

    - add ContainerAwareLightAjaxHandler
    
- 1.1.2 -- 2019-09-19

    - fix doc link
    
- 1.1.1 -- 2019-09-19

    - fix typo in README.md and service file

- 1.1.0 -- 2019-09-19

    - update LightAjaxHandlerService, now transmits the container to container aware handlers
    
- 1.0.2 -- 2019-09-19

    - fix route forgotten
    
- 1.0.1 -- 2019-09-19

    - fix doc links
    
- 1.0.0 -- 2019-09-19

    - initial commit