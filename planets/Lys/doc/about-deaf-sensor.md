About deaf sensor
======================
2016-02-02



Disclaimer:
    I found a new technique, that obsoletes the note below.
    The new technique is: rather than emptying a container,
    you mark old items, and once the new content is appended,
    you remove the old items.
    With this technique, scroll is not jumping at all, thus eliminating
    the causes of the problem (explained below).
    



Since 2.2.0, the threshold sensor accepts a window.lysThresholdSensorDeaf flag,
which makes it temporarily deaf.

You might ask, why do we need that?


Here is the real life case scenario which made me implement this flag.


Imagine a web page, and at the middle of it, you have tabs.
When you click a tab, the part below the tab updates and shows a new content.

What exactly happens when you click a tab is this:

- the bottom container is emptied,
- the page content is fetched via ajax and injected into the bottom container.

And, you have the lys threshold sensor listening on your page, for some reasons
(this is a simplified setup, but hopefully you get the picture).


The problem with this is:

- when you empty the bottom container, the page content is shortened, 
and the browser will naturally move the scroll to the bottom of the new shortened page.
Oops, your threshold sensor works by detecting the scrolled distance, which, just
after the emptying operation happens to be as its maximum, which makes it think that
it's time to trigger the lys.fetch method (this is how a sensor is supposed to react).

However, from the user point of view, that's an undesirable event, because it will trigger 
the sensor unecessary (which implies that probably an ajax page will be requested, so 
that's an extra undesirable http request), and we want to avoid that.


Make the sensor temporarily deaf is a possible work around.
So you can basically make the sensor deaf just before you empty the items, 
then once the new items are "manually" appended, you can remove its deaf state, 
and everything is in order.

