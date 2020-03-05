Light_PluginInstaller conception notes
==========================
2020-02-07



This plugin's goal is to install/uninstall light plugins in your light application.


There are two terms that I'll be using in this discussion: **master plugin** and **dependent plugin**.

Those have to do with the dependency relationship that plugins might have. When a plugin A depends on a plugin B,
plugin A is called the **master plugin** and plugin B is called the **dependent plugin**.

A plugin might have more than one **master plugin**, in which case we call them **dependencies** of the plugin B.


Our service
----------

Plugins can register themselves to our service.

When they do, we install them during during the initialize phase of the light application (i.e. before the application really starts).

When we install a plugin, we also make sure to install its registered **dependencies** first, if there are some.


We also provide an uninstall method to **uninstall** a registered plugin. In the case of the **uninstall** procedure,
we make sure to uninstall its registered **dependent plugins** first.


Important note: if a plugin A depends on a plugin B which is not registered, the install of plugin A will fail. In other words
all plugins involved in the install chain must be registered. The same applies for the uninstall chain as well. 
So in practical terms, it means that if you are a plugin author, you can only refer to a plugin as a dependency if that plugin
uses our service already.



Protective installation
--------------

A plugin which subscribe to our service must provide a **PluginInstallerInterface**, which has the following methods:

- install 
- uninstall 
- getDependencies


The install method must check that the plugin is not already installed.
Typically, a plugin author would check that a certain table exists in the database.

We do this because potentially the install method of your **PluginInstallerInterface** will be called
multiple times during the same install session. 

Same for the uninstall method, an uninstall method called multiple times shouldn't do any harm.



### The failure blabla

Why is it like this and why the **Light_PluginInstaller** service does not take care of that?

Well, I tried but I couldn't figure out a simple way to handle all dependencies, so I delegated that checking
to the plugins.

The major problem I couldn't solve was because of hooks, which basically allow a **master plugin** to call for the install
of a **dependent plugin**.

For instance, the **master plugin** provides a **user_group** table, and create some entries in it, and the dependent 
plugin has decided to perform some actions every time an entry is created, and those actions require the dependent plugin to be installed.

And so inside the hook method, the **dependent plugin** might call our service to install itself before hand (so that it can
execute its actions), which would trigger the install of the dependencies again (including the **master plugin**) which would
re-trigger the hook again, etc... 

A simple isBeingInstalled variable couldn't do the trick for me.



 


 