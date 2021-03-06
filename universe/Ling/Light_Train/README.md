Light_Train
===========
2021-02-01 -> 2021-03-15



Some tools to build common php based webservices.


This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_Train
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_Train
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_Train api](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)






Services
=========


Here is an example of the service configuration:

```yaml
train: 
    instance: Ling\Light_Train\Service\LightTrainService
    methods: 
        setContainer: 
            container: @container()
        
        setOptions: 
            options: []
        
    


```



History Log
=============

- 1.0.2 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.0.1 -- 2021-03-15

    - update planet to adapt Ling.Light:0.70.0

- 1 -- 2021-03-05

    - update README.md, add install alternative

- 1.0.0 -- 2021-02-01

    - initial commit