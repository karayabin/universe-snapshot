Light_PluginInstaller conception notes
==========================
2020-02-07 -> 2020-06-22



This plugin's goal is to install/uninstall light plugins in your light application.


There are two terms that I'll be using in this discussion: **parent plugin** and **child plugin**.

Those have to do with the dependency relationship that plugins might have. When a plugin B depends on a plugin A,
plugin A is called the **parent** and plugin B is called the **child**.

A parent can have multiple children.






Our service
----------
2020-02-07 -> 2020-06-19


Plugins can register themselves to our service.

One feature of our service is the **auto-install** feature.


The idea is that when you import a light plugin in your application, our service automatically installs it for you,
so that you can basically plug'n'play with your plugin.


At this point of time, you cannot disable this feature (although you always choose to not use our service).


The **auto-install** feature works like this:

- first it keeps a list of which plugins are installed and which aren't.
        This list is cached so that it doesn't take much time to process when you use the app normally.
        Note: you can still get better performances by not using our service (just be sure the plugins you want are installed),
        but the performance boost is quite small. 

- then it installs every registered plugin that's not installed (and marks those that are installed as installed)


The procedure to install a plugin is to first ask for the plugin's dependencies (aka children), and install them first.






What about cyclic relationships?

So for instance plugin A depends on plugin B, which depends on plugin C, which depends on plugin A.

At this point of time, this is just an hypothetical case with no concrete reality, and therefore is not handled.

I added a defensive mechanism to avoid an infinite loop that's all.





The plugin interface
--------------
2020-02-07 -> 2020-06-19


A plugin which subscribe to our service must provide a **PluginInstallerInterface**, which has the following methods:

- install 
- uninstall 
- getDependencies



The **install** method will make sure that the plugin is fully installed when the method call ends.
The **uninstall** method will make sure that the plugin is uninstalled when the method call ends.



The logs
-----------
2020-06-19 -> 2020-06-22


To debug, the recommended way is to use the light default log, which logs every message.

We have our own logging system, but it doesn't log everything as the default light log do.




Our debug system can still be useful if you're not stuck, because it might be more focused and readable,
but if you're stuck, make sure that you check the default light log.

The reason being that some important messages might be logged there, that you might not have thought of, such
as hooks that some api use (for instance the Light_UserData plugin will want to install itself if necessary every
time you create a new Light_UserDatabase group). 



Now if you want to use our log system:

first, you need to enable them (they are disabled by default) using the **useDebug** option via the service configuration.




This plugin comes with some log conventions.

We use the [Light_Logger](https://github.com/lingtalfi/Light_Logger) plugin, and communicate via the **plugin_installer.debug** channel for debug messages.

We encourage plugin authors to use this channel to communicate any debug message during the **install*** and **uninstall** method.

Our service provides a public **debugLog** method to encapsulate the channel name detail.



Typically, our idea is that a plugin A will write something like this on install:


- installing pluginA (this log message is actually already written by our service)
- pluginA: 2 tables to install
- pluginA: installing table lud_user...
- pluginA: ok
- pluginA: installing table lud_group...
- pluginA: ok
- pluginA: install successfully completed






About the install procedure
============
2020-06-22


I believe the worst problem that comes with installing plugins is recursion: when you call the install method
of a plugin which is currently being installed.


To avoid recursion, our plugin divides the installation process into two phases:

- the core install
- the post install


The core install phase let plugins write their files (if necessary), 
and create their tables in the database, and insert their rows (if any).


Most plugin just require the core install phase to be full installed.

The **isInstall** method of our provided **PluginInstallerInterface** interface returns whether or not the core install
phase is full completed.


So, what's the post install phase then?

Well, some plugins need to extra things once all the plugins are core installed.

If they do need that extra phase, they need to register as such (i.e. post install candidate) to our service by implementing our **PluginPostInstallerInterface** interface. 



### a concrete example of plugin that require post install
2020-06-22

For instance, imagine this situation where we have the following tables provided by a plugin:

- user_group
- user_group_options
- user_group_has_options


From the naming of the table, we can guess the relationships between those tables, and guess that the application
has some user groups, and that each group has some options attached to it.


So when the core installation is finished, we can imagine that some plugins might have inserted some user groups.

So far, everything is fine.

Now imagine that a plugin A wants to add some options to all existing groups.

For instance, it wants to add the "maximum_storage_capacity" option for all existing groups.

In order to do that, it will need to do something like this:
 
- create the **maximum_storage_capacity** option in the **user_group_options** table
- parse all existing groups, and then foreach of them create a corresponding entry in the **user_group_has_options** table


But before it can launch this routine, it needs to make sure that all groups are indeed in the **user_group** table.

That's the reason why we have two different phases.



#### Side note
In the previous version of this tool, there was only one phase (the core phase), and I used hooks that basically said: whenever a new entry is inserted in the **user_group** table,
then execute the routine. The problem with this approach is that it led to recursion (calling the routine called the install method of the plugin
that is being installed in the first place).
Maybe I'm bad dealing with recursion, but in the end, I had problems with this approach: I found it too complex (like it requires too much of your brain power
to do something decent), and so that's why now I switched to phases.


#### The multiple post install levels
2020-06-22


I believe having two phases will take care of most of our needs as php app developers.

However, I also believe that someday will come when a plugin will require third phase, and why not a fourth, etc...

So therefore, I divided the post phase into levels, a theoretically infinite number of levels,
and the plugin authors choose which level they want to register their post installer onto.

The level is just a number, starting at 0 (being the first executed), and going up.


To limit chaos, we provide some conventions:

- the postInstall phase of a post installer plugin must not call directly or indirectly another core install or another post install 
- level 0 is used to add the bindings in the database that couldn't be done during the core install phase
    It is used so far by the **Light_UserData** plugin.
    
    
I intend to update this list as new problematics occur.
For now, level 0 seems to resolve all my problems.    






Warning with hooks
---------------
2020-06-22


Since we have [Light_Database events](https://github.com/lingtalfi/Light_Database/blob/master/personal/mydoc/pages/events.md),
we have more power.

However, we need to be careful when those hooks are called from within an install procedure, because a hook might assume that a certain table exist, whilst it's not the case,
leading to install problems.

Therefore, our service provides a way to know whether you are in the middle of an install, so that you can disable your hook if it's the case (for instance), or take
any action you like based on that information.


The **pluginsAreBeingInstalled** method of our service returns the aforementioned boolean information. 
























  

