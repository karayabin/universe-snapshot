AssetsList
================
2016-12-28



A helper class to manage assets in your website.



AssetsList is part of the [universe framework](https://github.com/karayabin/universe-snapshot).




Install
=============


Using the [uni tool](https://github.com/lingtalfi/universe-naive-importer)
```bash
uni import Ling/AssetsList
```



How does it work?
=====================

There are two phases:

- registering the calls
- displaying the assets



Registering the calls
------------------------

To register a call, you call the js or the css method.

AssetsList is a static class with static methods, so you can call an asset from anywhere.


```php
AssetsList::js("/libs/mylibs/dorothy.js");
```

If it's a library that should only be called once, pass the name of the library as the second argument.
Every subsequent call to the same library will be ignored.


```php
AssetsList::js("/libs/jquery/jquery.min.js", "jquery");
```


Displaying the assets
----------------------

When you are done collecting the assets, you need to display them.

Inside your html head, call the displayList method.

```php
AssetsList::displayList();
```



Dependencies
------------------

- [Bat 1.38](https://github.com/lingtalfi/Bat)




History Log
------------------

- 1.0.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.0.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.0.0 -- 2016-12-28

    - initial commit

