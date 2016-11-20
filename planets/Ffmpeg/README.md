Ffmpeg
================
2016-04-05


A ffmpeg wrapper for php.

Ffmpeg can be installed as a [planet](https://github.com/lingtalfi/Observer/blob/master/article/article.planetReference.eng.md).



Methods
-----------

- int   getDurationInSeconds ( string:file, string:ffmpegPath=null )
- string    getDurationString ( string:file, string:ffmpegPath=null )



Examples
--------------

```php
<?php


use Ffmpeg\Ffmpeg;

require_once "bigbang.php"; // start the local universe

a(Ffmpeg::getDurationString(__DIR__ . "/video/panda.mp4")); // string   01:30:24.09
a(Ffmpeg::getDurationInSeconds(__DIR__ . "/video/panda.mp4")); // int   5424
    
```





History Log
------------------
    
- 1.0.0 -- 2016-04-04

    - initial commit
    
    