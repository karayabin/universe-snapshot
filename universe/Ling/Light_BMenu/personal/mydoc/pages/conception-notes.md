Light_BMenu Conception notes
================
2019-08-08



Summary
=========
- [The rough idea](#the-rough-idea)
- [Zooming on some feature details](#zooming-on-some-feature-details)
- [The menu item structure](#the-menu-item-structure)


The rough idea
--------------

This service tries to provide a workaround for the following problem, where we want to create some menu(s)
in an application that accepts plugins, and taking into account that the menu structure might evolve (as 
the application might evolve with time).




Our workaround involves two actors:

- the host (aka master), which provides a base menu structure
- the subscribers (the plugins), which add inject their own menu fragments into the base menu structure



The synopsis starts with registering a host.

A host is basically the entity responsible for displaying the menu.

When we register the host, we assign it to a menu type, like "main menu" for instance.

And so we can register different hosts, each host responsible for displaying a specific menu type. 



Now at the host level, each host generates a **menuStructureId**.

The **menuStructureId** serves as an identifier of the menu structure.

This means if by chance the base menu structure evolves (which we recommend not to), the **menuStructureId** should reflect that change.
In other words, the **menuStructureId** is bound to a particular state of the base menu.

For instance, if the base structure of the host menu is this:

- components
- pages
- plugins

And with time, application moves to version 2.1.5 (for instance), and the menu structure becomes this:

- components
- pages
- admin
- tools


Then the **menuStructureId** must reflect this change.

The **menuStructureId** ONLY CHANGES when there is a change in the menu structure (i.e. it doesn't 
care of the application version number).

The **menuStructureId** helps plugins know about the menu structure, so that they can potentially inject menu fragments
exactly where they want.


In an ideal world, the host application will never change the menu structure, and we recommend that
host application authors try their best to do so.

However, just in case the change is unavoidable, the **menuStructureId** is there to have your back, helping you to deal
with the compatibility problems that might arise.

So, the **menuStructureId** is passed to the subscribers, and they have the possibility to inject their menu fragments
directly into the menu.

That's the first thing a subscriber can do.

However some people might argue that this technique is not optimal, as a dramatic change in the host base menu structure
would force all the plugin authors to revisit their menu injection.

And so for this reason we provide another technique for plugins to use, where plugin can just basically say:
"Hey host, you know what, here are my menu items, do whatever you want with them".

In other words, they rely on the host to inject the menu items for them.
This technique is much safer, as it's guaranteed that the menu items will be displayed somewhere.

The drawback of this technique is that the plugin author doesn't have control on WHERE EXACTLY the items will be injected.
Probably, the host application will create a "plugins" submenu and inject all those safe menu items in there, who knows?

And so plugin authors have two techniques at their disposal:

- the direct injection (plugins inject their menu fragments directly into the base menu structure, having the **menuStructureId** as their guide)
- let the host handle the display of the items (if plugin authors don't have specific needs, it's recommended that they go with this method)

So the two techniques hopefully give the necessary flexibility to plugin authors to create great menus.


So, all that is the basic idea, now time for me to implement :)


 

Zooming on some feature details
------------------


### Rights 
I'm currently working on the Light_Kit_Admin (lka) project, and a big part of it revolves around the question of user "rights".
In an lka project, even the menu items are subject to the user "rights".

In practise, we want to hide some menu elements if the user doesn't have the rights to show the page that it points to.

In order to help with this problem, we provide the following key:

- _right: string, the right required to view this menu item. 

In terms of implementation, we will parse the menu after it has been created by the host and plugins, and remove the entries 
if the user doesn't have the proper right.

So, if we use this feature, we will assume that the following services are available:

- user_manager


Note: we don't want want our menu service to be restricted to be an light kit admin menu only, it could be also a front end menu, or something else,
so this rights system is just an option that we can activate/deactivate.



Actually, rather than implementing this ourself, I would rather delegate this to the host, that would be less limited,
and would simplify the overview for this class (which is already quite complex).

 
  

The menu item structure
---------------

A menu item has the following structure (only the id and the children keys are mandatory):


- id: string, the identifier for this menu item (it should be unique amongst its siblings)
- icon: string, the css class for the icon
- text: string, the text of the menu item 
- url: string, the url of the menu item (for leave nodes only, not parents)
- badge_text: string, the text of the badge (the badge is displayed next to the menu item text)
- badge_class: string, the css class to add to the badge
- children: array, an array of menu items (recursion accepted)
 







 
 
 

