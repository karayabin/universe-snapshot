JChronometer
================
2016-03-13


A javascript chronometer.




JChronometer can be installed as a [planet](https://github.com/lingtalfi/Observer/blob/master/article/article.planetReference.eng.md).





Features
-------------

- simple and lightweight (100 lines of code)
- pause mode
- can get the elapsed time programmatically
- helper to write human formats included
- no dependencies





Example
------------


See the corresponding [code pen here](http://codepen.io/anon/pen/YqGNzX)


```html
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/lingtalfi/jChronometer/master/www/libs/jchronometer/js/jchronometer.js"></script>
    <title>Html page</title>
</head>

<body>
<span id="chrono">00:00:00:00</span>
<div id="pickzone"></div>

<button id="start">start</button>
<button id="pause">pause</button>
<button id="stop">stop</button>
<button id="pick">pick</button>


<script>


    var jChrono = $('#chrono');
    var jPickZone = $('#pickzone');
    var chronometer = new Chronometer({
        precision: 10,
        ontimeupdate: function (t) {
            jChrono.html(Chronometer.utils.humanFormat(t));
        }
    });


    //------------------------------------------------------------------------------/
    // SOME EXTRA EVENTS
    //------------------------------------------------------------------------------/
    $('#start').on('click', function () {
        chronometer.start();
        return false;
    });
    $('#stop').on('click', function () {
        chronometer.stop();
        return false;
    });
    $('#pause').on('click', function () {
        chronometer.pause();
        return false;
    });
    $('#pick').on('click', function () {
        var t = Chronometer.utils.humanFormat(chronometer.getElapsedTime());
        jPickZone.append('picked at ' + t + '<br>');
        return false;
    });
</script>

</body>
</html>
```

Use this example as the documentation.





History Log
------------------
    
    
- 1.0.0 -- 2016-03-13

    - initial commit
    
    