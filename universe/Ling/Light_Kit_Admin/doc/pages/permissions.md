Permissions
==============
2019-10-30 -> 2020-08-21




In **Light_Kit_Admin** (lka), the permission system is based on [micro-permissions profiles](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/pages/conception-notes.md#micro-permission-profiles).


We provide the following [permission groups](https://github.com/lingtalfi/Light_User/blob/master/doc/pages/permission-conception-notes.md):

- **Light_Kit_Admin.admin**
- **Light_Kit_Admin.user**


The **Light_Kit_Admin.admin** permission group contains the following [permissions](https://github.com/lingtalfi/Light_User/blob/master/doc/pages/permission-conception-notes.md):

- Light_Kit_Admin.admin
- Light_Kit_Admin.user 

Note: yes, there is a **Light_Kit_Admin.admin** permission, and a **Light_Kit_Admin.admin** permission group. They are different things, although they have a similar name.


The **Light_Kit_Admin.user** permission group contains the following permissions:
- Light_Kit_Admin.user 



The **Light_Kit_Admin.admin** permission contains the following micro-permissions:

- store

Which basically means the admin can do whatever he wants with the database.


The **Light_Kit_Admin.user** permission doesn't contain any micro-permissions. 
This basically means that by default the lka user can't alter the database.

    
 
 
Plugin authors, the Light_Kit_Admin permission philosophy
-----------
2020-07-27 -> 2020-08-21


We recommend that plugin authors implement the following guidelines as their permission system.


First, use the lka permission groups at your advantage. So if your plugin only needs a super-admin, you're already covered,
just connect as any user which owns the **Light_Kit_Admin.admin** permission group, as this permission group is allowed to alter anything in the database.


Secondly, let the admin do their job. The main idea being that we don't know in advance the needs of an admin.
We can provide them with some basic tools though.  


Create two permissions:

- Light_Kit_Admin_YourPlugin.admin
- Light_Kit_Admin_YourPlugin.user


Assign **Light_Kit_Admin_YourPlugin.admin** to our **Light_Kit_Admin.admin** permission group,
and assign **Light_Kit_Admin_YourPlugin.user** to both our **Light_Kit_Admin.admin** and **Light_Kit_Admin.user** permission groups.


Then, let the admin create for himself the relationships he needs.

So for instance, the admin wants to create a permission group which lets the user administrate plugin ABC and plugin DEF, but not plugin GHI,
but that's the admin problem not yours (we, as plugin authors) just provide the **permissions** for the admin to play with.



Now of course having only two permissions might not cover all the use cases, and occasionally you might need to create a new permission profile (i.e. a **permission** and its related **micro-permission profile**).

For the main part though, we recommend stick with this game plan.


Remember that everytime you create a new permission, you provide one more option for the admin, and as you might already know, having too many options is not always a good idea, as it can confuse the user (i.e. the admin in this case).
 
 

 







 
 



Related
---------

More background information: 
- [permission conception notes](https://github.com/lingtalfi/Light_User/blob/master/doc/pages/permission-conception-notes.md)




