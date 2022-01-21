[Back to the Ling/Light_It4Tools api](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools.md)<br>
[Back to the Ling\Light_It4Tools\Service\LightIt4ToolsService class](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Service/LightIt4ToolsService.md)


LightIt4ToolsService::getDatabaseInfoService
================



LightIt4ToolsService::getDatabaseInfoService — Returns a database info service, prepared for it4 2021 structure (db schema without foreign keys).




Description
================


public [LightIt4ToolsService::getDatabaseInfoService](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Service/LightIt4ToolsService/getDatabaseInfoService.md)(?array $options = []) : [It42021LightDatabaseInfoService](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Light_DatabaseInfo/It42021LightDatabaseInfoService.md)




Returns a database info service, prepared for it4 2021 structure (db schema without foreign keys).

Available options are:
- dbKeysRootDir: string, the root dir of the dbKeys system.




Parameters
================


- options

    


Return values
================

Returns [It42021LightDatabaseInfoService](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Light_DatabaseInfo/It42021LightDatabaseInfoService.md).


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightIt4ToolsService::getDatabaseInfoService](https://github.com/lingtalfi/Light_It4Tools/blob/master/Service/LightIt4ToolsService.php#L137-L154)


See Also
================

The [LightIt4ToolsService](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Service/LightIt4ToolsService.md) class.

Previous method: [getDatabaseParser](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Service/LightIt4ToolsService/getDatabaseParser.md)<br>Next method: [error](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Service/LightIt4ToolsService/error.md)<br>

