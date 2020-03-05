Light Permission, conception notes
=========================
2019-09-09




With the current "right" system, defined by the Light_User, the admin doesn't have the option to create a new user profile
and assign the "rights" that she wants through a gui interface.

So, that was a conception error, my bad.

With this new system, named permissions, I'll address this issue.

The **permissions** system supersedes the as of now deprecated "rights" system.





What's the main idea of the permissions system
---------------------

The idea is very simple.

We have **user(s)**.

Each **user** belongs to zero, one or more **permission group**.


Each **permission group** contains zero, one or more **permission(s)**.


In terms of implementation, when the user connects to his account (aka when she logs in),
all the **permissions** are stored in the user session. That's a personal choice, because I didn't want to communicate 
with a database on every page to check for the user permissions.  
 
Now with this design, it's very easy to see how an admin can manage user profiles.

A user profile is nothing more than a **permission group**.


In terms of database, we have this:

- lud_user  (lud stands for [Light_UserDatabase](https://github.com/lingtalfi/Light_UserDatabase), which is the plugin responsible for handling the user table)
- lud_user_has_permission_group 
- lud_permission_group 
- lud_permission_group_has_permission
- lud_permission
 
 
![Light user database schema](https://lingtalfi.com/img/universe/Light_UserDatabase/light-user-database.png) 
 
 
 
Plugins
-----------
 
In terms of plugins design, during the initialization phase of the [Light instance](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md), 
plugins can add their **permission groups** and **permissions**.


As for the naming convention, we recommend that plugins **permission groups** and/or **permissions** start with the plugin name, followed by a dot,
followed by the permission group name and/or the permission name.

For instance: 

- PluginA.general_profile
- Light_Kit_Admin.lka_dude
- Light_Kit_Admin.lka_admin
 


 
 
The root profile 
----------------

The name "root" is reserved for the root profile.
The root profile has one implicit right: "*" (which is also reserved and means everything is allowed).  