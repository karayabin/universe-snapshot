Permissions
==============
2019-10-30


Rights
---------


In light kit admin we have the following profile -> permissions associations:


- Light_Kit_Admin.admin
    - Light_Kit_Admin.admin
    - Light_Kit_Admin.user      
    
- Light_Kit_Admin.user      
    - Light_Kit_Admin.user      


The **user** permission allows access to login and access regular pages of the light kit admin system.

The **admin** includes the **user** permission, and also allows to administrate/manage other users, this include: 

- creating new users
- deleting existing users
- managing the permissions of the users 
- access the user list, and permissions list


Note: if you're not careful, you can delete the root user, so be sure to grant the **admin** permission
to trusted members only.

In fact, in lka the **admin** is as powerful as root, so we recommend that there is only one admin.
We recommend/hope that 3rd party plugins provide their own admin permissions, so that the lka admin can assign them to the users. 
That's how we envision the permissions system with other plugins for now in lka.



### Micro permissions

In Light_Kit_Admin, we use the [micro permission system](https://github.com/lingtalfi/Light_MicroPermission).


For tables, we store our micro-permissions in ${app_dir}/config/data/Light_Kit_Admin/Light_MicroPermission/micro-permissions.byml,
using the [micro-permission notation recommendation for database interaction](https://github.com/lingtalfi/Light_MicroPermission/blob/master/doc/pages/recommended-micropermission-notation.md#database-interaction).

For instance:

```yaml
micro_permissions:
    tables.lud_user.create: Light_Kit_Admin.admin


```

 





More background information: 
- [mermission conception notes](https://github.com/lingtalfi/Light_User/blob/master/doc/pages/permission-conception-notes.md)




