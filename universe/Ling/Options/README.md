Options
===========
2017-08-25 -> 2021-03-05



An options object that you can pass instead of an options array.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Options
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Options
```

Or just download it and place it where you want otherwise.


Why
==========

- centralization: and so you can name the options set (by naming the options object)
- get method: save you an array_key_exists per entry, and/or a throw exception if not exist logic block


Imagine this nice and clean statement:

```php
BigGreenButton::create()->push(BigGreenButtonOptions::create()->setShopId("1"));
```




Howto
=======
```php
$myOptions = Options::create()->setVars([
    "color" => "red",
    "sport" => "judo",
]);


$color = $myOptions->get("color", "blue"); // second argument is the default value in case of non existing key
$sport = $myOptions->get("sport", "karate");
$age = $myOptions->get("age", "42");
$mandatoryOption = $myOptions->get("mandatoryOption", null, true); // this throws an exception if the key is not found
```



History Log
------------------

- 1.1.4 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.1.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.1.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.1.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.1.0 -- 2017-08-25

    - now get also search in the protected/public properties of the instance
    
- 1.0.0 -- 2017-08-25

    - initial commit
    
    