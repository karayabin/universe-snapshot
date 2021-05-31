ParseDown
===========
2019-02-19 -> 2021-03-05


A markdown parser.


All credits goes to https://github.com/erusev/parsedown (i.e. I didn't touch the code)


I've just created a planet "shell" for the [ParseDown class](https://github.com/erusev/parsedown/blob/master/Parsedown.php), 
so that users of the universe can import it via the [uni tool](https://github.com/lingtalfi/universe-naive-importer) (the dependency manager of
the universe framework).  

 
 

  

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.ParseDown
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/ParseDown
```

Or just download it and place it where you want otherwise.




History Log
------------------

- 1.0.4 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.0.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.0.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.0.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.0.0 -- 2019-02-19

    - initial commit