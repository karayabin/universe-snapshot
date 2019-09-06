User
======
2019-08-07



In light kit admin, we use the **WebsiteLightUser** user class to represent our user.
And a MysqlLightWebsiteUserDatabase instance for the **user_database** service.

 


For more information:

- [the website user class](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/WebsiteLightUser.md)
- [the website user database class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/MysqlLightWebsiteUserDatabase.md)


Rights
---------

The available rights for an user are the following:


- Light_Kit_Admin.user 
- Light_Kit_Admin.admin


Where basically the admin right can administrate/manage other users, whereas
the regular user right can't.







