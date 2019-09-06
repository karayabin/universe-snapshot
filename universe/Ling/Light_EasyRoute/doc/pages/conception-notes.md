Light_EasyRoute, conception notes
=================
2019-08-21


Plugins sometimes need to register their own routes.

Rather than doing it manually, this plugin proposes to do it for them.

In addition to that, this plugin provides some cool capabilities that a plugin would want to benefit of:

- the implementation of a bundle system


Registration
---------
So, first how do we tell Light_EasyRoute to register our routes for us?

This is done via the service container, obviously.
The LightEasyRouteService provides the registerBundleFile method, so you just need to create a bundle file,
and pass its path to the easy route service, and that's it.


The bundle file, and what's a bundle?
-----------------

So what's the bundle file?
It's a [babyYaml](https://github.com/lingtalfi/BabyYaml) file that we use to store the bundle(s)
of our plugin.

A plugin can define any number of bundles.

A typical structure of a bundle is this:

```yaml
bundle_name:
    routes:
        dashboard:
            pattern: /
            controller: Ling\Light_Kit_Admin\Controller\DashboardController->renderDashboard
            right: Light_Kit_Admin.user
        my_other_route:
            pattern: /my_other_page
            controller: Ling\Light_Kit_Admin\Controller\AnotherController->render
            right: Light_Kit_Admin.admin
        - ...
    - ...
- ...

```


So, as you can probably guess, a bundle is just a collection of routes.
Some extra properties could be added in the future.

Note: that the "routes" property holding the routes is an array of routeId => routeItem.
Note also that the right property of each route item is totally made up (actually it exists in the 
context of the Light_Kit_Admin plugin, but that's an exception). 
The route item is in fact defined in the light framework documentation.
See the [route conception notes](https://github.com/lingtalfi/Light/blob/master/doc/pages/route.md) for more details.

By the way, there is
also a [conception note about the rights](https://github.com/lingtalfi/Light/blob/master/doc/pages/rights.md)
if you're interested.


But back to this page, so the route is indeed extendable, hence we can add whatever properties our plugin
needs to to it (right, my_color, number_of_tics, whatever, ....).


The benefits of using bundles
-------------

So the bundle is a collection of routes.
But why is it useful?

The main idea behind the bundle concept is to easily prefix all the routes of the bundle.
Imagine you're creating an admin system, then by changing the route prefix at the bundle level,
you could for instance decide that all your urls now are prefixed with "/my_secure_admin/".

Note: this feature is not implemented yet, but will be as soon as the concrete need for it 
will occur in my developer life.









