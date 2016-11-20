JVideoPlayer General
====================
2016-04-18





Hierarchy 
-------------

ScreenElement 
ScreenElement > Focusable > Media
ScreenElement > Focusable > Panel
ScreenElement > Decorative > Subtitle

          
EventsQueue > RelativeEventsQueue         
EventsQueue > AbsoluteEventsQueue
          
            
Focusable
-------------

Can info on remote.

- duration
- ?title


+ resume -> ended 
+ pause 
+ getTime (could be optional if handled by player?)
    - show elapsed in remote
    - keep relative events in sync
+ setTime
    
    

   
            
Player
----------            

main ? announce -> remote
 
 
Media
----------
 
+ load -> loaded 
+ resume -> progress  
    
    
Decorative
--------------
    
+ show    
+ hide    
    
    
Subtitle
--------------


EventsQueue
--------------


An event queue is a timeline on which one can attach events.
We can then do the following actions:

- resume the timeline
- pause the timeline
- scrub the timeline

An eventqueue, depending on its implementation, might take into account the expanded property of events.
See "Expanded" section for more details.




General discussion: 

Modes: 
- eager:process all events at once (current implementation)
- lazy: process events one after the other


RelativeEventsQueue
-----------------------

time of events is given in ms compared to the origin 

AbsoluteEventsQueue
-----------------------

time of events is given in ms from epoch 









Expanded
--------------

It should seem obvious than when you play a video and move the time to 31s, the video would play from its 31th second.

The same logic can also apply on a timeline on which multiple events of arbitrary duration are positioned.
In that case, by moving the time, you could happen to be in the middle of an event for instance;
and should that occur it would seem natural that the event plays from the arbitrary point in time where 
the playhead is positioned.

But if we observe how youtube videos ads are implemented in 2016, we must conclude that this behaviour is just one possibility.
Youtube videos ads for instance, do not play unless the playhead pass through the start time of the ad, like a flag that
is only raised if you pass through a line.

To take this other behaviour into account, we introduce the concept of expansion.
An event, or any object with a duration indeed, can be either expanded or not expanded.

Expanded means that the event could be scrubbed from any point,
whereas a not expanded event can only be entered if the playHead passes through its start point.











