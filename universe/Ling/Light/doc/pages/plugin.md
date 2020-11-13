Light plugin
=============
2019-04-05 -> 2020-08-21


A Light plugin is a [planet](https://github.com/karayabin/universe-snapshot) that once installed
provides new functionality to the Light framework immediately.


Plugin names
----------
2020-08-21


In light, each plugin name must be unique.

As light is part of the [universe framework](https://github.com/karayabin/universe-snapshot), every plugin is a planet.

The light plugin name is often just the planet name (i.e. without the galaxy part).


The plugin name should begin with the **Light_** prefix.


So for instance, if your [planet id](https://github.com/karayabin/universe-snapshot#the-planet-identifier) is Xerbul/Light_MyPlanet01,

then the light plugin name is simply Light_MyPlanet01 (i.e. we dropped the galaxy part).

This means you need to be careful whether your plugin name is available or not.



The underscore, in the plugin name, and by convention, is used as a namespace separator.


So for instance every light plugin name starts with **Light_**, which means they are all (functionally) part of the Light (framework).

Some macro-plugins also tend to create their own eco-system; this is the case for instance with **Light_Kit**, which is a plugin
that provides a widget based templates service.  

So service extending **Light_Kit** should then have their name starting with the **Light_Kit_** prefix.

THis is for instance te case for the **Light_Kit_Admin**, which provides a basic gui admin service.

Continuing on this idea, we have plugins such as the **Light_Kit_Admin_DebugTrace** plugin (notice the **Light_Kit_Admin_** prefix), which provides
some debug tools for **Light_Kit_Admin**. 


So to recap, in a light plugin name, the underscore has a hierarchy meaning to it. 









How does it work?
-------------
2019-04-05

This basically works by using the services container provided by the Light framework.
The configuration of the services container lies in the **config/services** directory at the root of the Light application.

When the planet/plugin installs itself, it also copies its services configuration files to the **config/services**
directory of the Light application, thus enhancing the Light application instantly.



Plugin extension: a plugin of a plugin
----------
2020-06-08


Some additional nomenclature: how do you calla plugin of a plugin?
 
We suggest using the expression **plugin extension**.
