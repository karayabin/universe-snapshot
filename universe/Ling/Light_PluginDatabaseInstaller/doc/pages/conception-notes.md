Plugin Database Installer, conception notes
=====================
2019-09-11



Some light plugins installation involves database interaction.
For instance, an e-commerce plugin would need to create some tables in order to work properly.


Now to install such a "db" plugin, we need the application, because the credentials of the database are
provided by the application service container. In other words, we can't just install the database when the planet is imported,
we need an application instance (and more specifically we need access to the service container).

So installing a db plugin is a dynamic operation.


There are at least two main solutions to this db plugin installation problem:

- we can either call an "install" method before hand  
- we can do an "install" check method every time the application is called


With the first technique, the benefit is that we call the install method once for all.
The drawback is that the developer needs to call it manually once, and there is a risk that he forgets to do it.

With the second technique, the benefit is that we can just plug'n'play: there is no risk of forgetting since the plugin
install check method is called every time.
The drawback is that we need to check whether the plugin is installed every time, which consumes more cpu than the first method.  



Now with the "Plugin install helper" plugin, we've taken the second approach, because we believe it's more practical from
a developer standpoint (I personally forget things all the time).
Our target plugins are those plugins installed by developers (i.e. not users).
If the plugins were installed by users, we would take the other approach, and let the users install them (with a gui),
but light plugins are mostly more code based plugins.
Note: that being said, a light plugin can create a whole eco-system involving user plugins, it's important to distinguish
between what type of plugins we are dealing with.

And so yes, we take the second approach in this planet.

Now from a performance standpoint, connecting to a database can be considered a time consuming operation.
And so we won't connect to the database, but we will rather tell the plugin if it has already been installed or not.

If it has not, then we tell him to install itself (via an interface method that we provide, or callables if that's more suitable for the developer), so that the plugin can creates its tables.

We do the install checking by simply creating one babyYaml file per plugin in the config/data/Light_PluginInstallHelper directory.
For instance, if the pluginA has been installed, we create the **pluginA.installed** file.

The benefit of this is that to re-install a plugin, the developer can simply remove the corresponding file to force a re-install.
The main drawback of this is that it's not dynamic, and if the developer removes the tables, and refreshes the page, the tables
won't be recreated automatically; the dev needs to remove the **pluginA.installed** file in order to re-trigger the install
method of pluginA. 

This can be quite annoying because it requires that the developer remembers how this system works.
However, the whole point of this plugin is to avoid direct database calls during the install check (since the install check is called
on every page refresh). So we believe we chose the lesser of two evil approaches here. 
 



Uninstalling
-------------

We believe that if we are able to install some tables in a database, we shall be also able to uninstall them as well.

Hence our interface has not only an install method, but also its uninstall counterpart.

As for now, how and when this uninstall method is called is up for discussion, we've decided nothing yet,
we just know that at some point it might be useful to uninstall what we've installed.

At least we give the developer a tool helping him to uninstall the db part of light plugins manually.  





We do not install all registered plugins automatically
------------------
Because we have the list of all plugins registered, it would be tempting to subscribe to the [initializer](https://github.com/lingtalfi/Light_Initializer/) service
and initializes all our plugins at once. That would be an error though, because the initializer service handles the order in which the
services are called, and we don't.

In other words, if there is some table dependency, that's handled at the initializer service level.
We are just providing a tool for the plugins to save a call to a database, but we don't handle table dependencies. 




