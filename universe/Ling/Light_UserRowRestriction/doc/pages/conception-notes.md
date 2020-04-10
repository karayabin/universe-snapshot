Light_UserRowRestriction, conception notes
==========
2020-02-28 -> 2020-03-09


This is a simple implementation of a defense mechanism to the [database-identity-usurpation](https://github.com/lingtalfi/TheBar/blob/master/discussions/database-identity-usurpation.md) problem.

Our service basically implements the guidelines suggested in the ["A possible defense mechanism in light" section](https://github.com/lingtalfi/TheBar/blob/master/discussions/database-identity-usurpation.md#a-possible-defense-mechanism-in-light).




 
 
Overview
---------
The user row restriction system is based on the [user permissions](https://github.com/lingtalfi/Light_User/blob/master/doc/pages/permission-conception-notes.md).
It basically decides whether a user is allowed to perform a crud action (create, read, update or delete), based on the permission she has.


This is basically complementary idea to the [light micropermission plugin](https://github.com/lingtalfi/Light_MicroPermission/).
See more details about how to use both together in "the micro permission and row restriction" section below in this document.


With our service, the row restriction checking operates only when a database interaction is triggered. 

In order to do so, we've teamed up with the [Light_Database](https://github.com/lingtalfi/Light_Database) plugin authors to provide you with two sets of methods,
the ones that you already know and love from the light database:

- fetch
- fetchAll
- insert
- update
- replace
- delete

Those methods don't trigger the row restriction checking.

But the following set of methods does, those methods are prefixed with the p letter (as in protection):


- pfetch
- pfetchAll
- pinsert
- pupdate
- preplace
- pdelete


Why two sets of methods?

That's because sometimes you need to override the rules you've created. Typically, rules are for ruling the gui users, but for plugin authors,
we generally don't need rules because we know what we are doing, and so rules can get in the way. 

In fact, in my project at least it seems that most of the time I do code that do not need those user restrictions, and 
that's why the default methods don't trigger row restriction checkings.


The RowRestrictionViolationException
---------
2020-03-06

Our service features the **checkRestrictions** method, which do the checking and throws a **RowRestrictionViolationException** exception
if the user is not granted the permission she wants to benefit from.









The micro permission and row restriction together
-----------------
2020-03-09


At first, my intent with the **row restriction** plugin was to completely override the **micropermission** plugin, but then I realized
we have more flexibility when they both work together.

Let's compare them and understand how they are complementary.


First, there is a difference in how the services are called, the **micropermission** service can be called from anywhere, whereas
the **row restriction** service is only triggered when a special interaction with the database is called. By **special** I mean it has to be a call to
one of those special methods, provided by the [LightDatabasePdoWrapper](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper.md) class,
which starts with the **p** prefix.
Because of this limitation from the **row restriction** plugin, it's generally easier and faster to use the **micropermission** plugin.

For instance, if we create a list with some actions bound to it, such as **delete selected rows**, we might want to display the action button only if the user has the permission to 
delete in the relevant table. In order to get this information (whether the user is allowed to do so), we can only use the **micropermission** plugin to do so.
We could not use the **row restriction** plugin, because we would need to make a query in order to get any information from the **row restriction** plugin (remember, the row restriction
plugin is only triggered along with a special database interaction...), which would be very impractical.


In fact, I've come to the conclusion that the **micropermission** should be used everywhere, except for one case: when the user wants to interact with rows that she owns, and that's where
the **row restriction** service comes handy.

That's the second main difference between the two plugins, the **micropermission** is not aware of whom a row belongs to, whereas the **row restriction** plugin is aware of that.
And so, when the **micropermission** plugin falls short, we can fallback to using the **row restriction** plugin to make a better decision as to whether the user has the right to interact
with the row she wants to interact with.


Again, in other words use the **micro permission** plugin all the time, unless you need to check whether the row belongs to the user, in which case use the **row restriction** service.



Note about the micro-permission system
-------------
2020-03-09


Also, some plugins rely on the [recommended micropermission notation for database](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/pages/recommended-micropermission-notation.md),
which is a convention that makes it faster to implement a micropermission covered system.

But it doesn't mean a plugin cannot create its own micropermissions.

Using this convention all the time tends to make us forget that micropermission granting might depend on a context.

So using the convention works when the tools that use it use a general context: it will suit general tools, like things created by an auto-admin generator for instance.
 
But remember that a plugin can create its own micropermissions, so for instance the plugin **Light_ABC** could create the following micropermission:

- Light_ABC.tables.table_x.read


Instead of the more anynomous:

- tables.table_x.read (which comes from the recommended micropermission notation for database)


The micropermission system is really flexible, and the plugin author imagination is the limit.

- Light_ABC.fileManager.table_x.read
- Light_ABC.page4.table_x.read
- Light_ABC.contextXYZ.table_x.delete

Remember that all those are possible micropermissions that plugin can create in order to cover the user's permissions.










 








