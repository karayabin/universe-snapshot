Design: Late service registration
===============
2020-08-03 -> 2020-08-07


Lots of so-called **provider** services provide a registration method, so that other third-party plugins can subscribe to whatever services the **provider** has to offer.


There are different ways to register to a provider service:

- **static registration**
- **late registration** (aka **dynamic registration**)



Both have benefits.

With **static registration**, it's easier to reason about the current status of the registration: which service is registering to which.
It's also perhaps simpler to visualize the registration tree/status, since everything is written down.


With **dynamic registration**, we can optimize performances a bit: the idea being that we only instantiate what we really use.


For instance, consider a service which basically displays list.
Third party plugins can register to it and provide **list ids**.
If we do this statically, then when we call the service via the **service container**, all the registration dependencies are resolved upon the call,
but usually only one is used.
With **dynamic registration**, we can register the **list id** only when we know for sure it's going to be used (probably inside a controller), and therefore alleviate 
the number of static registration calls written in the container, thus improving the application performances a bit.



Both types of registration can co-exist without any problem in the same light app.

However, I noticed that some so-called "macro" plugins, such as [Light_Kit_Admin](https://github.com/lingtalfi/Light_Kit_Admin), usually require registration to various services to be used properly.
For those macro-plugins, it makes sense to create a "base class" that would do the registration dynamically, so that the users of this plugin can just extend that class rather than doing the service's registrations manually.



     

 
