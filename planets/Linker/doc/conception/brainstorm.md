2016-03-24


I like links
---------------

As I'm creating the application, I like to create links to different planets.
This allows me to keep planet code in one place on my local machine, so that if I modify the source code,
all linked files will automatically and instantly reflect the change: that's just the normal behaviour of links.


Need to export
-----------------

When the app is ready, I want to export the app to a remote server.
From memory, I believe I currently use a bash script that calls a git command, then creates 
necessary links on the remote server (I don't use git hooks, because they are too complicated for me).

That works, and that's flexible.

However, now I have a lot of links, so I can factorize something.

I would like to just write my links like that once for all:


``` 
$myAppDir/planets -> $planetsDir 
$myAppDir/www/libs/assetloader -> $planetsDir/AssetLoader/www/libs/assetloader 
$myAppDir/www/libs/flue -> $planetsDir/Flue/www/libs/flue 
$myAppDir/www/libs/htmltemplate -> $planetsDir/HtmlTemplate/www/libs/htmltemplate 
$myAppDir/www/libs/jajaxloader -> $planetsDir/JAjaxLoader/www/libs/jajaxloader 
$myAppDir/www/libs/jdragslider -> $planetsDir/JDragSlider/www/libs/jdragslider 
$myAppDir/www/libs/jfullscreen -> $planetsDir/JFullScreen/www/libs/jfullscreen 
$myAppDir/www/libs/jimagerotator -> $planetsDir/JImageRotator/www/libs/jimagerotator 
$myAppDir/www/libs/jinfiniteslider -> $planetsDir/JInfiniteSlider/www/libs/jinfiniteslider 
$myAppDir/www/libs/jitemslider -> $planetsDir/JItemSlider/www/libs/jitemslider 
$myAppDir/www/libs/jvideoplayer -> $planetsDir/JVideoPlayer/www/libs/jvideoplayer 
$myAppDir/www/libs/screendebug -> $planetsDir/ScreenDebug/www/libs/screendebug 
$myAppDir/www/libs/tim -> $planetsDir/Tim/www/libs/tim 
$myAppDir/www/libs/vswitch -> $planetsDir/VSwitch/www/libs/vswitch 
$myAppDir/www/templates/jvp/jvp.mantis.htpl -> $planetsDir/JVideoPlayer/www/templates/jvp.mantis.htpl 

```


And then reuse that file any time a link info is needed.


So for now, I will only focus on my needs.
I noticed that all my links target are in the same planets directory.
So, I can use the portable $planetDir variable in that case, and could easily port my app to other servers with same relative structure.
This variable abstraction technique would not work if the remote server relative structure doesn't match the local machine structure;
but as I said, for now I'll keep it focused on my needs.


So, the ingredients are just: variable replacement, and parsing a bunch of lines.



My needs
-------------

- create the links, and ensuring that those are consistent with the links.txt file (including verifying the target, of course)
        
        Let's call that: check


