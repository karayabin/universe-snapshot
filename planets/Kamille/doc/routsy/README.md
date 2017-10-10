Routsy
============
2017-04-19



Another routing system.




Goals
========

- have all routes configurable by the user, and centralized in one location 
- the uris can be chosen by the user without affecting the logic of the application behind, so can be chosen the controllers  
- module authors can create links without affecting the users choices  




Structure
===============

```php
- app
----- class-modules
--------- $moduleName
------------- routsy
----------------- conf.php
----- config
--------- routsy
------------- routes.php  
```


Routsy route identifier
==========================

A routsy route identifier is either a route id, or an array containing two
entries: the route id, and the route params.

Here is a more formal definition:

```txt
- routsyRouteIdentifier: routeId | routeIdAndParams
- routeId: string, the route id 
- routeIdAndParams: [routeId, routeParams]
- routeParams: array, the parameters for generating the route uri
```

The ApplicationLinkGenerator object is generally used in 
the kamille framework to convert the route identifier to an uri. 



How does it work?
=====================

The ConfigGenerator is an object provided by the Routsy system.
When a module is installed, the ConfigGenerator takes the 
routsy configuration of the module and put it in the rousty configuration 
file of the application, which contains the routes of all modules using the routsy system.

The application routsy configuration file contains 4 sections:

- user before
- static
- dynamic
- user after

And the ConfigGenerator puts the routes only in the static or dynamic section,
depending on whether a given route is static or dynamic (dynamic means
the route's uri contain tags, like /my/{blogId} for instance).


This means you can and should use the "user before" and "user after"
sections to put your own routes if you want.

The ConfigGenerator ensures there will be no duplicates.

The following schema recaps what have been just said.

[![routsy.png](https://s19.postimg.org/82qudx90j/routsy.png)](https://postimg.org/image/pssiyymlb/)





