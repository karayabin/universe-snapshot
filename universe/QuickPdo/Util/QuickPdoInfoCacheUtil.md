QuickPdoCacheUtil
=================
2017-05-11



What is it?
-------------------


It's a caching wrapper for the [QuickPdoInfoTool](https://github.com/lingtalfi/QuickPdo/blob/master/QuickPdoInfoTool.md).
 



 


Methods
==============

For the most part, the methods are the methods of QuickPdoInfoTool.

Under the hood, it will cache the results.

To disable the cache, use the cache method, which accepts a boolean.




cleanCache
----------------
2017-05-19



```php
void function cleanCache ( )
```

Cleans the cache.



prepareDb
----------------
2017-05-19



```php
void function prepareDb ( str:database )
```

Prepare the cache values of various methods in advance for a given database.
 
