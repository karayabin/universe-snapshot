Going to 2.0.0, personal notes.



The goal of this plugin is to place events on an horizontal timeline.

Each event can hold any arbitrary information.
But two properties are required:
- offset: how many seconds from the timeline origin does the event start at
            (here, we use the microsystem conception, where we know the total timeline duration in seconds)
- duration: how many seconds does the event last


Scrolling the timeline is just a matter of moving the (very long) inner container inside 
the overflow:hidden outer container.


Zooming is about finding the good ratio.
        A ratio defines the relationship between a duration unit and a length unit.


Today our concern is about how to place the events on the timeline.
The first version used static html elements, and was building the events upon the plugin instantiation.
            By building the events, I refer to the action of stretching them to their final width (for the current ratio),
            and positioning them to the right place on the timeline.
            Also, time plots are positioned.
            All that is "building the events".

So building the events using existing static html works, but now if we want to build after an ajax call, 
it seems that we need to hack the code...
...
...
The main problem is that we pass a jquery handle to the static elements,
which leads to impossibility of handling any other events.

We need to get rid of the jEvents property and find another system, a more flexible system.
...

Or, maybe better?, we can add a loadEvents method, which would reuse the same internal logic, but allow us to 
build events dynamically.
With this system, we can mix static and dynamic calls, using jEvents and/or loadEvents.

Now with loadEvents must also be some sort of rendering function, that we delegate to the user.
.****
...
Before we try this implementation, let's be sure that loadEvents is better than any other system.
...
Actually, there is something totally wrong with doing loadEvents.
I must be tired to not have seen this.
The problem with loadEvents is that the plugin takes an interest in the rendering of the events,
but that's inappropriate/useless.

You know, it is very legit that the user initialize the plugin with already statically rendered
html events, which proves that rendering the events is really a user concern.
All we need is that the user indicates to us which events to "resize", and that can be done with a lazy selector.

For instance, ".events > div" (all top level div inside ".events") would be events.
But, there is more about it.
What if you have already built events mixed with just dynamically added events?
Would you rebuild them all?

Ideally, you build only those which are not built yet.
This case occurs when you implement an infinite scroll, where you have items on your page, but when
the user scrolls down, you want more of them, and you want to inject them dynamically.
Imagine the user has scrolled down a lot, it would be a waste of time to rebuild every events, wouldn't it?

A simple trick that we can use for that is mark somehow the already built events.


The conclusion of this is that we really need to let the user handle the rendering of an event,
and the plugin should provide a mechanism that allows the user to indicate which events to "build",
nothing more, nothing less.


Let me suggest a simple method: refresh, that browse the non marked events and build them.
The user can therefore trigger this unique refresh method every time, which makes her life easier.

...
However, I have not been precise enough: this mark trick works when static and dynamic events
are mixed, but when the ratio changes, we need to reupdate every events anyway.
So let me suggest a "force" argument to the refresh method, which, if not set, would rebuild only non marked
events, and if set to true, will rebuild every events no matter what.

That's just internal soup, but I like it to be clear right from the beginning.










