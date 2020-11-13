Light_MicroPermission, conception notes
=================
2019-09-26 -> 2020-07-03



I'm trying to make a permission system that makes sense for the soon to come [Light_Kit_Admin](https://github.com/lingtalfi/Light_Kit_Admin) plugin (maybe as you read those lines it has come out already?).


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





How does it work?
-------------------
2019-09-26


The micro-permission system basically consists of a map of micro-permission names to permissions (as defined in the [permission conception notes](https://github.com/lingtalfi/Light_User/blob/master/doc/pages/permission-conception-notes.md)).

Something like this:

- tables.lud_user.create:
    - Light_Kit_Admin.admin
- tables.lud_user.read:
    - Light_Kit_Admin.admin
    - Light_Kit_Admin.user
    - PluginABC.permission123
- my_micro_permission_456:
    - my_permission_789
- ...


There is a micro-permission handler (that we provide), which basically holds that map and provides the hasMicroPermission method:


- hasMicroPermission ( string microPermission ): bool




Registering the micro-permissions
-----------
2020-07-03


We provide two ways for plugin authors to register their micro-permissions.


- registerMicroPermissionsByFile (a tiny bit faster)
- registerMicroPermissionsByProfile (human friendly)



**registerMicroPermissionsByFile** was the first method created, you provide a [babyYaml](https://github.com/lingtalfi/BabyYaml) file where micro-permissions are the keys,
and the permissions are the values, like this for instance:

```yaml 
tables.luda_resource.create: Light_UserData.admin
tables.luda_resource.read: 
    - Light_UserData.user
    - Light_UserData.admin
tables.luda_resource.update: Light_UserData.admin
``` 


This is, I believe the fastest method to register the micro-permissions.


**registerMicroPermissionsByProfile** was added in 2020-07-03, and is more human friendly, you register your micro-permissions
as a profile, where **permissions** are the keys, and **micro-permissions** are the values, like this:


```yaml 
Light_TaskScheduler.admin:
    - tables.lts_task_schedule.create
    - tables.lts_task_schedule.read
    - tables.lts_task_schedule.update
    - tables.lts_task_schedule.delete

Light_TaskScheduler.user:
    - tables.lts_task_schedule.read
```



Apart from registration semantics, both methods achieve exactly the same result.





Namespaces
---------------
2019-09-26


By convention, a micro-permission name is a dot separated string, where the first component is called the namespace.

That's because as we said, the micro-permission system is used for when we have a lot of permissions to deal with, and
so more often than not we can group those in namespaces.


We can disable namespaces temporarily, which can be useful sometimes.
For instance, we have this [recommended micro-permission notation for database interaction](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/pages/recommended-micropermission-notation.md#database-interaction), 
which has the "tables" namespace, and during a plugin A installation phase (assuming plugin A installs tables in the database),
we can temporarily disable the "tables" namespace to allow the plugin A to install itself.


In other words, the micro-permission system is aimed towards the current user, but we can disable it temporarily 
when the executing actions on the behalf of the developer or plugin author.  











Recommended way to work with micro-permissions
================
2020-07-03


In this section I try to lay down the best practical way to work with micro-permissions, based on concrete experience.

This is still a work in progress to this day (i.e. I've not experienced enough use cases so far to be confident that
this system is the best for handling permissions in an app).


Here is the vision you should have when working with permissions in [Light](https://github.com/lingtalfi/Light).

The user belongs to one **permission group**.

The **permission group** can contain any number of **permissions**.

Each **permission** contains any number of **micro-permissions**.

In other words, the **permission** is a profile of what the user can/cannot do.

And those profiles can be combined together with **permission groups**.


I recommend that the micro-permission authors use names that are as agnostic as possible.












 










