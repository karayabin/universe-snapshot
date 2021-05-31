Panda_Headers
===========
2020-04-06 -> 2021-03-05



A tool to help implementing the server side of the [panda headers](https://github.com/lingtalfi/TheBar/blob/master/discussions/panda-headers-protocol.md) protocol.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Panda_Headers
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Panda_Headers
```

Or just download it and place it where you want otherwise.




How to use
=============

```php

Panda_Headers_Tool::addHeaders([
    "author" => "boris",
    "tags" => ["judo", "karate"],
]);
```

Or, if you are using the [Light](https://github.com/lingtalfi/Light) framework, you can do this instead:


```php

Panda_Headers_Tool::attachHeaders([
    "author" => "boris",
    "tags" => ["judo", "karate"],
], $response);
```






Summary
===========
- [Panda_Headers api](https://github.com/lingtalfi/Panda_Headers/blob/master/doc/api/Ling/Panda_Headers.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))






History Log
=============

- 1.0.4 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.0.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.0.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.0.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.0.0 -- 2020-04-06

    - initial commit