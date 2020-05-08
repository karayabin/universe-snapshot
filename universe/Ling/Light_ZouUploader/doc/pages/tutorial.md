Tutorial
==========
2020-04-14



Those are the quick steps I used to test the ZouUploader.

It's more a memo to myself than an everybody tutorial, but if you can follow along, good for you.



- Create the test files
- Create the server
- Create the html page
- Create the test js module
- Bundle the test module
- Test your setup







Create the test files
---------

I used two files: one **cat.png** image that weights 487Kb and a movie from a camera **001.MTS** that weights 172.7Mb.

- /app/www/assets/cat.png
- /app/www/assets/001.MTS


I also create a temporary dir **/app/tmp** which will contain the files once uploaded by the server.




Create the server
-----------


Create the file **/app/test-server.php** and put the following content in it (or usually just use your own controller):

```php
<?php


use Ling\Light\Core\Light;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light_ZouUploader\ZouUploader;

require_once "./init.inc.php";


$light = new Light();
$light->setDebug(true);
$light->setContainer($container);
$light->registerRoute("/test-server.php", function (HttpRequestInterface $request) use ($container) {


    $appDir = $container->getApplicationDir();

    // switch this manually depending on whether you test the regular upload or the chunk upload.
    $dst = $appDir . "/tmp/cat.png"; // light file to test regular upload
    $dst = $appDir . "/tmp/00076.MTS"; // heavy file to test chunk upload


    $zou = new ZouUploader();
    $zou->setDestinationPath($dst);

    try {

        if (true === $zou->isUploaded($request)) {
            az("do something with the uploaded file");
        }
    } catch (\Exception $e) {


        a($e->getMessage());
        az($e->getTraceAsString());
    }


});

$light->run();

```



Create the html page
-----------

Create the file **/app/test.php** and put the following in it:


```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title</title>
    <script src="/test.min.js"></script>

</head>

<body>

<script>

    var test = new Test();
    
    test.upload("/assets/cat.png");
    // test.upload("/assets/00076.MTS");

</script>


</body>
</html>

```


Notice that the **/test.min.js** script doesn't exist yet, we will create it in the next steps.



Create the test js module
----------------


Create the file **/app/www/js/test/modules/Test.js** and put the following content in it:


```js
const jsx = require('js-extension-ling');
const ChunkUploader = require('chunk-uploader');

class Test {

    async upload(url) {


        var blob = await (await fetch(url)).blob();
        console.log(blob);

        //----------------------------------------
        // REGULAR UPLOAD
        //----------------------------------------
        jsx.post("/test-server.php", {
            post: {
                useChunks: 0,
            },
            get: {},
            files: {
                file: blob,
            },
        });

        // //----------------------------------------
        // // CHUNK UPLOAD
        // //----------------------------------------
        // var uploader = new ChunkUploader({
        //     serverUrl: "/test-server.php",
        // });
        // uploader.sendByChunks(blob, {
        //     // filename: "maurice.png",
        //     useChunks: 1,
        // }, {});


    }
}


module.exports = Test;

```


Comment/Uncomment the section you want to test (either regular upload or chunk upload).

Notice that you'll need to install **js-extension-ling** and **chunk-uploader** (`npm i js-extension-ling chunk-uploader`).


Now create the file **/app/www/js/test/main.js** and put the following content in it:

```js
import Test from "./modules/test.js";


//----------------------------------------
//
//----------------------------------------
(function () {
    if ('undefined' === typeof window.Test) {
        window.Test = Test;
    }
})();

```


This is to make our Test object accessible to the browser.




Bundle the test module
------------

I use the autumn tool.

```bash 
npm i autumn-wizard
```


Create the file **/app/autumn-test.js** and put the following content in it:


```js
const Autumn = require("autumn-wizard");


var useWatch = true;


const baseDir = "./js/test";
const w = new Autumn();
w.watch([`${baseDir}/**/*.js`], () => {


    const useSourceMap = true; // set this to false in production

    //----------------------------------------
    // BUNDLE THE JS MODULES
    //----------------------------------------
    var srcPath = `${baseDir}/main.js`;
    var dstPath = `./test.min.js`;
    w.bundle(srcPath, dstPath, {
        debug: useSourceMap,
    });

    //----------------------------------------
    // RELOAD THE BROWSER (if we watch the files)
    //----------------------------------------
    if (true === useWatch) {
        w.browserReload("https://jindemo/test.php", {
            webRootDir: './',
            https: {
                key: '/usr/local/etc/httpd/ssl/jindemo.key',
                cert: '/usr/local/etc/httpd/ssl/jindemo.crt',
            }
        });
    }
}, useWatch);

```

Note: I use a virtual host domain with ssl, so you might have to change the browser reload page depending on your own need,
or drop it completely and do the bundle manually if you prefer.



Now in your **/app/package.json**, make sure to add this script:

```js
// ... 
  "scripts": {
    // ...
    "test": "node autumn-test.js"
  },
// ...
```




Test your setup
----------

Now that all this is done, open a terminal and do the following:

```bash 
cd /app
node run test
```


Then in your browser, open **(your app domain)/test.php**.



