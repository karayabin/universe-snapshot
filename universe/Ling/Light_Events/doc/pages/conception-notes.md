Light Events, conception notes
==================
2019-10-31




Why (skip this blabla)?
----------
I thought for a long time before deciding to not implement an orm system.
One cool thing with having tables as objects though is the ability to add hooks into your objects, so that for instance
when an user is created (i.e. a row is inserted in the user table), your application can do something about it.

Well, I figured I would do this manually (which might be even more flexible), hence I need the light events system.





What
---------

As you can probably guess from the name, this is just an event dispatching system.

Nothing special.

As for now, I didn't implement an order handling, meaning the events are dispatched in the order they are registered.
Note: this might change in the future if the needs for it appears to me.


Note: my original intent was to design it as a tool for the light plugins, but it can technically be used by anything.






