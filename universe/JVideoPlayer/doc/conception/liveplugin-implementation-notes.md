2016-04-05




Basic start/stop mechanism with interrupt handling
=====================================================

So, I started to implement the basic start/stop mechanism, with interrupt handling.

Events are processed in order, and they have an absolute start time (number of milliseconds since 1970-01-01),
and a duration.

start time is used to create the START setTimeout.
duration is used to create the STOP setTimeout.

Note that both setTimeouts are set at the same time.

START timeout actually triggers the livestart event.
STOP timeout actually triggers the livestop event.

That's because I wanted to monitor those events while creating the object, and the events system
seemed to be adapted to that requirement.


Interrupt handling
----------------------

The first problem to consider at this level is that events interrupt themselves:
if A is playing starting at t=5 for a duration of 10s, and if B is playing at t=8,
then A should be interrupted by B.
That's a requirement I talked about in the implementation thoughts document: it doesn't have to be that way always,
but I started with this logic.

This means that STOP (and livestop) of A has to be triggered at t=8.
But since both the START and STOP timeouts where set at the same time, we need to also cancel
the B's STOP timeout.

In order to do that, I saved the START and STOP timeouts of every event into the event itself,
using the following (therefore reserved) properties:

- to_start
- to_stop

I also kept track of the currently playing event, so that when a new event is playing,
if an event is already playing, I can stop it AND cancel it's STOP timeout at the same time.

To prevent bad timing problems, I added an f_stopped flag to the event:

- f_stopped

This flag is raised when the STOP mechanism is triggered, and is taken into consideration to consolidate
the logic described above.





The already playing event
=============================
2016-04-06


Then I took care of the already playing event.
Problem that we have to deal with is that there might be more than one already playing event candidates,
but only one of them can actually being played, because of the "events don't overlap" rule.

For instance, let A and B be two already playing event candidates:

- A: start at t=-10 and lasts 30s
- B: start at t=-2 and lasts 30s


Only event B should be playing.
As I said, this is because we have decided to apply the "events of the same type don't overlap" rule.


Then there is thing: the already playing event will probably not start from its beginning,
so how do we make an event play at a specific time?

I reused the now already existing events system for that: the livesettime event is triggered;
so we rely on the event handler to know the implementation details.

From the innerqueue's perspective, setting the already playing event is a two steps process:

- call livesettime
- call livestart (and prepare the livestop event too)





Pause
=============================
2016-04-06


Until now, I've only implemented a plugin that handles ONE type ONLY of events.
That's because it allow me to focus on the basic structure more easily,
and I plan to add the multiple events type handling later.

So, in that monotyped event conception, the pause system is actually quite simple:
since events of the same type don't overlap, pausing is just a matter of:

- pausing the currently playing event if any
- clearing the timeouts


In multityped events environment, I guess that we should pause all playing events.

Also, since resume will be the next functionality that I'll implement, I marked 
the pause time, using persistent cookies with the property: 

- lastPauseTime (which is a microtimestamp)

That should allow me to manage an offset that will be applied to the time:

- the now time
- the events time



Resume
===============

For debugging purposes, I started by changing the livestop event triggered as an interrupt into an event with more
explicit name:

- livekill

(which occurs when event A is interrupted and killed by event B that plays before A ends naturally)

Then I had to figure out how the pausing/resuming mechanism worked.
The system I've implemented offsets the now value only, not the events (and so in that sense is more simple).

Basically, when the pause button is pressed, the time is frozen until the resume button is pressed again.

I do that keeping track of an offset, and when the processEvents is called, it accepts an artificial "now" argument,
which, in the case of a frozen time, is equal to the real now minus the offset.

And all events seem to adapt magically to that model (that's the simple part).

In order to compute the offset, I used a model where the offset is the sum of the paused periods/intervals.

To keep track of a period, we need the beginning of the pause period, and the end of it.

For instance, if the user pauses from t=100 to t=3600, then we add 3600-100 = 3500 to the offset.

Pause periods cumulates.
This can be better understood graphically (I believe).


Let me draw a picture that helped me.
![live plugin](http://lingtalfi.com/img/universe/JVideoPlayer/live-plugin-pause-cumulate.jpg)

To implement this, I added an offset property, which is null when there is no specific user time.
In combination with the pause's lastPauseTime persistent property, we can manage to have a consistent offset.

I also added a few methods:

- clearUserTime: reset the offset (abort user time and goes back to common time)
- resync: apply clearUserTime, then reprocess events (sugar)




Timeline?
==============

I believe timeline is not necessary in live mode.
So, I changed mantis, added hideTimeline method, and also added mantis.plugin hidetimeline event
to control it from the live plugin.



Multiple event types handling
==============================

I casted the events option to a eventsStreams option, which is basically just an array of events.
Also, I had to update the playingEvent property to a playingEvents property to reflect the changes.




Adding liveprepare
======================

To help events that need preparation (like video events that need pre-loading).








 
 
 
