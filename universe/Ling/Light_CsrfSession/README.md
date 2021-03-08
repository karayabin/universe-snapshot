Light_CsrfSession
===========
2019-11-27 -> 2021-03-05



A plugin to help protect your app against csrf attacks.


This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_CsrfSession
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_CsrfSession
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_CsrfSession api](https://github.com/lingtalfi/Light_CsrfSession/blob/master/doc/api/Ling/Light_CsrfSession.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_CsrfSession/blob/master/doc/pages/conception-notes.md)
- [Services](#services)





Services
=========


Here is an example of the service configuration:

```yaml
csrf_session:
    instance: Ling\Light_CsrfSession\Service\LightCsrfSessionService
    methods:
        setSalt:
            salt: pepper-house

```


Related
========
- [Light_CsrfSimple plugin](https://github.com/lingtalfi/Light_CsrfSimple): the older version 
- [Light_Csrf plugin](https://github.com/lingtalfi/Light_Csrf): the oldest version




History Log
=============

- 1.0.4 -- 2021-03-05

    - update README.md, add install alternative

- 1.0.3 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.0.2 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.0.1 -- 2019-12-09

    - add related section in README.md

- 1.0.0 -- 2019-11-27

    - initial commit