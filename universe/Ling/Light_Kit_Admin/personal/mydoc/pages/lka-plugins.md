Light kit admin plugins
=============
2020-02-28 -> 2021-01-29






The light kit admin plugin is so big that it's an environment in itself.

It can host other plugins, called light kit admin plugins (or lka plugins for short).





light kit admin source and port plugin
-------------
2021-01-29


Some **lka plugins** are just a port of another plugin to the **light kit admin** environment.

For instance, there is a plugin named **Light_TaskScheduler**, which provides a service to schedule tasks, using some database tables.

Now the port of that plugin to the **light kit admin** environment is another plugin named **Light_Kit_Admin_TaskScheduler**.

To help disambiguate the two different plugins, we use the following nomenclature:


- **Light_Kit_Admin_TaskScheduler**: is the lka port plugin (aka the **lka plugin**)
- **Light_TaskScheduler**: is the lka source plugin


Note that the name of the **lka port plugin** derives directly from the **lka source plugin**, by replacing the first **Light_** occurrence with **Light_Kit_Admin_**.
This naming convention is used by some tools in our ecosystem, and so we recommend that you stick to it when you create **port plugins**.  









Light Kit Admin StandardService plugin
----------
2020-08-07 -> 2021-01-29



This is a class "lka plugin" authors can extend to speed up their workflow.
It's just a basic service class.





