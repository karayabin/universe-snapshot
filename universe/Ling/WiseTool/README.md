WiseTool
===========
2019-08-07 -> 2021-03-05



An adaptor tool to convert notification types in different contexts.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.WiseTool
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/WiseTool
```

Or just download it and place it where you want otherwise.






Summary
===========
- [WiseTool api](https://github.com/lingtalfi/WiseTool/blob/master/doc/api/Ling/WiseTool.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))






This is just an adaptor class.


Did you ever encounter the following notification words?

- warning
- info
- success
- error

Those are pretty standard notification types.
However, if if you've worked with bootstrap 4, you'll see that they have some notification classes, but the wording
is a little bit different:

- warning
- primary
- success
- danger

Ok.
Now let me add my own, one letter variation:

- w (warning)
- i (info)
- s (success)
- e (error)


I use those some times in some notifying tools I create.



Also there are the @page(Chloroform notification classes), and even more systems to come.


And so we end up with those notifications which basically are the same, but they just have different names (or representations).
The goal of this class is to provide easy translation from one set to another.

The first set is called regular, the second is called bootstrap, and the third (one letter) is called wise.

The chloroform objects are called "chloroform".



At the moment,  the supported systems are:

- regular
- bootstrap
- wise
- chloroform (as a target only)
- light kit admin (as a target only)





History Log
=============

- 1.2.4 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.2.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.2.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.2.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.2.0 -- 2019-08-09

    - add support for Light_Kit_Admin notifications
    
- 1.1.1 -- 2019-08-07

    - fix typo
    
- 1.1.0 -- 2019-08-07

    - add support for chloroform notifications
    
- 1.0.0 -- 2019-08-07

    - initial commit