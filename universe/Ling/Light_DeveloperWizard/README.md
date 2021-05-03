Light_DeveloperWizard
===========
2020-06-30 -> 2021-04-15



A tool to speed up your development with the [light framework](https://github.com/lingtalfi/Light).


This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_DeveloperWizard
```

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
    - [Tutorial: Create a service](https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/pages/create-a-service-tutorial.md)
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


- 1.28.23 -- 2021-04-15

    - update CreateConceptionNotesProcess, now can be applied to non Light planets
  
- 1.28.22 -- 2021-03-23

    - adapt api to Ling.Light_Realist:2.0.15
  
- 1.28.21 -- 2021-03-22

    - fix CreateLkaPlanetProcess generating service file without galaxy prefix
  
- 1.28.20 -- 2021-03-18

    - update LightKitAdminBaseProcess->executeGeneratorConfigFile, now creates the Light_PlanetInstaller class if not exist
  
- 1.28.19 -- 2021-03-18

    - update lka generator config model, changed name to admin_main_menu.byml file
  
- 1.28.18 -- 2021-03-15

    - update planet to adapt Ling.Light:0.70.0

- 1.28.17 -- 2021-03-05

    - update README.md, add install alternative

- 1.28.16 -- 2021-02-25

    - fix assets/map accidentally removed
  
- 1.28.15 -- 2021-02-23

    - Update dependencies (pushed by SubscribersUtil)

- 1.28.14 -- 2021-02-23

    - Update dependencies (pushed by SubscribersUtil)

- 1.28.13 -- 2021-02-23

    - Update dependencies

- 1.28.12 -- 2021-01-22

    - update SynchronizeDbProcess::doExecute, now uses LightDbSynchronizerHelper
  
- 1.28.11 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.28.10 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.28.9 -- 2020-12-03

    - update documentation to acknowledge new light init script location
    
- 1.28.8 -- 2020-12-01

    - update DeveloperWizardLkaHelper::getLkaPlanetNameByPlanet, now proxies to original lka method
    
- 1.28.7 -- 2020-12-01

    - add "create conception notes" task
    
- 1.28.6 -- 2020-12-01

    - update "execute lka generator", now controller hub generates the class in Light_ControllerHub instead of ControllerHub, also we now rely on dynamic registration (i.e. no hook generated in the config)
    
- 1.28.5 -- 2020-11-27

    - fix ServiceManagerUtil->addConfigHook not adding hook comment section correctly in some cases
    
- 1.28.4 -- 2020-11-27

    - add create a service tutorial  
    
- 1.28.3 -- 2020-11-27

    - update to accommodate latest Light_Kit api  
    
- 1.28.2 -- 2020-11-26

    - update LightKitAdminBaseProcess, now doesn't add bmenu hook if addDirectInjector method already used  
    
- 1.28.1 -- 2020-11-23

    - update service to work with new realform, realist and realgen apis  
    - update SynchronizeDbProcess, now use table prefix by default to fetch the scope   
    - add GenerateBreezeConfigProcess   
    
- 1.28.0 -- 2020-09-18

    - update service to work with new realform and realist apis  
    
- 1.27.0 -- 2020-09-04

    - update service to work with realist2 api  
    
- 1.26.0 -- 2020-08-28

    - acknowledge new Light_Crud api  
    
- 1.25.0 -- 2020-08-21

    - update GenerateLkaPluginProcess, now takes into account micro-permission3 recommendation 
    
- 1.24.0 -- 2020-08-18

    - add "create-lka-user-mainpage-with-list" task 
    
- 1.23.1 -- 2020-08-18

    - add LightDeveloperWizardService->setOption method 
    
- 1.23.0 -- 2020-08-14

    - update RemovePlanetProcess, now also remove templates from templates/Light_Mailer if any
    
- 1.22.1 -- 2020-08-11

    - fix SynchronizeDbProcess not using db_synchronizer service properly
    
- 1.22.0 -- 2020-08-10

    - add CreateLkaUserMainPage task
    
- 1.21.0 -- 2020-08-10

    - update api, now the executeGeneratorConfigFile method uses the addDirectItemsByFileAndParentPath method for bmenu

- 1.20.2 -- 2020-08-10

    - fix ServiceManagerUtil using references to the older version of ConfigHelper
    
- 1.20.1 -- 2020-08-10

    - fix generated lka planet using old light ling standard service reference instead of new lka standard service plugin
    
- 1.20.0 -- 2020-08-07

    - update GenerateLkaPluginProcess task, can now execute a limited version, without the "create file"
    
- 1.19.0 -- 2020-08-06

    - add SortHooksAlphabeticallyProcess task
    
- 1.18.1 -- 2020-08-04

    - fix various bugs in "create lka planet" and "execute lka generator config file" tasks
    
- 1.18.0 -- 2020-08-04

    - add "Create lka planet" and "Execute the lka generator config file" tasks
    
- 1.17.1 -- 2020-08-03

    - fix ServiceManagerUtil->configHasHook throwing exception when service file doesn't exist
    
- 1.17.0 -- 2020-07-31

    - update AddPluginInstallerHookProcess, now disable the task if the hook is already added 
    
- 1.16.1 -- 2020-07-31

    - add target=_blank to links

- 1.16.0 -- 2020-07-31

    - add whitelist system to filter planets

- 1.15.1 -- 2020-07-31

    - fix RemoveServiceProcess not removing standard asset path

- 1.15.0 -- 2020-07-31

    - update RemoveServiceProcess, now also uninstalls the plugin if available
    
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