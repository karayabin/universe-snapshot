JVideoPlayer General
====================
2016-04-15



Things were going better yesterday.
Let's start over again.




JVideoPlayer is a player that can read events.
Events can be of different types: for instance a video event, or a subtitle event, an adversising event, you name it.


Before we start, please have a look at the images if you can:

- play modes overview
- interrupt  modes


I will subconsciously refer to them all the time.
In fact, all the discussion below can be summed up by those two images, almost.






Streams
----------

Imagine a timeline with events on it.
Let's call that a stream, short for events stream.

The jVideoPlayer can read multiple (parallel) streams at the same time.

A stream can contain events of different types, although it's quite common to have mono-typed 
streams (streams with the same type of event).


Streams can also be categorized in two categories:

- absolute stream: the start property of absolute streams' events is in microtimestamp
- relative stream: the start property of absolute streams' events is in seconds, relative to an arbitrary origin




PlayHead - eventHandler
---------------------------

In order to read multiple streams at the same time, the jVideoPlayer uses a playhead composed of multiple eventHandlers.
An eventHandler knows how to process/read ONE type of event.

When an event crosses the playhead, it is dispatched to the right eventHandler: that's the basic mechanism used by
the jVideoPlayer to read multiple streams.



Events
-----------

Events are really just javascript maps: they contain the information necessary to display the event the way it should.

There are different types of events, and they come with different properties.

For a video event for instance, the event might have an url property.
For a subtitle event, there is a text property.

You can create your own events, and you would just need to create the corresponding eventHandler to make it play by 
the jVideoPlayer.


Since events are passed through almost all objects along the chain, they can also be used to hold temporary properties
from time to time.
That's done internally by some plugins, and might be detailed in this document when appropriate.


Common properties for events are the following:

- id: string, the identifier of the event in the scope of its type
- type: string, the type of event, which is often the name of the eventHandler used to process it
- ?duration: number, the number of seconds that the event lasts
- ?start: number, the microtime when the event should start


Sometimes, when necessary, events are decorated with other properties:

- currentTime: the current time of the event in seconds (a number between 0 and the event's duration)
- onEnd: a callback triggered when the event ends (sugar for the developer)





Dispatcher Events
-------------------------

Dispatcher events and events are not the same.
Events are js maps processed by an eventHandler in order to display something on the screen,
while dispatcher events are like js events (click, mouseover, ...).

When ambiguous, we use the term item to designate an event (js map), while event is short for dispatcher event.


Here are some events that are triggered:

 
- eventResume (event): triggered by an absolute stream when the event (item) is being played/resumed.
                            Amongst other things, this is when the eventHandler processes the event.
                            
- eventAnnounce (event):  triggered by the main plugin when the event is resumed and it's not playing already.
                            The goal is to update the remote info (duration, title).
            
- eventTimeUpdate (event, time): 

            Triggered as the time of an event (if any) is updated.
            
            The eventHandler is responsible for triggering this event.
            It's recommended that this event is triggered at least once per second,
            because that's generally the unit used by the remote to display the elapsed time of the event.
            
            Time is given in seconds.
 

- eventEnd (event): 

            Triggered when the event reaches the end of its duration.
            This might also happen when the event is skipped (ad),
            but not when it's killed (replace pattern).          






Play modes
--------------

Uses of jVideoPlayer has been categorized into the following modes:
 
- Replay mode 
- Playlist mode 
- Live mode
 
 
### Replay mode
 
In this mode, the remote controls the playhead.
There is one main event, typically a video event which is played.

Some side events can be attached to that main event.
For instance, we can attach subtitles to a video, and/or attach one or more advertising too.


### Playlist mode

The playlist mode is like the replay mode, but when the main event ends, there is another main event playing,
using the same pattern.

When the last main event in the list ends, it plays back the first main event again, so that we have a circular movement.
 
 
### Live mode
 
Live mode adds the notion of time in the mix.
The basic idea is that the remote controls the time, and not an event in particular.

Events are added progressively by a eventsFetcher object.

Since time is infinite, the remote typically doesn't display the general timeline.

However, every time there is a main event being played, the remote can sync itself to that 
particular event (the title of the remote changes, the timeline temporarily appears, ...).





Remote synchronization
-------------------------

The remote is the widget through which most interactions between the user and jVideoPlayer are done.
The remote has many features amongst which:

- title: indicates which event is playing
- elapsed time: indicates how much time is left before the end of the event
- timeline: allows the user to move forward/backward in the time of the playing event
- thumbnail previews: a plugin that allows the user to preview a video event by hovering the timeline
- ...
 
 
During a given browser session, multiple (main) events might be played.
The remote has to be resynchronized for each main event.

This is done by passing an event to the remote (the remote will extract the duration and the title from that event,
which are the two most important data it needs). 
 
 
 
 
Screen 
-------------
 
The screen is where things happen.
The jVideoPlayer processes events that are displayed on the screen.

It is possible to manage multiple screens on the same web page, but generally one screen is enough.
 
Each screen contains a stack of layers that can be used by eventHandlers to display something.



The main plugin
-------------------

The main plugin, short for main event plugin, is a plugin that actually does a lot.
It was moved from the core to a plugin to alleviate the end user's visible api, but 
it implements some fundamental mechanism of the jVideoPlayer.

Basically, you'll always need the main plugin; but since it's a plugin, you may choose which 
implementation you want (currently there is only one).

What the main plugin does is that is brings the concept of main event to the jVideoPlayer.

The main event concept can be defined like this:


- a main event is the most important thing on the (jVideoPlayer's) screen when it's played  
- when a main event is played, the remote synced itself with it 
- there can only be one main event played at the time per (jVideoPlayer's) screen  


Often, the main event is a video, but it could also be a panel for instance.



An interesting thing happen when you decide that your screen should have a main thing to display, and that you use
your player with the notion of time at the same time: conflicts.

Conflicts happen when a main event is programmed to play while there is already a playing main event.

Conflicts are usually created voluntarily by the maintainer for a few reasons:


- when you want to interrupt the main video with another main event like an ad or a broadcast video message, or a panel, etc...
- when you cut off the end of the main video to play the next program 

The good news is that the main plugin handles those conflicts for us.

Conflicts are internally known as interrupt modes.
The following are built-in by default, and they are named after the type of operation that is applied to the interrupted event:  
 
- pause (aka insert pattern):
        This mode is typically used when you want to play an ad in the middle of a main event.
        The interrupted main event is temporarily paused, and resumes when the interrupting main event is finished.

- kill (aka replace pattern):

        This mode is used to cut off the end of the main event, or make sure that the new main event starts right 
        on time.
        
        The interrupted main event is killed (abruptly stopped),
        then the interrupting main event is played.

  
        In my implementation, kill cannot operate on interrupting events.
        However, it can replace the root interrupted event in the background, while
        an interrupted main event is playing.
        In other words, if main event A is killed by main event B, the kill operates
        no matter what.
        If an insert is playing during the transition, the kill occurs in the background: the
        interrupt is considered more important.
    
  
  
  
  
Event special properties
-----------------------------

For internal purposes, we/plugins can attach some special properties to an event.
A special property can be attached on the event itself, or is inherited from the corresponding eventHandler (if defined).

By convention, event special properties are prefixed with an underscore.

Example of event special properties that I used (and therefore are reserved) while implementing the jVideoPlayer base:

- _interrupt: string(pause|kill)
- _target: string:main
- _paused: pausedEvent, used by the main plugin to keep track of a paused event during a pause interrupt (aka insert pattern). 



   








