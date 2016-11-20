JVideoPlayer General
====================
2016-04-11



I earlier started jvideoplayer general notes.
A few days have passed, and I did other things, so I need to refocus.
Ideas will be rewritten here.


The layers system we keep.

However, now I imagine the jvideoplayer as a machine with different lasers gun pointing down to the screen.
Each laser gun is responsible for writing on a specific layer.


See image jvideoplayer overview technical.

The general mechanism is pretty basic.
There are some events coming from the right, and they travel along the ramp to the gun, where they are processed.

There are various types of events:

- cues: display subtitle
- panel: display a panel with a message
- video: display a video
- ad: display an ad video
- ...

Each gun only knows how to handle one specific type of event.
The biggest addition to this new version might be the apparition of the id in events.

We will probably see later how id help us in concrete implementation.



So in this brainstorm I want to go other every potential problem I can think of before I do the implementation phase.


Let's start with the basic event -> gun mechanism; we will take the panel event type, because the gun for that is one
of the simplest.

So an (panel) event comes to the gun.
The gun has some kind of front door, and when the event passes that door, it's processed/fired.

Assuming the gun is bound to an appropriate layer (the panel layer in this example), processing the event simply means display the panel on the panel layer.


All events have a duration, which might be explicit or implicit.

On the image, there is a schema representing an event flowing through a gun.
I like to have this schema in mind when I think about the fact that time is just a dimension that we can scrub.
We can go forward or backward in time, and so we the event can flow from right to left, or from left to right.
 
So the events are simple static box that get transported from the right to the gun by a trailing ramp. 
So the time actually depends on how fast the trailing ramp is moving.
  
  
The concrete implementation for such a system would be that when the event is on the very right, 
we set a timeout, so that when the timeout expires, the event reaches the gun's front door.
That's the basic mechanism.



Preloading Video
-----------------------

Now, in reality, the basic scheme does not work very well with video since video need preloading.
Preloading might take between less than a second to a few seconds, depending mostly on the connection speed.

Why dealing with preloading in the first place? 
The primary reason is that it allow us to swap from a video to another instantly (no blanks between the two videos).

Our system has to deal with preloading, so that the user can simply get the concept of preloading out of her mind (we like simple things=wlst).
In other words, video events, from the user's perspective should be treated as any other types of events.
To deal with the preloading, we simply trigger a preparevideo event as the event is deposited on the ramp.


The preparevideo event's response preloads the video and put the preloaded video in the videocache if it's not already there.
Benefits of this technique is that:

- we only need to preload once per video (and per page refresh)


Now with the preparevideo event we need to pass the videoInfo, which is nothing more than the event itself, which contains
at least the data necessary to preload the video.

Personal note:
It might be a better idea to pass the id instead of the whole event array?
But it's too soon for me to say.

If the video is programmed to fire but it's not preloaded yet?
We use the promise system, which allows the implementor to create the logic.
The problem with promise is that it might have some noticeable delay, but that's a constraint of video preloading that 
we probably cannot get rid of.



Replay mode
----------------

In this mode, we just want to play one video.
So the ramp is not necessary at this point of the conception in replay mode.
Rather than getting rid of the ramp, we can also imagine a ramp with just one event waiting at the door of the gun.

When the page opens, the event enters the gun and is therefore fired.
As we said before, video needs preloading, and in this particular case, which is very common, the video could not possibly be finished preloading,
because the instructions of preloading and firing the videos are adjacents, or at least very close to each other.

As we said, that does not matter: the video will play asap.
That means we need to know when the video is preloaded.
We can use the load event of the video element for that (I'm referring to v3.0.0's video element that I plan to reuse in the new version).



Relative events
-------------------

In replay mode so far, we don't need time.
However, now we want to add some ad videos and some cues to the played video (let's call it main video from now on).

It's worth taking the time to understand that the cues are really dependent of the main video.
Ad is more versatile, but it's possible to conceive ads as dependencies of the main video as well.

So, how should we implement such a system?

Firstly, we will use three guns for that: 

- the main video gun
- an ad gun
- a cue gun


The important thing is that the timing of their ramps must be synced.
And actually, that's almost all there is to it.

A synced timing implementation was already done with pretty good results in v3.0.0, via inner queue and eventsQueue.

This is represented in the image.



2016-04-12

We see that relative events are bound to a specific event.
Their timing boundaries go from 0 to the main video's duration.

So when we play a video, if it has relative streams bound to it, we "mount" the innerqueue mechanism to the gun
and attach the relative streams (of relative events) to that queue.

The innerqueue is synced to the event's personal timeline, which basically means that when the main video is paused/resumed/settimed,
the innerqueue recomputes the relative events.


Absolute events
------------------

Technically, the same applies to absolute events.
An absolute event is an event which time unit is the microtimestamp.

Although this is not implemented in v3.0.0, we should be able to move forward/backward in absolute time, and pause/resume
the stream of events.



Explicit Duration
----------------------

When events have explicit duration, it's technically possible to play them not only from the beginning, but also from
any point of their timeline.

This allows us to move the timeline and play in the middle of an event.
This notion of consistency might be desirable in some cases, and not desirable in other cases.

Consider a relatively anchored ad video which plays at 35s of the main video, and which lasts 30s.
If you scrub the timeline at 45s, you could expect one of those, depending on your business logic:

- the ad is playing from its 10th second (consistent ad)
- the main video is playing from its 45th second (ad is only played when its start point is reached)

Add to this the possibility of a hybrid type: if the user can skip the ad, we can add a skipped flag to the event so that
depending on whether or not the user skipped the ad, scrubbing to 45s could play either the ad:10 or the mainVideo:45.




Insert pattern, birth of event.ended callback
---------------------------------------

Our machine can sure play events, but it gets interesting when multiple events are played together.
The insert pattern is born from the need to play an ad in the middle of a main video.

It basically does the following:
 
- pause the main video
- play the ad
- when the ad ends, resume the main video


We can extend this pattern to any event, not just main videos and ad.

The key thing that we need here is detecting WHEN the ad ends.
That's why we create the event.ended callback, that fires when the event ends.

The event.ended callback might be optional, since for cues (for instance), there is little or no interest
to trigger such a callback.


The insert pattern has to be recursive, because we could have an ad interrupting a main video for instance,
but we could also have a broadcast video message interrupting the ad.

This is shown in the image.

Now how do we know which event an insert is inserted into?

For instance, is the broadcast message interrupting the ad or the main video?








Skip
------------

Some events are skippable, like an ad.
When an event is skipped by the user, we need to know this information, we could collect stats on who skipped WHAT, and WHEN
to understand WHY.

So we need to trigger a skipped event.

But the effect could be the same as the event.ended callback (at least so far it does, as far as I can foresee it).


In other words, for now, skipping has the same effect than moving forward to the end of the events,
plus it triggers the skipped event.






Replace pattern
-------------------



Kill









  
  
 
 
