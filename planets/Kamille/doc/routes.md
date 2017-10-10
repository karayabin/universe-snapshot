Routes
===============
2017-04-18




Why?
============

The first goal of routing (in a kamille application) is to match an http request to a controller.

That's a very pragmatic goal, which is inherited by the kamille architecture (a dispatch loop
with 3 request listeners: request, controller and response).


Indeed, the first thing we want to do in such an architecture 
is find who (which Controller) is responsible for rendering the appropriate response.


So, in that case, a simple object mapping an HttpRequest to a controller does the job.


However, later in the code, at some point one will need to create a link to a page 
of the application.


Since all pages of the application already have a binding from the http request
to the controller, an idea would be to extend our existing system to a two ways binding route.
 
The first way, top to bottom, would be from the http request to the controller,
and the second way, bottom to up, would be from the route id to an uri.

Note: if you think of the idea of two way binding, you might come across the idea of making
a two way binding that would allow us to recreate a complete HttpRequest from the route, rather
than just the uri.

I thought about that and found out that it seems a little bit overly complicated 
compared to our needs.

Sure, it sounds natural from an ethical perspective, because when you log in for instance,
the httpRequest contains some post data, so why not be able to repost that exact request using 
just a route id?

But refocusing on pragmatic goals, it turns out that the concrete need is only to be able 
to create html links, and we just need the uri for that, not the whole HttpRequest.

Maybe someday in the future we will need to recreate HttpRequest, and then we will make another pass,
but for now let's keep it simple.


So a route is that weird object that we just defined above, and the methods it contains
appear to be pretty obvious:

- mixed match ( HttpRequestInterface httpRequest )
        returns the controller, which is usually a string per the current implementation.
        There is a theoretical support for arrays, which allow passing arguments to the controller,
        but in kamille as of 2017-04-18, we don't pass arguments to the controller directly (that might change
        in the future if we really need it, but now we just keep it simple).
        
        
- string getUri ( array params=[] )
        returns the uri (that we can put in a link), corresponding to the given routeId 


And about properties, a route has an id.



Routes
==========

Now we need an object to collect those routes.
Let's call it routes.

Our goal is to re-use the Routes object both for the down stream and up stream (up to bottom and vice versa).

So, we will probably provide an access to the application Routes via a service.




Using Routes
============

It's worth noticing that we only need the two way binding system if we intend to use links.

If you are greedy for performances, and you know exactly how your application should behave,
and if you don't need all the links, then you might prefer to use a one way binding system.

However, if you're a module developer, you're out of luck: it's safer to use this new Routes system,
since you don't know whether or not the modules users will need to link your pages.

In other words, Routes is the new upcoming system and unless you know exactly what you are doing, 
you should always use it.






For modules authors
=======================
The only problem I have with this new Routes system is that the module author chooses the route id,
not the user.

To me that's only a problem because of the potential conflicts it could generate,
not because I care about a developer not being able to choose its own id.


So, as for now, I would recommend that modules routes are prefixed with the name of the module,
followed by an underscore.
For instance, a route id of the module MyModule should start with this:

- My_route1

That should do it as long as modules authors respect the convention.

(and if they don't, well, we are not there yet are we?)











