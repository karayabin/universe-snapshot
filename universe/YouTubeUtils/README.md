YouTubeUtils
=================
2016-01-09




Tools to manipulate Youtube Apis.



YouTubeUtils can be installed as a [planet](https://github.com/lingtalfi/Observer/blob/master/article/article.planetReference.eng.md).



Extract video id from a youtube url
---------------------------------------


```php
<?php


use YouTubeUtils\YouTubeTool;

require_once "bigbang.php";


$url = 'https://www.youtube.com/watch?v=trQbQP2n_9U';


a(YouTubeTool::getId($url)); // trQbQP2n_9U
```




Fetch info from a youtube video 
----------------------


```php
<?php

use YouTubeUtils\YouTubeVideo;


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
    
- 1.2.0 -- 2016-02-13

    - add YouTubeVideo.setOnNoResultCb method to handle the case where the result is empty
    
- 1.1.0 -- 2016-01-09

    - add YouTubeTool
    
- 1.0.0 -- 2016-01-09

    - initial commit
    
    