How to debug Light_Kit_Admin
=================
2019-12-10





In this document, I explain how I personally debug lka during my development sessions.



What tools:


- az 
- Light_Kit_Admin_DebugTrace
- knowledge of the light app
- the logs




az 
----------
The "a" and "az" functions, which are located in the [big bang script](https://github.com/karayabin/universe-snapshot/blob/master/universe/bigbang.php) of the universe,
are by far my most used tool for debugging. Those are fast to type, and better looking than the "var_dump" php function.

That's not specific to lka debugging, but they are so important to me that I decided to put them here, in the first place.



Light_Kit_Admin_DebugTrace
----------

Now when it comes to a debug tool specific to lka, my best debug tool is the [Light_Kit_Admin_DebugTrace](https://github.com/lingtalfi/Light_Kit_Admin_DebugTrace) plugin.
It basically outputs every important thing pertaining to the lka page(s) called: the time, the http request details, the csrf_token used, the route info, the
kit admin template used, the kit page configuration details, including the widgets configuration. This is a must have.

It gives you the 10000 feet view of what's happening under the hood.

This tool can write both to a file and/or multiple pages to a directory (that comes handy when you have a page
which executes ajax requests under the hood, so that you have the debug trace for the main page AND all the ajax requests).

I also like to create a bash alias to the main file, so that basically when I type "lka" in my terminal, it opens
the trace in a text editor (sublime text in my case).

The nice thing about sublime text is that it refreshes live, so I can browse multiple pages, and the content
of the debug trace will update accordingly in the sublime text window, very useful.




 

Knowledge of the light app
----------------

I probably should have mentioned that one before anything else, but it seemed obvious.
Light_Kit_Admin is just a [Light plugin](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/plugin.md) and so it behaves as any other light plugin (although it's a big plugin).

So, knowing how the light application works is an indispensable knowledge to debug lka in some cases.

Knowing how the requests are treated by the Light instance: the router, then the controller, that's actually quite simple.

Just open the [Light instance source code](https://github.com/lingtalfi/Light/blob/master/Core/Light.php) when in doubt, it's quite epurated and shouldn't be hard to understand.  




Check your logs
---------------

Although most logs are not specific to lka, it's worth checking the logs every once in a while (preferably regularly),
to check that the app is doing ok.

Amongst the different loggers, the ones below as the one I use the most:

- [Light_404Logger](https://github.com/lingtalfi/Light_404Logger) to monitor missing assets
- [Light_ExceptionHandler](https://github.com/lingtalfi/Light_ExceptionHandler) to monitor uncaught exceptions 



