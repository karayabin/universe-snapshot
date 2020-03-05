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
    - [Events](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/pages/events.md)
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



Quickstart
=========

Register your handler (using our service) in your plugin's service configuration,
then you can use our controller, which requires two parameters:

- ajax_handler_id: your plugin name 
- ajax_action_id: the action identifier (handled by your plugin's handler)

You can add more parameters if you want, they will be passed to your plugin's handler (second argument
of the handle method).
 

Example in jquery:

```js


<?php  
/**
* @var $service LightAjaxHandlerService
*/
$service = $container->get("ajax_handler");
?>

var baseUrl = <?php $service->getServiceUrl() ?>;

$.post(baseUrl, {
            ajax_handler_id: MyPlugin,
            ajax_action_id: my_action_id,
            param1: "xxx",
            param2: "yyy",

        }, function (response) {
              var type = response.type;
                    if ('error' === type) {
                        //
                    } else if ('success' === type) {
                        //
                    } else {
                        //
                    }
        }, "json");

```






History Log
=============
    
- 1.10.0 -- 2019-11-28

    - add BaseLightAjaxHandler class 
    
- 1.9.0 -- 2019-11-19

    - update plugin to accommodate renamed Light_ReverseRouter service 
    
- 1.8.0 -- 2019-11-15

    - add LightAjaxHandlerService->getRouteName and getUrl methods
    
- 1.7.0 -- 2019-11-11

    - add Light_AjaxHandler.on_controller_exception_caught event
    
- 1.6.0 -- 2019-09-30

    - removed MicroPermissionContainerAwareLightAjaxHandler
    
- 1.5.0 -- 2019-09-26

    - add MicroPermissionContainerAwareLightAjaxHandler
    
- 1.4.0 -- 2019-09-24

    - update conception, now accepts response of type print
    
- 1.3.0 -- 2019-09-24

    - update LightAjaxHandlerController to adapt new AjaxCommunication protocol
    
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