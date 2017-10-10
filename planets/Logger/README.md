Logger
===========
2017-04-04



A simple logger that dispatches messages to listeners.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Logger
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
use Logger\Listener\FileLoggerListener;
use Logger\Logger;

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
use Logger\Formatter\TagFormatter;
use Logger\Listener\FileLoggerListener;
use Logger\Logger;

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