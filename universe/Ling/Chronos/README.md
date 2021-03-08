Chronos
=============
2017-11-18 -> 2021-03-05


A simple chronometer to measure your app's timings.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Chronos
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Chronos
```

Or just download it and place it where you want otherwise.


How to
==========

```php
<?php


$id = "task: take a nap";
Chronos::point($id);

sleep(1);
a(Chronos::point($id)); // [1.00148200989, 1120]  (ellapsed time in seconds, consumed memory in octets)

sleep(2);
a(Chronos::point($id)); // [3.00239610672, 1784]


```





History Log
------------------

- 1.0.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.0.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.0.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.0.0 -- 2017-11-18

    - initial commit