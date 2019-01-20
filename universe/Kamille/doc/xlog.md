XLog
==========
2017-04-07


XLog is the logger system for the kamille framework.

It's based on the [Logger](https://github.com/lingtalfi/Logger) planet,
but it's peculiarity is that it's only functional if you actually set its internal Logger.
 
In other words, something (like a module for instance) needs to activate
the XLog, otherwise all calls to its methods will have no effect.

So, it's there in the Kamille framework, and it's used by some objects of the kamille framework,
it does no harm, but it does nothing interesting unless you manually activate it.



