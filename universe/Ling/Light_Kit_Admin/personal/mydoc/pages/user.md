User
======
2019-08-07



In light kit admin, we use the **WebsiteLightUser** user class to represent our user.
And a MysqlLightWebsiteUserDatabase instance for the **user_database** service.

We provide a default user, with the following properties:

- identifier: lka_dude
- pseudo: Dude
- password: dude

 


For more information:

- [the website user class](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser.md)
- [the website user database class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase.md)


Rights
---------

The available rights for an user are the following:


- Light_Kit_Admin.user      
- Light_Kit_Admin.admin


The **user** right represents the rights for a basic use of the light kit admin gui, so basically the person who owns this right
is like a regular administrator.

The **admin** right is required to administrate/manage other users. Only super-administrator have it.



More background information: 
- [mermission conception notes](https://github.com/lingtalfi/Light_User/blob/master/doc/pages/permission-conception-notes.md)




