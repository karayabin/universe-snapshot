[Back to the Ling/Light_DatabaseFakeDataMaker api](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker.md)



The LightDatabaseFakeDataMakerService class
================
2021-07-02 --> 2021-07-30






Introduction
============

The LightDatabaseFakeDataMakerService class.



Class synopsis
==============


class <span class="pl-k">LightDatabaseFakeDataMakerService</span>  {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected array [$options](#property-options) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Service/LightDatabaseFakeDataMakerService/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Service/LightDatabaseFakeDataMakerService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setOptions](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Service/LightDatabaseFakeDataMakerService/setOptions.md)(array $options) : void
    - public [getOption](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Service/LightDatabaseFakeDataMakerService/getOption.md)(string $key, ?$default = null, ?bool $throwEx = false) : void
    - public [generate](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Service/LightDatabaseFakeDataMakerService/generate.md)(string $fullTable, int $nbRows, [Ling\Light_DatabaseFakeDataMaker\Generator\LightDatabaseFakeDataGeneratorInterface](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Generator/LightDatabaseFakeDataGeneratorInterface.md) $generator, ?array $options = []) : array
    - private [getFunctionFullTable](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Service/LightDatabaseFakeDataMakerService/getFunctionFullTable.md)(string $fullTable, string $defaultDatabase) : string
    - private [error](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Service/LightDatabaseFakeDataMakerService/error.md)(string $msg) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-options"><b>options</b></span>

    This property holds the options for this instance.
    
    Available options are:
    
    
    
    See the [Light_DatabaseFakeDataMaker conception notes](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/pages/conception-notes.md) for more details.
    
    



Methods
==============

- [LightDatabaseFakeDataMakerService::__construct](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Service/LightDatabaseFakeDataMakerService/__construct.md) &ndash; Builds the LightDatabaseFakeDataMakerService instance.
- [LightDatabaseFakeDataMakerService::setContainer](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Service/LightDatabaseFakeDataMakerService/setContainer.md) &ndash; Sets the container.
- [LightDatabaseFakeDataMakerService::setOptions](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Service/LightDatabaseFakeDataMakerService/setOptions.md) &ndash; Sets the options.
- [LightDatabaseFakeDataMakerService::getOption](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Service/LightDatabaseFakeDataMakerService/getOption.md) &ndash; Returns the option value corresponding to the given key.
- [LightDatabaseFakeDataMakerService::generate](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Service/LightDatabaseFakeDataMakerService/generate.md) &ndash; Generate $nbRows rows into the given table, using the given generator, and returns an array of inserted data.
- [LightDatabaseFakeDataMakerService::getFunctionFullTable](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Service/LightDatabaseFakeDataMakerService/getFunctionFullTable.md) &ndash; Returns the real fullTable from the given function fulltable.
- [LightDatabaseFakeDataMakerService::error](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Service/LightDatabaseFakeDataMakerService/error.md) &ndash; Throws an exception.





Location
=============
Ling\Light_DatabaseFakeDataMaker\Service\LightDatabaseFakeDataMakerService<br>
See the source code of [Ling\Light_DatabaseFakeDataMaker\Service\LightDatabaseFakeDataMakerService](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/Service/LightDatabaseFakeDataMakerService.php)



SeeAlso
==============
Previous class: [LightDatabaseFakeDataGeneratorInterface](https://github.com/lingtalfi/Light_DatabaseFakeDataMaker/blob/master/doc/api/Ling/Light_DatabaseFakeDataMaker/Generator/LightDatabaseFakeDataGeneratorInterface.md)<br>
