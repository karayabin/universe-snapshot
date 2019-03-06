PublicException
==================
2016-12-22


An exception for the gui user.


PublicException is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/PublicException
```



Example
-------------
```php
try {
    $name = "";
    ModuleInstallerUtil::installModule($name);
//    throw new \Exception("oops");

    Goofy::alertSuccess("Nice", false, false);
    
} catch (PublicException $e) {
    Goofy::alertError($e->getMessage());
} catch (\Exception $e) {
    Goofy::alertError(__("Oops, an error occurred, please check the logs"));
    Logger::log($e);
}
```


History Log
===============

- 1.0.0 -- 2016-12-22

    - initial commit



