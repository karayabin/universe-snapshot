Exceptions
========
2021-06-24



We provide a **LightException** class.


In addition to having a message property like a regular php exception,
It's possible to attach a **light error code** to the **LightException**.

The **light error code** is an arbitrary string defined by the developer who throws the exception.



This helps build logic based on the exception type.


Note that you could just use the exception class name to do something similar, that's just an alternate way to do it.

The main difference is that with the same **LightException** we can spawn an infinity of **light error codes**, whereas a regular exception
has only one name.

Note that php exceptions have a very similar builtin code mechanism, but I found it not very practical (no string allowed), so I used **light error codes** instead. 






The **light error codes** that we've used so far are:


- 404: means that a page is not found. 
        This is thrown by the Core\Light class when the router can't match the given url.


