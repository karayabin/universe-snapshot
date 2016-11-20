JVideoPlayer General
====================
2016-04-12



I earlier started jvideoplayer general notes.
I believe I'm more interested in the quest than in the results now.
My quest is to develop the whole system without writing one line of code, and being sure it will work.
In other words: anticipate.
I believe this is a great exercice for the mind, and that it's one of the goal of a developer to be able to do that,
although so far, after all those years of developing, I could never do it without try/error.

So today, I might fail again, but this is my try.
I only have 90 minutes of work left for today, so that won't be long.
It seems to me that now I've found my calm again: inner peace.

We all have our own problems, I won't talk about mine, but when we found inner peace, then only development can begin.

Concentration, whatever works for you, or if you don't have any problems, good for you.

Anyway, sorry for bothering you this those details, but I felt that I needed to put my fingerprint on today's document.


Today, I'm going to try to go from A to Z, and going to all the points in between.
I'm using my personal images, I don't expect anybody else to follow; actually this is really a PERSONAL brainstorm,
although it's public.


--------


Gun=eventHandler


The first thing I want: 

- no ramp, just replay mode

We need to load the event.
When it's loaded, the remote knows and displays the duration, and the timeline can then be drawn too,
and the title too.


This means we would have a load method.
That works for video, does it work for panels ?
    Yes, panels could have their duration display in the remote, and a title too.
Therefore, the load method would be the method that loads an event and prepare the remote if necessary.
But for cues, we don't need to load anything (it would be absurd to display the title for every cue),
so the load method should be optional.


- void     ?load ( event ): prepares an event, so that when the resume button of the remote is pushed, the event plays instantly.
            In the case of videos, the load event pre-loads the video.
            The load event is also used to customize the remote (setting the duration, and hence preparing the timeline, 
            and the title too, if relevant).
    

Now it's loaded, we want to play it.
How do we know when the event is loaded?

At that point, it's hard to me to say, what are our options?

- a simple callback, triggered when the load method is done
- triggering an "anonymous" loaded event
- ?


I will go with triggering a loaded event, since it would make it easier to debug (as one can easily add a listener to this event).
But for the debugging to be efficient, we need to access the event dispatcher from anywhere.
So we will create an event dispatcher (ed) accessible from anywhere in our code.

ed.on ( loadedEvent, function( event ){} )


If we wanted to do the simple replay mode, we could just wait that loadedEvent, and then play the video.
Actually, resume might be a better word (intuition).

So we need a resume method (on who will be defined later, but the same object as load).

SomeObject (my best guess so far is: eventHandler):

- ?load ( event )
- resume ( event )

Do we really need the event argument in the resume method?
-> We can certainly call the load method multiple times, so yes, it would help targeting the event we want to resume?,
unless the eventHandler object only take care of one event, but that would be probably too much consuming.

It makes more sense that an eventHandler can handle one TYPE of event, rather than creating one event handler instance per event.
So, yes, we need the event argument to the resume method,
but where does the event argument comes from?

The user clicks the remote's resume button...  dead
Actually in this example, we talked only about ONE event.
So loading multiple events only occurs when we add the ramp to the gun, this means in a time aware mode, with potentially
multiple events.

In such a case, the event comes from the ramp.
When it's at the very right of the ramp, we can call a prepare event, which should call the load method if any,
and then when the event has to be fired, we call a fire event, which should call the resume method of the eventHandler?

Again, we add this layer of events to ease debugging, but it's just a try, maybe it's not the best solution when it comes to performances.
Recap:



- timeline
----- prepare ( event, startTimeout )
----- fire ( event )

- eventHandler
---- ?load ( event )
---- resume ( event )


- someKindOfBridge (between timeline and eventHandler)
----- ed.on ( prepare, eh.load && eh.load ( event ) )
----- ed.on ( resume, eh.resume ( event ) )


eh stands for eventHandler.


I wonder if the event argument for the resume method is really necessary, but I don't know, let's keep it for now.


So now we can play a video in replay mode.
I forgot about the remote: how do we display the load info (duration, title) on the remote.
I guess we can have an other bridge that listens to the resume event, and that updates the remote then. 


Now I want to add an ad in the middle of the video.
When the ad plays, the remote's info (duration, title) are changed.

This is an other eventHandler, but it's also of type video, although not on the same layer.

So we need the inner queue, right? What's that?

This is some kind of bridge too, that listens to ed.resume, and then if the event given to the resume method matches with
the event to which the queue is supposed to be attached to, 
then it starts a timeline that is synced with the event's timeline.

To match the event, let's use conventions:

An event must have a type and an id.

- event:
----- type
----- id


That's a strong statement, I know, but let's give it a try.

Same type, same id ? Same event.


An innerqueue is basically a timeline as we described earlier:
 
- timeline: 
----- prepare ( event, startTimeout )
----- fire ( event )


The difference is how the events are handled.
With replay mode, or stand alone event, the event is just played.

With an ad, we use the insert mode, or insert pattern, which first pauses the currently playing event,
then plays the ad, and when the ad ends, it resumes the paused event.

We'll need to talk about the insert pattern at some point, but let's focus on how the innerqueue works for now.

What the user can do with the remote of a playing event is:

- pause
- resume
- change the time 
- change the volume

Note that change the volume might not be relevant for all type of events, we will need to work on that too.


When pause is detected on an event with attached streams (=with innerqueue), the queue immediately cancels all the fire timeouts.
For now, we don't try to cancel the prepare calls, firstly because the innerqueue don't use a settimeout for the prepare calls,
and secondly because the common video event type can benefit from having a cached preloaded version of the video ready to play.

Now what about subtitles.
If they are paused, they are supposed to stay on the screen, but since our timeline only triggers a prepare and fire event (and no end event),
how do you know when to remove the subtitle? You probably use an inner timeout to remove the subtitle after x seconds, but then
how do you cancel that "remove subtitle settimeout"?, is this the best method?




 
 



























































