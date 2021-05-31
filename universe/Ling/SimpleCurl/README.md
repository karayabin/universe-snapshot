SimpleCurl
===========
2019-03-14 -> 2021-03-05



A curl wrapper.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.SimpleCurl
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/SimpleCurl
```

Or just download it and place it where you want otherwise.






Summary
===========
- [SimpleCurl api](https://github.com/lingtalfi/SimpleCurl/blob/master/doc/api/Ling/SimpleCurl.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [How to use?](#how-to-use)



How to use?
=============



```php
$url = "http://www.example.com/";
$curl = new SimpleCurl();
if (false !== $response = $curl->call($url)) {
    a($response->getHttpCode()); // int 200
    a($response->getHeaders());
    a($response->getBody());
} else {
    a($curl->getErrors());
}

```






History Log
=============

- 1.0.7 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.0.6 -- 2021-03-05

    - update README.md, add install alternative

- 1.0.5 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.0.4 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.0.3 -- 2019-07-18

    - update docTools documentation, add links to source code for classes and methods
    
- 1.0.2 -- 2019-03-14

    - fix doc missing inserts

- 1.0.1 -- 2019-03-14

    - updating doc

- 1.0.0 -- 2019-03-14

    - initial commit