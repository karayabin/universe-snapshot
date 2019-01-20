Brainstorm UrlFriendlyListHelper
==================================
2015-11-01



Utility to handle pagination, sort and search in your html lists.
 
 
 
Features
-----------

- handling of multiple lists on the same page
- seo friendly: parameters are passed via the url 
- extensible: you can create your own plugins
- takes in account your application's routing logic
 
 



How does it work?
-------------------

I suppose this section is for me, because nobody cares how it works.
So that said, the UrlFriendlyListHelper (list helper) works with 3 components:

- pagination
- sort
- search


You don't have to use the 3 of them at the same time, but you can if you want.
Component authors are responsible for writing the components.

If you are interested in becoming a component author, keep on reading.


### The list state

The goal of the list helper is to display a list in a given state.
A list state is defined by the list parameters which are passed through the url.
The list parameters only are responsible for changing the list state.

The list components provide a way for the user to update the list parameters.

In this implementation (UrlFriendlyListHelper), updating a list parameter means changing the url.


### The list router

The role of the list router is to extract list parameters from the url.

The object which knows how list parameters are blend into the url is called the list router.
To allow the user to change the list parameters, the components have to communicate with the list router.

 


### Registration

Registration is when a list component registers the list parameters names it uses.
It helps resolving conflicts which occur when multiple lists are displayed.





New Brainstorm
==================
2015-11-04


items pool.


List = subset of items pool shaped by widget parameters
 
(Item)Generator: is controlled by generator helper.
There are different generator types: the two main types being the array type and the mysql type.

A widget produces the widget parameters.
The user uses the widget which refreshes the http page with new parameters.

The widget parameters are blend in the url in accordance with the application's router business logic.
Therefore, the application router is a necessary component to extract the widget parameters from the url.

There might be multiple lists on the same page.
Therefore, a distributor object handles the assignment of the widget parameters from the url (via the router) to 
the actual widget objects.
Note that the widget parameters controls the widgets, and they also are used by the generator helpers 
to control the item generator.


The widget object and the corresponding generator helper are bound by convention.

There is a sort widget implementation which uses a sortId parameter to hide the actual sort and send values
from the url.
To be able to resolve the sortId to an actual sort and sens (that the generator needs), the generator helper 
needs to know the sortId map.
Likewise, the corresponding widget object needs to know the map in order to display the select gui component properly.
This situation where the widget object and the corresponding generator helper share something in common might 
occur more than once.
Therefore in this implementation, we've chosen to bind the widget object and the corresponding generator helper
in a plugin object. 
The plugin object's purpose then is to serve as a common container of the widget object and 
corresponding generator helpers (we might have one generator helper by generator type), and so 
we can attach the common things (like the sortId map) to the plugin.





Multiple lists handling
---------------------------

A list helper handles one list on the page.
To handle multiple lists occurrences on the same page, every list helper is assigned
a (numerical) suffix.
The suffix is assigned automatically upon the list helper instantiation, and can be overridden by the user.

If we describe a plugin as a component which is responsible for rendering a widget,
we can say that there are two parts in a plugin:

- the core, responsible for preparing the displaying of the widget 
- the chrome, responsible for displaying the widget


The core part uses so called abstract parameter names,
but the chrome part needs to take in account the fact that there might be multiple lists using 
the same parameters out there, and therefore the chrome part needs to use so called concrete names.

An abstract parameter name for a pagination plugin could be: currentPage for instance.
A concrete parameter name for the same pagination plugin could be currentPage, or currentPage2 for instance.

The chrome part of a plugin will itself add the suffix to an abstract parameter name in order to produce 
the corresponding concrete parameter name.


In order to inject the correct parameters from the url to the plugins, the list helper will use 
a (virtual?) distributor object, which role is solely to assign the parameters found in the url to the core 
of the corresponding plugins. 








