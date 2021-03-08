Linker
==========
2016-03-24 -> 2021-03-05


Tool to help manage application symlinks.


Linker is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
=============


Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Linker
```

Using the [uni tool](https://github.com/lingtalfi/universe-naive-importer)
```bash
uni import Ling/Linker
```




Features
--------------

- centralized links list
- can create all the links of your application at once




How to
------------

First, create a list of your symlinks, using the notation link -> target, one per line.
You can use tags if you need to.

For instance:

(/path/to/myapp_links.txt)

```txt
$myAppDir/planets -> $planetsDir 
$myAppDir/www/libs/assetloader -> $planetsDir/AssetLoader/www/libs/assetloader 
$myAppDir/www/libs/flue -> $planetsDir/Flue/www/libs/flue 
$myAppDir/www/libs/htmltemplate -> $planetsDir/HtmlTemplate/www/libs/htmltemplate 
$myAppDir/www/libs/jajaxloader -> $planetsDir/JAjaxLoader/www/libs/jajaxloader 
$myAppDir/www/libs/jdragslider -> $planetsDir/JDragSlider/www/libs/jdragslider 
$myAppDir/www/libs/jfullscreen -> $planetsDir/JFullScreen/www/libs/jfullscreen 
$myAppDir/www/libs/jimagerotator -> $planetsDir/JImageRotator/www/libs/jimagerotator 
$myAppDir/www/libs/jinfiniteslider -> $planetsDir/JInfiniteSlider/www/libs/jinfiniteslider 
$myAppDir/www/libs/jitemslider -> $planetsDir/JItemSlider/www/libs/jitemslider 
$myAppDir/www/libs/jvideoplayer -> $planetsDir/JVideoPlayer/www/libs/jvideoplayer 
$myAppDir/www/libs/screendebug -> $planetsDir/ScreenDebug/www/libs/screendebug 
$myAppDir/www/libs/tim -> $planetsDir/Tim/www/libs/tim 
$myAppDir/www/libs/vswitch -> $planetsDir/VSwitch/www/libs/vswitch 
$myAppDir/www/templates/jvp/jvp.mantis.htpl -> $planetsDir/JVideoPlayer/www/templates/jvp.mantis.htpl 

```


Then, you can do one of the following:

- create/check the links


### Check the links

Create a script with the following content and run it, this will create the links as specified in your links file.

```php
<?php


use Ling\Linker\LinkerTool;

require_once "bigbang.php"; // start the local universe


$f = "/path/to/myapp_links.txt";
$vars = [
    '$myAppDir' => '/path/to/myapp',
    '$planetsDir' => '/path/to/myframework/planets',
];

LinkerTool::checkByFile($f, $vars);
```







History Log
------------------

- 1.0.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.0.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.0.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.0.0 -- 2016-03-24

    - initial commit
    
    