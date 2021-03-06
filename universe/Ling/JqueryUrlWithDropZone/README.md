JqueryUrlWithDropZone
=====================
2016-01-06 -> 2021-03-05



A jquery based snippet to create a form control consisting of an input text and a dropzone.
 



JqueryUrlWithDropZone is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
=============


Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.JqueryUrlWithDropZone
```

Using the [uni tool](https://github.com/lingtalfi/universe-naive-importer)
```bash
uni import Ling/JqueryUrlWithDropZone
```


This depends on [jquery](https://jquery.com/) and [dropzone.js](http://dropzonejs.com/). 
 
Why?
--------
 
Imagine you want to allow the user to upload a video, using either a youtube url, or a mp4 file. 
Imagine you want to allow the user to upload a thumbnail, using either an http url, or a local file.
 
 
This snippet is a good basis to start implementing those behaviours.
 
 
 
How?
----------
 
Download the url-with-dropzone.js script and load it in your page 
 
```html 
<script src="/libs/url-with-dropzone/js/url-with-dropzone.js"></script>
``` 


Then you can use the following code to start with:


```js 

(function ($) {
    $(document).ready(function () {

        new urlWithDropZone({
            url: "/test.php",
            jInput: $("#uwdz_thumbnail"),
            jDropZone: $("#uwdz_dz_thumbnail"),
            onInputChange: function (val) {
                console.log(val);
                console.log("jj");
            }
        });

    });
})(jQuery);

```







History Log
------------------

- 1.0.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.0.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.0.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.0.0 -- 2016-01-06

    - initial commit
    
    