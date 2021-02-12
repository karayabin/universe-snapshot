Light_Flasher
===========
2019-08-07



An simple utility for storing temporary messages in the session.

This is a [Light framework plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_Flasher
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_Flasher api](https://github.com/lingtalfi/Light_Flasher/blob/master/doc/api/Ling/Light_Flasher.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)



Services
=========


This plugin provides the following services:

- flasher


Here is an example of the service configuration file:

```yaml
flasher:
    instance: Ling\Light_Flasher\Service\LightFlasherService


```





History Log
=============

- 1.3.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.3.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.3.0 -- 2019-11-29

    - renamed LightFlasher to LightFlasherService
    
- 1.2.0 -- 2019-08-13

    - update LightFlasher->getFlash, now have the option to NOT remove the flash after use
    
- 1.1.0 -- 2019-08-07

    - LightFlasher now uses flash notifications instead of messages
    
- 1.0.1 -- 2019-08-07

    - update doc
    
- 1.0.0 -- 2019-08-07

    - initial commit