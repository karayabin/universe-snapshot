Light_PluginInstaller conception notes
==========================
2020-02-07 -> 2021-01-22



This plugin's goal is to perform a [logic install](https://github.com/lingtalfi/TheBar/blob/master/discussions/import-install.md#summary)/uninstall of light plugins in your light application.




What's a logic install?
------------
2021-01-22


The **logic install** concept's origin is explained in the [import install discussion](https://github.com/lingtalfi/TheBar/blob/master/discussions/import-install.md#summary).

The **logic install** is basically the installation of everything required for a [light](https://github.com/lingtalfi/Light) plugin to work properly, given that the [assets/map](https://github.com/lingtalfi/UniverseTools/blob/master/doc/pages/conception-notes.md#the-planets-and-assetsmap)
are already installed.


Typically, this means installing/updating tables in the database.

In fact, so far the **logic install**, as far as I know, has been used exclusively for that purpose, although its theoretical concept is a bit larger.









The logic Install procedure
----------
2021-01-18 -> 2021-01-22



The **logic install** procedure is always executed on top of an already [imported](https://github.com/lingtalfi/TheBar/blob/master/discussions/import-install.md#summary) plugin.

Note: executing the **logic install** procedure on a not well **imported** plugin could fail.


The **logic install** procedure is executed by the **install** method of your plugin's installer class, which must implement **PluginInstallerInterface**.
For more implementation details, read the [How to make your plugin installable](#how-to-make-your-plugin-installable) section.




The **logic install** procedure first starts by creating the **install map**, by parsing all the **logic dependencies** recursively.

The **install map** is the list of planets to **logic install**, in the order they should be **logic installed**.

Then, the procedure proceeds with the **install map** and calls the **install** method for every **PluginInstallerInterface** instance listed in the **install map**.






The logic uninstall procedure
----------
2021-01-18 -> 2021-01-22

The **logic uninstall** procedure of a plugin is the reverse operation of the **logic install** operation.

For more implementation details, read the [How to make your plugin installable](#how-to-make-your-plugin-installable) section.

This procedure starts by creating the **uninstall map**, which is the list of all plugins to **logic uninstall**.

The main idea to understand here is that if you uninstall a plugin which creates the table **client** (for instance),
then uninstalling this plugin will remove this table, and so every plugin that uses the **client** table is **logic uninstalled** too, so that it doesn't trigger a "table client doesn't exist" error.

So, that's the idea of the **uninstall map**: listing every **logic dependencies**.


Once the **uninstall map** is created, the procedure proceeds with the **uninstall map** and calls the **uninstall** method for every **PluginInstallerInterface** instance listed in it.









Our service's methods
-----------
2021-01-18 -> 2021-01-22


Our service provides the following methods:

- install \<planetDotName>: performs the [logic install procedure](#the-logic-install-procedure) for the given planet
- uninstall \<planetDotName>: performs the [logic uninstall procedure](#the-logic-uninstall-procedure) for the given planet
- installAll: performs the **logic install** procedure for all planets found in the current application
- uninstallAll: performs the **logic uninstall** procedure for all planets found in the current application



Note that the **logic install** methods do nothing if the plugin is already installed, unless the force flag is set.



Note: in the previous version of our service we had this concept of calling the **logic install** methods of plugins automatically every time the application was started, 
so that the user could just plug'n'play the planets.
We removed this idea, because we now believe that it's best to install plugins in a static manner, using command line tools such as the [Light_PlanetInstaller](https://github.com/lingtalfi/Light_PlanetInstaller).
By choosing this path, the overall code of our plugin is greatly simplified.







Dependencies
--------------
2021-01-18 -> 2021-01-22


An easy mistake to do is confound **planet dependencies** and **logic install dependencies**.


Our plugin only handles **logic install dependencies**, and assumes that **planet dependencies** are already resolved.

**Planet dependencies** are the dependencies of the planet to other planets. 
It can be handled by hand, but is generally handled via tools such as [Light_PlanetInstaller](https://github.com/lingtalfi/Light_PlanetInstaller) or the [uni tool](https://github.com/lingtalfi/universe-naive-importer).

**Planet dependencies** are based on the php code, so if the code of my plugin requires a method from another plugin, then I create a dependency from my plugin to that other plugin.
For more details about **planet dependencies**, refer to the [uni tool documentation](https://github.com/lingtalfi/Uni2#dependencies).


The **planet dependencies** always contain the **logic install** dependencies. In other words, **logic install** dependencies by definition is a subset of the **planet dependencies**.

Our service assumes that the planet you want to execute the **logic install** for is already **imported**.


**Logic install** dependencies are basically the database table dependencies. 

Technically, **logic install** dependencies can install anything the plugins require, once already **imported**.

But generally it's always about tables in the database.

So for instance my plugin needs to add an entry to a table which is created by another plugin. Then my plugin depends on that other plugin to be installed first (otherwise the table my plugin wants 
to write/update doesn't exist).



### Resolving logical dependencies
2021-01-18 -> 2021-01-22

 

Every plugin must declare its **logic install** dependencies, and so our approach is the following:


- create the **install map**
- execute our [logic install procedure](#the-logic-install-procedure) on every planet defined in the **install map**


The **install map** is the list of the planets for which to execute the **logic install**, in the order in which they should be executed.

We create such a list to minimize the risk of putting the application in an inconsistent state where it has the first half of the required plugin installed,
and then an error occurred and the other half of the required plugins is not installed.

Using the **install map** technique, we can spot potential problems that might occur during the installation before actually installing anything,
and thus do a better job at keeping your target application in a consistent state.






### Cyclic relationships
2021-01-18 -> 2021-01-22


A **cyclic relationship** is for instance when **plugin A** depends on **plugin B**, which depends on **plugin C**, which depends on **plugin A**.

We don't handle this case, because we don't know which plugin to install first.

If this case occurs when you install a plugin, we will just throw an error and you'll have to resolve the conflict manually.

That being said, this case doesn't generally occur, and I personally never encountered it.

It might occur if the plugin author doesn't pay attention to other plugins it depends on when publishing his/her plugin, or if a plugin evolves in such a drastic way
that its dependencies do not work anymore. But the use of a version aware installer, such as the [Light_PlanetInstaller](https://github.com/lingtalfi/Light_PlanetInstaller) should reduce the risk of such problem.


If you want to use our services, be aware of this and design your plugins so that they don't infer a **cyclic relationship**.


### Warning with hooks
2020-06-22 -> 2021-01-18


By now you're aware that you want to avoid **cyclic relationships** at all costs.

But still, there can be cases where you would think **cyclic relationships** is needed if you're not very careful.

Below, I try to explain a concrete case that I have, and how I resolved it, hoping to inspire you if you encounter the same case.

Now be aware that it's a complicated case, so it will undoubtedly give you a headache. I suggest you're in your best form before continue with the reading.

Meanwhile, I will do my best to be as clear as possible.



So, we have the following tables:

- user_group
- plugin_option
- user_group_has_plugin_option (we will call this table the **has** table for the rest of the discussion)


All those tables are provided by **plugin A**.
The relationships between those tables is self-explanatory.


Now I'm the author of **plugin B**, and I'm using the plugin option system.

So, **plugin B** depends on **plugin A**.

Now, basically, I need to create an entry in the **plugin_option** table.

But I also need to make sure every **user group** is bound to my **plugin option**.

So, for each existing **user group**, I need to create a corresponding entry in the **has** table.

Not only that, but if a **user group** is created by a third-party plugin later, I also need to create a corresponding entry in the **has** table.

Now, being an experimented developer, I feel like using a database hook is the best solution for this.

The database hook basically let me trigger an action every time a new entry is created in the **user group** table, so that's exactly what I need.

So, I create my **onUserGroupCreated** hook, which will create my entry in the **has** table, and I think I'm done.


But there is a little flaw. Something that's hard to see at first, but you can't fix it if you don't see it.


Let's follow the resolution algorithm as I install my **plugin B**:

- **plugin B** depends on **plugin A**, so install **plugin A** first
- now installing **plugin A**, the **plugin A** installs its tables, so far so good
- however, **plugin A** also creates an entry in the **user_group** (creating a default user group), and so my hook is called...oops...
- ...my hook will try to create an entry in the **has** table, but the **has** table doesn't exist yet (or at least I don't have the guarantee that it will exist, it's alphabetical randomness, and in my case it doesn't exist)


Did you see the problem?


Note that this problem wouldn't occur if, let's say, we depended on another plugin (for instance **plugin C**), and during the **install**, **plugin C** created a new entry in user group.
In that case, our hook would work just fine, since the **has** table already exists.

So the problem is specifically for when we want to insert an entry in a table from a plugin which we depend on.

Note: in the previous version of our service, I didn't see that problem as clearly, and I thought the problem was general to anytime a plugin makes hook to another plugin during the install.
This conception error led to a poor design, hence this new version of our service.


So, now that the problem is in the clear, it shouldn't be too hard to find a solution.

What I went for is that inside my hook for **plugin B**, I ask whether **plugin A** is installed already. If not, I just skip the hook.
So what happens during the installation of **plugin B** is this:

- **plugin B** depends on **plugin A**, so install **plugin A** first
- now installing **plugin A**, the **plugin A** installs its tables, so far so good
- however, **plugin A** also creates an entry in the **user_group** (creating a default user group), and so my hook is called...
- ...my hook detects that **plugin A** is not installed yet, so it does nothing
- installation of **plugin A** ends normally
- no more dependencies to resolve, so we resume with installation of **plugin B**
- the installation of **plugin B** continues, and creates an entry in the **has** table for every existing **user group** (which were freshly created by **plugin A**)


And voilà, all the **user groups**, have now a corresponding entry in the **has** table, and every **user group** created in the future (thanks to the hook), will also have a corresponding entry.
So my logic for **plugin A** is now implemented.










How to make your plugin installable
--------------
2021-01-18 -> 2021-01-22


Once your planet is [imported](https://github.com/lingtalfi/TheBar/blob/master/discussions/import-install.md#summary), with [assets/map](https://github.com/lingtalfi/UniverseTools/blob/master/doc/pages/conception-notes.md#the-planets-and-assetsmap),
does your plugin require anything else?


If so, then you need to create an **installer** class, which will provide whatever your plugin requires.
If not, then your job is done, you can skip this section.



Generally, it's about database tables.
If your plugin needs to create its own tables, then you need to create the **installer** class (if you are using our service).


If you need an installer class, then continue reading. If not, you can skip this section.


The first version of our service used the traditional container subscribing technique, but here in this new version we try something more modern, perhaps more experimental, a name based convention technique.

I believe this technique is more appropriate for this type of service. In the end, it's just a matter of taste really, and I like to have a consistent organization, forced by name convention, with a separated and well located
dedicated class to handle the installation/uninstallation, rather than allowing any class to be that handler.

Enough talking, let's explain this.


To use our service, you must create the following [bsr-0](https://github.com/lingtalfi/BumbleBee/blob/master/Autoload/convention.bsr0.eng.md) class:


- ${YourApp}/universe/${YourGalaxy}/${YourPlanet}/Light_PluginInstaller/${YourCompressedPlanet}PluginInstaller.php

With:

- YourApp: the path to your application directory
- YourGalaxy: the name of the galaxy containing your planet
- YourPlanet: the name of your planet
- YourCompressedPlanet: the [compressed name](https://github.com/karayabin/universe-snapshot#the-compressed-planet-name) of your planet


Let's call that class the **installer class**.

The installer class must implement our **PluginInstallerInterface**, which has the following methods:

- install 
- uninstall 
- isInstalled 
- getDependencies



The **install** method will make sure that the plugin is fully installed when the method call ends.
The **uninstall** method will make sure that the plugin is uninstalled when the method call ends.



If your class needs a [container](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/light-service-container.md)
just implement the [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md) interface,
and our service will inject the container into your class.


In order to print something to the output, our service provide a public **message** method.

Good luck.




 















  

