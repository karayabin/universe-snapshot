Permissions
==============
2019-10-30 -> 2020-07-27


Rights
---------
2019-10-30 -> 2020-07-27


In light kit admin we have the following profile -> permissions associations:


- Light_Kit_Admin.admin
    - Light_Kit_Admin.admin
    - Light_Kit_Admin.user      
    
- Light_Kit_Admin.user      
    - Light_Kit_Admin.user      


The **user** permission allows access to login and access regular pages of the light kit admin system.

The **admin** includes the **user** permission, it also allows you to administrate/manage other users, this includes: 

- creating new users
- deleting existing users
- managing the permissions of the users 
- access the user list, and permissions list


Note: if you're not careful, you can delete the root user, so be sure to grant the **admin** permission
to trusted members only.


In fact, in lka the **admin** is as powerful as root, so we recommend that there is only one admin.
We recommend/hope that 3rd party plugins provide their own admin permissions, so that the lka admin can assign them to the users. 
That's how we envision the permissions system with other plugins for now in lka.



Micro permissions
------------
2019-10-30 

In Light_Kit_Admin, we use the [micro permission system](https://github.com/lingtalfi/Light_MicroPermission).


For tables, we store our micro-permissions in ${app_dir}/config/data/Light_Kit_Admin/Light_MicroPermission/micro-permissions.byml,
using the [micro-permission notation recommendation for database interaction](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/pages/recommended-micropermission-notation.md#database-interaction).

For instance:

```yaml
micro_permissions:
    tables.lud_user.create: Light_Kit_Admin.admin


```

 
 
Plugin authors, the Light_Kit_Admin permission philosophy
-----------
2020-07-27

TLDR: Plugin authors, create **permissions**, but don't create **permission groups**, let the admin create them if he needs them.




Nothing is more valuable for a developer than the global vision of a system; and so in this section we discuss the global vision
that plugin authors should bear in mind while creating their lka plugins.


Remember that the light permission system is based on two main things:

- permissions  
- permission groups

The users are assigned to **permission groups** only, and the **permission groups** contains the **permissions**.


With lka, we give you the two main permission groups:

- Light_Kit_Admin.admin
- Light_Kit_Admin.user


Those act like two poles/paradigm which generally fits any plugin's philosophy, where you have a privileged user (the admin)
which can edit anything, and the basic user which can't edit anything, but can use the plugin's front end if any.

For multiple reasons, we recommend that lka plugin authors don't create their own **permission groups**, but create two **permissions** instead (if that correspond to their philosophy):

- AuthorXXXPlugin.user
- AuthorXXXPlugin.admin
 
The plugin author should assign his "user" **permission** to our **Light_Kit_Admin.user** **permission group**, and similarly assign his "admin" **permission** to our **Light_Kit_Admin.admin** **permission group**.


The global vision is that we generally have only two **permission groups**, no matter how many lka plugins the user has.

That's a good thing, because:

- the whole system is easier to understand, and therefore to manage (i.e. the administrator will be more efficient)  
 
 
 
Now while plugin authors don't create **permission groups**, the application administrator can, and will whenever necessary, 
but it's a casual event more than a common one.

From the admin's point of view, everything by default (at least everything that follows our philosophy) will follow our two permission groups:

- it's either attached to the (lka) admin group 
- or it's attached to the (lka) user group 


Simple enough for the admin to understand.
Now if the admin wants to create a special user which has admin permissions for one or more plugin(s) in particular, that's when the admin will need to create a new **permission group**,
which name HE decides (i.e. less work for the plugin author), and he will assign the **permissions** (provided by the plugin this time) he wants to this new **permission group**.

So basically, we let admins do the work when they need it, because that's what an admin will want to do.

If plugin authors started to create their permission groups, the admin might be confused, as he will have more choice (but that's still a possibility).



So, to recap, here is what lka plugin authors should do in regard to permissions:

- create two **permissions** (XXX.admin and XXX.user), and assign them to our **permission groups** (Light_Kit_Admin.admin and Light_Kit_Admin.user)




Note: XXX shall be replaced with the planet name of the plugin.



 







 
 



Related
---------

More background information: 
- [mermission conception notes](https://github.com/lingtalfi/Light_User/blob/master/doc/pages/permission-conception-notes.md)




