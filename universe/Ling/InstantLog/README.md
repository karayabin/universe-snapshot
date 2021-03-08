InstantLog
==============
2016-02-01 -> 2021-03-05




A quick log tool for your php apps.



InstantLog is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
=============


Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.InstantLog
```

Using the [uni tool](https://github.com/lingtalfi/universe-naive-importer)
```bash
uni import Ling/InstantLog
```





Motivation
-------------

Sometimes you want a quick no brainer one liner log tool to check something...
If that's your case, then you might find the InstantLog useful.


How to
------------

```php
<?php


use Universe\InstantLog;

require_once "bigbang.php"; // start the local universe


InstantLog::log("orange");


/**
 * Then to see the log, type this in your terminal:
 *      tail -f /tmp/instantlog.txt
 * 
 * I recommend to use the alias:
 * 
 * alias ilog='tail -f /tmp/instantlog.txt'
 * 
 */
```


Note: you can also pass exceptions directly to the instant log:


```php
InstantLog::log(new \Exception("This is ridiculous"));
```




Related
------------

- [QuickLog](https://github.com/lingtalfi/QuickLog): simple log system for your app
- [ApplicationLog class](https://github.com/lingtalfi/ApplicationLog): log for your application



Dependencies
------------------

- [lingtalfi/Bat 1.30](https://github.com/lingtalfi/Bat)



History Log
------------------

- 1.1.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.1.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.1.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.1.0 -- 2016-02-13

    - add exception with full message handling
    
- 1.0.0 -- 2016-02-01

    - initial commit
    
    