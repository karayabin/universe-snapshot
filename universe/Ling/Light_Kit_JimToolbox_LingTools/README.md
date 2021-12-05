Light_Kit_JimToolbox_LingTools
===========
2021-07-27



My personal JimToolbox pane.


This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========

Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_Kit_JimToolbox_LingTools
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_Kit_JimToolbox_LingTools
```

Or just download it and place it where you want otherwise.




Register it to Ling.Light_JimToolbox:
------

Example snippet:

```yaml
ling_tools:
    label: Ling
    icon: bi bi-palette
    acp_class: Ling\Light_Kit_JimToolbox_LingTools\JimToolbox\LingToolsToolbox
    get:
        project: kit_store

```







Summary
===========
- [Light_Kit_JimToolbox_LingTools api](https://github.com/lingtalfi/Light_Kit_JimToolbox_LingTools/blob/master/doc/api/Ling/Light_Kit_JimToolbox_LingTools.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages
  - [Conception notes](https://github.com/lingtalfi/Light_Kit_JimToolbox_LingTools/blob/master/doc/pages/conception-notes.md)




History Log
=============

- 1.0.1 -- 2021-07-27

    - fix erroneous link, project parameter empty
  
- 1.0.0 -- 2021-07-27

    - initial commit