LinearFile
===============
2017-04-20 -> 2021-03-05



Manipulate your file as a stack of lines.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).



How does it work?
==================

The file is an ensemble of lines.

A group of lines of interest is called a LineSet.

This planet helps you finding the line sets you want, and then you can remove a line set from a file,
or insert some new content at a given line.




Example
============

```php

$f = "/myphp/kaminos/app/config/routsy/routes.php";

$lines = file($f);
$pat = '!^\$routes\[([^\]]+)\]\s*=!';
a(BiggestWrapLineSetFinder::create()
    ->setPrepareNameCallback(function ($v) {
        return substr($v, 1, -1);
    })
    ->setNamePattern($pat)
    ->setStartPattern($pat)
    ->setPotentialEndPattern('!//-//!')
    ->find($lines)
);

```










Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.LinearFile
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/LinearFile
```

Or just download it and place it where you want otherwise.
















History Log
------------------

- 1.0.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.0.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.0.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.0.0 -- 2017-04-20

     - initial commit