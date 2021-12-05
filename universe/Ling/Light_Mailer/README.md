Light_Mailer
===========
2020-06-29 -> 2021-06-28

A mailer service for the [light framework](https://github.com/lingtalfi/Light).

This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller)
via [light-cli](https://github.com/lingtalfi/Light_Cli)

```bash
lt install Ling.Light_Mailer
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.

```bash
uni import Ling/Light_Mailer
```

Or just download it and place it where you want otherwise.






Summary
===========

- [Light_Mailer api](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/api/Ling/Light_Mailer.md) (generated
  with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/pages/conception-notes.md)
    - [Events](https://github.com/lingtalfi/Light_Mailer/blob/master/doc/pages/events.md)

Services
=========


Here is an example of the service configuration:

```yaml
mailer:
    instance: Ling\Light_Mailer\Service\LightMailerService
    methods:
        setContainer:
            container: @container()
        setOptions:
            options:
                useDebug: true              # default is false
                useSendFailuresLog: true    # default is true
        registerTemplatePartsDirectory:
            alias: template
            path: ${app_dir}/templates/app/mailer_template_parts



```

History Log
=============

- 1.3.20 -- 2021-06-28

    - fix api wrong reference to Ling.Light_Logger
  
- 1.3.19 -- 2021-06-25

    - update api, now use Ling.Light_Logger open registration system

- 1.3.18 -- 2021-06-15

    - fix LightMailerService->getMailerRootDir not returning galaxy aware path

- 1.3.17 -- 2021-06-15

    - update installer hook2, now installs swiftmailer automatically if composer available

- 1.3.16 -- 2021-06-15

    - fix conception notes configuration section, wrong example

- 1.3.15 -- 2021-06-15

    - update conception notes, add configuration section

- 1.3.14 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.3.13 -- 2021-05-03

    - Update dependencies to Ling.Light_Logger (pushed by SubscribersUtil)

- 1.3.12 -- 2021-05-03

    - Update dependencies to Ling.Light_Events (pushed by SubscribersUtil)

- 1.3.11 -- 2021-05-03

    - Update dependencies to Ling.Light_Events (pushed by SubscribersUtil)

- 1.3.10 -- 2021-05-03

    - Update dependencies to Ling.Light_Events (pushed by SubscribersUtil)

- 1.3.9 -- 2021-03-15

    - update planet to adapt Ling.Light:0.70.0

- 1.3.8 -- 2021-03-09

    - update default root dir, now includes galaxy name

- 1.3.7 -- 2021-03-05

    - update README.md, add install alternative

- 1.3.6 -- 2021-03-02

    - update service->sendMessage, now throwEx defaults to true

- 1.3.5 -- 2020-12-08

    - fix lpi-deps not using natsort

- 1.3.4 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.3.3 -- 2020-11-30

    - update LightMailerService->send, now template parts references are also possible in the mail subject

- 1.3.2 -- 2020-11-30

    - update LightMailerService->send, add errMode option

- 1.3.1 -- 2020-11-30

    - add template parts reference concept

- 1.3.0 -- 2020-08-17

    - update LightMailerService, add setSender and setTransport methods

- 1.2.0 -- 2020-08-14

    - the default templates directory is now app/templates/Light_Mailer again

- 1.1.0 -- 2020-08-14

    - the default templates directory is now app/templates

- 1.0.1 -- 2020-07-27

    - fix typo in LightMailerService->sendMessage


- 1.0.0 -- 2020-06-29

    - initial commit