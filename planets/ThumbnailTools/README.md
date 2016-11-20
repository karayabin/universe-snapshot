ThumbnailTools
==================
2016-01-06




Tool for manipulating thumbnails.





ThumbnailTools can be installed as a [planet](https://github.com/lingtalfi/Observer/blob/master/article/article.planetReference.eng.md).






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

use ThumbnailTools\ThumbnailTool;

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
    
- 1.0.1 -- 2016-01-06

    - fix bug: the destination directory is now created before hand
    
- 1.0.0 -- 2016-01-06

    - initial commit
    
    