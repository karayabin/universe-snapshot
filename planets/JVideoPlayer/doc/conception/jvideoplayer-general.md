JVideoPlayer General
====================
2016-04-07




Currently is version 3.0.0 out.
But I'm not satisfied, at all.
It's too complex, that even I have a hard time adding functionality to the player.

Now is a good time to rethink all the structure.

Here is my brainstorm, and conception notes.




What I want
==================

I want an agnostic player: it should be able to do anything.


The LayerManager and the Screen
====================================

Perhaps the most important decision at this level of conception is the choice to use the layer manager.
Basically, the idea is to use layers to display the various things that the player would display.

Although it's called video player, it does not only display videos; it can also display subtitles,
administrator messages, screen transitions, you tell me...
More on those "things" later.

What's the benefit of using layers?
 
With layers, we can display subtitles over a video.
If we want to display an ad video, we can simply put it on another layer and "swap" the layers 
when the moment is appropriate to give the illusion of instantaneous transition (of course it requires
that we preload the ad video in the background, but that's a technical detail and the user 
doesn't know about it...).

With layers, it's easy to add a transition screen (for instance if we play a playlist, we can 
easily display an animated transition before the next video starts).
 
So, yes, we use the layers technology.
 
To make things even more powerful, we will say that all those layers are enclosed into a screen.
In fact, a screen is a container of layers.

The concept of screen allow us to handle multiple screens on the same web page, should that ever be a 
requirement.


See the layers image.




The Streams
===================

So, what's a "thing" that the player can display.
It's in fact an event.

Now the conception gets harder as we introduce the notion of time.
But take the layers, and put them horizontally, so that each layer represents a timeline,
you end up with a stack of timelines.

Each timeline (or layer) is called a stream, short for events stream.

On a given stream, we can display some events.
To make things simple, and as an implementor choice, I will say that a stream can handle only one 
type of event.

In other words, a stream contains events of the same type.

By doing this choice, the layers are more organized.
(I would agree that this would be a first step towards the "cannot to anything" though, but we have to make decisions.)


Let's see how it looks like visually.
Looks a good start to me.

See the streams image.

We can technically add any number of layers/streams to a screen.






The Api
===========

Now things really hairy, at least for me, as I want to provide a simple api to manage all that.

So, enter the real brainstorm mode, because I've just a couple of ideas to get started, but nothing more...


First, an important observation:

For a given stream, a common convention (almost rule, but not quite) is that for events of type video,
like video, ad, broadcast, we generally display only one video at the time.
In other words, a screen generally displays one video (it focuses one video at the time).
 
However, this is not technically true, and I will not degrade my "can do anything" rule again.
Technically, it's very possible to say that while we are playing a video on a layer towards the top,
we can still play a video (with muted sound for instance) in the background, so that the bottom video 
doesn't stop while the top video is playing.

That's possible, although I cannot think of a sane/classical business reason to do such a thing.
So since that's possible, we cannot close the door on that, and this observation doesn't help much, 
in fact (boo).


However, I can try to use some common patterns for dealing with this multi streamed environment.


How do events interact with each other?
------------------------------------------

Take the video layer. 
The first thing we can do is play a video.
Ok.
Now if we want to play a second video, a natural thought would be that it should play at the end of the
first video.
That's the concept of playlist, the concept of chain.

It would be great if the api could provide a method to chain videos on the fly.
I will note that on my todolist.

But let's say you want to implement a tv system, where video are played at given precise times.
There could possibly be blanks between videos, and we would probably need to set some timeouts,
but let's not dive into that now.

What if video B starts before video A ends?
This could happen if the administrator decided that she doesn't like the end of video A, so she programs
the video B to start before the end of A (for instance).

Then we would need to interrupt video A, and play video B.
Let's call that the replace pattern.

The api should provide an easy way to implement the replace pattern (adding this to the todolist)
 
Now what about ads that interrupt a video, or an administrator broadcast video that interrupts either
an ad or a video?

Well, this is what I call the insert pattern.


(This is where my previous observation helps us a bit, but the situation is different though.)

If we used my observations (but in reality we won't, that's just to give an idea), we could define
the insert pattern with a simple algorithm:

- pause the currentlyPlayingVideo and save it as OLD
- resume the insertVideo (which might become the currentlyPlayingVideo)
- when the insertVideo ends/isSkipped, resume the OLD

Now the problem with this algorithm is that I introduced the concept of currentlyPlayingVideo,
which actually doesn't exist.
Although we could create it, it might not be a good idea, because it would moves us one more 
step towards the "cannot do anything" dead end.

So I have to come up with something else (and now, I'm really out of ideas, scrmblllll).











 













Todolist
-------------

- provide a method to chain videos on the fly
- provide a method for replace pattern


