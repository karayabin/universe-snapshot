Logger
===========
2017-04-04 -> 2021-03-05



A simple logger that dispatches messages to listeners.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Logger
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Logger
```

Or just download it and place it where you want otherwise.


How to
==========

Example in a [kamille](https://github.com/lingtalfi/kamille) app.

```php
<?php


use Kamille\Architecture\ApplicationParameters\ApplicationParameters;
use Kamille\Ling\Z;
use Kamille\Mvc\Layout\HtmlLayout;
use Kamille\Mvc\LayoutProxy\LawsLayoutProxy;
use Kamille\Mvc\Loader\FileLoader;
use Kamille\Mvc\Position\Position;
use Kamille\Mvc\Renderer\PhpLayoutRenderer;
use Kamille\Mvc\Widget\Widget;
use Ling\Logger\Listener\FileLoggerListener;
use Ling\Logger\Logger;

require_once __DIR__ . "/../boot.php";
require_once __DIR__ . "/../init.php";


$appDir = ApplicationParameters::get("app_dir");
$f = $appDir . "/logs/kamille.log.txt";
$log = Logger::create()->addListener(FileLoggerListener::create()->setPath($f)->setIdentifiers(['info']));

$log->log("Hello log", "info");

```


Example with a formatter to display the date:


```php
<?php


use Kamille\Architecture\ApplicationParameters\ApplicationParameters;
use Ling\Logger\Formatter\TagFormatter;
use Ling\Logger\Listener\FileLoggerListener;
use Ling\Logger\Logger;

require_once __DIR__ . "/../boot.php";
require_once __DIR__ . "/../init.php";


$appDir = ApplicationParameters::get("app_dir");
$f = $appDir . "/logs/kamille.log.txt";
$log = Logger::create()->addListener(FileLoggerListener::create()
    ->setFormatter(TagFormatter::create())
    ->setPath($f)->setIdentifiers(['info']));

$log->log("Hello log", "info");

```





History Log
------------------

- 1.4.4 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.4.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.4.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.4.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.4.0 -- 2017-11-24

    - improve TagFormatter, now handle arrays natively
    
- 1.3.0 -- 2017-05-30

    - add QuickDebugLoggerListener
    
- 1.2.2 -- 2017-04-05

    - fix TagFormatter in memory tags
    
- 1.2.1 -- 2017-04-04

    - fix setIdentifiers accepts null
    
- 1.2.0 -- 2017-04-04

    - add AbstractLoggerListener.removeIdentifier method
    

- 1.1.0 -- 2017-04-04

    - add TagFormatter    
    
    
- 1.0.0 -- 2017-04-04

    - initial commit