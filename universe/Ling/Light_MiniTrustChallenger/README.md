Light_MiniTrustChallenger
===========
2021-06-04



A tool to help secure communication between client server.


This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========

Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_MiniTrustChallenger
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_MiniTrustChallenger
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_MiniTrustChallenger api](https://github.com/lingtalfi/Light_MiniTrustChallenger/blob/master/doc/api/Ling/Light_MiniTrustChallenger.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_MiniTrustChallenger/blob/master/doc/pages/conception-notes.md)






Services
=========


Here is an example of the service configuration:

```yaml
mini_trust_challenger:
  instance: Ling\Light_MiniTrustChallenger\Service\LightMiniTrustChallengerService
  methods:
    setContainer:
      container: @container()
    setContexts:
      context1:
        code: oizjeg70rrRL








```



History Log
=============

- 1.0.0 -- 2021-06-04

    - initial commit