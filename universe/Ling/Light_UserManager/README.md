Light_UserManager
===========
2019-05-10



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
                
                

History Log
=============

- 1.0.0 -- 2019-05-10

    - initial commit