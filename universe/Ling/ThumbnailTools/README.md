ThumbnailTools
==================
2016-01-06 -> 2021-03-05




Tool for manipulating thumbnails.





ThumbnailTools is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.ThumbnailTools
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/ThumbnailTools
```






### biggest 

This is the main function for generating thumbnail.
It was originally designed to handle a php file upload.


```php
bool:result    function biggest( str:src, str:dst, mixed:maxWidth = null, mixed:maxHeight = null)
```


Create the biggest thumbnail possible given the maxWidth and maxHeight.

Ratio is always preserved.

The destination directory is created if necessary.

The function ensures that an image is created (handy to use with uploaded files for security).

If maxWidth is null and maxHeight is null, the created image will have the same dimensions
as the original image.

If maxWidth is set and maxHeight is null, then the created image's width will be maxWidth, and the image's height will
be the natural height that maintain the ratio.

Conversely, if maxHeight is set and maxWidth is null, then the created image's height will be maxHeight, and the image's width will
be the natural width that maintain the ratio.

If both maxWidth and maxHeight are set, then the created image will have dimensions so that it honors both limitations,
and in accordance with the image original ratio.

maxWidth and maxHeight must be strictly positive integers.




#### Example

```php
<?php

use Ling\ThumbnailTools\ThumbnailTool;

require_once "bigbang.php";


$src = "/Users/images/marvel.png";
$dst = "/tmp/test.png";
a(ThumbnailTool::biggest($src, $dst, 400, 400)); // true

```








Dependencies
------------------

- [lingtalfi/Bat 1.24](https://github.com/lingtalfi/Bat)



History Log
------------------

- 1.3.4 -- 2021-03-05

    - update README.md, add install alternative

- 1.3.3 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.3.2 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.3.1 -- 2019-10-17

    - add missing comment docBlock in ThumbnailTool::biggest
    
- 1.3.0 -- 2019-10-17

    - updated ThumbnailTool::biggest, now accepts an options argument
    
- 1.2.2 -- 2018-02-26

    - enhance ThumbNailTool::biggest now defaults to src extension if dst extension is not explicit
    
- 1.2.1 -- 2018-02-26

    - fix ThumbNailTool::biggest method inverting png and gif handling
    
- 1.2.0 -- 2017-07-13

    - now returns false when "Division by zero" problem (erroneous image) occurs
    
- 1.1.0 -- 2017-05-24

    - add KoolThumbnailTool class
    
- 1.0.2 -- 2017-05-24

    - fix bug: when both maxWidth and maxHeight are specified, the image can scale up
    
- 1.0.1 -- 2016-01-06

    - fix bug: the destination directory is now created before hand
    
- 1.0.0 -- 2016-01-06

    - initial commit
    
    