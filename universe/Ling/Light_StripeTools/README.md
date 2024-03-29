Light_StripeTools
===========
2021-08-12



Some tools to build common php based webservices.


This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========

Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_StripeTools
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_StripeTools
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_StripeTools api](https://github.com/lingtalfi/Light_StripeTools/blob/master/doc/api/Ling/Light_StripeTools.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_StripeTools/blob/master/doc/pages/conception-notes.md)






Services
=========


Here is an example of the service configuration:

```yaml
stripe_tools:
    instance: Ling\Light_StripeTools\Service\LightStripeToolsService
    methods:
        setContainer:
            container: @container()
        setOptions:
            options: ${stripe_tools_vars.service_options}


stripe_tools_vars:
    service_options: []





```



History Log
=============

- 0.0.1 -- 2021-08-12

    - initial commit