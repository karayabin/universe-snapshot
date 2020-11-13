Light_MicroPermission, conception notes
=================
2019-09-26 -> 2020-08-21





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
2019-09-26 -> 2020-08-21


The micro-permission system basically consists of a map of micro-permission names to permissions (as defined in the [permission conception notes](https://github.com/lingtalfi/Light_User/blob/master/doc/pages/permission-conception-notes.md)).

Something like this:

- store.lud_user.create:
    - Light_Kit_Admin.admin
- store.lud_user.read:
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
2020-07-03 -> 2020-08-21


We provide two ways for plugin authors to register their micro-permissions.


- registerMicroPermissionsByFile (a tiny bit faster)
- registerMicroPermissionsByProfile (human friendly)



**registerMicroPermissionsByFile** was the first method created, you provide a [babyYaml](https://github.com/lingtalfi/BabyYaml) file where micro-permissions are the keys,
and the permissions are the values, like this for instance:

```yaml 
store.luda_resource.create: Light_UserData.admin
store.luda_resource.read: 
    - Light_UserData.user
    - Light_UserData.admin
store.luda_resource.update: Light_UserData.admin
``` 


This is, I believe the fastest method to register the micro-permissions.


**registerMicroPermissionsByProfile** was added in 2020-07-03, and is more human friendly, you register your micro-permissions
as a profile, where **permissions** are the keys, and **micro-permissions** are the values, like this:


```yaml 
Light_TaskScheduler.admin:
    - store.lts_task_schedule.create
    - store.lts_task_schedule.read
    - store.lts_task_schedule.update
    - store.lts_task_schedule.delete

Light_TaskScheduler.user:
    - store.lts_task_schedule.read
```



Apart from registration semantics, both methods achieve exactly the same result.





Namespaces
---------------
2019-09-26 -> 2020-08-21


By convention, a micro-permission name is a dot separated string.

Each component is like a namespace that encapsulates its right sibling.

So for instance let's imagine that our application only uses those micro permissions:

- store.lts_task_schedule.create
- store.lts_task_schedule.read
- store.table2.create
- store.table2.read
- pluginName.permissionA


From there, if you have the "store" **micro-permission**, then you can execute the following:

- store.lts_task_schedule.create
- store.lts_task_schedule.read
- store.table2.create
- store.table2.read

However, if you have the "store.table2" micro-permission, then you can only execute the following:

- store.table2.create
- store.table2.read


If you have only the "store.table2.create" micro-permission, then you can only execute the following:

- store.table2.create



Note: the namespace system was implemented I believe in the first version of this plugin, but then I removed it in version 2,
and now I add it back again in version 3, as I believe it makes the job easier to grant the admin all the rights at once.

 


Micro-permission profiles
-----------------
2020-08-21


A **micro-permission profile** is a set of **micro-permissions**, carefully chosen. A **micro-permission profile**
is generally assigned to a [permission](https://github.com/lingtalfi/Light_User/blob/master/doc/pages/permission-conception-notes.md). 

 



