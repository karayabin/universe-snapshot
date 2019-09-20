Light_UserDatabase, conception notes
===================
2019-09-16



So, this service provides an interface to a [light user](https://github.com/lingtalfi/Light_User).


In particular, we provide an interface for the [LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser.md), which is a special type of light user more suitable
for web applications.



Our implementation has some peculiarities though, and so I want to discuss them, so that the developer can get
a better understanding of what's going on with this planet.



First, we see the user as a database structure with the following tables:


- user
- permission
- permission_group
- user_has_permission_group
- permission_group_has_permission


The semantics of those table names takes its roots in the [permission conception notes](https://github.com/lingtalfi/Light_User/blob/master/doc/pages/permission-conception-notes.md),
which we implement.

In our mysql implementation, all tables have cascading for DELETE and UPDATE,
and our tables are prefixed with the "lud_" prefix (i.e. lud_user, lud_permission, ...).


Our implementation offers two database types:

- either a babyYaml based database (BabyYamlLightWebsiteUserDatabase)
- or a regular mysql database (MysqlLightWebsiteUserDatabase)


Usually, we recommend to stick with the mysql implementation, as mysql has natural foreign key constraint checking,
whereas our babyYaml implementation doesn't provide such functionality.

The babyYaml implementation was an early implementation that I personally used in the early stages of the development
of this planet, when there was only one "user" table, and I needed a quick tool to interact with it.
So, again, now that the mysql implementation is done, we recommend to use the mysql implementation.



So now what's peculiar to our implementation of the Light WebsiteUser is that the methods related to the 
user table (i.e. getUser, insertUser, ...) are directly available in the object, whereas the interaction
with the other tables (i.e. permission, permission_group, ...) is accessed via apis.

So for instance, in order to insert a permission, you need to use access the permission api first, like this:

```php
/**
 * @var $db LightWebsiteUserDatabaseInterface
 */
$db = $container->get('user_database');
az($db->getPermissionApi()->insertPermission([
    "MyPlugin.myPermission",
]));
```

More details in the [LightWebsiteUserDatabaseInterface class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/LightWebsiteUserDatabaseInterface.md).







Permissions and plugins, our implementation
==================
2019-09-17


There are three moments when we need to pay special attention to the user's profiles (aka permission groups):

- when the root user is created
- when a new user is created
- when an user is updated


The creation of the root user is done at the **LightWebsiteUserDatabaseInterface** level, at the same moment
when the "tables" are created.
The **root** user belongs to the special (permission) group named "root" (it's a reserved permission group name),
which contains only one permission named "*" (also reserved), which grants any right/permission to the users who owns it.


When a new user is created, the **LightWebsiteUserDatabaseInterface** instance has already asked the plugins in advance
what groups should a new user belong to, and those groups are then affected to the new user.

How this works is that during the service container initialization, plugins registers the new user's profiles via the **registerNewUserProfile** method of
our **LightWebsiteUserDatabaseInterface** instance. 
Also, plugins are responsible for adding their own groups and permissions when they are initialized.

So for instance if a plugin **PluginAAA** is installed, it will add its own permissions and groups in the database,
for instance it will create two groups PluginAAA.admin and PluginAAA.user, with the corresponding rights.

And in parallel of that, the **PluginAAA** plugin will also register the new user profile, in this case **PluginAAA.user**.

Unless you have a special reason to do otherwise, we recommend that plugins who distinguishes between admin and user rights always give the 
"user" groups to the newly created users, and let an human admin bind them to an "admin" group later, using the gui manually.


When an user is updated using the updateUser method, we actually don't change the user's permission groups here, although that could have been possible.
Instead, we prefer to isolate the operation of changing user groups as a standalone operation.

In other words, the user groups are created only when the user is created for the first time, and then to change them,
we generally wait for an human admin intervention via a gui.


Also, we recommend to never delete/update a permission group created by a plugin, otherwise when you create a new user, some
exceptions might be thrown because the group he wants to be in has been deleted.


  


The getUserInfoByCredentials method
--------------

The **getUserInfoByCredentials** method is a key moment in the website user's lifetime.

In fact, the **getUserInfoByCredentials** is called just before the website user is instantiated in the php session.

In our implementation, we believe that the permissions of the user should be stored in the session, and therefore
our **getUserInfoByCredentials** method returns an extended user array, which is like the regular user info array,
but with the extra "rights" property, which contains all the permissions of the given user.
























 



