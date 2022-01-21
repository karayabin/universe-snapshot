[Back to the Ling/Light_It4Tools api](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools.md)



The LightIt4ToolsService class
================
2021-12-01 --> 2022-01-20






Introduction
============

The LightIt4ToolsService class.



Class synopsis
==============


class <span class="pl-k">LightIt4ToolsService</span>  {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected array [$options](#property-options) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Service/LightIt4ToolsService/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Service/LightIt4ToolsService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setOptions](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Service/LightIt4ToolsService/setOptions.md)(array $options) : void
    - public [getOptions](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Service/LightIt4ToolsService/getOptions.md)() : array
    - public [getOption](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Service/LightIt4ToolsService/getOption.md)(string $key, ?$default = null, ?bool $throwEx = false) : void
    - public [getDatabaseParser](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Service/LightIt4ToolsService/getDatabaseParser.md)() : [It4DbParserTool](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Database/It4DbParserTool.md)
    - public [getDatabaseInfoService](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Service/LightIt4ToolsService/getDatabaseInfoService.md)(?array $options = []) : [It42021LightDatabaseInfoService](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Light_DatabaseInfo/It42021LightDatabaseInfoService.md)
    - private [error](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Service/LightIt4ToolsService/error.md)(string $msg) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-options"><b>options</b></span>

    This property holds the options for this instance.
    
    Available options are:
    
    
    
    See the [Light_It4Tools conception notes](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/pages/conception-notes.md) for more details.
    
    



Methods
==============

- [LightIt4ToolsService::__construct](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Service/LightIt4ToolsService/__construct.md) &ndash; Builds the LightIt4ToolsService instance.
- [LightIt4ToolsService::setContainer](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Service/LightIt4ToolsService/setContainer.md) &ndash; Sets the container.
- [LightIt4ToolsService::setOptions](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Service/LightIt4ToolsService/setOptions.md) &ndash; Sets the options.
- [LightIt4ToolsService::getOptions](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Service/LightIt4ToolsService/getOptions.md) &ndash; Returns the options of this instance.
- [LightIt4ToolsService::getOption](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Service/LightIt4ToolsService/getOption.md) &ndash; Returns the option value corresponding to the given key.
- [LightIt4ToolsService::getDatabaseParser](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Service/LightIt4ToolsService/getDatabaseParser.md) &ndash; Returns the parser tool.
- [LightIt4ToolsService::getDatabaseInfoService](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Service/LightIt4ToolsService/getDatabaseInfoService.md) &ndash; Returns a database info service, prepared for it4 2021 structure (db schema without foreign keys).
- [LightIt4ToolsService::error](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Service/LightIt4ToolsService/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_It4Tools\Service\LightIt4ToolsService<br>
See the source code of [Ling\Light_It4Tools\Service\LightIt4ToolsService](https://github.com/lingtalfi/Light_It4Tools/blob/master/Service/LightIt4ToolsService.php)



SeeAlso
==============
Previous class: [It42021LightDatabaseInfoService](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/Light_DatabaseInfo/It42021LightDatabaseInfoService.md)<br>Next class: [It42021MysqlInfoUtil](https://github.com/lingtalfi/Light_It4Tools/blob/master/doc/api/Ling/Light_It4Tools/SimplePdoWrapper/Util/It42021MysqlInfoUtil.md)<br>
