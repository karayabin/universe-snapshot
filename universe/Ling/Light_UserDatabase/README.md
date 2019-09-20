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
- Pages
    - [Conception notes](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/pages/conception-notes.md) 
- [Services](#services)
- [Related](#related)





Services
=========


This plugin provides the following services:

- user_database         (returns LightWebsiteUserDatabaseInterface)


Any data related to an user can be stored in the database, although the primary intent
of this service was just to store the user rights. 




Here is an example of the service configuration file using a database stored in [babyYaml](https://github.com/lingtalfi/BabyYaml) files:

```yaml
user_database:
    instance: Ling\Light_UserDatabase\MysqlLightWebsiteUserDatabase
    methods:
        setContainer:
            container: @container()


user_database_vars:
    bullsheeterAvatarImgDir: /overrideme


# babyYaml configuration example
#user_database:
#    instance: Ling\Light_UserDatabase\BabyYamlLightWebsiteUserDatabase
#    methods:
#        setFile:
#            file: ${app_dir}/config/data/Light_UserDatabase/database.byml


# --------------------------------------
# hooks
# --------------------------------------
$initializer.methods_collection:
    -
        method: registerInitializer
        args:
            initializer: @service(user_database)
            slot: install


$bullsheet.methods_collection:
    -
        method: registerBullsheeter
        args:
            identifier: Light_UserDatabase.lud_user
            bullsheeter:
                instance: Ling\Light_UserDatabase\Bullsheet\LightWebsiteUserDatabaseBullsheeter
                methods:
                    setApplicationDir:
                        dir: ${app_dir}
                    setAvatarImgDir:
                        dir: ${user_database_vars.bullsheeterAvatarImgDir}

$plugin_database_installer.methods_collection:
    -
        method: registerInstaller
        args:
            plugin: Light_UserDatabase
            installer:
                -
                    - @service(user_database)
                    - installDatabase
                -
                    - @service(user_database)
                    - uninstallDatabase
```



Related
=========
- [Light_User](https://github.com/lingtalfi/Light_User/), an user representation for the Light framework 
- [Light_UserManager](https://github.com/lingtalfi/Light_UserManager/), a system for managing users in a Light application 
 





History Log
=============

- 1.11.8 -- 2019-09-18

    - fix MysqlLightWebsiteUserDatabase->installDatabase updating user instead of inserting user
    
- 1.11.8 -- 2019-09-18

    - fix careless implementation errors
    
- 1.11.7 -- 2019-09-17

    - fix tables not having unique indexes
    
- 1.11.6 -- 2019-09-17

    - add another comment in conception notes
    
- 1.11.5 -- 2019-09-17

    - add comment in conception notes
    
- 1.11.4 -- 2019-09-17

    - update LightWebsiteUserDatabaseInterface->addUser now returns an int
    
- 1.11.3 -- 2019-09-17

    - add comment in README.md
    
- 1.11.2 -- 2019-09-17

    - fix MysqlLightWebsiteUserDatabase->uninstallDatabase not uninstalling all tables

- 1.11.1 -- 2019-09-17

    - fix doc links
    
- 1.11.0 -- 2019-09-17

    - add careless implementation of new permissions system
    
- 1.10.0 -- 2019-09-11

    - now implements permissions
    - updated LightUserDatabaseInterface->getUserInfoByCredentials, now returns the rights
    
- 1.9.1 -- 2019-09-11

    - fix last point not implemented
    
- 1.9.0 -- 2019-09-11

    - update service instantiation to accommodate the new initializer interface

- 1.8.1 -- 2019-08-14

    - fix typo in LightWebsiteUserDatabaseBullsheeter->generateRows 
    
- 1.8.0 -- 2019-08-14

    - remove LightWebsiteUserDatabaseInterface->getTable 
    - fix doc 
    
- 1.7.0 -- 2019-08-14

    - add LightWebsiteUserDatabaseBullsheeter 
    
- 1.6.0 -- 2019-08-14

    - add LightWebsiteUserDatabaseInterface->getTable
    
- 1.5.0 -- 2019-08-13

    - change user table to lud_user
    
- 1.4.1 -- 2019-08-13

    - change location of babyYaml configuration data

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