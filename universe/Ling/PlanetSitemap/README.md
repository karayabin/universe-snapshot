PlanetSitemap
===========
2019-03-14 -> 2021-03-05



Create simple sitemap for your planets.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.PlanetSitemap
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/PlanetSitemap
```

Or just download it and place it where you want otherwise.


Summary
===========
- [PlanetSitemap api](https://github.com/lingtalfi/PlanetSitemap/blob/master/doc/api/Ling/PlanetSitemap.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [How to use?](#how-to-use)
- [History log](#history-log)




How to use?
==============

The code below will create the **sitemap.txt** file at the root of the [CliTools planet](https://github.com/lingtalfi/CliTools).


```php
$planetDir = "/myphp/universe/Ling/CliTools";
$baseUrl = "https://github.com/lingtalfi";
PlanetSitemapHelper::createGithubSitemap($planetDir, $baseUrl);
```











History Log
=============

- 1.0.6 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.0.5 -- 2021-03-05

    - update README.md, add install alternative

- 1.0.4 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.0.3 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.0.2 -- 2019-07-18

    - update docTools documentation, add links to source code for classes and methods
        
- 1.0.1 -- 2019-03-14

    - add summary to README.md

- 1.0.0 -- 2019-03-14

    - initial commit