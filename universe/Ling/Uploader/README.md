Uploader
=============
2016-01-06



Helps implementing a server side service to handle file uploads.


Uploader is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Uploader
```






How does it work?
--------------------

There is an Uploader object, with an upload method:

```php
array|false   upload ( mixed:file ) 
```

This method returns either an array of paths where the files have been uploaded, or false in case of errors.
There is also a getErrors method for retrieving errors.


An uploader object SHOULD take care of:

- validating the input file (correct size, type, ...)
- processing the file (choose the destination path, create multiple thumbnails)








Server implementation example
-------------------------------

Here is a server implementation using [Tim 1.1.0](https://github.com/lingtalfi/Tim).
You can use this server with [dropzone.js](http://dropzonejs.com/) for instance.


```php
<?php


//------------------------------------------------------------------------------/
// EXAMPLE SERVER FOR FILE UPLOADING
//------------------------------------------------------------------------------/
use Ling\Tim\TimServer\OpaqueTimServer;
use Ling\Tim\TimServer\TimServerInterface;
use Ling\Uploader\Exception\UploaderUserException;



require_once __DIR__ . "/../../init.php"; // application general init
/**
 * The upload.init.php file defines the getUploader function,
 * which returns either false, or a valid UploaderInterface object.
 */
require_once __DIR__ . "/../../config/upload.init.php";  



OpaqueTimServer::create()->start(function (TimServerInterface $server) {

    try {
        if (
            isset($_FILES['file']) &&
            isset($_GET['uploadId'])
        ) {
        
            $file = $_FILES['file'];
            $uploadId = $_GET['uploadId'];


            if (false !== $uploader = getUploader($uploadId)) {
                if (false !== $files = $uploader->upload($file)) {
                    // $files are uploaded
                    $server->success($files);
                }
                else {
                    $s = '';
                    foreach ($uploader->getErrors() as $msg) {
                        $s .= $msg . PHP_EOL;
                    }
                    $server->error($s);
                }
            }
            else {
                $server->error("Invalid uploadId $uploadId");
            }
        }
        else {
            $server->error("invalid params");
        }
    } catch (UploaderUserException $e) {
        $server->error($e->getMessage());
    }

})->output();
```


And the upload.init.php file could contain something like this:



```php
<?php

use Ling\Uploader\Exception\UploaderUserException;
use Ling\Uploader\File\PhpFile;
use Ling\Uploader\Uploader\PhpFileUploader;
use Ling\Uploader\Uploader\UploaderInterface;


/**
 * @param $uploaderId
 * @return UploaderInterface
 */
function getUploader($uploaderId)
{
    switch ($uploaderId) {
        case 'thumbnail-table1':
            return PhpFileUploader::create()
                ->setProcessFileCb(function (PhpFile $f, array &$files) {
                        $fileName = $f->name;

                        // upload a thumbnail somewhere...
                        $target = '/tmp/' . $fileName;
                        $res = move_uploaded_file($f->tmp_name, $target);
                        if (false === $res) {
                            throw new UploaderUserException("The file couldn't be uploaded");
                        }
                        $files[] = $target;
                    }
                );

            break;
    }
    return false;
}
```






Dependencies
------------------

- [lingtalfi/Bat 1.24](https://github.com/lingtalfi/Bat)



History Log
------------------

- 1.0.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.0.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.0.0 -- 2016-01-06

    - initial commit
    
    