Flue
===========
2016-03-22


Front end - glue



Helper to organize your front end gui code.



flue can be installed as a [planet](https://github.com/lingtalfi/Observer/blob/master/article/article.planetReference.eng.md).





What is it?
----------------


A flue project is based on the following ideas:

- your application should start by listening to events (a mouse click, a mouve move, a key stroke...)
- your event listeners should be centralized and delegated (in one place, and as few as possible)


Flue is a tiny library that let you create listeners and bubbles.

Listeners are event listeners centralized in one (or more if you need more) file.

Bubbles encapsulate your code, and help keeping a maintainable code (rather than putting everything in the same block of code).



If you don't know flue already, I suggest that you read my [conception notes](https://github.com/lingtalfi/flue/blob/master/doc/conception-notes.md),
and/or to parse the [doc directory](https://github.com/lingtalfi/flue/blob/master/doc),
because the sections below are only meant to be my personal memo rather than an official public documentation (I like
to have part of my memory online).



The flue api
----------------

Flue has 6 methods.


3 of them are dedicated to communication between bubbles.

- set ( k, v )
- get ( k )   // throws an exception if the key wasn't set  
- getOr ( k, defaultValue )  // returns the default value if the key wasn't set


The 3 other methods are:

- flue.listeners.add ( fn )  
- flue.bubbles.add ( fn )
- flue.init ( onReady )










Fictive example
---------------


### Html code

Here is a fictive flue app.
The purpose is to give you an idea of what a flue code looks like.


```html
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>

    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <title>Html page</title>

    <!-- Flue library  -->
    <script src="/libs/flue/js/flue.js"></script>


    <!-- Flue listeners  -->
    <script src="/js/app/channel/listeners.js"></script>

    <!-- Flue managers  -->
    <script src="/js/app/channel/api.js"></script>
    <script src="/js/app/channel/bigCardManager.js"></script>
    <script src="/js/app/channel/artworkManager.js"></script>
    <script src="/js/app/channel/sliderManager.js"></script>
    <script src="/js/app/channel/videoManager.js"></script>
</head>
<body>

<div id="interesting_div"></div>

<script>


    (function ($) {
        $(document).ready(function () {


            
            // initializing useful variables
            var jInterestingDiv = $("#interesting_div");
            flue.set('jInterestingDiv', jInterestingDiv);
            
            
            // starting the flue...
            /**
             * This method will call the bubbles first (the code in the managers), 
             * then the listeners (the code in the /js/app/channel/listeners.js file in this case)
             */
            flue.init();


        });
    })(jQuery);
</script>

</body>
</html>
```



### The listeners code 

Again, this is just a fictive example:

```js
flue.listeners.add(function () {


    var jEmission = flue.get('jEmission');
    var jModalContainer = $('#modal_container');

    // managers
    var bigCardManager = flue.get('bigCardManager');
    var artworkManager = flue.get('artworkManager');
    var sliderManager = flue.get('sliderManager');
    var videoManager = flue.get('videoManager');


    var focusMode = false;

    //------------------------------------------------------------------------------/
    // EMISSION SURFACE
    //------------------------------------------------------------------------------/
    jEmission.on('click', '.link', function () {
        var jLink = $(this);
        if (jLink.hasClass('bc_link')) {
            bigCardManager.openTab(jLink);
        }
        else if (jLink.hasClass('bc_close')) {
            bigCardManager.close();
        }
        else if (jLink.hasClass('show_reviews')) {
            bigCardManager.openReviews();
        }
        else if (jLink.hasClass('play_icon')) {
            if(jLink.hasClass('play_episode')){
                videoManager.playEpisode(jLink.closest('.episode').attr('data-id'));
            }
            else{
                console.log("which epsiode is that?");
            }
        }
        else {
            console.log("what's that link?");
        }
        return false;
    });
});
```



### The bubbles

This is a fictive bubble code example.


```js

flue.bubbles.add(function () {

    flue.set('videoManager', new function () {
        var api = flue.get('api'); 
        
        
        
        this.playEpisode = function (episodeId) {

            api.getVswitch().kickIn('pane_channel_fadeout page_videoplayer_loading');
            api.request({
                action: 'playEpisode',
                id: episodeId,
            }, function (data) {
                console.log(data);
            });

        };
    });
});

```






History Log
------------------
    
- 1.0.0 -- 2016-03-22

    - initial commit
    

    








