Routsy
============
2017-04-19



Another routing system.




Goals
========

- have all routes configurable by the user, and centralized in one location 
- the uris can be chosen by the user without affecting the logic of the application behind, so can be chosen the controllers  
- module authors can create links without affecting the users choices  


Implementation: the routsy notation
========

The routes is just a php array containing all the routes.
Each route is also a php array with a well defined format.

An example of such "routes" file is found in "routes.example.php", next to this document.

Comments in that file should be enough for the reader to understand the implementation.




Conception/nomenclature
===============
A route is a binding between an http request and a controller.
So we can use a route to select which controller will be used, given an http request.

By giving a name to a route, we can also re-use the to recreate an uri, which we can use in an html link.

Please observe that most of the http requests are only matched against their uris only (i.e. not the other properties 
of the http request), and to be able to create a link, that's just what we need (i.e. we don't try to recreate
a full http request here).


To make things easier to use, the implementation is bold (i.e. not very flexible), but the flexibility
comes from the fact that we can change flavours. 
So, the uri matching system is just one flavour, and you cannot change it by default (for performances reason).

Then someday if you need another flavour, change the flavour, bake your own system and use your own system.
That's how the design was thought, for performances reason (since we don't change a routing system every morning).


A urlParam is an param found in the url, but which is not contained in the $_GET array.
It is specific to the application which defines it.

For instance, given the following uri:

- /blog/dogs/some-dog

We could potentially say that dogs is the category urlParam, for instance.





Synopsis
==========

Each module brings its own routes to a "routes collector"; the "routes collector" creates the "routes" file,
based on the information provided by the modules.

Each module must use the routsy notation, defined above.

A route has an id, and each module must (convention) prefix its routes using the module name as the namespace.
So the route id looks like this for instance (for the My module):

- My_routeId1
- My_routeId2

Note that if a module doesn't respect this convention, the unregistering phase of the ConfigGenerator tool
will not work (i.e. when you uninstall a module, the parts of the routsy configuration pertaining to this module
will not be removed).

Then the application can use the "routes" array for both httpRequest matching and links generation,
maybe with the help of the tools provided by the Routsy planet.




RoutsyRouter
=============

The main tool that we provide is the RoutsyRouter, which has two methods:


- setRoutes ( array routes )
- false|array   Routsy.match ( httpRequest )

If false is returned, then no routes bound to the Routsy instance matches.
If an array is returned, then it contains 3 entries:

- the routeId
- the controller 
- the urlParams




Testing
=========

If you want to see/play with some tests, check the examples in the "tests" directory.



The main idea
=================

The main idea behind Routsy is that the Routing system should be set BEFORE the application starts.

Often, we as developers choose the lazy paradigm, which basically instantiates what we need at the very last moment.
That works well for a service container, which contains a lot of services.

For a routing system however, I prefer to create the routes config upfront.
Why? Because a route system is the first thing (or one of the first thing) that the application will need.
And, a modular application might ask modules if they have some routes to provide, which means potentially
every module will be asked the same question: do you have routes for the routing system?

For that reason, since we won't escape the question, I prefer to create a cached config file upfront.
This config file is created/updated as the modules are installed, and so it's ready BEFORE the application boots.






 
 
 







