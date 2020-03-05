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

I also implemented a priority system, and a stop propagation system too.




