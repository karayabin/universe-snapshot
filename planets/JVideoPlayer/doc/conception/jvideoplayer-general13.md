JVideoPlayer General
====================
2016-05-04



GOALS
-----------

- handle the playing of events
----- multiple types
----- conflict between events



Design Implementation
=========================

Rules (for conception)
-----------------------

- all the events in a given queue are of the same type


Definitions
---------------

### What's a conflict?
A conflict occurs when two events sharing the same spot overlap (they compete for the same spot).


### What's a spot?
A spot is a location (a layer actually) where only one event can be played at a time.


### What's a background?
The background is a hidden location where events are stored for reuse purposes.


### What's the focus?
The focus is the state of an event when it's on the spot.


### ingoing/outgoing events?
When two events compete for a given spot, the ingoing event is the one that wins while the outgoing
event is the one that looses.


### past/present/future events?
If time is represented as a line, and the current time is represented by a point on that line,
then a past event is one which end is located before the current time, 
a present event is one which boundaries encompass the current time, 
and a future event is one which start is located after the current time. 


### What's an event placeholder?
It's a dom element that contains the physical representation of an event.


### What's an event type?
It's a property that is used to dispatch an event to the right event handler.


### visible surface?

The visible surface is the surface of a layer which the user can see through the screen. 



How do you solve an event conflict?
----------------------------------------

The outgoing event is put to the background, where it is stopped or paused.
If it is paused, the outgoing and ingoing events might be swapped when the ingoing event ends,
and the outgoing event would resume.



LayerManager
--------------

- createLayer (name)
- clearLayer
- transferLayer
- appendToLayer ( name, content )



Layer Types
----------------

There are different types of layers:

- dedicated layers, which only accept one event placeholder at a time
- shared layers, which accept multiple event placeholders at a time
 
 
 
 
EventHandler
----------------

### Requirements/constraints

Will be instantiated WITHOUT arguments by the eventsPlayer machine.
- prepare ( eventInfo, jPlaceHolder )
        --> oneventdurationready
- pause (  )
- resume (  )
        --> eventend when the event terminates
- setTime ( ms )
        --> eventend if the new time is more than the event's duration
- stop (  )  // basically do pause, setTime(0).
        --> eventend
 
 
 
 
EventsPlayer
---------------

Roles (not exhaustive yet):

- handle communication with the layer manager






Event
- id    // alphanumerical chars only (underscore included) 
- start
- duration
- type
- ?cacheable
- ?target (layer)
- ?interruptMode










