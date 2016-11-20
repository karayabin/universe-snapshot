SecureImageUploader
================
2016-11-17


A simple to use and secure uploader for images in php.



SecureImageUploader can be installed as a [planet](https://github.com/lingtalfi/Observer/blob/master/article/article.planetReference.eng.md).




Features
--------------

- for images only (jpg, png, gif)
- easy to adapt to your needs: only 135 lines of code
- secure: it reforges the image, to eliminate potential backdoor nested in the user's image






How?
--------

It's a one liner.

```php
$path = SecureImageUploader::upload($_FILES['url_photo'], $dest, null, 300);
```


Example in context:

```php

// your php form handling code...

$urlPhoto = null;
if (array_key_exists('url_photo', $_FILES) && strlen($_FILES['url_photo']['tmp_name']) > 0) {

    $dest = APP_ROOT_DIR . "/www/img/users/" . $userId;
    FileSystemTool::mkdir($dest); // ensure that the $dest directory exists
    
    $path = SecureImageUploader::upload($_FILES['url_photo'], $dest, null, 300);
    
    $urlPhoto = substr($path, strlen(APP_ROOT_DIR . "/www"));
}

// at that point, $urlPhoto is either null (if no file was uploaded), or set to the path 


```


The upload method
----------------------

Excerpt from source code

```php
/**
 * This function reforges the image, to eliminate potential backdoor nested in the user's image.
 *
 * - dest, can be either:
 *      - path to the parent directory, in which case the fileName will be the based on the 'name' property
 *              of the phpUploadEntry array.
 *      - path to the file to create (if it already exists, it will be overridden)
 *
 * - maxWidth: null
 * - maxHeight: null
 *
 * If both maxWidth and maxHeight are null, then the image will be recreated with its original dimension.
 *
 * If one of the two parameters is specified, the other will adapt to preserve the ratio of the original image.
 *
 * If both maxWidth and maxHeight are specified, then the image will be constrained in the box defined by those
 * limits. The ratio of the original image is always preserved.
 *
 *
 *
 * - errCallback: if provided, any error message will be sent to this function.
 * Otherwise, a \RuntimeException will be thrown in case of error.
 *
 *
 *
 * The function returns the path of the uploaded image, or false in case of problems.
 *
 */
public static function upload(array $phpUploadEntry, $dest, $maxWidth = null, $maxHeight = null, \Closure $errCallback = null)
```






Related
--------------

The SecureImageUplaoder is basically a simplified version of the Uploader below, 
but spefiically for images.

- [Uploader](https://github.com/lingtalfi/Uploader)



Dependencies
------------------

- [planet Bat 1.31](https://github.com/lingtalfi/Bat)
- [planet ThumbnailTools 1.0.1](https://github.com/lingtalfi/ThumbnailTools)




History Log
------------------
    
- 1.0.0 -- 2016-11-17

    - initial commit
    
    
    
    
    




