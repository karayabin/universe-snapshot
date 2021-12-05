Light_ControllerHub conception notes
======================
2019-10-28 -> 2021-04-01

The main idea of this service is to allow users to call controllers methods dynamically.

We provide two ways:

- the practical way (modern)
- the secured way (old)

The practical way (modern)
----------
2021-04-01

With this method, you can execute any light controller's (non-static) method of an app.

In order to do this, call our controller's render method with the following parameter:

- execute: $className->$method

With:

- $className: the [bsr-0](https://github.com/lingtalfi/BumbleBee/blob/master/Autoload/convention.bsr0.eng.md) name of
  the class. For instance: Ling\Light_Kit_Admin_Kit_Editor\Controller\Editor\LkeEditorController
- $methodName: the method to execute

Note that in order to execute the controller, we use the **controller helper** from light under the hood, which means
you can use the **$request** argument in your controller method, which will receive the http request instance.





The secured way (old)
-----------
2019-10-28 -> 2021-04-01

Routes in the light framework is a precious resource. It can potentially use regex, which is slow and eats up memory.

So, if you are in the process of creating an auto-admin generator for instance, then rather than generate one route per
item, you might want to think about alternate solutions first.

Well hold and behold, Light_ControllerHub was designed for this particular case, so you might want to use it in your own
projects.

The controller hub idea is basically that you call the controller hub's controller with some $_GET parameters, and the
hub controller will then redistribute the handling to the appropriate controller, and thus you can call different
controllers from one route.

What $_GET parameters?

I thought that the following were the two mandatory $_GET parameters:

- plugin: the name of the plugin
- controller: the identifier of the controller

Of course, there are many ways to implement a hub controller, but I thought that in the case of the light framework,
delegating the hub handling to a subscriber plugin made perfect sense.

Why? Because for instance, the plugin can assign default rights checking for every route, something that would be hard
to manage from the Light_ControllerHub's perspective, especially if the Light_ControllerHub is not aware of the kind of
system the plugin is using (in the case of the rights system, it's pretty standard, but what if the plugin uses a more
specific system?).

Now the controller parameter is an identifier, not a real controller path. That's just for security reason.

Then although the handling of the routing is delegated to the subscribing plugin, here is an idea about how to handle
the routing:

- the plugin creates one or many configuration files, which contains all the configuration items. Each configuration
  item is an array, which access key is the controller identifier. The configuration item array is composed of values
  used by the plugin, for instance:

    - controller: the real controller class name
    - ?right: the minimum right to have to access this controller
    - ...?: open to new ideas...
    
  




