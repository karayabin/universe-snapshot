UniversalTemplateEngine
=======================
2019-01-21 -> 2021-03-05



Defines a generic template engine interface for planets of the universe to implement.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.UniversalTemplateEngine
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/UniversalTemplateEngine
```

Or just download it and place it where you want otherwise.




About
=====



What's a template?
------------------
In this planet, a template is some piece of code in which we can inject variables (and which reacts to those variables).


What's a template engine?
-------------------------
In this planet, a template engine is an object that takes a resource identifier (which identifies a template) and some variables as the input,
and returns a rendered template (a template in which the variables have been injected), or false if something goes wrong, in which case errors
are accessible via the getErrors method.

The signature methods of a template engine are therefore the following:


```php
- string|false render ( string resourceIdentifier, array variables = [] )
- array getErrors ()
```









History Log
------------------

- 1.1.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.1.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.1.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.1.0 -- 2019-04-09

    - update UniversalTemplateEngineInterface->render method, now resourceId has a string type 
    
- 1.0.0 -- 2019-01-21

    - initial commit