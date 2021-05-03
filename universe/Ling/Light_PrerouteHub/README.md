Light_PrerouteHub
===========
2019-07-18 -> 2021-03-15



A preroute hub service for the [Light](https://github.com/lingtalfi/Light) framework.

This is a [Light framework plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_PrerouteHub
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_PrerouteHub
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_PrerouteHub api](https://github.com/lingtalfi/Light_PrerouteHub/blob/master/doc/api/Ling/Light_PrerouteHub.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)




Services
=========

This planet provides the **preroute_hub** service.

Here is the content of the service configuration file:

```yaml
preroute_hub:
    instance: Ling\Light_PrerouteHub\LightPrerouteHub
    methods:
        setRunners:
            runners: []



```


The hub service is called by the [Light instance](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md), at the beginning of the [**run** method](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light/run.md),
just after the http request object is ready.

It allows for other plugins to hook some "runners" into the application logic BEFORE the router kicks in.

Runners can provide an early response, which would then have the effect to skip the routing entirely.

We recommend that runners use the polite approach: create a response only if the response has not already been set by another plugin.


Examples of use includes:

- redirecting an user if he is not logged in


An runner must implement the [LightPrerouteHubRunnerInterface](https://github.com/lingtalfi/Light_PrerouteHub/blob/master/doc/api/Ling/Light_PrerouteHub/Runner/LightPrerouteHubRunnerInterface.md) interface provided by this planet.


History Log
=============

- 1.0.4 -- 2021-03-15

    - update planet to adapt Ling.Light:0.70.0

- 1.0.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.0.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.0.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.0.0 -- 2019-07-18

    - initial commit