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
with a database on every page.  
 
Note that in this design, the permission group is just like a blue print, like a php class would be the blue print for an instance if you will.

Now with this design, it's very easy to see how an admin can manage user profiles.

A user profile is nothing more than a **permission group**.


In terms of database, we have this:

- lud_user  (lud stands for Light_UserDatabase, which is the plugin responsible for handling the user table)

- lud_user_has_permission_group 
- lud_permission_group 
- lud_permission_group_has_permission
- lud_permission
 
 
![Light user database schema](https://lingtalfi.com/img/universe/Light_UserDatabase/light-user-database.png) 
 
In terms of plugins design, during the initialization phase (see the [initializer service](https://github.com/lingtalfi/Light_Initializer/) for more details)
the plugins add their rights to the **lud_permission** table if so they want.

They can also create new profiles in the **lud_permission_group** table, and/or manipulate the other tables as well.



As for the implementation, we recommend that plugins profiles start with the plugin name, followed by a dot,
followed by the profile name.

For instance: PluginA.general_profile.
 


 
 
The root profile 
----------------

The name "root" is reserved for the root profile.
The root profile has one implicit right: "*" (which is also reserved and means everything is allowed).  