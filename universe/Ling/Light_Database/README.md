Light_Database
===========
2019-07-22



A database service for the [Light](https://github.com/lingtalfi/Light) framework.

This is a [Light framework plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).



This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_Database
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_Database api](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)





Services
=========


This plugin provides the following services:

- database


The database service provides you access to a configured instance of the [LightDatabasePdoWrapper](https://github.com/lingtalfi/Light_Database/blob/master/doc/api/Ling/Light_Database/LightDatabasePdoWrapper.md), which extends the
[SimplePdoWrapper](https://github.com/lingtalfi/SimplePdoWrapper) class. 



Here is the content of the service configuration file:

```yaml
database:
    instance: Ling\Light_Database\LightDatabasePdoWrapper
    methods:
        init:
            settings: []


# example of settings
#$database.methods.init.settings:
#    pdo_database: my_database
#    pdo_user: my_user
#    pdo_pass: my_pass
#    pdo_options:
#        persistent: true
#        errmode: exception
#        initCommand: SET NAMES 'UTF8'



```










History Log
=============

- 1.0.2 -- 2019-07-23

    - fix typo
    
- 1.0.1 -- 2019-07-22

    - update documentation for docTools
    
- 1.0.0 -- 2019-07-22

    - initial commit