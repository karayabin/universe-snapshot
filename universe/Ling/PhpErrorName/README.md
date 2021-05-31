PhpErrorName
===========
2019-01-23 -> 2021-03-05



Converts a php error code to a human name.



This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).



Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.PhpErrorName
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/PhpErrorName
```

Or just download it and place it where you want otherwise.



Usage
=====

```php
az(PhpErrorName::getErrorName(\E_NOTICE)); // string(8) "E_NOTICE"
```





History Log
------------------

- 1.0.4 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.0.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.0.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.0.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.0.0 -- 2019-01-23

    - initial commit