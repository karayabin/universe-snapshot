Light_Bullsheet
===========
2019-08-14 -> 2021-03-15



A service for the [Light](https://github.com/lingtalfi/Light) framework to help generate fake data for a database.


This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_Bullsheet
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_Bullsheet
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_Bullsheet api](https://github.com/lingtalfi/Light_Bullsheet/blob/master/doc/api/Ling/Light_Bullsheet.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)
- [Example](#example)




Services
=========


This plugin provides the following services:

- bullsheet (returns a LightBullsheetService instance)


The service accepts bullsheeter instances. Each bullsheeter being its own stand-alone generator. 



Here is an example of the service configuration:

```yaml
bullsheet:
    instance: Ling\Light_Bullsheet\Service\LightBullsheetService
    methods:
        setContainer:
            container: @container()
        setSilentMode:
            mode: true



```




Example
=========

From the Light_UserDatabase plugin, we want to allow the developer to generate fake users.

So we register to the bullsheet service like this (from the service configuration file of Light_UserDatabase):


```yaml
# ... some previous Light_UserDatabase configuration...
# ... some previous Light_UserDatabase configuration...
# ... some previous Light_UserDatabase configuration...

$bullsheet.methods_collection:
    -
        method: registerBullsheeter
        args:
            identifier: Light_UserDatabase.lud_user
            bullsheeter:
                instance: Ling\Light_UserDatabase\Bullsheet\LightWebsiteUserDatabaseBullsheeter
                methods:
                    setApplicationDir:
                        dir: ${app_dir}
                    setAvatarImgDir:
                        dir: ${app_dir}/www/img/some/dir

```

And then we can call the bullsheeter like this:

```php
/**
 * @var $bull LightBullsheetService
 */
$bull = $container->get("bullsheet");
$bull->generateRows("Light_UserDatabase.lud_user", 50);

```









History Log
=============

- 1.1.5 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.1.4 -- 2021-03-15

    - update planet to adapt Ling.Light:0.70.0
  
- 1.1.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.1.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.1.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.1.0 -- 2020-03-10

    - add LightBullsheeterInterface->generateRows.options property
    
- 1.0.3 -- 2019-09-26

    - fix README.md typo
    
- 1.0.2 -- 2019-08-14

    - fix doc
    
- 1.0.1 -- 2019-08-14

    - fix typo
    
- 1.0.0 -- 2019-08-14

    - initial commit