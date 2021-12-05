Light_JimToolbox
===========
2021-07-08 -> 2021-07-27

A side toolbox for your gui to help with various actions.

This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========

Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller)
via [light-cli](https://github.com/lingtalfi/Light_Cli)

```bash
lt install Ling.Light_JimToolbox
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.

```bash
uni import Ling/Light_JimToolbox
```

Or just download it and place it where you want otherwise.






Summary
===========

- [Light_JimToolbox api](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/api/Ling/Light_JimToolbox.md) (
  generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_JimToolbox/blob/master/doc/pages/conception-notes.md)

Services
=========


Here is an example of the service configuration:

```yaml
jim_toolbox:
    instance: Ling\Light_JimToolbox\Service\LightJimToolboxService
    methods:
        setContainer:
            container: @container()
        setOptions:
            options: ${jim_toolbox_vars.service_options}


jim_toolbox_vars:
    service_options: [ ]





```

History Log
=============

- 1.0.5 -- 2021-07-27

    - update templates, add $_jimToolboxOffset50 config variable
  
- 1.0.4 -- 2021-07-15

    - update templates, add $_jimToolboxIsVisible config variable
  
- 1.0.3 -- 2021-07-08

    - add service->getTemplateFlavours method
  
- 1.0.2 -- 2021-07-08

    - add two flavours of templates: bootstrap and fontawesome
  
- 1.0.1 -- 2021-07-08

    - add dependencies to jimtoolbox planet (for assets)
    - add service->getJimToolboxItem method
  
- 1.0.0 -- 2021-07-08

    - initial commit