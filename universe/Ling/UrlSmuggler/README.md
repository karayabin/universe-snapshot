UrlSmuggler
===========
2021-05-02



A tool to pass url via urls.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========

Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.UrlSmuggler
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/UrlSmuggler
```

Or just download it and place it where you want otherwise.







What is it?
===========
2021-05-02


When you pass an url via an url, you might encounter problems, because of the multiple question marks and ampersands symbols 
conflicting with each other.

This tool basically flattens/unflattens those special characters in an url, so that you can pass an url as a $_GET parameter,
without conflicting with the main url in which it is contained.







History Log
=============

- 1.0.0 -- 2021-05-02

    - initial commit