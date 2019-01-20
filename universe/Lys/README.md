Lys (Ling Infinite Scroll)
====================


Another infinite scroll jquery plugin.




Lys can be installed as a [planet](https://github.com/lingtalfi/Observer/blob/master/article/article.planetReference.eng.md).



Summary
-------------

- [Features](#features)
- [How to use](#how-to-use)
- [Nomenclature](#nomenclature)
- [How does it work?](#how-does-it-work)
- [Sensors](#sensors)
- [Lys options](#lys-options)
- [Friends](#friends)
- [History Log](#history-log)




Features
---------------

- provide infinite scroll mechanism
- append new data when the scroll reaches a boundary
- simple and lightweight
- easily extendable
- works in Chrome and Firefox (but probably not other browsers)
- depends on jquery



![Water and ball css3 transition at the bottom](http://s19.postimg.org/mggqxdtyb/lys.png)



How to use
----------------




### The waterball example



Use this when your target is an element on the page, but not the whole body.


Codepen: http://codepen.io/lingtalfi/pen/xVrPmW



```html 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <script src="http://code.jquery.com/jquery-2.2.2.min.js"></script>


    <script src="/libs/lys/js/lys.js"></script>


    <script src="/libs/lys/plugin/sensor/waterball.js"></script>
    <script src="/libs/lys/plugin/fetcher/lorem.js"></script>
    <script src="/libs/lys/plugin/loader/wallwrapper.js"></script>



    <script src="/libs/jajaxloader/js/jajaxloader.js"></script>
    <link rel="stylesheet" href="/libs/jajaxloader/skin/jajaxloader.css">
    <!-- using the jajaxloader ventilator built-in skin  -->
    <script src="/libs/jajaxloader/skin/cssload/ventilator.js"></script>
    <link rel="stylesheet" href="/libs/jajaxloader/skin/cssload/ventilator.css">


    <title>Html page</title>
    <style>


        #page {
            height: 400px;
            overflow-y: scroll;
            background: #ddd;
            position: relative;
        }


    </style>
</head>

<body>

<div class="wall" id="page">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsa iusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsa iusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsa iusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsa iusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsa iusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsa iusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsa iusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsa iusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsa iusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsa iusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsa iusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsa iusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsa iusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
</div>


<script>


    (function ($) {
        $(document).ready(function () {


            var jPage = $('#page');
            var lys = new Lys({
                plugins: [
                    new LysSensorWaterBall({
                        jTarget: jPage,
                    }),
                    new LysFetcherLorem(),
                    new LysLoaderWallWrapper({
                        jWall: jPage,
                        onNeedData: function (jWallContainer) {
                            jWallContainer.ajaxloader();
                        },
                        onDataReady: function (jWallContainer) {
                            jWallContainer.ajaxloader("stop");
                        },
                    }),
                ],
                onDataReady: function (id, data) {
                    jPage.append('<p>' + data + '</p>');
                },
            });
            lys.start();

        });
    })(jQuery);
</script>

</body>
</html> 
```



In the above example, the #page element is the target. We will append items to it.
  
When the target is a specific element (not the body itself), I like to use the waterball sensor.

The waterball sensor triggers the needData event whenever the user has scrolled to the bottom of the target.

The needData is generally captured to retrieve data, and also to start an ajax-loader.

For this demo, we used a dummy lorem fetcher service to retrieve the data.

As for the ajax-loader, since we could have multiple walls (targets) on the same page, we want the ajax-loader
to show up only in our #page element.
In order to do that, we've used the wallwrapper loader, which updates the html of the wall so that we can inject 
our loader in it.

The wallwrapper loader also provides hooks for the needData and dataReady events, we used 
those to show/hide our ajax-loader.

We used the [jajaxloader library](https://github.com/lingtalfi/JAjaxLoader) for the loader, because it plays well 
with lys. 




### The threshold example


Use this when your target is the body.

http://codepen.io/lingtalfi/pen/RagYeW



```html
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <script src="http://code.jquery.com/jquery-2.2.2.min.js"></script>


    <script src="/libs/tim/js/tim.js"></script>


    <script src="/libs/lys/js/lys.js"></script>


    <script src="/libs/lys/plugin/sensor/threshold.js"></script>
    <script src="/libs/lys/plugin/fetcher/postservice.js"></script>
    <script src="/libs/lys/plugin/fetcher/postservice/timhandler.js"></script>
    <script src="/libs/lys/plugin/loader/wallwrapper.js"></script>


    <script src="/libs/jajaxloader/js/jajaxloader.js"></script>
    <link rel="stylesheet" href="/libs/jajaxloader/skin/jajaxloader-body.css">
    <!-- using the jajaxloader ventilator built-in skin  -->
    <script src="/libs/jajaxloader/skin/cssload/ventilator.js"></script>
    <link rel="stylesheet" href="/libs/jajaxloader/skin/cssload/ventilator.css">


    <title>Html page</title>
    <style>

        .loader_overlay {
            background: rgba(0, 0, 0, 0.5);
        }


    </style>
</head>

<body>

<div class="wall" id="page">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsaiusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsaiusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsaiusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsaiusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsaiusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsaiusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsaiusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsaiusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsaiusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsaiusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsaiusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsaiusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsaiusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsaiusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsaiusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsaiusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsaiusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsaiusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsaiusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsaiusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsaiusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsaiusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsaiusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto atque consequatur eaque est fugit in ipsaiusto, placeat quam quis quisquam ratione reprehenderit saepe sit soluta sunt velit veritatis voluptatem?</p>
</div>


<script>


    (function ($) {
        $(document).ready(function () {


            var jPage = $('#page');
            var jBody = $(document.body);


            var lys = new Lys({
                plugins: [
                    new LysSensorThreshold(),
                    new LysFetcherPostService({
                        url: '/libs/lys/demo/service/lorem.php',
                        handler: new LysFetcherPostServiceTimHandler(),
                    }),
                ],
                onNeedData: function () {
                    jBody.ajaxloader();
                },
                onDataReady: function (id, data) {
                    jBody.ajaxloader("stop");
                    jPage.append('<p>' + data + '</p>');
                },
            });
            lys.start();

        });
    })(jQuery);
</script>

</body>
</html> 
```




In the above example, the #page element is the target. We will append items to it.

However, we used a threshold sensor to trigger the needData event.
  
The threshold sensor detects scrolling on the window element (and not on the #page element).  
  
When the user has scrolled to the bottom of the window, the threshold sensor triggers the needData event.

The needData is generally captured to retrieve data, and also to start an ajax-loader.

For this demo, we used a php lorem service to retrieve the data.

This service uses [tim protocol](https://github.com/lingtalfi/Tim).


The Lys object provides hooks for the needData and dataReady events, we used those to show/hide our ajax-loader.

We used the [jajaxloader library](https://github.com/lingtalfi/JAjaxLoader) for the loader, because it plays well 
with lys. Notice that we called the jajaxloader-body.css stylesheet, which basically ensures that our overlay will always
be visible at the bottom of the body element.





Nomenclature
-----------------

- target (aka wall): see wall
- Wall (aka target): the dom element to which new data will be appended


How does it work?
--------------------


![CheatSheet](http://s19.postimg.org/v5itsfe5f/lys_dev_cheatsheet.jpg)


Lys, since v3.0.0 works with plugins and events interaction.

A plugin is any object with an init method, like the one in the example below.


```js
var myPlugin = new function(){ // this is a valid plugin
    this.init = function( lys ){
        // lys is the instance of the Lys object
    };
}
```


Plugins are organized based on their roles.

The following roles have been identified so far:

- sensor: detect WHEN new data should be appended. Fires the needData event then.
- fetcher: fetches new data upon receiving a needData event. Fires the dataReady event when the data is ready to be used.
- loader: takes care of showing/hiding the ajax loader, should you use one. The loader starts  
                when the needData event is triggered, and stops when the dataReady event is triggered.



Events interaction defines the relationship between plugins and the core Lys object.
Plugins can trigger and subscribe to events using the Lys's on and trigger methods.

So far, the events are:


- needData: indicate that new data is required (for instance when the user scrolls down past the last item)
- dataReady: indicate that new data has arrived (and should be inserted into the dom)


The Lys object offers two handy hooks, via its onNeedData and onDataReady options, to that the user can plug in
her application logic. 
Typically, how new data is inserted into the dom.





     
Sensors
------------     

Sensors are plugins which role is to detect WHEN new data should be fetched.

The built-in sensors are:

- waterball: triggers the needData event based on the relative scrolled distance compared to the height of the host (aka wall, aka target) object 
- threshold: triggers the needData event based on the relative scrolled distance compared to the window 





 
 
 
Lys options
-----------------------
 
```js
{
    /**
     * An array of plugins.
     * A plugin is an object with an init method.
     * 
     *      void init ( LysInstance )
     *      
     */
    plugins: [],
    /**
     * a callback triggered when the needData event is triggered (via the dispatcher system).
     * 
     * The id argument is the session identifier.
     * 
     * It is used to identify a fetch data session (needData -> dataReady).
     * The same id value should be passed with both the needData and dataReady events.
     * 
     */
    onNeedData: function (id) {

    },
    /**
     * a callback triggered when the dataReady event is triggered (via the dispatcher system)
     *
     * The id argument should come from a triggered needData event.
     * The data argument represents the received data.
     */
    onDataReady: function (id, data) {

    },
} 
``` 
 
 
 
 


Friends 
-------------

- [jajaxloader](https://github.com/lingtalfi/JAjaxLoader/): some easy to trigger ajax loaders 
- [screenDebug](https://github.com/lingtalfi/ScreenDebug): a helper to monitor realtime values (useful for debugging sensors)  
- [tim](https://github.com/lingtalfi/Tim): a simple protocol for app communication with services

 

History Log
------------------
    
- 3.2.0 -- 2016-03-27

    - add postservice fetcher with tim handler
    
- 3.1.0 -- 2016-03-27

    - removed forgotten console.log from lys core object

- 3.0.0 -- 2016-03-27

    - reforge the core, now Lys is even more decoupled, it's not a jquery plugin anymore, just an object


- 2.2.0 -- 2016-02-02

    - add deaf option for threshold sensor
    - add fnSuccess argument to lys.fetch method
    
- 2.1.0 -- 2016-02-01

    - add dataType, useTim, onTimError, urlParams options
    - add skip argument hack for fetch method
    - add setUrlParams method
    
- 2.0.0 -- 2016-01-31

    - reforged the whole plugin, lys is now better decoupled
        
- 1.4.0 -- 2016-01-31

    - waterball1: urlParams can be a function too
    - waterball1: fix bug for retrieving lys instance 
    - waterball1: enhance setCount method
        
    
- 1.3.0 -- 2016-01-30

    - add lys_waterball namespace for mousewheel event
    - add lys_waterball urlParams, autoIncrementedUrlParamName, and pluginParams options
    - fix bug for retrieving lys instance

- 1.2.0 -- 2016-01-25

    - add startingCount option for waterball and threshold skins 
    - fix loader stop placement  
    
- 1.1.0 -- 2016-01-25

    - add threshold skin 
    
    
- 1.0.0 -- 2016-01-24

    - initial commit
    
     