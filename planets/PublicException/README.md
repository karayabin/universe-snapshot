PublicException
==================
2016-12-22


An exception for the gui user.



This is part of the [universe](https://github.com/karayabin/universe-snapshot) framework.




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


