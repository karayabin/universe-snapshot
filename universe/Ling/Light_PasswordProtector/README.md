Light_PasswordProtector
===========
2019-08-07



A password hash protection service service for your [Light](https://github.com/lingtalfi/Light) applications.

This is a [Light framework plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_PasswordProtector
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_PasswordProtector api](https://github.com/lingtalfi/Light_PasswordProtector/blob/master/doc/api/Ling/Light_PasswordProtector.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)





Services
=========


This plugin provides the following services:

- password_protector


This service basically memorizes a hash algorithm and its options, so that you can use it consistently across your whole application.


Here is an example of the service configuration:

```yaml
password_protector:
    instance: Ling\Light_PasswordProtector\Service\LightPasswordProtector
    methods:
        setAlgorithmName:
            name: bcrypt

```


History Log
=============

- 1.0.3 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.0.2 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.0.1 -- 2019-10-03

    - internal code re-organization for LightPasswordProtector

- 1.0.0 -- 2019-08-07

    - initial commit