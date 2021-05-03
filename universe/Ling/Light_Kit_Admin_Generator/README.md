Light_Kit_Admin_Generator
===========
2019-11-06 -> 2021-03-15



A plugin to help creating an auto-admin in [Light_Kit_Admin](https://github.com/lingtalfi/Light_Kit_Admin). 

This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_Kit_Admin_Generator
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_Kit_Admin_Generator
```

Or just download it and place it where you want otherwise.









Summary
===========
- [Light_Kit_Admin_Generator api](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/pages/conception-notes.md)
    - [Configuration example](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/pages/lkagen-configuration-example.md)

- [Services](#services)
- [Usage example](#usage-example)



Services
=========


This plugin provides the following services:

- kit_admin_generator (returns a LightKitAdminGeneratorService instance)


Here is an example of the service configuration:

```yaml
kit_admin_generator:
    instance: Ling\Light_Kit_Admin_Generator\Service\LightKitAdminGeneratorService
    methods:
        setContainer:
            container: @container()
        setOptions:
            options:
                useDebug: true                          # default is false
                debugLogChannel: lka_generator.debug   # default is real_generator.debug

# --------------------------------------
# hooks
# --------------------------------------
$logger.methods_collection:
    -
        method: addListener
        args:
            channels: lka_generator.debug
            listener:
                instance: Ling\Light_Logger\Listener\LightCleanableFileLoggerListener
                methods:
                    configure:
                        options:
                            file: ${app_dir}/log/lka_generator_debug.txt

```



Usage example
=============

```php
$configFile = $appDir . '/config/data/Ling.Light_Kit_Admin/Ling.Light_Kit_Admin_Generator/jindemo.byml';
az($container->get("kit_admin_generator")->generate($configFile));
```





History Log
=============

- 1.19.14 -- 2021-03-15

    - update planet to adapt Ling.Light:0.70.0

- 1.19.13 -- 2021-03-09

    - update planet to adapt Ling.Light_Kit_Admin:0.12.25
  
- 1.19.12 -- 2021-03-05

    - update README.md, add install alternative

- 1.19.11 -- 2021-02-25

    - fix assets/map accidentally removed
  
- 1.19.10 -- 2021-02-23

    - Update dependencies (pushed by SubscribersUtil)

- 1.19.9 -- 2021-02-23

    - Update dependencies (pushed by SubscribersUtil)

- 1.19.8 -- 2021-02-23

    - Update dependencies

- 1.19.7 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.19.6 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.19.5 -- 2020-12-01

    - add LightKitAdminListConfigGenerator class
    
- 1.19.4 -- 2020-09-26

    - update config example
    
- 1.19.3 -- 2020-09-18

    - update config example
    
- 1.19.2 -- 2020-09-18

    - update config example
    
- 1.19.1 -- 2020-09-18

    - update config example
    
- 1.19.0 -- 2020-09-17

    - update api to adapt new Realist and Realform apis
    
- 1.18.0 -- 2020-09-04

    - update ControllerGenerator, now the default form_identifier_format uses nugget compliant format
    
- 1.17.2 -- 2020-09-03

    - update lka-configuration-example.md to have the same base as "realgen"'s conf

- 1.17.1 -- 2020-08-18

    - update lka-configuration-example.md to take into account the new target_basename directive
    
- 1.17.0 -- 2020-08-07

    - update generator, now the generated form controller tries late registration first
    
- 1.16.0 -- 2020-08-03

    - update config, add use_menu and use_controller properties
    
- 1.15.1 -- 2020-07-06

    - update config example
    
- 1.15.0 -- 2020-07-03

    - update generated controller models to adapt new LightKitAdminController->getRedirectResponseByRoute
    
- 1.14.0 -- 2020-07-02

    - add menu.mode configuration option
    
- 1.13.1 -- 2020-06-30

    - add log section in conception notes
    
- 1.13.0 -- 2020-06-30

    - update generator, add log system
    
- 1.12.0 -- 2020-03-06

    - update row restriction system
    
- 1.11.0 -- 2020-03-05

    - update controller.php.tpl, now uses row restriction service
    
- 1.10.0 -- 2020-02-28

    - add new config properties, such as form_page_related_links
    
- 1.9.0 -- 2020-02-26

    - update assets/models/classes/baseController.php.tpl, now use abstract class
    - update config, add controller.controller_vars
    
- 1.8.0 -- 2020-02-26

    - update MenuConfigGenerator->generate, now accepts item_plugin and item_default_right options
    
- 1.7.0 -- 2020-02-25

    - update MenuConfigGenerator->generate, now accepts item_prefix_parent and item_prefix_child options
    
- 1.6.0 -- 2019-12-18

    - update to accommodate Light_MicroPermission 2.0
    
- 1.5.2 -- 2019-12-09

    - update baseController, now uses fixed _r parameter for UriTool::randomize

- 1.5.1 -- 2019-12-09

    - update baseController template change wording of success message and use UriTool::randomize
    
- 1.5.0 -- 2019-11-29

    - update baseController template to use LightRealformRoutineOne
    
- 1.4.1 -- 2019-11-28

    - fix baseController template missing use dependencies
    
- 1.4.0 -- 2019-11-28

    - update baseController template, now dispatches the Light_RealGenerator.on_realform_exception_caught event
    
- 1.3.0 -- 2019-11-25

    - update controller templates, now handles a basic iframe-signal technique 
    
- 1.2.1 -- 2019-11-25

    - fix form.byml template not calling the dynamic parent 
    
- 1.2.0 -- 2019-11-25

    - update controller.tpl now accepts a $_GET.solo option 
    
- 1.1.1 -- 2019-11-19

    - fix baseController.tpl not handling ric update in the url correctly
    
- 1.1.0 -- 2019-11-14

    - update ControllerGenerator, implemented form.use_link_to_list

- 1.0.1 -- 2019-11-06

    - fix link typo in example
    
- 1.0.0 -- 2019-11-06

    - initial commit