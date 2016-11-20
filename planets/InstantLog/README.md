InstantLog
==============
2016-02-01




A quick log tool for your php apps.



InstantLog can be installed as a [planet](https://github.com/lingtalfi/Observer/blob/master/article/article.planetReference.eng.md).


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
    
- 1.1.0 -- 2016-02-13

    - add exception with full message handling
    
- 1.0.0 -- 2016-02-01

    - initial commit
    
    