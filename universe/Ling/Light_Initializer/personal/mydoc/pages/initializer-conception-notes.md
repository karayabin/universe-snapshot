Initializer conception notes
=================
2019-09-10



See the **README.md** for starter.



The slots concept
-----------------

Now the initializer util can handle the concept of slots, which gives us more flexibility.

With the slots, we can put now put some plugins on a particular slot, to execute them in the order we want.

There are different slots provided by the initializer util:

- install: this is the first slot called
- default: this is the slot where plugins are registered if they don't specify a particular slot




The dependency concept
---------------------

Now the install slot was created for plugins who need an install involving a database and/or the creation of extra assets
in the filesystem.

The thing is that some plugins need to create some tables in order to be operational.
And so, pushing the concept further, when many plugins need to create some tables, and when plugin depends on other plugins,
then we have some plugin dependencies being created, and some plugins need to be executed AFTER some other plugins.

Typically, imagine that plugin A provides the **pa_user** table; and plugin B provides the **pa_user_has_animal** table,
which depends on the existence of the **pa_user**. Then the plugin B must be installed **AFTER** the plugin A.

So that's the problem that the dependency concept solves.

For the install slot, plugins can specify the "parent" plugin they depend of, and the initializer util will handle the order
in which the plugins are called.

Now in this implementation, we will only use accept initializers that comes from light plugins, so that the light plugin name
can be guessed from the initializer instance (because the universe naming convention is based on $galaxy/$planet/..., and
the $planet is our plugin name).


Also in this implementation, for now, plugin A can be the parent of plugin B only if both plugins are in the install slot
(i.e. if either plugin A or plugin B is in another slot this won't work).



