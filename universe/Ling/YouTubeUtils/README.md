YouTubeUtils
=================
2016-01-09 -> 2021-03-05




Tools to manipulate Youtube Apis.



YouTubeUtils is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.YouTubeUtils
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/YouTubeUtils
```



Extract video id from a youtube url
---------------------------------------


```php
<?php


use Ling\YouTubeUtils\YouTubeTool;

require_once "bigbang.php";


$url = 'https://www.youtube.com/watch?v=trQbQP2n_9U';


a(YouTubeTool::getId($url)); // trQbQP2n_9U
```




Fetch info from a youtube video 
----------------------


```php
<?php

use Ling\YouTubeUtils\YouTubeVideo;


$apiKey = "YOUR_YOUTUBE_API_KEY"; // ask google for one...
$videoId = 'hGHrp2C9u28';
$videoId = 'trQbQP2n_9U';


$video = YouTubeVideo::create()
    ->setApiKey($apiKey)
    ->setVideoId($videoId);

a($video->getDuration());
a($video->getTitle());
a($video->getDescription());
a($video->getPublishedTime());
a($video->getThumbnail());
    
```

The output looks like this:

```html
int 145

string 'vive le train' (length=13)

string 'Vidéo choisie pour le concours de la gare 2014.

http://lingtalfi.com/gare2014' (length=79)

string '2014-12-15 00:38:19' (length=19)

string 'https://i.ytimg.com/vi/trQbQP2n_9U/default.jpg' (length=46)

```





Related
------------

- [video id and thumbnails](https://github.com/lingtalfi/video-ids-and-thumbnails)




History Log
------------------

- 1.2.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.2.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.2.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.2.0 -- 2016-02-13

    - add YouTubeVideo.setOnNoResultCb method to handle the case where the result is empty
    
- 1.1.0 -- 2016-01-09

    - add YouTubeTool
    
- 1.0.0 -- 2016-01-09

    - initial commit
    
    