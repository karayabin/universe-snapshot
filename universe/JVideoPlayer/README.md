jVideoPlayer
==================
2016-03-19


A javascript library to help building a video player.
 
 


![jvideoplayer playing kung fu panda 2](http://s19.postimg.org/vy3rzimw3/jvideoplayer.png)
 
 
Demo video of jvideo player playing Dreamworks' kung fu panda 2: https://www.youtube.com/watch?v=GkYCZXgQLkY


Codepen of the latest version: http://codepen.io/lingtalfi/pen/aNwbJy

 
 
Summary
--------------
 
- [jVideoPlayer](#jvideoplayer)
  - [Features](#features)
  - [How to use](#how-to-use)
  - [How does it work?](#how-does-it-work)
  - [Structure of the library](#structure-of-the-library)
  - [Replay mode](#replay-mode)
  - [The global picture](#the-global-picture)
- [The default videoplayer](#the-default-videoplayer)
    - [Accessing the layer manager](#accessing-the-layer-manager)
    - [Accessing the video element](#accessing-the-video-element)
    - [Default Video player compatibility](#default-video-player-compatibility)
  - [Default Video player specific concepts](#default-video-player-specific-concepts)
    - [The current video](#the-current-video)
    - [The videoInfo](#the-videoinfo)
    - [The insert pattern](#the-insert-pattern)
  - [The VideoElement](#the-videoelement)
  - [Layered Manager](#layered-manager)
  - [Plugins](#plugins)
  - [The remote](#the-remote)
  - [Plugin todolist](#plugin-todolist)
  - [Tutorials](#tutorials)

 
 
Features
------------

- simple and flexible approach 
- built in skin 
- built in ad management (including skip ad button plugin)
- built in subtitles management 
- built in preview thumbnail management
- focus only on modern browsers (not trying to make it compatible in all browsers), use EcmaScript 6
 
 

jVideoPlayer can be installed as a [planet](https://github.com/lingtalfi/Observer/blob/master/article/article.planetReference.eng.md).




How to use
--------------

I like to show a code excerpt code, explanations will follow.

The following code creates a default video player with various features (loader image, subtitles, ads, thumbnail preview, timeline mark, 
disappearing after x seconds, ...).



```php
<?php


use VideoSubtitles\Srt\SrtToArrayTool;

require_once "bigbang.php"; // start the local universe
$f = __DIR__ . "/assets/kungfupanda2.srt";
$subtitles = SrtToArrayTool::getArrayByFile($f, [
    'startEndUnit' => 'ms',
    'defaultItem' => ['type' => 'cue'],
]);


?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>

    <!-- http://code.jquery.com/jquery-2.2.2.min.js -->
    <script src="/libs/jquery/jquery-2.2.2.min.js"></script>


    <script src="/libs/tim/js/tim.js"></script>


    <!-- https://cdn.rawgit.com/lingtalfi/JFullScreen/master/www/libs/jfullscreen/js/jfullscreen.js -->
    <script src="/libs/jfullscreen/js/jfullscreen.js"></script>
    <script src="/libs/jvideoplayer/js/video-element/html5-video-element.js"></script>
    <script src="/libs/jvideoplayer/js/eventsqueue/eventsqueue.js"></script>
    <script src="/libs/jvideoplayer/widget/layered-manager/layered-manager.js"></script>
    <link rel="stylesheet" href="/libs/jvideoplayer/widget/layered-manager/layered-manager.css">

    <script src="/libs/jvideoplayer/widget/video-player/video-player.js"></script>


    <script src="/libs/jvideoplayer/widget/video-player/plugin/plugin.removeloaderimage.js"></script>
    <script src="/libs/jvideoplayer/widget/video-player/plugin/plugin.debughelper.js"></script>
    <script src="/libs/jvideoplayer/widget/video-player/plugin/ad/plugin.ad.js"></script>
    <script src="/libs/jvideoplayer/widget/video-player/plugin/ad/plugin.ad.minplay.js"></script>
    <script src="/libs/jvideoplayer/widget/video-player/plugin/ad/plugin.ad.skipadbutton.js"></script>
    <script src="/libs/jvideoplayer/widget/video-player/plugin/plugin.cue.js"></script>
    <script src="/libs/jvideoplayer/widget/video-player/plugin/innerqueue/plugin.innerqueue.js"></script>
    <script src="/libs/jvideoplayer/widget/video-player/plugin/innerqueue/innerqueue.handler.cue.js"></script>
    <script src="/libs/jvideoplayer/widget/video-player/plugin/innerqueue/innerqueue.handler.ad.js"></script>
    <script src="/libs/jvideoplayer/widget/video-player/plugin/mantis/plugin.mantis.js"></script>
    <script src="/libs/jvideoplayer/widget/video-player/plugin/mantis/plugin.mantis.timeelapsed.js"></script>
    <!--    <script src="/libs/jvideoplayer/widget/video-player/plugin/mantis/plugin.mantis.thumbnailpreview.js"></script>-->
    <script src="/libs/jvideoplayer/widget/video-player/plugin/mantis/plugin.mantis.clonethumbnailpreview.js"></script>
    <script src="/libs/jvideoplayer/widget/video-player/plugin/mantis/plugin.mantis.timelinemark.js"></script>

    <script src="/libs/jvideoplayer/widget/video-player/plugin/live/plugin.live.js"></script>
    <script src="/libs/jvideoplayer/widget/video-player/plugin/live/plugin.live.fetcher.tim.js"></script>

    <script src="/libs/jvideoplayer/js/util/video-events-watcher.js"></script>


    <!-- MANTIS AND DEPENDENCIES-->
    <!-- https://cdn.rawgit.com/lingtalfi/jDragSlider/master/www/libs/jdragslider/js/jdragslider.js -->
    <script src="/libs/jdragslider/js/jdragslider.js"></script>
    <!-- https://cdn.rawgit.com/lingtalfi/VSwitch/master/www/libs/vswitch/js/vswitch.js -->
    <script src="/libs/vswitch/js/vswitch.js"></script>
    <link rel="stylesheet" href="/libs/jvideoplayer/widget/remote/mantis/style.css">
    <script src="/libs/jvideoplayer/widget/remote/mantis/mantis.js"></script>


    <title>Replay mode default example</title>
</head>

<body>


<style>

    .loaderimage {
        position: absolute;
        top: 0;
        z-index: 500;
        width: 100%;
        height: 100%;
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
        background-color: black;
        display: flex;
        justify-content: center;
        align-items: center;
    }

</style>
<div class="loaderimage" style="background-image: url(/img/panda.jpg)">
    <img src="/img/default.svg">
</div>


<?php echo file_get_contents("templates/jvp.mantis.htpl"); ?>


<script>

    (function ($) {
        $(document).ready(function () {


            /**
             * In replay mode, ads and cues are tied to the main video.
             * This is because when you scrub the main video's timeline,
             * you want the cues and ads to play at the relative time where you set them:
             *
             * it makes no sense to use absolute time on ads and cues unless you are in a live mode with no pause functionality.
             *
             *
             * The inner queue represents the main video's inner relative timeline, to which ads ands cues (and other things if you want)
             * will be attached.
             *
             */




            var adsEvents = [
                {
                    title: "Advertising: drink some coffee",
                    start: 5 * 60 * 1000,
                    url: '/video/matrix.mp4',
                    minplay: 3,
                },
                {
                    start: 19 * 60 * 1000,
                    title: "Advertising: Late for work",
                    url: '/video/late-for-work.mp4',
                    minplay: 3,
                },
            ];
            var cuesEvents = <?php echo json_encode($subtitles); ?>;
            var jSurface = $('.mantis_host');
            var jLoaderImage = $('.loaderimage');

            var jVideoPlayer = $('> .videoplayer', jSurface);
            var innerQueue = new pluginInnerQueue({
                matchVideo: function (videoInfo) {
                    return (videoInfo.id === 1);
                }
            });
            innerQueue.registerHandler(new pluginInnerQueueHandlerCue(), cuesEvents);
            innerQueue.registerHandler(new pluginInnerQueueHandlerAd({
                plugins: [
                    new pluginAdMinPlay(),
                ],
            }), adsEvents, true);


            var vp = new videoPlayer({
                element: jVideoPlayer,
                plugins: [
                    new pluginDebugHelper({
                        mode: 'triggered', blackList: [
                            "progress",
                            "timeupdate",
                            "createlayer",
                            "videoloaded",
                            "setcurrentvideo",
                            "scrublimit",
                        ]
                    }),
                    new pluginAdSkipAdButton({
                        text: "Skip this ad",
                    }),
                    innerQueue,
                    new pluginMantis({
                        mantis: new Mantis(jSurface),
                        plugins: [
                            new pluginMantisTimeElapsed(),
//                            new pluginMantisThumbnailPreview({
//                                urlFormat: '/video/screenshots/panda1s/img_{n}.png',
//                                timeInterval: 1,
//                            }),
                            new pluginMantisCloneThumbnailPreview(),
                            new pluginMantisTimelineMark({
                                marks: adsEvents,
                                matchVideo: function (vInfo) {
                                    return (vInfo.type && 'main' === vInfo.type);
                                },
                            }),
                        ],
                    }),
                ]
            });


            // replay mode
            var videoInfo = {
                id: 1,
                type: 'main',
                url: "/video/rose.mp4",
                url: "/video/panda.mp4",
                title: "KungFu Panda 2",
            };
            vp.prepareVideo(videoInfo, [0, 0], {
                playAfter: function () {
                    jLoaderImage.hide();
                },
            });


        });
    })(jQuery);

</script>


</body>
</html>
```




How does it work?
---------------------

The answer is actually pretty complex, because there are a lots of concepts involved, which are more or less intuitive.

I believe mastering this library is done by mastering each of its concepts, one by one.

So I will try to do my best to share those concepts with you.

Source code has good comments, so in this documentation I will stick with abstract concepts.

Good luck.




Structure of the library
----------------------------


This is the core structure of the jvideoplayer library (the www dir of this repository).


```
|-- libs
|   `-- jvideoplayer
|       |-- js
|       |   |-- eventsqueue
|       |   |   `-- eventsqueue.js
|       |   |-- util
|       |   |   `-- video-events-watcher.js
|       |   `-- video-element
|       |       |-- html5-video-element.js
|       |       `-- video-element.js
|       |-- prototype
|       |   |-- video
|       |   |   `-- late-for-work.mp4
|       |   `-- widget
|       |       |-- remote
|       |       |   `-- mantis
|       |       |       `-- mantis-skin-only.php
|       |       `-- videoplayer
|       |           `-- replay-mode-default.php
|       `-- widget
|           |-- layered-manager
|           |   |-- layered-manager.css
|           |   |-- layered-manager.js
|           |   `-- layered-manager.scss
|           |-- remote
|           |   `-- mantis
|           |       |-- fonts
|           |       |   |-- icomoon.eot
|           |       |   |-- icomoon.svg
|           |       |   |-- icomoon.ttf
|           |       |   `-- icomoon.woff
|           |       |-- mantis.js
|           |       |-- style.css
|           |       `-- style.scss
|           `-- video-player
|               |-- plugin
|               |   |-- ad
|               |   |   |-- plugin.ad.js
|               |   |   |-- plugin.ad.minplay.js
|               |   |   `-- plugin.ad.skipadbutton.js
|               |   |-- innerqueue
|               |   |   |-- innerqueue.handler.ad.js
|               |   |   |-- innerqueue.handler.cue.js
|               |   |   `-- plugin.innerqueue.js
|               |   |-- mantis
|               |   |   |-- oldplugin.mantis.timelinemark.js
|               |   |   |-- plugin.mantis.backtoapp.css
|               |   |   |-- plugin.mantis.backtoapp.js
|               |   |   |-- plugin.mantis.backtoapp.scss
|               |   |   |-- plugin.mantis.clonethumbnailpreview.js
|               |   |   |-- plugin.mantis.js
|               |   |   |-- plugin.mantis.thumbnailpreview.js
|               |   |   |-- plugin.mantis.timeelapsed.js
|               |   |   `-- plugin.mantis.timelinemark.js
|               |   |-- plugin.debughelper.js
|               |   `-- plugin.inactivity.js
|               `-- video-player.js
`-- templates
    `-- jvp.mantis.htpl
```    
    
    
    
    
Replay mode
--------------------

When your only goal is to play ONE video only (as opposed to multiple videos), this is called replay mode.

Jvideoplayer was first created to work in replay mode.

As for now, there are no other modes, which means that if you want to play multiple videos, you are on your own: you 
will not find plugins to help you.

I suggest that you understand how replay mode works before creating other modes.



    


The global picture
---------------------

The most abstract picture is perhaps that there is a **videoplayer** in the middle, and plugins around it.


![jvideo player abstract picture](http://s19.postimg.org/c9o7t3zab/jvideoplayer_global_picture.jpg)

The **videoplayer**'s role is to play videos.

Although there is no interface, we can imagine that it would have basic methods like the following:

- load
- resume
- pause



Now, if you want to interrupt the video and play an advertising, you would need a plugin.

Even more basic, if you want the user to click a play button, you have to create it yourself: the **videoplayer**
is just a js object, with no html body. 

You could simply draw an html button, and when the user clicks on it, it would call
the **videoplayer**'s resume button (for instance). 

That would work as expected. Then, you could encapsulate that code in a plugin, so that it could be reused.

The plugins provide functionality for the **videoplayer**.


Having this image in mind is a good start, but if you were to develop your own plugins, it wouldn't be enough.


Below, I will describe my implementation of the **videoplayer**, which I will call  the **default videoplayer** from now on,
but bear in mind that it's very possible to create your own **videoplayer** if necessary. 
 
 
 
 
The default videoplayer
=========================
 
 
File:  [/libs/jvideoplayer/widget/video-player/video-player.js](https://github.com/lingtalfi/jVideoPlayer/blob/master/www/libs/jvideoplayer/widget/video-player/video-player.js)
 

The **default videoplayer** uses two core components, and has some built-in plugins (found in this repository).
The two core components are:
 
- video element 
- layered manager



If you want to develop your own plugins for the **default videoplayer**, it's essential that you understand all this.

The video element encapsulates the player's technology (html5 video/flash/silverlight..., although html5 video is the only choice as for now).

The layered manager is a simple stack of divs with different z-indexes, it is used by plugins to add layers on top (or below) of
the actual video. For instance, the cue plugin uses the layered system to place subtitles on top of the video, and the 
ad plugin also uses the layers system to temporarily switch to an ad.

A **default video player** plugin is any js object with a prepare method. 


Here is what the default video player looks like from above; so this is the beast; what plugins have to deal with (and you as a plugin developer).
 

![default videoplayer, abstract](http://s19.postimg.org/s600t48rn/default_videoplayer_architecture_2.jpg)


Notice that the **default video player** is a wrapper with its own methods.

The files can be found here:

- [/libs/jvideoplayer/widget/video-player/video-player.js](https://github.com/lingtalfi/jVideoPlayer/blob/master/www/libs/jvideoplayer/widget/video-player/video-player.js)
- [/libs/jvideoplayer/js/video-element/html5-video-element.js](https://github.com/lingtalfi/jVideoPlayer/blob/master/www/libs/jvideoplayer/js/video-element/html5-video-element.js)
- [/libs/jvideoplayer/widget/layered-manager/layered-manager.js](https://github.com/lingtalfi/jVideoPlayer/blob/master/www/libs/jvideoplayer/widget/layered-manager/layered-manager.js)



### Accessing the layer manager

To access the layer manager, you can use the lm public property of the **default video player**'s instance.

### Accessing the video element

To access the current video element, you can use the getCurrentVideo sugar method.


### Default Video player compatibility

When the **default videoplayer** was created, I was only concerned with playing .mp4 files.
This means that the **default videoplayer** might not be able to play other file formats
(actually, I tested with .mov file and it worked).

Also, I was only concerned to make it work in Chrome and Firefox browsers.
So, it might not work in other browsers. In particular, I used EcmaScript 6 promises.





Default Video player specific concepts
--------------------------------

The following concepts need to be understood if you want to develop plugins.
Some concepts are more advanced than other. You should be aware of them and learn them only if you encouter them in 
your readings (i.e. no need to fill your head with them otherwise).

They are used all along the place in the **default videoplayer**'s ecosystem.

- [the current video](#the-current-video)
- [the videoInfo](#the-videoinfo)
- [the insert pattern](#the-insert-pattern)



### The current video
    
    
This is the current video being played.

Be aware that we can have an (video) ad interrupting the video being played.
While the ad is playing, the ad is the current video.
Whenever the current video is set, the setcurrentvideo event is triggered.
That is, the current video is first updated, and THEN the setcurrentvideo event is triggered.

Technically, the current video is just a pointer to the current videoElement being played.


### The videoInfo

This is a js map that carries information about a video.
It is generally used to know which video is currently playing.

At the very least, the videoInfo map contains the information necessary to play the video (url, title).
The user can add any number of properties to it.

Internally, the videoInfo map is decorated by some methods.
The loadVideo method will add the following properties to the videoInfo map:

- title, if not already set
- _videoElement: the video element instance (available when the video loaded)
- duration: in seconds (available when the video loaded)

The playLoadedVideo will add the following properties to the videoInfo map:

- _layer: the name of the layer inside which the video is played


Examples of use:

- When the cue plugin displays subtitles, it needs to know which video is currently playing.
Typically, if there is an ad interrupting the video, the subtitles must pause until the video resumes.
In order to know if the current video is an ad or the main video, the cue plugin tests some
properties of the videoInfo map.

- The ad plugin also use the videoInfo map to know which video is playing.


### The insert pattern

This pattern is a technique to interrupt a video, play another event, and then resume the video afterwards.

This pattern was first used by the ad plugin (technically: the built-in handler for the innerqueue plugin) to insert ad 
in the middle of a video.

Here are the steps:

- memorize the current video as OLD
- play your event 
- when the event ends, resume OLD





 
The VideoElement
------------------
 
The video element is an abstraction of the technology (html5/flash/others/...) used to play the video.
It provides some basic methods that every video player technology should have:

- load
- resume
- pause
- setTime
- setVolume
- ...


All those methods are described in the file: [/libs/jvideoplayer/js/video-element/video-element.js](https://github.com/lingtalfi/jVideoPlayer/blob/master/www/libs/jvideoplayer/js/video-element/video-element.js)

The html5 video tag implementation is in the file: [/libs/jvideoplayer/js/video-element/html5-video-element.js](https://github.com/lingtalfi/jVideoPlayer/blob/master/www/libs/jvideoplayer/js/video-element/html5-video-element.js)


Layered Manager
-----------------



The layered manager uses the concept of layers, like in adobe photoshop, but using divs and z-indexes.

We can create a layer, delete a layer, clean a layer, set the content of a layer, transfer the content of a layer to another,
show a layer, and hide a layer.

How is that useful?

The concept of layers is actually at the heart of the **default videoplayer** philosophy.

It allows us to do various things, we can:

- use a transparent layer to display subtitles on top of the main video
- use an opaque black layer to hide elements behind
- play an advertising on top of the main video, and remove that layer when the advertising ends.
- and probably many other things



Plugins
----------


Plugin connect the external world to the **default videoplayer**. 

Everything is/can be turned into a plugin: the remote, the ad manager, the subtitles manager, etc...


As I created the **default videoplayer**, I created some plugins for my personal needs.
Those are included in the repository and are called built-in plugins.

As I said earlier, I'm not going into much details. For more info, please browse the source code.


The default video player's built-in plugins are the following:



- [plugin.mantis](https://github.com/lingtalfi/jVideoPlayer/tree/master/www/libs/jvideoplayer/widget/video-player/plugin/mantis/plugin.mantis.js): a remote controller widget for the video. It has multiple controls like play, pause, volume slider, full screen, and more...
    
    - [plugin.mantis.thumbnailpreview](https://github.com/lingtalfi/jVideoPlayer/tree/master/www/libs/jvideoplayer/widget/video-player/plugin/mantis/plugin.mantis.thumbnailpreview.js): display a thumbnail preview, when the user hovers the timeline, using static snapshots server side
    - [plugin.mantis.clonethumbnailpreview](https://github.com/lingtalfi/jVideoPlayer/tree/master/www/libs/jvideoplayer/widget/video-player/plugin/mantis/plugin.mantis.clonethumbnailpreview.js): display a thumbnail preview, when the user hovers the timeline, using a cloned video tag trick
    - [plugin.mantis.timelinemark](https://github.com/lingtalfi/jVideoPlayer/tree/master/www/libs/jvideoplayer/widget/video-player/plugin/mantis/plugin.mantis.timelinemark.js): display visual marks on the timeline, useful for representing the ads position for instance, or other events
    - [plugin.mantis.timeelapsed](https://github.com/lingtalfi/jVideoPlayer/tree/master/www/libs/jvideoplayer/widget/video-player/plugin/mantis/plugin.mantis.timeelapsed.js): display the currently elapsed time of the video at any moment
    - [plugin.mantis.backtoapp](https://github.com/lingtalfi/jVideoPlayer/tree/master/www/libs/jvideoplayer/widget/video-player/plugin/mantis/plugin.mantis.backtoapp.js): display an arrow that links back to the previous page
    
- [plugin.innerqueue](https://github.com/lingtalfi/jVideoPlayer/tree/master/www/libs/jvideoplayer/widget/video-player/plugin/innerqueue/plugin.innerqueue.js): provide an inner timeline of the video, for other plugins to attach events on it. That's one way to attach ads and cues to a video in replay mode.

    - [innerqueue.handler.ad](https://github.com/lingtalfi/jVideoPlayer/tree/master/www/libs/jvideoplayer/widget/video-player/plugin/innerqueue/innerqueue.handler.ad.js): a handler for the plugin.innerqueue plugin; it attaches ad to a video
    - [innerqueue.handler.cue](https://github.com/lingtalfi/jVideoPlayer/tree/master/www/libs/jvideoplayer/widget/video-player/plugin/innerqueue/innerqueue.handler.cue.js): a handler for the plugin.innerqueue plugin; it attaches subtitles to a video
    
    
- [plugin.ad.minplay](https://github.com/lingtalfi/jVideoPlayer/tree/master/www/libs/jvideoplayer/widget/video-player/plugin/ad/plugin.ad.minplay.js): Decide WHEN an ad can be skipped
- [plugin.ad.skipadbutton](https://github.com/lingtalfi/jVideoPlayer/tree/master/www/libs/jvideoplayer/widget/video-player/plugin/ad/plugin.ad.skipadbutton.js): Display a "skip ad button" when appropriate

- [plugin.debughelper](https://github.com/lingtalfi/jVideoPlayer/tree/master/www/libs/jvideoplayer/widget/video-player/plugin/plugin.debughelper.js): tells you what events are fired, and what events are listened to (more on events later)
- [plugin.inactivity](https://github.com/lingtalfi/jVideoPlayer/tree/master/www/libs/jvideoplayer/widget/video-player/plugin/plugin.inactivity.js): put the gui in/out sleep mode (the remote disappears)



The image below is a global overview of the built-in plugins.

![default videoplayer built-in plugins]( http://s19.postimg.org/g6652u9nn/default_videoplayer_built_in_plugins_2b.jpg )


Plugins can communicate between themselves, or they can communicate with the default video player too.
An important part of the communication system is handled through events, like events in vanilla javascript.
Events are triggered and listened to, and shape the **default video player**'s ecosystem communication.


Below is a cheatsheet of events triggered and listened to by the default video player and its built-in plugins.
Elements in green are listened to events, and elements in red are fired events.

Because I try to be DRY, explanations of the events are written in the source code of the corresponding plugin or in 
the video player's source file itself.



![Default videoplayer built-in plugins events interaction map](http://s19.postimg.org/be5z29aoz/default_videoplayer_builtin_plugins_events_inter.jpg)



The remote
---------------

Until now, we haven't discussed about the controls widget.

The controls widget, also called remote, contains the gui by which the user can control the video: play, pause the video,
tune up the sound, mute the sound, move forward/backward...

The features that a remote widget provide depends of the widget implementation.
The default video player comes with a built-in remote called mantis.

The source files for the mantis remote are located here:


- [www/libs/jvideoplayer/widget/remote/mantis](https://github.com/lingtalfi/jVideoPlayer/tree/master/www/libs/jvideoplayer/widget/remote/mantis)





Tutorials
-------------


There is the tutorial section.
Feel free to ask for tutorials, I'm aware that it might be hard to get started right now.

There is no tutorial for now, but instead I will point you to files that you can use as starting points:
 
 

- [all files are located here](https://github.com/lingtalfi/jVideoPlayer/tree/master/www/libs/jvideoplayer/prototype/)
- [mantis remote only](https://github.com/lingtalfi/jVideoPlayer/tree/master/www/libs/jvideoplayer/prototype/widget/remote/mantis/mantis-skin-only.php)
- [replay mode bunny local: basic](https://github.com/lingtalfi/jVideoPlayer/tree/master/www/libs/jvideoplayer/prototype/widget/videoplayer/replay-mode-bunny-local.html)
- [replay mode bunny public: basic](https://github.com/lingtalfi/jVideoPlayer/tree/master/www/libs/jvideoplayer/prototype/widget/videoplayer/replay-mode-bunny-public.html)
- [replay mode panda: more advanced](https://github.com/lingtalfi/jVideoPlayer/tree/master/www/libs/jvideoplayer/prototype/widget/videoplayer/replay-mode-panda.php)








 
 
 
Plugin todolist
-------------------
 
Default videoplayer plugins todolist: 
 
- create a plugin that let us use shortcut keys:
 
        - space to toggle the play/pause button
        - up/down arrows to set the volume, with shift used to 10 increment instead of 1 increment
        - left/right arrows to move the current time backward/forward, 1s per stroke, or 10s with shift on
        - f: toggle enter/exit fullscreen
        

- create a plugin that summarizes the video info after XX seconds of inactivity


- create a playlist plugin
 
 
 
Pull requests for your own plugins are welcome.
Also, feel free to ask for more plugins.
    
    
    
    
    
    
Related dependencies
-------------

- [dragslider](https://github.com/lingtalfi/jDragSlider)
- [vswitch](https://github.com/lingtalfi/VSwitch)
- [fullscreen](https://github.com/lingtalfi/JFullScreen)
    
    
    

    
History Log
------------------
    
- 3.0.0 -- 2016-04-07

    - the default video player's resume, pause, setVolume and setTime methods are now independent of whether or not a video is actually played
    - fixed plugin.ad.skipadbutton natural end not working
    - plugin.mantis add showtimeline/hidetimeline events, and corresponding mehtods in mantis
    
    

- 2.1.0 -- 2016-04-04

    - fixed mantis css bubble 
    - removed prototype/video/late-for-work.mp4 (too heavy)


- 2.0.0 -- 2016-04-03
        
    - simplified default video player api
    - add innerqueue concept        
    - fix some bugs        

- 1.1.0 -- 2016-03-25

    - add "back to app" and "inactivity" plugins
    
- 1.0.0 -- 2016-03-19

    - initial commit
    
        