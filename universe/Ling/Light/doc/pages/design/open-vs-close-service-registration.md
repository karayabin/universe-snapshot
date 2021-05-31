Open vs close service registration
===============
2021-02-22 -> 2021-03-23



Services often provide methods for third-party plugins to use.

Those services are called **provider services**.

A third-party plugin can subscribe to a **provider service**.


In **light**, we can subscribe to a **provider service** in one of two different ways:


- **close registration**
- **open registration**



Both have pros and cons, but usually the **open** approach is better for performances, if the **service provider** offers it.



The close registration
-----------
2021-02-22 -> 2021-03-09

With the **close registration system**, the **provider service** provides a **registration method**.

The third-party plugin needs to access the **provider service**, via the container and subscribe via this **registration method**, 
in order to use the provided services.


This is the traditional way of registering services in light.


The problem with this approach is that all the calls to the registration methods are stored in the cached container.

So, for instance if we have a quick peak at the cached container's content, we can see something like this:


```php
    protected function easy_route()  {
        $s0 = new Ling\Light_EasyRoute\Service\LightEasyRouteService();
        $s0->registerBundleFile('config/data/Ling.Light_AjaxFileUploadManager/Light_EasyRoute/afup_routes.byml');
        $s0->registerBundleFile('config/data/Ling.Light_AjaxHandler/Light_EasyRoute/lah_routes.byml');
        $s0->registerBundleFile('config/data/Ling.Light_ControllerHub/Light_EasyRoute/lch_routes.byml');
        $s0->registerBundleFile('config/data/Ling.Light_Kit_Admin/Ling.Light_EasyRoute/lka_routes.byml');
        $s0->registerBundleFile('config/data/Ling.Light_Kit_Admin_UserData/Light_EasyRoute/lka_userdata_routes.byml');
        $s0->registerBundleFile('config/data/Ling.Light_Kit_Admin_UserDatabase/Light_EasyRoute/lka_userdatabase_routes.byml');
        $s0->registerBundleFile('config/data/Ling.Light_UserData/Light_EasyRoute/luda_routes.byml');
        
        return $s0;
    }

```


In the above example, we guess that the **Light_EasyRoute** plugin has provided a **registerBundleFile** registration method,
and this method is used by various plugins (Light_AjaxFileUploadManager, Light_AjaxHandler, Light_ControllerHub, ...).


That's fine, but we've called the registration method 7 times. The open system offers a more optimized approach. 




The open registration
------------
2021-02-22 -> 2021-03-23


With the open registration system, the **service provider** will not provide a registration method, but rather is going to use
a certain "system" that third-party subscribers must use in order to benefit the services.

This "system" is defined by the **service provider**, but its file based, and its location is in the **config/open/$serviceProviderName** directory.


For instance, if we take the above example of the **Light_EasyRoute** provider service, the service provider can say:

- I'm going to parse only one file located in **config/open/Light_EasyRoute/routes.byml**, and which contains all the routes ordered by plugin, like this:

```yaml
# the static routes (i.e. no variables in it)
static:
    lka_route-home: # this is the route name, it must be unique (i.e. use namespaces)
        pattern: /
        controller: Ling\Light_Kit_Admin\Controller\DashboardController->render
    ...        
    
        
# dynamic routes (i.e. they contain variables in it)        
dynamic: # same structure as static

```


The benefits of this approach is that now the cached container looks something like this:

```php
    protected function easy_route()  {
        $s0 = new Ling\Light_EasyRoute\Service\LightEasyRouteService();
        $s0->registerBundleFile('config/open/Light_EasyRoute/routes.byml');
        
        return $s0;
    }

```


So, just one yaml parsing phase instead of 7.
Plus, from the application maintainer, it's easier to manage when all the routes located in one file.


Now obviously in order to achieve this, the **subscriber plugin** has to write in the routes.byml file, or whatever file(s) is/are used
by the **service provider**, this is done during the **install** phase of the third-party plugin.


Another benefit of this approach is that now, it's possible to use the late registration concept.

In other words, the **provider service** has the option to only instantiate what it really needs.

An example of this is the **Ling.Light_Event** service, which dispatches application events to listeners.

The **Ling.Light_Event** service basically allow the listeners (aka the subscriber plugins) to listen to an event by 
creating a [babyYaml](https://github.com/lingtalfi/BabyYaml) file in a directory named after the listened event.

So for instance, if a third-party plugin is named **Ling.Light_Abc** wants to register to the **Ling.Ling.Light_Database.on_lun_user_notification_create** event,
it can create a file like in:

- open/Ling.Light_Events/Ling.Ling.Light_Database.on_lun_user_notification_create/Ling.Light_Abc.byml

The content of the file is defined by the **Ling.Light_Events** plugin, but the main idea is that now
the **Ling.Light_Events** plugin will only call the listener's callback when needed, and the **Ling.Light_Abc** plugin didn't spend any static registration call.


Yet another benefit of this "open" approach is that the maintainer can now easily hack the system by creating/updating those files.
This makes the application more maintainable, and easier to decipher.


For all those reasons, the open approach is the one we recommend considering first, if you are a **service provider**.


That being said, both the closed and open approaches can co-exist together, it really depends on the **service provider**.




An alternative to the **open registration system** is the [nugget registration system](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/design/nugget-registration-system.md).






