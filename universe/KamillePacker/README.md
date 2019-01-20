KamillePacker
=================
2017-04-18


A kamille developer companion.

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import KamillePacker
```

Or just download it and place it where you want otherwise.



What can it do for you?
==========================



- widgetPacker: while you are developing a widget, use the widgetPacker to pack the widget
                (i.e. make it almost ready for exporting to a public repository)




Examples
==================



WidgetPacker example
---------------------

```php
<?php

use Kamille\Architecture\ApplicationParameters\ApplicationParameters;
use KamillePacker\Config\Config;
use KamillePacker\WidgetPacker\WidgetPacker;

require_once __DIR__ . "/../boot.php";
require_once __DIR__ . "/../init.php";



$appDir = ApplicationParameters::get("app_dir");
WidgetPacker::create(Config::create()->set('appDir', $appDir))
->pack("Notification");

```


ModulePacker example
---------------------

```php
<?php

use Kamille\Architecture\ApplicationParameters\ApplicationParameters;
use KamillePacker\Config\Config;
use KamillePacker\ModulePacker\ModulePacker;
require_once __DIR__ . "/../boot.php";
require_once __DIR__ . "/../init.php";



$appDir = ApplicationParameters::get("app_dir");
ModulePacker::create(Config::create()->set('appDir', $appDir))
->pack("Core");



```







History Log
------------------
    
- 1.7.0 -- 2017-05-04

    - add dataTable packer for module
    
- 1.6.0 -- 2017-04-28

    - changed default README.md for modules
    
- 1.5.0 -- 2017-04-22

    - WidgetPacker now supports lang files for widgets
    
- 1.4.0 -- 2017-04-21

    - ModulePacker now supports laws files 
    
- 1.3.0 -- 2017-04-21

    - ModulePacker now supports lang files for controllers
    
- 1.2.0 -- 2017-04-21

    - AbstractPacker now handles the files/app mechanism
    
- 1.1.0 -- 2017-04-18

    - add ModulePacker

- 1.0.0 -- 2017-04-18

    - initial commit

