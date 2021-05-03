Light kit admin plugins
=============
2020-02-28 -> 2021-03-15






The **light kit admin** plugin is so big that it's an environment in itself.

It can host other plugins, called **light kit admin plugins** (or **lka plugins** for short).


As a third party author, you can extend **light kit admin**'s functionality by writing your own **lka plugins**.


This page describes the **lka plugins** in general, and how you, as a third-party author, can create your own **lka plugin**
to add your own features in **light kit admin**.



Summary
------------
2021-03-08


- Creating your planet
    - planet naming
- Creating pages

- Miscellaneous topics
    - [light kit admin source and port plugin](#light-kit-admin-source-and-port-plugin) 





Creating your planet
=============
2021-03-08


The first thing to do to extend **lka** is to create your own planet.

A **lka plugin** is just a planet driven by certain rules, which we describe in this document.



Planet naming
---------
2021-03-08

The name of your planet must start with **Light_Kit_Admin_**.

Examples:
    - Light_Kit_Admin_Abc
    - Light_Kit_Admin_MyPlugin



Creating pages
==========
2021-03-08 -> 2021-03-12


A page is a very easy concept to grasp: you basically open an url in your browser, and it shows you a page.

**Light_Kit_Admin** is based on the [kit system](https://github.com/lingtalfi/Kit), where pages are represented by a php array called the [page conf array](https://github.com/lingtalfi/Kit#the-kit-configuration-array) (aka kit conf array in kit's nomenclature).


The implementation of the **kit system** in **lka** is based on the [Light_Kit_Editor](https://github.com/lingtalfi/Light_Kit_Editor) plugin, which allows **light kit admin** to provide an [open](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/design/open-vs-close-service-registration.md#the-open-registration) configuration [eco-structure](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/nomenclature.md#eco-structure)
based on [babyYaml](https://github.com/lingtalfi/BabyYaml) files.

The structure we use is a [kit web app](https://github.com/lingtalfi/Light_Kit_Editor/blob/master/doc/pages/conception-notes.md#the-kit-web-app) directory, its location is:

- **config/open/Ling.Light_Kit_Admin/lke**


The default [theme](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/pages/kit-theme.md) for **light kit admin** is: 

- **Ling.Light_Kit_Admin/zeroadmin**










light kit admin source and port plugin
-------------
2021-01-29 -> 2021-03-15


Some **lka plugins** are just a port of another plugin for the **light kit admin** environment.

For instance, there is a plugin named **Light_TaskScheduler**, which provides a service to schedule tasks, using some database tables.

Now there is a port of that plugin for the **light kit admin** environment, named **Light_Kit_Admin_TaskScheduler**.


To help disambiguate the two different plugins, we use the following nomenclature:


- **lka port plugin**: the **light kit admin plugin** (aka the **lka plugin**). In the above example, it's the **Light_Kit_Admin_TaskScheduler** planet.
- **lka source plugin**: the original plugin, independent of **light kit admin**, and which was used as a source to create the **lka port plugin**. In the above example, it's the **Light_TaskScheduler** planet.  


Note that the name of the **lka port plugin** derives directly from the **lka source plugin**, by replacing the first **Light_** occurrence with **Light_Kit_Admin_**.
This naming convention is used by some tools in our ecosystem, and so we recommend that you stick to it when you create **port plugins**.  


It's assumed that both planets, the port and the source come from the same galaxy.







Light Kit Admin StandardService plugin
----------
2020-08-07 -> 2021-01-29



This is a class "lka plugin" authors can extend to speed up their workflow.
It's just a basic service class.





