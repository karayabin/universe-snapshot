Light_DeveloperWizard
===========
2020-06-30 -> 2020-07-31



A tool to speed up your development with the [light framework](https://github.com/lingtalfi/Light).


This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_DeveloperWizard
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_DeveloperWizard api](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/api/Ling/Light_DeveloperWizard.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/pages/conception-notes.md)
    - [Conventions](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/pages/conventions.md)
    - [Task details](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/pages/task-details.md)






Services
=========


Here is an example of the service configuration:

```yaml
developer_wizard:
    instance: Ling\Light_DeveloperWizard\Service\LightDeveloperWizardService
    methods:
        setContainer:
            container: @container()



```



History Log
=============

- 1.14.0 -- 2020-07-31

    - add DisableServiceProcess, EnableServiceProcess and RemoveServiceProcess tasks
    
- 1.13.0 -- 2020-07-30

    - update GenerateLkaPlanetProcess, now generated class extends LightLingStandardServiceKitAdminPlugin
    
- 1.12.0 -- 2020-07-30

    - add AddPluginInstallerHookProcess task
    
- 1.11.1 -- 2020-07-30

    - add Basic exception convention
    
- 1.11.0 -- 2020-07-30

    - update LightDeveloperWizardService, add "remove cache" button in plugin installer gui
    
- 1.10.0 -- 2020-07-30

    - update CreateLss01ServiceProcess, now register hook for plugin_installer service
    
- 1.9.0 -- 2020-07-28

    - add CreateLss01ServiceProcess task
    
- 1.8.5 -- 2020-07-27

    - fix ServiceManagerUtil->configHasHook not always returning the expected result 
    
- 1.8.4 -- 2020-07-27

    - fix CreateServiceProcess not generating exception class comment for service class
    
- 1.8.3 -- 2020-07-27

    - update CreateServiceProcess, the error method is now appended to the class instead of written after setOptions
    
- 1.8.2 -- 2020-07-24

    - fix functional typo in AddServiceLogDebugMethodProcess
    
- 1.8.1 -- 2020-07-24

    - fix functional typo in AddServiceLingBreeze2GetFactoryMethodProcess

- 1.8.0 -- 2020-07-24

    - update api using the FryingPan class
    
- 1.7.0 -- 2020-07-23

    - update AddServiceLogDebugMethodProcess, now triggers warning if the service class is not a **basic service**  
    
- 1.6.0 -- 2020-07-23

    - add AddServiceLingBreeze2GetFactoryMethodProcess task class 
    
- 1.5.0 -- 2020-07-21

    - add plugin installer tab
    - fix DeveloperWizardBreezeGeneratorHelper::spawnConfFile generating wrong apiName
    
- 1.4.0 -- 2020-07-21

    - add "Add logDebug method" task
    
- 1.3.0 -- 2020-07-09

    - add createService task

- 1.2.1 -- 2020-07-07

    - update conception notes

- 1.2.0 -- 2020-07-07

    - add createLkaPlugin task
    
- 1.1.0 -- 2020-07-06

    - add addStandardPermission task
    - refactored api using WebWizardTools under the hood
    
- 1.0.0 -- 2020-06-30

    - initial commit