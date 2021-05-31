UniversalLogger
=======================
2019-02-25 -> 2021-03-05



A generic logger interface to use in the universe and elsewhere.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.UniversalLogger
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/UniversalLogger
```

Or just download it and place it where you want otherwise.




About
=====

The **UniversalLogger** has just one method:

- log ( string $message, string $channel ): void











History Log
------------------

- 1.1.4 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.1.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.1.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.1.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.1.0 -- 2019-08-30

    - updated UniversalLoggerInterface->log, now the message doesn't have to be a string
    
- 1.0.0 -- 2019-02-25

    - initial commit