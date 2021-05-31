Octopus
=======
2019-02-07 -> 2021-03-05



A service container for your php apps.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Octopus
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Octopus
```

Or just download it and place it where you want otherwise.





What's a service?
=================

In Octopus, a service is an object instance.

So for instance this is a service:

```php

class Animal{
}
$service = new Animal();
```


A service can be configured (by using arguments on the constructor, or calling methods on the instance),
and can virtually do anything.





What's an Octopus service container?
====================================

The Octopus service container is an object responsible for managing the services of your application.

Every time you want to access a service, you ask the service container and it gives the service back to you.

It's a centralized system.


What's special about Octopus?

- Octopus handles the lazy instantiation of your services for you, which means a service is only instantiated once when you call it. Every subsequent call to the same service returns the cached instance.
- Octopus can be exported as a static php class, thus improving the speed and the performances of your app in production.
- Octopus can also work in dynamic mode, making development sessions easier.
- To create services, Octopus uses the [sic notation](https://github.com/lingtalfi/NotationFan/blob/master/sic.md), which makes definition of services a trivial task.



Let's dive in
=============

Octopus comes with two versions:

- [red octopus](https://github.com/lingtalfi/Octopus/blob/master/doc/RedOctopusServiceContainer.md), the hot (aka dynamic) service container
- [blue octopus](https://github.com/lingtalfi/Octopus/blob/master/doc/BlueOctopusServiceContainer.md), the cold (aka static) service container















History Log
------------------

- 1.4.5 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.4.4 -- 2021-03-05

    - update README.md, add install alternative

- 1.4.3 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.4.2 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.4.1 -- 2020-12-01

    - update blue octopus, add getOwnMethods method
    
- 1.4.0 -- 2019-05-02

    - add @container() notation for red and blue octopuses
    
- 1.3.0 -- 2019-04-18

    - add OctopusServiceContainerInterface->all method
    
- 1.2.1 -- 2019-04-04

    - fix DarkBlueOctopusServiceContainerBuilder creating use statements without Ling galaxy prefix
    
- 1.2.0 -- 2019-04-04

    - add OctopusServiceContainerInterface->has method
    
- 1.1.0 -- 2019-02-07

    - Octopus\ServiceContainerBuilder\DarkBlueOctopusServiceContainerBuilder can now parse the @service notation

- 1.0.0 -- 2019-02-07

    - initial commit


