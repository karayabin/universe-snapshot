Light_HtmlPageCopilot
===========
2019-08-30 -> 2021-03-05



A service to share an [HtmlPageCopilot](https://github.com/lingtalfi/HtmlPageTools/blob/master/doc/api/Ling/HtmlPageTools/Copilot/HtmlPageCopilot.md) instance in a [Light](https://github.com/lingtalfi/Light) environment.


This is a [Light framework plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_HtmlPageCopilot
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_HtmlPageCopilot
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_HtmlPageCopilot api](https://github.com/lingtalfi/Light_HtmlPageCopilot/blob/master/doc/api/Ling/Light_HtmlPageCopilot.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)
- Pages
    - [Html page copilot example](https://github.com/lingtalfi/Light_HtmlPageCopilot/blob/master/doc/pages/html-page-copilot-example.md)



Services
=========


This plugin provides the following services:

- html_page_copilot


The html_page_copilot is meant to be used as a singleton service, meaning that a rendering framework
and all its participating plugins can/should rely on this service to access the htmlPageCopilot instance.

Note: because all light plugins have easy access to the service container, while it's harder to manually transmit
the htmlPageCopilot instance from object to object. 



Here is the content of the service configuration file:

```yaml
html_page_copilot:
    instance: Ling\Light_HtmlPageCopilot\Service\LightHtmlPageCopilotService

```




History Log
=============

- 1.0.6 -- 2021-03-05

    - update README.md, add install alternative

- 1.0.5 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.0.4 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.0.3 -- 2019-11-25

    - add dedicated copilot service class

- 1.0.2 -- 2019-10-18

    - add precision comment
    
- 1.0.1 -- 2019-10-18

    - add example in documentation
    
- 1.0.0 -- 2019-08-30

    - initial commit