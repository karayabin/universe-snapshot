PublicException
==================
2016-12-22 -> 2021-03-05


An exception for the gui user.


PublicException is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.PublicException
```

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

- 1.0.4 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.0.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.0.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.0.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.0.0 -- 2016-12-22

    - initial commit



