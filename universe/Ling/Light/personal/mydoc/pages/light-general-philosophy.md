General philosophy of the Light framework
================
2019-04-09



Layers addition
-----------
A light web application is built by adding simple layers on top of each others. 
Each layer adds a simple functionality, and the application gets more complex as more layers get added.



Error handling: a strict error policy
--------------

Generally, when something which depends on the developer fails, we throw an exception.

If the error comes from the user, we might want to be a little more lenient and try to work around the problem 
by providing fallback behaviours. 



Arguments checking: I'm not a babysitter
-------------

As you know, in development, we can make tons of checking to ensure the data passed to a method is correct.

For instance if the listener is indeed a callable or an instance of ListenerInterface, then register it, otherwise
throw an exception: wrong type.

Usually, we can determine whether this data can potentially come from an user or comes from a developer only.

When this data comes from a developer, I don't do any checking. Period.

The only exception to this is if I don't trust myself, or I'm not 100% sure what I'm doing, which shouldn't happen.
 

Why? because those checking are boring to type, and I want to have fun when developing.
I'm joking, but more seriously, to me a developer is trustworthy, he knows what he is doing, he can read a documentation, and he knows how to debug.

Hence no need for me to double check every parameter.

Note: I found that developing this way was much more efficient for me, because when I want to implement an idea, 
I'm not interrupting my flow for stupid checking. Plus, it makes the code cleaner (and a tiny bit faster too).


 




    
    
    