Light_UserDatabase
===========
2019-07-19 -> 2020-07-21



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
    - [Schema conception notes](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/pages/schema-conception-notes.md) 
    - [Events](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/pages/events.md) 
- [Services](#services)
- [Related](#related)





Services
=========


This plugin provides the following services:

- user_database         (returns LightUserDatabaseService)


Any data related to an user can be stored in the database, although the primary intent
of this service was just to store the user rights. 




Here is an example of the service configuration file using a database stored in [babyYaml](https://github.com/lingtalfi/BabyYaml) files:

```yaml
user_database:
    instance: Ling\Light_UserDatabase\Service\LightUserDatabaseService
    methods:
        setContainer:
            container: @container()


user_database_vars:
    bullsheeter_avatar_img_dir: /overrideme


# babyYaml configuration example
#user_database:
#    instance: Ling\Light_UserDatabase\BabyYamlLightWebsiteUserDatabase
#    methods:
#        setFile:
#            file: ${app_dir}/config/data/Light_UserDatabase/database.byml
#        setContainer:
#            container: @container()

# --------------------------------------
# hooks
# --------------------------------------
$breeze_generator.methods_collection:
    -
        method: addConfigurationEntryByFile
        args:
            key: lud
            file: ${app_dir}/config/data/Light_UserDatabase/Light_BreezeGenerator/lud.byml


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
                        dir: ${user_database_vars.bullsheeter_avatar_img_dir}

$events.methods_collection:
    -
        method: registerListener
        args:
            events: Light.initialize_1
            listener:
                instance: @service(user_database)
                callable_method: initialize





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



#$user_row_ownership.methods_collection:
#    -
#        method: registerRowInspector
#        args:
#            inspector:
#                instance: Ling\Light_UserDatabase\UserRowOwnership\LightUserDatabaseRowInspector
#                methods:
#                    setHandledTablesFile:
#                        file: ${app_dir}/config/data/Light_UserDatabase/Light_UserRowOwnership/handled_tables.byml
```



Related
=========
- [Light_User](https://github.com/lingtalfi/Light_User/), an user representation for the Light framework 
- [Light_UserManager](https://github.com/lingtalfi/Light_UserManager/), a system for managing users in a Light application 
 





History Log
=============  
    
- 1.31.0 -- 2020-07-21

    - fix outdated api  
    
- 1.30.0 -- 2020-06-25

    - update service to accommodate new Light_PluginInstaller interface  

- 1.29.0 -- 2020-06-07

    - update service, now uses new api generated with LingBreezeGenerator2  

- 1.28.2 -- 2020-03-26

    - adapt for new Light_User 1.6.5  
    
- 1.28.1 -- 2020-03-10

    - update LightWebsiteUserDatabaseBullsheeter to be compliant with new interface declaration  
    
- 1.28.0 -- 2020-02-07

    - add PluginOptionApiInterface->getOptionByCategoryAndUserId method  
    
- 1.27.0 -- 2020-02-07

    - update schema: added lud_plugin_option.category  
    
- 1.26.0 -- 2020-02-07

    - update plugin, now uses the Light_PluginInstaller system 
    
- 1.25.0 -- 2020-02-06

    - update api with new BreezeGenerator organization (new documentation links to whereConds)
    
- 1.24.0 -- 2020-02-05

    - update api with new BreezeGenerator organization (new getObject and getObjects methods)
    
- 1.23.0 -- 2020-02-04

    - update api with new BreezeGenerator organization
    
- 1.22.2 -- 2020-01-31

    - fix schema, forgot to remove lud_plugin_option.plugin as stated in 1.21.0
    
- 1.22.1 -- 2020-01-31

    - fix api insert methods not throwing exceptions when ignoreDuplicate flag is false
    
- 1.22.0 -- 2020-01-31

    - update MysqlLightWebsiteUserDatabase->initialize, now transmits initialize level to plugin_database_installer
    
- 1.21.0 -- 2020-01-31

    - update schema, removed lud_plugin_option.plugin field
    
- 1.20.5 -- 2020-01-31

    - add precision to schema conception notes
    
- 1.20.4 -- 2020-01-31

    - add schema conception notes document
    
- 1.20.3 -- 2019-12-20

    - removed micro-permission automatic checking in MysqlLightWebsiteUserDatabase
    
- 1.20.2 -- 2019-12-20

    - fix MysqlLightWebsiteUserDatabase->getUserInfoByCredentials throwing micro-permission denied exception
    
- 1.20.1 -- 2019-12-19

    - update events page
    
- 1.20.0 -- 2019-12-19

    - add PluginOptionApiInterface->getPluginOptionByName method
    
- 1.19.5 -- 2019-12-19

    - add link in conception notes
    
- 1.19.4 -- 2019-12-19

    - add link to events page in README.md
    
- 1.19.3 -- 2019-12-19

    - add "plugin author memo" section in conception notes
    
- 1.19.2 -- 2019-12-19

    - update MysqlLightWebsiteUserDatabase->installDatabase, now uses micro-permission disable namespace feature

- 1.19.1 -- 2019-12-19

    - restore inadvertently removed UserGroupApiInterface->getUserGroupIdByName method
    
- 1.19.0 -- 2019-12-19

    - update api internal code using new BreezeGenerator
    
- 1.18.1 -- 2019-12-17

    - fix MysqlUserGroupApi->getUserGroupIdByName returning an array instead of string
    
- 1.18.0 -- 2019-12-17

    - add UserGroupApiInterface->getUserGroupIdByName method
    
- 1.17.0 -- 2019-12-17

    - update schema, add user_group and plugin_options tables
    - removed BabyYaml implementation
    
- 1.16.1 -- 2019-12-17

    - fix functional typo in service configuration
    
- 1.16.0 -- 2019-12-17

    - update plugin to accommodate Light 0.50 new initialization system

- 1.15.0 -- 2019-12-16

    - add LightWebsiteUserDatabaseInterface.getAllUserIds method
    
- 1.14.0 -- 2019-12-16

    - add Light_UserDatabase.on_new_user_before event
    
- 1.13.0 -- 2019-12-16

    - add lud_user_options and lud_permission_options tables
    
- 1.12.4 -- 2019-10-30

    - fix missing useMicroPermission implicitly set to true in the breeze configuration
    
- 1.12.3 -- 2019-10-30

    - fix typo

- 1.12.2 -- 2019-10-30

    - update service configuration for breeze generator
    
- 1.12.1 -- 2019-10-04

    - change variable case in service configuration
    
- 1.12.0 -- 2019-10-03

    - add LightUserDatabaseInterface->getAllUserInfo
    
- 1.11.9 -- 2019-09-26

    - fix LightWebsiteUserDatabaseBullsheeter->generateRows generating rights
    
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