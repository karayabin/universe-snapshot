Light_UserManager
===========
2019-05-10 -> 2020-03-26



A [Light](https://github.com/lingtalfi/Light) service which always return your user instance.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_UserManager
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_UserManager api](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/api/Ling/Light_UserManager.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- Pages
    - [Conception](https://github.com/lingtalfi/Light_UserManager/blob/master/doc/pages/conception.md)
- [Examples](#examples)
    - [The simplest user manager](#the-simplest-user-manager)



Examples
=============



The simplest user manager
--------------

This user manager only returns one user (the [adam user](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/AdamLightUser.md)).

Use this for rapid development. 

Below is the service configuration for such an user manager.


```yaml
user_manager:
    instance: Ling\Light_UserManager\UserManager\DevUserManager
    methods:
        setUser:
            user:
                instance: Ling\Light_User\AdamLightUser
```
                
                
Related
=========
- [Light_User](https://github.com/lingtalfi/Light_User/), an user representation for the Light framework 
- [Light_UserDatabase](https://github.com/lingtalfi/Light_UserDatabase), an user database for the Light framework 



History Log
=============

- 1.5.0 -- 2020-03-26

    - adapt change from Light_User 1.6.5
    
- 1.4.0 -- 2019-12-20

    - add LightUserManagerInterface->destroyUser method
    
- 1.3.0 -- 2019-12-18

    - add LightUserManagerService class
    
- 1.2.1 -- 2019-07-19

    - update documentation, add related section
    
- 1.2.0 -- 2019-07-18

    - add WebsiteUserManager.setUserOnce method
    
- 1.1.1 -- 2019-07-18

    - update docTools documentation, add links to source code for classes and methods
    
- 1.1.0 -- 2019-07-13

    - add WebsiteUserManager class
    
- 1.0.0 -- 2019-05-10

    - initial commit