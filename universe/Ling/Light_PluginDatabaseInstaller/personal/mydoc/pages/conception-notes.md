Plugin Database Installer, conception notes
=====================
2019-09-11 -> 2020-02-06



Some light plugins installation involves database interaction.
For instance, an e-commerce plugin would need to create some tables in order to work properly.

Since plugins might depend from each other, it might also be the case that the tables of a plugin are referencing
a table from another plugin, and so there is a potential database dependency problem between plugins.

The goal of the **plugin database installer** is to address those potential **database dependency** issues.



Nomenclature
----------
2020-02-06

- master plugin: a plugin which other plugins depend on
- dependent plugin: a plugin which depends on a master plugin




Installation 
-----------
2020-02-06


### initialization by calling the light instance

In the [Light](https://github.com/lingtalfi/Light) framework, there is this **initialization** phase that starts
whenever the Light instance is called. This **initialization** phase works in levels (1, 2, 3, ...).

What it means is that whenever you start the application, **level1** will fire first, installing all plugins on that level,
then **level2** will fire, installing all plugins on that level, then **level3** etc...

And so when the application is started, you'll get the impression that all plugins will install themselves magically.

This works well because a plugin author knows in advance whether his plugin depends from another one (called master plugin), and if it does, he knows
the initialization level of the master plugin, just by reading the documentation, and so he can put his plugin on the next level.

So for instance if I'm developing a plugin which depends on a master plugin on **level2**, then I know that I must put
my plugin in **level3**, and that's all there is to it.


### individual initialization

Since plugins install themselves when the application started, there is very little use for individual plugin initialization.
Personally, I didn't encounter that situation where I needed to install a plugin individually yet.

However, it seems to me that installing a plugin individually is a technical possibility which should be addressed,
at least conceptually.

Therefore the following strategy is in my mind.

Each plugin will register its dependencies to the **pluginDatabaseInstaller** service. 

Then, when we call the **install** method of the **pluginDatabaseInstaller** service to install an individual plugin,
the **pluginDatabaseInstaller** will look for the dependencies first, and install them recursively.


In other words, the **dependent plugin** installs its **master plugin** if any.


Note: as of 2020-02-06, this has not been implemented (no concrete use case so far), since plugins install themselves automatically
on every page reload if necessary.



Un-installation
-------------
2020-02-06


### Uninstalling all plugins

The **pluginDatabaseInstaller** service has an **uninstallAll** method which uninstall all plugins.
I like to use it in development sometimes.

When uninstalling all plugins, we can leverage the multi-level initialization system of the Light application.

We simply uninstall plugins backward, starting on the highest level, and all the way up to the first level.

So what happens is that all plugins on **level3** (assuming that level 3 is the highest level) are uninstalled, 
then all plugins on **level2** are uninstalled, then only all plugins on **level1** are uninstalled.

This will work just fine and we don't need any more work. 


### Uninstalling individual plugins

That's a bit more complicated, go to the last paragraph to get to the conclusion, or read all my though process below.


First off, let's just say that different plugins might have different implementation. In particular, 
some plugins might use the **ON DELETE CASCADE, ON UPDATE CASCADE** functionality of the database in their tables,
while other plugins might just use foreign keys with no cascading, 
while some other plugins might just use an application based dependency system (discussed briefly in the "an interesting alternative" section).

And so, we cannot assume that all plugins will use the same strategy. 

Now that being said let's inspect uninstalling of individual plugins.

A plugin can either depend from another plugin, or can be the master of another plugin, or can be both at the same time.

It seems to me that if a plugin depends from another, it's un-installation shouldn't cause any particular problem.

For instance if plugin A provides the **user** table, and the plugin B provides the **animal** table with a foreign key to the **user.id**,
then simply removing the **animal** table won't hurt the plugin A logic in any way (at least that I can think of).


However in the reverse situation, if we uninstall a master plugin, the question is: do we also uninstall the dependent plugins.
And to that my answer is that the dependent plugin author has to decide for himself.
 
It's really a matter of taste and possibilities.
If the strategy implemented by the plugin relies on foreign keys, then the **foreign key violation** policy could even prevent
the un-installation of a master plugin with. However, if the dependent plugin uses the "interesting alternative system",
then it's really a choice from the developer to remove the dependent table or not.

In other words, if we uninstall plugin A and remove the **user** table, then what happens with the **animal** table is a decision to take
by the plugin that provides that **animal** table.

To allow such un-installation, our service provides the **Light_PluginDatabaseInstaller.on_uninstall_before** event, so that a dependent plugin can remove itself
before the master plugin is removed.



Conclusion: before un-installing a plugin, the plugins that depend on it can choose to uninstall 
themselves, using the **Light_PluginDatabaseInstaller.on_uninstall_before** event.


 





An interesting alternative
--------------
2020-02-06

In order to avoid the database dependency problem between plugins, we might as well replace all culprit foreign keys
by a simple int nullable column. I believe I've seen prestashop doing that.

With this strategy, the install/uninstall of plugins is just a trivial task, as there is no more technical database dependency.

However, I don't want to implement such a system in my designs, because it would mean a few things that I'm not ready to do:

- first, we need to emulate an application version of the CASCADE sql system (that's not hard with events)
- but then at a more pragmatical level, I have a few tools (like BreezeGenerator) who use the relationship of the
    tables to generate things (auto-admin like tools), and so I prefer to keep tables relationship as sql pure as possible.     
- At a more ethical level, it makes more sense to me to have proper sql relationships between tables (or am I getting too old?), 
    and so that's why I didn't switch to this otherwise interesting alternative.







