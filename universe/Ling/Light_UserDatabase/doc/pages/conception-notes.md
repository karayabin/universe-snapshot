Light_UserDatabase, conception notes
===================
2019-09-16 -> 2020-11-09



So, this service provides an interface to a [light user](https://github.com/lingtalfi/Light_User).


In particular, we provide an interface for the [LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md), which is a special type of light user more suitable
for web applications.



Our implementation has some peculiarities though, and so I want to discuss them, so that the developer can get
a better understanding of what's going on with this planet.



First, we see the user as a database structure with the following tables:


- user
- permission
- permission_group
- user_has_permission_group
- permission_group_has_permission
- user_group
- plugin_option
- user_group_has_plugin_option



See the [schema conception notes](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/pages/schema-conception-notes.md) for more details.

All table names in this document are simplified, in the concrete implementation they are all prefixed with the "lud" prefix (which stands for light user database).



The semantics of those table names takes its roots in the [Light_User permission conception notes](https://github.com/lingtalfi/Light_User/blob/master/doc/pages/permission-conception-notes.md),
which we implement.

In our mysql implementation, all tables have cascading for DELETE and UPDATE,
and our tables are prefixed with the "lud_" prefix (i.e. lud_user, lud_permission, ...).


Our implementation uses mysql under the hood.

Note: in version 1.16.1 and earlier, there was also a babyYaml based database implementation, 
but I removed it because it was incomplete, plus it took me too much time to update the plugin every time there was a new change in the schema structure.


So now what's peculiar to our implementation of the Light WebsiteUser is that the methods related to the 
user table (i.e. getUser, insertUser, ...) are directly available in the object (MysqlLightWebsiteUserDatabase), whereas the interaction
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


Note: we used the [Light_BreezeGenerator](https://github.com/lingtalfi/Light_BreezeGenerator) plugin to generate the bulk of our apis.


 


The getUserInfoByCredentials method
--------------

The **getUserInfoByCredentials** method is a key moment in the website user's lifetime.

In fact, the **getUserInfoByCredentials** is called just before the website user is instantiated in the php session.

In our implementation, we believe that the permissions of the user should be stored in the session (to avoid database requests
everytime we need to check whether the user has a certain permission), and therefore
our **getUserInfoByCredentials** method returns an extended user array, which is like the regular user info array,
but with the extra "rights" property, which contains all the permissions of the given user.








Plugin options and user groups
-----------------
2019-12-17 -> 2020-11-09

Each user belongs to a unique (user) group.

A group is defined by a unique set of plugin options.

We use groups because it allows us give the same set of options to multiple users at once.

The **plugin options** table is populated by plugins.


An option is defined by a category, a name, and a value.

We recommend that the category has the following format:

- category: $pluginName.$pluginCategoryName

With:
- $pluginName: the plugin name
- $pluginCategoryName: the name of the option category, as defined by the plugin


For instance plugin A will provide the following categories:

- PluginA.is_premium 
- PluginA.has_monday_coupon

while plugin B could provide this category:

- PluginB.maximum_storage_capacity



### plugin installation


In this design, we try to make it so that when a plugin is installed, it's usable right out of the box,
and so when a plugin is installed, it basically does two things:

- populate the **plugin options** table 
- optionally (but recommended), create the bindings for each user group to the most common/default set of options


So for instance if pluginA is installed, it has two options (**is_premium** and **has_monday_coupon**), and we recommend
that plugin A figures out which set of option is the most common (for instance is_premium=0 and has_monday_coupon=0),
and binds them to all existing user groups (thus populating the **user_group_has_plugin_options** table).

In parallel of this, we recommend that this plugin also listens to the **Ling.Light_Database.on_lud_user_group_create** event
provided by the [Light_Database plugin](https://github.com/lingtalfi/Light_Database), to be consistent and add the same set of default options to the newly created user groups.  


It's important to understand that a plugin cannot configure the user groups directly, as it doesn't have sufficient knowledge to do it properly.
Only the host application main plugin might have that kind of knowledge, if there is such a plugin.

The human administrator's role is to ensure that all user groups are bound to the correct plugin options. 
She does so by reading the plugins documentation.
Some plugins might try to help the human administrator in this task (for instance a plugin like [Light_Kit_Admin](https://github.com/lingtalfi/Light_Kit_Admin) is in a good position to provide such help). 


During the application life, we provide access to the options for a given group.

Plugins react to some options, that's all they do.

Note that we purposely didn't allow options override at the user level; instead you need to create a user group (even if that group contains only one user), that's part of our design.
We did this to make things conceptually simpler to understand.
 
That's also the reason why we didn't put the value of the options in the **user_group_has_plugin_option** table, because we wanted to make it clearer that plugins provide their own options and values.
With this design, it's clear that the intent is that plugin keep control over the possible options they provide.

Maybe one drawback of this design is that we will have to use tricks, should a plugin provide an option with an infinite number of possible values, but
we don't think this will happen.


Again, it's important that each group is bound to its own unique set of options, otherwise it defeats the purpose of a group as we implemented it.
If it helps, you can think of a group as an existing use case for an user: if the user needs a certain set of options, a group needs to be created,
and a given group is only created once.
 
 


Plugin author memo
---------------

If you're a plugin author, our recommendation/suggestion is:

- if you create an entry in plugin_option:
    - bind it to all existing user groups upon installation
    - listen to the [Ling.Light_Database.on_lud_user_group_create](https://github.com/lingtalfi/Light_Database/blob/master/personal/mydoc/pages/events.md) event and bind it then too
- if you create data in the user.extra column:
    - bind it to all existing users upon installation
    - listen to the **Ling.Light_UserDatabase.on_new_user_before** event and bind it then too


    


The user extra column
---------------
2019-12-17

Plugins can also add user related information to the user **extra** column.

The promise of this column is that the information it contains will be stored in the php session, making it faster to access than
information stored in the database.


Now to store the data in the extra field of the **user** table, plugins can use this event of ours:

- Ling.Light_UserDatabase.on_new_user_before

See more about this events in [our events page](https://github.com/lingtalfi/Light_UserDatabase/blob/master/personal/mydoc/pages/events.md).


Note: also for consistency, a plugin that use this extra column will have to update the user table to inject all its extra data upon installation. 





 
 
Records created by our plugin
-----------
2019-12-17


When our plugin is installed, it creates the following:

- the "default" user group
- the "root" user (with group default)
- the "root" permission group
- the "*" permission
- bind "*" permission to "root" permission group
- bind "root" user to "root" permission group


Plugin who wants to create new users can rely on the fact that a group named "default" will always be available (i.e. that group
should never be deleted).



