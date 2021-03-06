VideoSubtitles
==================
2016-03-13 -> 2021-03-05


Tools to work with subtitles.



VideoSubtitles is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.VideoSubtitles
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/VideoSubtitles
```





- Srt to array: converts an srt file to an array with the following entries (example values in parenthesis):

        - id: a number representing the id of the subtitle (2)
        - start: float, the start time in seconds (24.443), or milliseconds using options
        - end: float, the end time in seconds (27.647), or milliseconds using options
        - startString: the start time in human readable format (00:00:24.443)
        - endString: the end time in human readable format (00:00:24.647)
        - duration: the duration of the subtitle, in ms (3204)
        - text: the text of the subtitle (<i>the Peacocks ruled over Gongmen City.</i>)
        
               

Examples
-----------

```php
<?php

use Ling\VideoSubtitles\Srt\SrtToArrayTool;


require_once "bigbang.php"; // start the local universe
    

$f = "/path/to/kungfupanda2.srt";
$ret = SrtToArrayTool::getArrayByFile($f);
az($ret);
    
```


Options
-------------

The method getArrayByFile accepts an array of options as its second optional argument.

The following options are available:

- startEndUnit: string, s|ms

    default=s
    
    Whether the start and end units should be returned as seconds or milliseconds
    
- defaultItem: array,

    default=[]
    
    You can use this option to decorate the items with custom properties.
    The key/value pairs that you define will be part of every item.


    

```php
<?php

use Ling\VideoSubtitles\Srt\SrtToArrayTool;


require_once "bigbang.php"; // start the local universe
    

$f = "/path/to/kungfupanda2.srt";
$ret = SrtToArrayTool::getArrayByFile($f, ['startEndUnit' => 'ms']); // start and end properties will be in milliseconds
az($ret);
    
```



History Log
------------------

- 1.2.4 -- 2021-05-31

    - Removing trailing plus in lpi-deps file (to work with Light_PlanetInstaller:2.0.0 api

- 1.2.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.2.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.2.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.2.0 -- 2016-03-15

    - add defaultItem option
    
- 1.1.0 -- 2016-03-15

    - add startEndUnit option
    
- 1.0.0 -- 2016-03-13

    - initial commit
    

    



