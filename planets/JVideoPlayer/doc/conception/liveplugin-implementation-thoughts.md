2016-04-04




What event should be playing at time=x?
-------------------------------------------

The absolute event which start time is the closest to x.

What if Alice skips an ad and refreshes the browser?
The ad might be flagged as skipped by Alice and shall not be playing in that case.




Given an events list, which events should I play?
----------------------------------

You could filter out all events which end (start+duration) is already in past.




How to handle pauses?
------------------------

I believe using an centralized absolute events queue system, alike the innerqueue plugin
is the way to go: because it makes the whole conception easier.

    Note: we should be able to inject offset in that the events queue (i.e. artificial absolute time)




How to handle events reloading?
---------------------------

An idea is every time new events are appended, the queue is refreshed (paused and resumed) 
in its entirety.

To reload the events, since there are many ways to do it, I suggest to do a plugin.
I would personally go for a plugin that calls events by slices of X,
and fetches new events Y events before the X limit is reached.

This solution avoids problems of bad timing that we could have if we chose to implement
a system that fetches every X minutes for instance (like the event is called at exactly
the same moment where the events are fetched? I don't know).



Important note:
    if we implement my plugin with x number of events, this means we have to count
    the events that have been played.
    By drawing some pictures, I believe that a working implementation could
    be that inner queue's handlers trigger an onEnd event, passing the event as 
    the argument.
    
    Then, the fetcher plugin should have some getEventKey method, or other heuristics
    to distinguish events, and therefore could leverage/listen to the onEnd event
    to know which events have already been played, and therefore accurately count
    the number of played events.
    
    
    
    
    
More about inner queue implementation
---------------------
2016-04-05

Thinking of it again, since live events have a duration, 
the inner queue could handle when the event terminates, thus simplifying the
design of a handler.

A handler could then have the following methods, called by the inner queue:

- start
- end
- cancel (I've add it thinking of persisting subtitles that I experimented with relative inner queue: just cancelling the set timeout seems to be not enough)


Another idea is the following question: can events overlap each others?

First, let's remind that queues handle a specific type of events each,
so the question is actually: can events of the same type overlap each others?

The default is no: because when video B start at 11:35, it stops video A if A was still playing.
But, maybe this behaviour would not work for all events. I'm just pointing that out,
but for now there is no need to implement anything, we can wait until the problem actually
occurs.



Consistency through browser refresh?
------------------

I believe common sense would tell us that the player should be as consistent as it possibly can
with browser refreshes. 
Meaning that if Alice pauses video A, and comes back 10 minutes later, and refreshes the browser,
the pause mode should be still on.

In order to do that, we need to know the state of the player, or should I say timeline: paused or playing.
Fortunately, we can just listen to the remote, since that's the only way for the user to pause/play the video,
at least in the current state of things.

I believe cookies is our only option here.

Now for videos, we need to set the current time to where it was left.
Although we can compute the time of any event by memorizing the time it was paused/resumed at,
we still need to tell the video (and possibly other events) to move forward to that time.

Therefore, we should some other methods to the handlers:

- setTime
- pause
- prepare (I've add it to get the whole picture so far)




Inner queue evolution?
-------------------------

Also, while I'm at it, I don't know about the idea of creating one eventsQueue per type,
what about one centralized event queue with different handlers?

This would make an extra if statement per handler (to match the right handler) vs having to instantiate
another eventsqueue instance.

If there are a lot of events, having separated eventsqueue seems (non objectively) better, since
we save those extra if.

Assuming that the cue plugin (which has a lot of events) might be transferred to live time,
then I will keep one eventsqueue per type.


2016-04-05

The inner queue should also have an init method that is triggered once, plus the other pause/resume methods.
The init method's purpose would be to find if an event should be playing when the page opens, and if this is the case,
it should prepare that event so that the elapsed time of that event is consistent (for instance the user can open the browser
and the movie has already started 5 minutes 03 seconds ago).

Then resuming should not try to handle those "init events", but only future events.












 
 


    
    