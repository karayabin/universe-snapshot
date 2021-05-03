Light_EasyRoute, conception notes
=================
2019-08-21 -> 2021-03-09


Plugins sometimes need to register their own routes.

Rather than doing it manually, this plugin proposes to do it for them.





Registration
---------
2019-08-21 -> 2021-02-23

We implement the [open registration system](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/design/open-vs-close-service-registration.md).

To register your routes:

- create your [plugin's route declaration file](#the-plugins-routes-declaration-file)
- create a [Light_PlanetInstaller hook](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#the-light_planetinstaller-hooks) and in the **onMapCopyAfter** method, call our **LightEasyRouteHelper::copyRoutesFromPluginToMaster** method



Following these steps will add your plugin's routes to the [master route declaration file](#the-master-route-declaration-file). 





The plugin's routes declaration file 
------------
2021-02-23 -> 2021-03-09


The plugin's routes declaration file has a structure similar to this:


````yaml
$bundleName1:
    ?prefix: null
    ?priority: 10
    routes:
        lka_route-home:
            pattern: /
            controller: Ling\Light_Kit_Admin\Controller\DashboardController->render
        lka_route-login:
            pattern: /login
            controller: Ling\Light_Kit_Admin\Controller\LoginFormController->render
        ...
...
````

where you declare your bundles.
You can declare any number of bundles you want.

A typical plugin would declare only one bundle named after the plugin (tip: use namespaces as your bundle will be merged with other third-party plugin's bundles).

Each bundle has the following entries:

- ?**prefix**: string=null, allows you to specify a string which will be prepended to every route's pattern in the bundle.
        It's possible to access [light vars](https://github.com/lingtalfi/Light_Vars/blob/master/doc/pages/conception-notes.md#light-variables) via [container notation](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/notation/container-notation.md).
- ?**priority**: int=10, allows you to specify a positive arbitrary integer representing the priority. The smaller the number the sooner the route will be parsed.
    The main idea behind this property is that sometimes there is a well known master/subscriber relationships between third-party plugins.
    When that's the case, it's likely that the routes defined by the master plugin need to be parsed BEFORE the ones from the subscriber plugins.
    So for instance, the master plugin could define a priority of 1, and the subscriber plugins would not define any priority (which defaults to 10),
    so that the routes of the master plugin will be parsed first.
  
- **routes**: array, the [routes](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/route.md) of the bundle.
    The index key for each route is the route's name.



The plugin file's location must be at:

- config/data/$PluginDotName/Light_EasyRoute/routes.byml


With:

- **$PluginDotName**: the [plugin's dot name](https://github.com/karayabin/universe-snapshot#the-planet-dot-name)




Trailing slashes
---------------
2021-02-25 -> 2021-02-26

When our service registers a route to the light instance, it makes sure that the route pattern doesn't end with a slash.

We reckon that urls shouldn't generally end with a "slash" character, and so by removing the trailing slashes of the route patterns we believe we help the user a bit.












The master route declaration file
---------
2021-02-23 -> 2021-03-09



The **master route declaration file** is the file used by our service to declare the routes to the light framework.

Basically, every route declared in it will be registered to the light instance.


Its structure is exactly the same as the [plugin's route declaration file](#the-plugins-routes-declaration-file).

In fact, this file is entirely created by third-party plugins when the call our **LightEasyRouteHelper::copyRoutesFromPluginToMaster** method,
which just merges the content of their route declaration file into the master file.


The master's file location will be at:

- config/open/Ling.Light_EasyRoute/routes.byml




