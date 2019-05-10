LingTalfi
===========
2019-03-13




Personal tools put in this public repo to help fighting memory loss, and for convenience.



This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/LingTalfi
```

Or just download it and place it where you want otherwise.










History Log
=============

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