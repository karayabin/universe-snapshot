Light_MicroPermission, conception notes
=================
2019-09-26



I'm trying to make a permission system that makes sense for the soon to come Light_Kit_Admin plugin.


I've read the [permissions conception notes](https://github.com/lingtalfi/Light_User/blob/master/doc/pages/permission-conception-notes.md),
and they make sense, but they tend to create a lot of permissions.

The problem with the current state of the permission implementation is that each permission is stored in the session.
So each permission is one more entry in the $_SESSION array, and I'm not a big fan of having too big session arrays, 
so I want to find another solution.

In particular, when we have permissions related to sql tables: if each table spawns three or four permissions:

- create 
- read
- update
- delete

Considering a plugin like [Ekom](https://github.com/KamilleModules/Ekom) (my last e-commerce plugin for the kamille framework),
which has more than a hundred tables, just for one plugin, we would populate the session array quite rapidly.


So here is my alternative solution: micro permission.

The developer uses micro-permission in his code. 
Now he can go as atomic as he wants, no problem because micro-permissions won't be stored in sessions.

The benefit of this is that the developer doesn't have to ask himself what permissions to use: he can just use the micro-permission
that is semantically the most appropriate for the situation he's protecting. In other words, the idea of a micro-permission
is that its name doesn't depend on taste, but is rather the most logical name possible.
That's the main benefit of the micro-permission system: less burden for the developer while developing.


Then, we have to somehow connect this micro-permission methodology to the existing permission system.
We simply use some objects to do that. 
Those objects will not be gui updatable. Instead, they will be the plugin author's private tools.

The plugin author can basically group micro-permissions into one permission (using those objects).
The benefit of this is that the plugin author can always change his mind later (but preferably before the plugin is publicly available).
This part depends on the plugin author's tastes.

So for instance as a plugin author, I can decide that the permission named **Light_Kit_Admin.user** owns the following micro-permissions:

- Light_Kit_Admin.user
    - lud_user.create
    - lud_user.read
    - lud_user.delete
    - lud_user.update
    - page_3_update
    - walk_my_dog
    - ...


In other words, the micro-permission system is some kind of internal organizational layer of permissions for the developer.

It's the same idea as a route, for which we can assign a different url afterwards.

Again, the micro-permissions system should be thought through before being exposed to the public, since making changes
to a publicly used system is always more delicate (because users of your plugin might then expect certain permissions
to be bound to certain micro-permissions).

That's the same for your routes and urls: if your system has been crawled by google, then if you change the url of a route,
you might have duplicate content created from the google engine's standpoint.


  
  
So, those objects, why not call them **MicroPermissionResolver**s ?

I will also provide a service to resolve the micro permissions, which will basically a wrapper for the Light_User->hasRight method.  




A first implementation idea
==============


For my first implementation, I want to try this idea of dividing the micro-permission notation in two parts:

- microPermission: {pluginName}.{microPermissionId}


That removes some flexibility out of the general system, but in exchange we get a little bit of pragmatism,
and I feel like a pragmatic guy today, so let me try this out, we can always create another more flexible implementation
later if necessary...


 




