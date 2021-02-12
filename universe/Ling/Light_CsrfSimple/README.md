Light_CsrfSimple
===========
2019-11-07



A tool to help protecting your [light](https://github.com/lingtalfi/Light) application against csrf attacks.

This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


It's a simpler alternative to the [Light_Csrf](https://github.com/lingtalfi/Light_Csrf) service.


As of 2019-11-07, this is the preferred alternative as for csrf protection implementation in the Light framework.



Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_CsrfSimple
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_CsrfSimple api](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/api/Ling/Light_CsrfSimple.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/pages/conception-notes.md)
    - [Events](https://github.com/lingtalfi/Light_CsrfSimple/blob/master/doc/pages/events.md)
- [Services](#services)
- [Related](#related)



Services
=========


This plugin provides the following services:

- csrf_simple (returns a LightCsrfSimpleService instance)




Here is an example of the service configuration:

```yaml
csrf_simple:
    instance: Ling\Light_CsrfSimple\Service\LightCsrfSimpleService
    methods:
        setContainer:
            container: @container()

# --------------------------------------
# hooks
# --------------------------------------
$events.methods_collection:
    -
        method: registerListener
        args:
            event: Light.on_route_found
            listener:
                instance: @service(csrf_simple)
                callable_method: onRouteFound





```


Related
===========
- [Light_CsrfSession plugin](https://github.com/lingtalfi/Light_CsrfSession) (preferred because simpler to develop with)
- [Light_Csrf](https://github.com/lingtalfi/Light_Csrf), a more complex/secure csrf protection plugin




History Log
=============

- 1.2.3 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.2.2 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.2.1 -- 2019-12-09

    - update Related section in README.md
    
- 1.2.0 -- 2019-11-08

    - add LightCsrfSimpleService->getOldToken

- 1.1.1 -- 2019-11-08

    - fix functional typo, event Light_CsrfSimple.on_csrf_token_regenerated not dispatched
    
- 1.1.0 -- 2019-11-08

    - add event Light_CsrfSimple.on_csrf_token_regenerated
    
- 1.0.0 -- 2019-11-07

    - initial commit