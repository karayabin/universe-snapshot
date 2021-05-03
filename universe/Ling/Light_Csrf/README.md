Light_Csrf
===========
2019-09-20 -> 2021-03-15



A csrf protection service for the [Light](https://github.com/lingtalfi/Light) framework.

This is a [Light framework plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).



Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_Csrf
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_Csrf
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_Csrf api](https://github.com/lingtalfi/Light_Csrf/blob/master/doc/api/Ling/Light_Csrf.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)
- [Related](#related)




Services
=========


This plugin provides the following services:

- csrf (returns a LightCsrfService instance)



Here is an example of the service configuration:

```yaml
csrf:
    instance: Ling\Light_Csrf\Service\LightCsrfService
    methods:
        setUsePage:
            bool: true

```

Related
===========
- [Light_CsrfSession plugin](https://github.com/lingtalfi/Light_CsrfSession) (preferred because simpler to develop with)
- [Light_CsrfSimple](https://github.com/lingtalfi/Light_CsrfSimple), a simpler csrf protection plugin
- [CsrfTools](https://github.com/lingtalfi/CSRFTools), some csrf related tools



History Log
=============

- 1.0.6 -- 2021-03-15

    - update planet to adapt Ling.Light:0.70.0
  
- 1.0.5 -- 2021-03-05

    - update README.md, add install alternative

- 1.0.4 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.0.3 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.0.2 -- 2019-12-09

    - update Related section in README.md
    
- 1.0.1 -- 2019-11-07

    - add Related section in README.md
    
- 1.0.0 -- 2019-09-20

    - initial commit