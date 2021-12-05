Light_Kit_JimToolbox_PhpstormWidgetLinks
===========
2021-07-08 -> 2021-08-03



Open widget template files directly in php storm.

This is an item for [light jim toolbox](https://github.com/lingtalfi/Light_JimToolbox).




This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========

Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_Kit_JimToolbox_PhpstormWidgetLinks
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_Kit_JimToolbox_PhpstormWidgetLinks
```

Or just download it and place it where you want otherwise.




Register it to Ling.Light_JimToolbox:
------

Example snippet:

```yaml
phpstorm_links: 
    label: ide links
    icon: bi bi-code-square
    acp_class: Ling\Light_Kit_JimToolbox_PhpstormWidgetLinks\JimToolbox\PhpstormWidgetLinksToolbox
    get: 
        project: kit_store

```





Summary
===========
- [Light_Kit_JimToolbox_PhpstormWidgetLinks api](https://github.com/lingtalfi/Light_Kit_JimToolbox_PhpstormWidgetLinks/blob/master/doc/api/Ling/Light_Kit_JimToolbox_PhpstormWidgetLinks.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_Kit_JimToolbox_PhpstormWidgetLinks/blob/master/doc/pages/conception-notes.md)






History Log
=============

- 1.0.5 -- 2021-08-03

    - update pane, add page link (if babyYaml storage is used)

- 1.0.4 -- 2021-07-27

    - update README.md, removed unused link, add section
  
- 1.0.3 -- 2021-07-27

    - update panel, add link to controller  
  
- 1.0.2 -- 2021-07-08

    - update planet installer, now is aware of jim toolbox flavours  
  
- 1.0.1 -- 2021-07-08

    - update planet installer, now ask whether to override an existing project if any 
  
- 1.0.0 -- 2021-07-08

    - initial commit