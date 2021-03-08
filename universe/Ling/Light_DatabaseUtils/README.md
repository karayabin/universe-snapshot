Light_DatabaseUtils
===========
2019-10-01 -> 2021-03-05



A service providing some database related utilities.


This is a [Light framework plugin](https://github.com/lingtalfi/Light/blob/master/doc/pages/plugin.md).

This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.Light_DatabaseUtils
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/Light_DatabaseUtils
```

Or just download it and place it where you want otherwise.






Summary
===========
- [Light_DatabaseUtils api](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/api/Ling/Light_DatabaseUtils.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [Services](#services)
- [duplicate row conception](https://github.com/lingtalfi/Light_DatabaseUtils/blob/master/doc/pages/duplicate-row.conception.md)
- [Usage examples](#usage-examples)




Services
=========


This plugin provides the following services:

- database_utils (returns a LightDatabaseUtilsService instance)



Here is an example of the service configuration:

```yaml
database_utils:
    instance: Ling\Light_DatabaseUtils\Service\LightDatabaseUtilsService
    methods:
        setContainer:
            container: @container()

```

Usage examples
=============

Example #1: creating a dump of a table
---------

```php
/**
 * @var $dumpUtil LightDatabaseUtilsService
 */
$dumpUtil = $container->get("database_utils");

//$dumpUtil->getDumpUtil()->dumpTable("lud_user", "/tmp");
$dumpUtil->getDumpUtil()->dumpTable("lud_user", "/tmp", [
    "useNullForAutoIncrementedKey" => true,
]);
```

This will create a file which content looks like this:

```sql 
INSERT INTO `lud_user` (`id`, `identifier`, `pseudo`, `password`, `avatar_url`, `extra`) VALUES 
(NULL, 'root', 'root', '$2y$10$wHddULZplQE.529IF6Cg0erKZ3zee33cealjlVR.PfLFSVQGQC5yG', '/plugins/Light_Kit_Admin/img/avatars/root_avatar.png', 'a:0:{}'),
(NULL, 'lka_dude', 'Dude', '$2y$10$zvWUzKqHKr1zUxORRPm5NusyW5BaMq/T5w8dEq0xjcYpCxZLlzkbW', '/plugins/Light_Kit_Admin/img/avatars/user_avatar.png', 'a:0:{}'),
(NULL, 'lka_admin', 'Boss', '$2y$10$DTYX6/Yf26hc8n6sSYpMuu.Mml07HSiURTUROdPwfVVY850pIxR/i', '/plugins/Light_Kit_Admin/img/avatars/lka_admin.png', 'a:0:{}')
;

```




History Log
=============

- 1.1.9 -- 2021-03-05

    - update README.md, add install alternative

- 1.1.8 -- 2021-02-19

    - upgrade dependencies

- 1.1.7 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.1.6 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.1.5 -- 2020-11-24

    - update Light_DatabaseDumpUtility->dumpTable, add ignore and disableFkCheck options
    
- 1.1.4 -- 2020-11-17

    - update RowDuplicator->onInsertAfter method, add reference to the old row and main table
    
- 1.1.3 -- 2020-11-17

    - fix doc link
    
- 1.1.2 -- 2020-11-17

    - add RowDuplicator class
    
- 1.1.1 -- 2020-09-03

    - fix Light_DatabaseDumpUtility->dumpTable not keeping NULL values in some cases
    
- 1.1.0 -- 2019-10-01

    - add Light_DatabaseDumpUtility->dumpTable returnAsString option
    
- 1.0.0 -- 2019-10-01

    - initial commit