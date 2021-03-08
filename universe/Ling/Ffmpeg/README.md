Ffmpeg
================
2016-04-05 -> 2021-03-05


A ffmpeg wrapper for php.

Ffmpeg is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
=============


Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Ffmpeg
```

Using the [uni tool](https://github.com/lingtalfi/universe-naive-importer)
```bash
uni import Ling/Ffmpeg
```



Methods
-----------

- int   getDurationInSeconds ( string:file, string:ffmpegPath=null )
- string    getDurationString ( string:file, string:ffmpegPath=null )



Examples
--------------

```php
<?php


use Ling\Ffmpeg\Ffmpeg;

require_once "bigbang.php"; // start the local universe

a(Ffmpeg::getDurationString(__DIR__ . "/video/panda.mp4")); // string   01:30:24.09
a(Ffmpeg::getDurationInSeconds(__DIR__ . "/video/panda.mp4")); // int   5424
    
```





History Log
------------------

- 1.0.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.0.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.0.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.0.0 -- 2016-04-04

    - initial commit
    
    