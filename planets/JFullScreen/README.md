jfullscreen
================


Helper code to fullscreen with javascript.



jfullscreen can be installed as a [planet](https://github.com/lingtalfi/Observer/blob/master/article/article.planetReference.eng.md).

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
    
- 1.0.0 -- 2016-03-19

    - initial commit
    
    