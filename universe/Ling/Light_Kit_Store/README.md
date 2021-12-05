Light_Kit_Store
===========
2021-04-06 -> 2021-08-02



A store where **website creators** can purchase [light kit](https://github.com/lingtalfi/Light_Kit) products.




This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========

Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_Kit_Store
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_Kit_Store
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)






Services
=========


Here is an example of the service configuration:

```yaml

kit_store:
    instance: Ling\Light_Kit_Store\Service\LightKitStoreService
    methods:
        setContainer:
            container: @container()
        setOptions:
            options: ${kit_store_vars.service_options}


kit_store_vars:
    service_options:
        captcha_keys: []
        not_found_route: lks_route-404
    global_vars:
        front_theme: Ling.Light_Kit_Store/theme1



# --------------------------------------
# hooks
# --------------------------------------
$vars.methods_collection:
    -
        method: setVar
        args:
            key: kit_store_vars
            value: ${kit_store_vars.global_vars}


$user_manager.methods_collection:
    -
        method: addPrepareUserCallback
        args:
            callback:
                instance: @service(kit_store)
                callable_method: prepareUser
                
                
```



History Log
=============


- 0.0.9 -- 2021-08-02

    - test commit with hosting_app kaos option
  
- 0.0.8 -- 2021-07-30

    - fix dependencies.byml, try cd www first

- 0.0.7 -- 2021-07-30

    - test commit for dependencies.byml

- 0.0.6 -- 2021-07-30

    - update service->prepareUser not accepting non LightOpenUser users
    - update api to work with Ling.Light_Kit_Editor:0.3.0
    - checkpoint commit
  
- 0.0.5 -- 2021-06-24

    - add route to api, and events to register
  
- 0.0.4 -- 2021-06-21

    - updated routes
  
- 0.0.3 -- 2021-06-19

    - fix functional typo in front_theme
  
- 0.0.2 -- 2021-06-18

    - add home controller
  
- 0.0.1 -- 2021-04-06

    - initial commit