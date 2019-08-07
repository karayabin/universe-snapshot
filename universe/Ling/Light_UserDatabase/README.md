Light_UserDatabase
===========
2019-07-19



An user database service to use in your [Light](https://github.com/lingtalfi/Light) applications.

This is a [Light framework plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_UserDatabase
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)
- [Related](#related)





Services
=========


This plugin provides the following services:

- user_database


Any data related to an user can be stored in the database, although the primary intent
of this service was just to store the user rights. 




Here is an example of the service configuration file using a database stored in [babyYaml](https://github.com/lingtalfi/BabyYaml) files:

```yaml
user_database:
    instance: Ling\Light_UserDatabase\MysqlLightWebsiteUserDatabase
    methods:
        setPdoWrapper:
            wrapper: @service(database)



# babyYaml configuration example
#user_database:
#    instance: Ling\Light_UserDatabase\BabyYamlLightWebsiteUserDatabase
#    methods:
#        setFile:
#            file: ${app_dir}/config/user_database/database.byml


# --------------------------------------
# hooks
# --------------------------------------
$initializer.methods.setInitializers.initializers:
    - @service(user_database)


```



Related
=========
- [Light_User](https://github.com/lingtalfi/Light_User/), an user representation for the Light framework 
- [Light_UserManager](https://github.com/lingtalfi/Light_UserManager/), a system for managing users in a Light application 





History Log
=============

- 1.4.0 -- 2019-08-07

    - added LightWebsiteUserDatabaseInterface interface
    - moved BabyYamlLightUserDatabase to BabyYamlLightWebsiteUserDatabase
    - moved MysqlLightUserDatabase to MysqlLightWebsiteUserDatabase
    - moved getUserInfo to getUserInfoByCredentials method 
    - add support for PasswordProtector service 
    
- 1.3.0 -- 2019-08-06

    - add MysqlLightUserDatabaseInterface->getUserInfoByIdentifier method

- 1.2.0 -- 2019-07-23

    - update MysqlLightUserDatabase, now also creates a root user along with the user table
    
- 1.1.0 -- 2019-07-23

    - add MysqlLightUserDatabase
    
- 1.0.1 -- 2019-07-19

    - add related sections to the documentation
    
- 1.0.0 -- 2019-07-19

    - initial commit