LingTalfi
===========
2019-03-13 -> 2021-03-08




Personal tools put in this public repo to help fighting memory loss, and for convenience.



This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.LingTalfi
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/LingTalfi
```

Or just download it and place it where you want otherwise.










History Log
=============

- 1.23.16 -- 2021-03-08

    - update InitializePlanetCommand command, now use new README.md template, with lt install snippet
  
- 1.23.15 -- 2021-03-05

    - update README.md, add install alternative

- 1.23.14 -- 2021-02-25

    - update AppBoilerplateUtl, now adds the .htaccess file
  
- 1.23.13 -- 2021-02-25

    - update AppBoilerplateUtl, now only puts updated planet into zip
  
- 1.23.12 -- 2021-02-23

    - update SubscribersUtil->updateSubscribersDependenciesAndCommit, now indicates the name of the planet on which it depends in the commit message
  
- 1.23.11 -- 2021-02-23

    - add UpdateSubscriberDependenciesCommand command
  
- 1.23.10 -- 2021-02-23

    - Update dependencies (pushed by SubscribersUtil)


- 1.23.9 -- 2021-02-23

    - Update dependencies

- 1.23.8 -- 2021-02-22

    - adapt to new Light_PlanetInstaller api
    - push command now removes assets/map before recreating it
  
- 1.23.7 -- 2021-02-19

    - fix KwinToLightCliCommandCodeUtil not generating alias section correctly
  
- 1.23.6 -- 2021-02-19

    - add kwin related utils
  
- 1.23.5 -- 2021-02-16

    - add GranularDependencyUtil and AppBoilerPlateUtil class, update ReadmeUtil, move some methods to UniverseTools
  
- 1.23.4 -- 2020-12-08
  
    - Fix lpi-deps not using natsort

- 1.23.3 -- 2020-12-08

    - fix ReadmeUtil->getAllVersionNumbers not returning natsort ordered items
  
- 1.23.2 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.23.1 -- 2020-12-03

    - update PackLightPluginCommand, now also packs from scripts/$galaxy/$planet
    
- 1.23.0 -- 2020-09-11

    - update docbuilder template, now has the conception variable
    
- 1.22.0 -- 2020-08-31

    - update PackLightPluginCommand, now also packs from www/libs/universe/$galaxyName/$planetName
    
- 1.21.0 -- 2020-08-18

    - update PackLightPluginCommand, now also packs from config/dynamic
    
- 1.20.0 -- 2020-08-14

    - update PackLightPluginCommand, now also packs from templates/Light_Mailer
    
- 1.19.0 -- 2020-06-29

    - add docToolExtraLoaders kaos preferences for pushing command
    
- 1.18.0 -- 2020-06-01

    - add "kaos preferences" concept
    
- 1.17.0 -- 2020-04-15

    - add PhpStormMetaHelper class
    
- 1.16.0 -- 2020-04-13

    - update InitializePlanetCommand, now creates a DocBuilder with conception notes link ready
    
- 1.15.0 -- 2020-04-13

    - update InitializePlanetCommand, now creates a light adapted README.md when relevant
    
- 1.14.1 -- 2019-10-25

    - update DocBuilder model, now uses LingTalfiDocToolsHelper::generateCrumbs
    
- 1.14.0 -- 2019-10-25

    - add LingTalfiDocToolsHelper class

- 1.13.1 -- 2019-09-26

    - fix PushCommand having htmlMode to true instead of false
    
- 1.13.0 -- 2019-09-25

    - updated DocBuilder, now default htmlMode is true

- 1.12.0 -- 2019-09-24

    - update PushCommand, now automatically imports universe assets found in the application into the map assets dir
    
- 1.11.5 -- 2019-08-14

    - fix typo
    
- 1.11.4 -- 2019-08-14

    - update PackLightPluginCommand to update new light app recommended structure's philosophy
    
- 1.11.3 -- 2019-07-18

    - update docTools documentation, add links to source code for classes and methods
    
- 1.11.2 -- 2019-07-18

    - fix classes for new DocBuilder class model
    
- 1.11.1 -- 2019-07-18

    - update classes for new DocBuilder class model
    
- 1.11.0 -- 2019-05-03

    - update Kaos push command now automatically repatriating asset map for light plugins
    
- 1.10.0 -- 2019-05-02

    - update Kaos push command, now automatically calls packlightmap for Light plugins
    
- 1.9.0 -- 2019-04-26

    - update Kaos packlightmap command, now repatriates config/kit/pages/$LightPlugin directory

- 1.8.0 -- 2019-04-25

    - update Kaos push command, now automatically adds the map post_install directive to the dependency file if the assets/map dir exists
    
- 1.7.0 -- 2019-04-03

    - update "Kaos init -d command", now includes pages and inserts links in the README.md file.
    
- 1.6.0 -- 2019-03-18

    - add ProjectInfoDocBuilder

- 1.5.0 -- 2019-03-18

    - add HelpCommand

- 1.4.0 -- 2019-03-18

    - update PackAndPushUniToolCommand now creates links to planets if they come from Ling galaxy

- 1.3.3 -- 2019-03-18

    - fix PushCommand stops if no DocBuilder is found
    - fix PackAndPushUniToolCommand stops if errors are found by DependencyMasterBuilderUtil

- 1.3.2 -- 2019-03-14

    - update DocBuilders new insert dir is now personal/mydoc/inserts

- 1.3.1 -- 2019-03-14

    - update PushCommand now displays the sitemap ping google response inline

- 1.3.0 -- 2019-03-14

    - add InitializePlanetCommand
    - update PushCommand now creates a sitemap and ask google to crawl it

- 1.2.0 -- 2019-03-14

    - add PushUniverseSnapshotCommand

- 1.1.1 -- 2019-03-14

    - fix PushCommand git command potentially not being executed from the right directory

- 1.1.0 -- 2019-03-14

    - add PackAndPushUniToolCommand

- 1.0.0 -- 2019-03-13

    - initial commit