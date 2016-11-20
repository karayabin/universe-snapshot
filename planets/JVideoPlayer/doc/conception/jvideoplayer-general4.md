JVideoPlayer General
====================
2016-04-14



Failed going from A to Z.
Let's try another thing.





Event
-------

An event is a js map with at least the following properties:

- id
- type






Focusable event
-------------------


An event that can be controlled by the remote's buttons.
A video is typically a focusable event, so does an ad video.
A panel too can be a focusable event.
A cue is generally not a focusable event.

A focusable event is generally propulsed by its own time engine,
and it triggers an eventTimeUpdate event to allow the remote's timeline to represent the event's time at any moment.

Focusable events usually have those properties too:

- duration: in seconds
- title: string


Focusable events are decorated with other properties when necessary:

- currentTime: the current time in seconds of the events (a number between 0 and the event's duration)
    


Actually, the focusable characteristics applies more to the whole event handler than on an event basis.





Screen
----------

Play some streams of events.


Stream
----------

Stream of events.
By default, a stream is absolute.
Events in an absolute stream have the following extra properties:

- start: microtime of when the event starts
- ?onEnd: callback triggered when the event ends




Dispatcher Events
----------------------

Not to confound with typed events.
Terms might be confusing.
Let's call item a typed event.

Here are the events triggered for a given item:
 
- eventResume (event): triggered by the absoluteEventStream via the jvpPlayer.playStream method.
                Start to play (or resume) the current event (item).
 
- eventAnnounce (event):  
            Triggered when the event is resumed and it's not playing already.
            The goal is to update the remote info (duration, title).
            
- eventTimeUpdate (event, time): 
            
            Triggered by the eventHandler itself.
            It's recommended that this event is triggered at least once per second,
            because that's generally the unit used by the remote to display the elapsed time of the event.
            
            Time is given in seconds.
 

- eventEnd (event): 

            Triggered when the event reaches the end of its duration.
            This might also happen when the event is skipped (ad),
            but not when it's interrupted (replace pattern).
            
            
            Triggered by the eventHandler itself too;
            it could probably be handled at the jvpPlayer level,
            but some events like ad can be skipped, so I prefer (at least for now)
            to delegate the logic to handlers, as to have a simple jvpPlayer base.
            





EventHandler
---------------

The eventHandler is an object responsible for handling a certain type of events.

Event handlers have properties and methods.
They are also responsible for triggering certain events.


Event handlers have the following properties:

- focusable: bool=false, the default value for whether or not events are focusable.
- interruptMode: (replace|insert)=replace, the default mode used when a focusable event interrupt another focusable event.
                                        See interrupt pattern for more details.
                            
                            


Interrupt patterns
-----------------------------------

When a focusable event is interrupted by another focusable event of the same screen, one of the following can happen:

- the old event is killed and replaced by the new one (called replace pattern).
                        This was done so that the moderator can voluntarily trim the end of a program
                        by starting the next program.
                        
- the old event is paused while the new event is played, then the old event resumes (this is known as the insert pattern).
                        This is how advertising is usually inserted.


By convention, a screen displays its focusable events at z-index=100, and has a black background at 99,
and the temporarily paused focusable events at z-index=98.


