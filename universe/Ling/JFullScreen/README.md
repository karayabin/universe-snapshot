jfullscreen
================


Helper code to fullscreen with javascript.



JFullScreen is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
=============


Using the [uni tool](https://github.com/lingtalfi/universe-naive-importer)
```bash
uni import Ling/JFullScreen
```







code from taken from there: http://www.sitepoint.com/use-html5-full-screen-api/


The jfullscreen code is here: https://github.com/lingtalfi/JFullScreen/blob/master/www/libs/jfullscreen/js/jfullscreen.js





How to use
---------------


Code pen of the example here: http://codepen.io/lingtalfi/pen/RapNvL 


```html
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Html page</title>
    <script src="/libs/jfullscreen/js/jfullscreen.js"></script>
</head>

<body>


<img src="http://img0.ndsstatic.com/wallpapers/dfcaa09763e55aff4b5489848da7a283_large.jpeg">


<script>
    
    
    
    console.log(fs.isFullscreen()); // false
    var image = document.querySelector('img');
    
    
    image.addEventListener('click', function () {
        fs.requestFullscreen(image); 
        
        setTimeout(function () {
            console.log(fs.isFullscreen());  // true
            fs.exitFullscreen(); 
        }, 2000);
        
    });

    fs.onFullscreenChange(function () {
        console.log("changed");
        console.log(fs.isFullscreen());
    });

    fs.onFullscreenError(function () {
        console.warn("fullscreen error");
    });
</script>

</body>
</html>
```




History Log
------------------

- 1.0.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.0.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.0.0 -- 2016-03-19

    - initial commit
    
    