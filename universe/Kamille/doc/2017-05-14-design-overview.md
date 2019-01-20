Design overview
====================
2017-05-14




The Router
=============

The match method returns either a controller or a controller representation (or null if no route matches).


- null
- controller
- controllerRepresentation





Controller
============

A controller is a callable that handles the request.


Controller representation
============

A controller representation is a string that once interpreted returns a controller.

The Core module provides a default interpretation for the controller representation:

- controllerRepresentation: <symbolicClassPath> <:> <method>

The symbolic class path represents the base class path of the controller.

In kamille, controllers are located in the **app/class-controllers** directory,
and so a controller with the following path:

- app/class-controllers/Ekom/FrontController.php

would be represented with the following base class path (which is the class name of the controller):

- Controller\Ekom\FrontController


However, the idea with the symbolic class path is that the controller can be overridden on a per theme basis.

So that if the following file exists:

- app/class-controllers/Theme/Lee/Ekom/FrontController.php

and if the theme is **lee**, then this lee controller will be used instead of the default one.
 



Service
===========

Overriding a service
----------------------

A module author decides which services can be overridden.

By default, a service cannot be overridden.

If a service can be overridden, then the module author creates a configuration key pointing to the service name.




Request
=============

As the request travels the dispatching loop, different actors attach values to the request.

The request is used as a registry, that is a readable values store.


Amongst the most popular variables attached to the request we have the following:



- controller, set by the RouterRequestListener, represents a controller matching a given http request
                Note that in this form, the controller is either a controller (callable) or a controllerRepresentation.

- urlParams, set by the RouterRequestListener, represents the urlParams attached to a given http request
- route, set by the ApplicationRoutsyRouter, represents the routeId of the matching route
- response, set by the ControllerExecuterRequestListener, represents the http response corresponding to the given http request
















