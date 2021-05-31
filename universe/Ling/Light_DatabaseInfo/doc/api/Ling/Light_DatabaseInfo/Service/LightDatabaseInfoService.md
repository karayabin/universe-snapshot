[Back to the Ling/Light_DatabaseInfo api](https://github.com/lingtalfi/Light_DatabaseInfo/blob/master/doc/api/Ling/Light_DatabaseInfo.md)



The LightDatabaseInfoService class
================
2019-09-12 --> 2021-05-31






Introduction
============

The LightDatabaseInfoService class.



Class synopsis
==============


class <span class="pl-k">LightDatabaseInfoService</span>  {

- Properties
    - protected string [$cacheDir](#property-cacheDir) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_DatabaseInfo/blob/master/doc/api/Ling/Light_DatabaseInfo/Service/LightDatabaseInfoService/__construct.md)() : void
    - public [getTableInfo](https://github.com/lingtalfi/Light_DatabaseInfo/blob/master/doc/api/Ling/Light_DatabaseInfo/Service/LightDatabaseInfoService/getTableInfo.md)(string $table, ?string $database = null, ?bool $reload = false) : array
    - public [getTables](https://github.com/lingtalfi/Light_DatabaseInfo/blob/master/doc/api/Ling/Light_DatabaseInfo/Service/LightDatabaseInfoService/getTables.md)(?string $database = null) : array
    - public [getTablesByPrefix](https://github.com/lingtalfi/Light_DatabaseInfo/blob/master/doc/api/Ling/Light_DatabaseInfo/Service/LightDatabaseInfoService/getTablesByPrefix.md)(string $prefix, ?string $database = null) : array
    - public [hasTable](https://github.com/lingtalfi/Light_DatabaseInfo/blob/master/doc/api/Ling/Light_DatabaseInfo/Service/LightDatabaseInfoService/hasTable.md)(string $table, ?string $database = null) : bool
    - public [setCacheDir](https://github.com/lingtalfi/Light_DatabaseInfo/blob/master/doc/api/Ling/Light_DatabaseInfo/Service/LightDatabaseInfoService/setCacheDir.md)(string $cacheDir) : void
    - public [setContainer](https://github.com/lingtalfi/Light_DatabaseInfo/blob/master/doc/api/Ling/Light_DatabaseInfo/Service/LightDatabaseInfoService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - protected [prepareMysqlInfoUtil](https://github.com/lingtalfi/Light_DatabaseInfo/blob/master/doc/api/Ling/Light_DatabaseInfo/Service/LightDatabaseInfoService/prepareMysqlInfoUtil.md)(?string $database = null) : [MysqlInfoUtil](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil.md)

}




Properties
=============

- <span id="property-cacheDir"><b>cacheDir</b></span>

    This property holds the cacheDir for this instance.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [LightDatabaseInfoService::__construct](https://github.com/lingtalfi/Light_DatabaseInfo/blob/master/doc/api/Ling/Light_DatabaseInfo/Service/LightDatabaseInfoService/__construct.md) &ndash; Builds the LightDatabaseInfoService instance.
- [LightDatabaseInfoService::getTableInfo](https://github.com/lingtalfi/Light_DatabaseInfo/blob/master/doc/api/Ling/Light_DatabaseInfo/Service/LightDatabaseInfoService/getTableInfo.md) &ndash; Returns the info array for the given table.
- [LightDatabaseInfoService::getTables](https://github.com/lingtalfi/Light_DatabaseInfo/blob/master/doc/api/Ling/Light_DatabaseInfo/Service/LightDatabaseInfoService/getTables.md) &ndash; Returns the array of tables for the given database.
- [LightDatabaseInfoService::getTablesByPrefix](https://github.com/lingtalfi/Light_DatabaseInfo/blob/master/doc/api/Ling/Light_DatabaseInfo/Service/LightDatabaseInfoService/getTablesByPrefix.md) &ndash; Returns the array of tables which prefix match the given prefix.
- [LightDatabaseInfoService::hasTable](https://github.com/lingtalfi/Light_DatabaseInfo/blob/master/doc/api/Ling/Light_DatabaseInfo/Service/LightDatabaseInfoService/hasTable.md) &ndash; Returns whether the given database contains the given table.
- [LightDatabaseInfoService::setCacheDir](https://github.com/lingtalfi/Light_DatabaseInfo/blob/master/doc/api/Ling/Light_DatabaseInfo/Service/LightDatabaseInfoService/setCacheDir.md) &ndash; Sets the cacheDir.
- [LightDatabaseInfoService::setContainer](https://github.com/lingtalfi/Light_DatabaseInfo/blob/master/doc/api/Ling/Light_DatabaseInfo/Service/LightDatabaseInfoService/setContainer.md) &ndash; Sets the container.
- [LightDatabaseInfoService::prepareMysqlInfoUtil](https://github.com/lingtalfi/Light_DatabaseInfo/blob/master/doc/api/Ling/Light_DatabaseInfo/Service/LightDatabaseInfoService/prepareMysqlInfoUtil.md) &ndash; and changes the database if the database is specified.





Location
=============
Ling\Light_DatabaseInfo\Service\LightDatabaseInfoService<br>
See the source code of [Ling\Light_DatabaseInfo\Service\LightDatabaseInfoService](https://github.com/lingtalfi/Light_DatabaseInfo/blob/master/Service/LightDatabaseInfoService.php)



