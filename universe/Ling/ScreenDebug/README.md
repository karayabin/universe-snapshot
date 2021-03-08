ScreenDebug
==================
2016-02-02 -> 2021-03-05



javascript helper to debug data that change rapidly.


ScreenDebug is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.ScreenDebug
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/ScreenDebug
```


Depends on jquery.





Motivation
-------------

Have you ever try to keep track of data that's changing rapidly, like the value of the scroll for instance,
or the dimensions of the window when you resize it?

If so, you might have notice that keeping track of those values in the traditional console is quite 
a pain in the butt, since you have literally dozen, or even hundreds of events firing up.

A better strategy is to write directly data in the html and update a given placeholder;
while the data keeps changing, you only have one thing moving on the screen.
That's the basic idea behind the screenDebug.



How to
-------------

ScreenDebug is meant for quick debug.
The following example should tell you everything there is to know about it:

```html
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="/libs/screendebug/js/screendebug.js"></script>
    <!-- <link rel="stylesheet" href="/libs/screendebug/css/screendebug.css"> -->
    <title>Html page</title>
    <style type="text/css">
        /*This is the content of screendebug.css*/
        #screendebug {
            position: fixed;
            min-width: 200px;
            min-height: 200px;
            background: white;
            color: black;
            left: 0%;
            top: 0%;
            z-index: 10000;
        }        
    </style>
</head>

<body>
<?php for ($i = 0; $i < 20; $i++): ?>
    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus amet consequuntur corporis ea earum eum, ex,
        excepturi exercitationem expedita, in ipsum magni nostrum quae qui recusandae repudiandae sit voluptate
        voluptates.
    </p>
<?php endfor; ?>

<script>
    (function ($) {
        $(document).ready(function () {

            function debug(){
                screenDebug({
                    scrollTop: $(window).scrollTop(),
                    docHeight: $(document).height(),
                    windowHeight: $(window).height()
                });
            }
            
            
            $(window).on('scroll', debug);
            $(window).on('resize', debug);

        });
    })(jQuery);
</script>

</body>
</html>
```



History Log
------------------

- 1.0.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.0.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.0.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.0.0 -- 2016-02-02

    - initial commit
    
    