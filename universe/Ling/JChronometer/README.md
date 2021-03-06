JChronometer
================
2016-03-13 -> 2021-03-05


A javascript chronometer.




JChronometer is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
=============


Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.JChronometer
```

Using the [uni tool](https://github.com/lingtalfi/universe-naive-importer)
```bash
uni import Ling/JChronometer
```





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
    

- 1.0.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.0.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.0.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.0.0 -- 2016-03-13

    - initial commit
    
    