Permissions
==============
2019-10-30 -> 2021-06-16




Prerequisites:

- [micro-permissions](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/pages/conception-notes.md)
- [the basic permission system](https://github.com/lingtalfi/Light_User/blob/master/doc/pages/permission-conception-notes.md)





A reminder of permissions in light
----------
2021-06-16




Light kit admin is based on the [website user](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md), 
which has any number of **permission groups**.

Each **permission group** contains any number of **permissions**.

The **permission** is the thing code is tested against when we want to check if the user is granted a certain privilege.


We can go below that with **micro-permissions**. **Micro-permissions** were created to avoid the "too many permissions" problem.

But in the end, **micro-permissions** resolve to a simple **permission**.


In other words, we just care about **permissions**. The **permission group** and **micro-permissions** are just here to help with organization of **permissions**.


In general, **micro-permissions** are hard-coded an can be changed only by the plugin author, whereas **permissions** and **permissions groups** can be re-assigned by the human
admin via a gui.




light kit admin's permission philosophy
----------
2020-07-27 -> 2021-06-16



In a word, we try to promote and implement [the micro-permissions based system](https://github.com/lingtalfi/TheBar/blob/master/discussions/micro-permissions-based-system.md).





In addition to that, in lka, we provide the following **permission groups**:


- **Ling.Light_Kit_Admin.admin**
- **Ling.Light_Kit_Admin.user**



And the following **permissions**:

- **Ling.Light_Kit_Admin.admin**
- **Ling.Light_Kit_Admin.user**


(yes, they are named the same as the **permission groups**)




The **Ling.Light_Kit_Admin.admin** **permission group** contains the following **permissions**:
- **Ling.Light_Kit_Admin.admin**
- **Ling.Light_Kit_Admin.user**


The **Ling.Light_Kit_Admin.user** **permission group** contains the following **permissions**:
- **Ling.Light_Kit_Admin.user** 



The **Ling.Light_Kit_Admin.admin** permission contains the following **micro-permission**:

- store

This basically means the admin can do whatever he wants with the database.


The **Ling.Light_Kit_Admin.user** permission doesn't contain any micro-permissions. 
This basically means that by default the lka user can't alter the database at all.


To put it simply, database wise, the admin can do everything and the user can do nothing.


That's by default.

    
 
 
Plugin authors, the Light_Kit_Admin permission philosophy
-----------
2020-07-27 -> 2021-06-16



We recommend that lka plugin authors implement the following guidelines for their permission system.


Create two **permissions**:

- **YouGalaxy.Light_Kit_Admin_YourPlugin.admin**
- **YouGalaxy.Light_Kit_Admin_YourPlugin.user**


Then:
- Assign the **YouGalaxy.Light_Kit_Admin_YourPlugin.admin** **permission** to our **Ling.Light_Kit_Admin.admin** **permission group**.
- Assign **YouGalaxy.Light_Kit_Admin_YourPlugin.user** to both our **Ling.Light_Kit_Admin.admin** and **Ling.Light_Kit_Admin.user** **permission groups**.


Then:

- For **YouGalaxy.Light_Kit_Admin_YourPlugin.admin**, add the **store.$table** **micro-permission** for every table your plugin handles. 
- Don't add any **micro-permission** for your **YouGalaxy.Light_Kit_Admin_YourPlugin.user** **permission**. 



That's it.


I believe sticking with those guidelines create a conceptually simple permission system, 
which can be taken advantage of with some tools such as the [developer wizard](https://github.com/lingtalfi/Light_DeveloperWizard) for instance.








 
 

