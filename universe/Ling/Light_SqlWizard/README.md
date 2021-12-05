Light_SqlWizard
===========
2021-06-28



A light wrapper for the [SqlWizard planet](https://github.com/lingtalfi/SqlWizard).


This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========

Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_SqlWizard
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_SqlWizard
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_SqlWizard api](https://github.com/lingtalfi/Light_SqlWizard/blob/master/doc/api/Ling/Light_SqlWizard.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_SqlWizard/blob/master/doc/pages/conception-notes.md)






Services
=========


Here is an example of the service configuration:

```yaml
sql_wizard:
    instance: Ling\Light_SqlWizard\Service\LightSqlWizardService
    methods:
        setContainer:
            container: @container()
        setOptions:
            options: ${sql_wizard_vars.service_options}


sql_wizard_vars:
    service_options: []





```



History Log
=============

- 1.0.0 -- 2021-06-28

    - initial commit