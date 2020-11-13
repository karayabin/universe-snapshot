Light_LingHooks
===========
2020-08-17



A personal service to help me use some [light](https://github.com/lingtalfi/Light) plugins more efficiently. 


This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_LingHooks
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_LingHooks api](https://github.com/lingtalfi/Light_LingHooks/blob/master/doc/api/Ling/Light_LingHooks.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_LingHooks/blob/master/doc/pages/conception-notes.md)






Services
=========


Here is an example of the service configuration:

```yaml
ling_hooks:
    instance: Ling\Light_LingHooks\Service\LightLingHooksService
    methods:
        setContainer:
            container: @container()
        setOptions:
            options: []







```



History Log
=============

- 1.0.0 -- 2020-08-17

    - initial commit