Light_ZouUploader
===========
2020-04-14 -> 2021-03-05



A php facade to handle both regular uploads and chunk uploads.


This is a [Light plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_ZouUploader
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_ZouUploader
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_ZouUploader api](https://github.com/lingtalfi/Light_ZouUploader/blob/master/doc/api/Ling/Light_ZouUploader.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_ZouUploader/blob/master/doc/pages/conception-notes.md)
    - [tutorial](https://github.com/lingtalfi/Light_ZouUploader/blob/master/doc/pages/tutorial.md)









History Log
=============

- 1.1.4 -- 2021-03-05

    - update README.md, add install alternative

- 1.1.3 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.1.2 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.1.1 -- 2020-04-20

    - fix ZouUploader->isUploaded trying to unlink the file with move option 
    
- 1.1.0 -- 2020-04-20

    - add the move option 
    
- 1.0.0 -- 2020-04-14

    - initial commit