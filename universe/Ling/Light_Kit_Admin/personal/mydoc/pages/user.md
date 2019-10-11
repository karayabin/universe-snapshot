User
======
2019-08-07



In light kit admin, we use the **WebsiteLightUser** user class to represent our user.
And a MysqlLightWebsiteUserDatabase instance for the **user_database** service.

We provide two users:


- user
    - identifier: lka_dude
    - pseudo: Dude
    - password: dude
    
- admin
    - identifier: lka_admin
    - pseudo: Boss
    - password: boss



Their avatar urls have been taken from: https://pickaface.net/


For more information:

- [the website user class](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser.md)
- [the website user database class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase.md)


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


### Micro permissions

In Light_Kit_Admin, we use the [micro permission system](https://github.com/lingtalfi/Light_MicroPermission).


For tables, we try to keep all micro-permissions (mp) related to tables within the **tables** namespace,
and we try to stick with four rights: create, read, update, delete (CRUD).

So far, we store our micro-permissions in ${app_dir}/config/data/Light_Kit_Admin/Light_MicroPermission/micro-permissions.byml:

```yaml
micro_permissions:
    Light_Kit_Admin.tables.lud_user.create: Light_Kit_Admin.admin


```

 





More background information: 
- [mermission conception notes](https://github.com/lingtalfi/Light_User/blob/master/doc/pages/permission-conception-notes.md)




