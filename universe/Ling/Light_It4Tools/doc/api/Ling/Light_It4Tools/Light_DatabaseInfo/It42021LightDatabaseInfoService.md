[Back to the Ling/Light_It4Tools api](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools.md)



The It42021LightDatabaseInfoService class
================
2021-12-01 --> 2022-01-20






Introduction
============

The It42021LightDatabaseInfoService class.



Class synopsis
==============


class <span class="pl-k">It42021LightDatabaseInfoService</span> extends [LightDatabaseInfoService](https://github.com/lingtalfi/Light_DatabaseInfo/blob/master/doc/api/Ling/Light_DatabaseInfo/Service/LightDatabaseInfoService.md)  {

- Properties
    - private string|null [$dbKeysRootDir](#property-dbKeysRootDir) ;

- Inherited properties
    - protected string [LightDatabaseInfoService::$cacheDir](#property-cacheDir) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightDatabaseInfoService::$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Light_DatabaseInfo/It42021LightDatabaseInfoService/__construct.md)() : void
    - public [getDbKeysRootDir](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Light_DatabaseInfo/It42021LightDatabaseInfoService/getDbKeysRootDir.md)() : string
    - public [setDbKeysRootDir](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Light_DatabaseInfo/It42021LightDatabaseInfoService/setDbKeysRootDir.md)(string $dbKeysRootDir) : void
    - protected [prepareMysqlInfoUtil](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Light_DatabaseInfo/It42021LightDatabaseInfoService/prepareMysqlInfoUtil.md)(?string $database = null) : [MysqlInfoUtil](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/MysqlInfoUtil.md)

- Inherited methods
    - public LightDatabaseInfoService::getTableInfo(string $table, ?string $database = null, ?bool $reload = false) : array
    - public LightDatabaseInfoService::getTables(?string $database = null) : array
    - public LightDatabaseInfoService::getTablesByPrefix(string $prefix, ?string $database = null) : array
    - public LightDatabaseInfoService::hasTable(string $table, ?string $database = null) : bool
    - public LightDatabaseInfoService::setCacheDir(string $cacheDir) : void
    - public LightDatabaseInfoService::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}




Properties
=============

- <span id="property-dbKeysRootDir"><b>dbKeysRootDir</b></span>

    The root dir of the dbKeys system of this planet.
    
    

- <span id="property-cacheDir"><b>cacheDir</b></span>

    This property holds the cacheDir for this instance.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [It42021LightDatabaseInfoService::__construct](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Light_DatabaseInfo/It42021LightDatabaseInfoService/__construct.md) &ndash; Builds the It42021LightDatabaseInfoService instance.
- [It42021LightDatabaseInfoService::getDbKeysRootDir](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Light_DatabaseInfo/It42021LightDatabaseInfoService/getDbKeysRootDir.md) &ndash; Returns the dbKeysRootDir of this instance.
- [It42021LightDatabaseInfoService::setDbKeysRootDir](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Light_DatabaseInfo/It42021LightDatabaseInfoService/setDbKeysRootDir.md) &ndash; Sets the dbKeysRootDir.
- [It42021LightDatabaseInfoService::prepareMysqlInfoUtil](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Light_DatabaseInfo/It42021LightDatabaseInfoService/prepareMysqlInfoUtil.md) &ndash; and changes the database if the database is specified.
- LightDatabaseInfoService::getTableInfo &ndash; Returns the info array for the given table.
- LightDatabaseInfoService::getTables &ndash; Returns the array of tables for the given database.
- LightDatabaseInfoService::getTablesByPrefix &ndash; Returns the array of tables which prefix match the given prefix.
- LightDatabaseInfoService::hasTable &ndash; Returns whether the given database contains the given table.
- LightDatabaseInfoService::setCacheDir &ndash; Sets the cacheDir.
- LightDatabaseInfoService::setContainer &ndash; Sets the container.





Location
=============
Ling\Light_It4Tools\Light_DatabaseInfo\It42021LightDatabaseInfoService<br>
See the source code of [Ling\Light_It4Tools\Light_DatabaseInfo\It42021LightDatabaseInfoService](https://github.com/lingtalfi/Light_It4Tools/blob/master/Light_DatabaseInfo/It42021LightDatabaseInfoService.php)



SeeAlso
==============
Previous class: [It4FileParserTool](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/File/It4FileParserTool.md)<br>Next class: [LightIt4ToolsService](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Service/LightIt4ToolsService.md)<br>
