[Back to the Ling/Light_RealGenerator api](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator.md)



The LightRealGeneratorService class
================
2019-10-24 --> 2021-06-28






Introduction
============

The LightRealGeneratorService class.



Class synopsis
==============


class <span class="pl-k">LightRealGeneratorService</span>  {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;
    - protected array [$options](#property-options) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService/__construct.md)() : void
    - public [generate](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService/generate.md)(string $file) : array
    - public [generateByConf](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService/generateByConf.md)(array $conf, ?array $options = []) : void
    - public [setContainer](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setOptions](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService/setOptions.md)(array $options) : void
    - public [debugLog](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService/debugLog.md)(string $msg) : void
    - protected [getNewListConfigGeneratorInstance](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService/getNewListConfigGeneratorInstance.md)() : [ListConfigGenerator](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/ListConfigGenerator.md)
    - protected [getSymbolicPath](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService/getSymbolicPath.md)(string $path) : string
    - protected [error](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService/error.md)(string $msg) : void
    - protected [onGenerateAfter](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService/onGenerateAfter.md)(array $configBlock) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    

- <span id="property-options"><b>options</b></span>

    This property holds the options for this instance.
    
    Available options are:
    
    - useDebug: bool = false.
         Whether to log debug messages to the logs.
         If true, the debug messages are sent via the channel specified with the debugLogChannel option.
    
    - debugLogChannel: string=real_generator.debug, the channel used to write the log messages.
    
    



Methods
==============

- [LightRealGeneratorService::__construct](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService/__construct.md) &ndash; Builds the LightRealGeneratorService instance.
- [LightRealGeneratorService::generate](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService/generate.md) &ndash; Same as generateByConf method, but takes the file path instead of the array.
- [LightRealGeneratorService::generateByConf](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService/generateByConf.md) &ndash; according to the [configuration block](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/pages/realgen-configuration-block.md) identified by the given file and identifier.
- [LightRealGeneratorService::setContainer](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService/setContainer.md) &ndash; Sets the container.
- [LightRealGeneratorService::setOptions](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService/setOptions.md) &ndash; Sets the options.
- [LightRealGeneratorService::debugLog](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService/debugLog.md) &ndash; Sends a message to the debugLog, if the **useDebug** option is set to true.
- [LightRealGeneratorService::getNewListConfigGeneratorInstance](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService/getNewListConfigGeneratorInstance.md) &ndash; Creates and returns the list config generator instance.
- [LightRealGeneratorService::getSymbolicPath](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService/getSymbolicPath.md) &ndash; Returns the given absolute path, with the application directory replaced by a symbol if found.
- [LightRealGeneratorService::error](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService/error.md) &ndash; Throws an exception with the given error message.
- [LightRealGeneratorService::onGenerateAfter](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService/onGenerateAfter.md) &ndash; Hook called at the end of the [generate method](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService/generate.md).





Location
=============
Ling\Light_RealGenerator\Service\LightRealGeneratorService<br>
See the source code of [Ling\Light_RealGenerator\Service\LightRealGeneratorService](https://github.com/lingtalfi/Light_RealGenerator/blob/master/Service/LightRealGeneratorService.php)



SeeAlso
==============
Previous class: [LightRealGeneratorPlanetInstaller](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Light_PlanetInstaller/LightRealGeneratorPlanetInstaller.md)<br>Next class: [RepresentativeColumnFinderUtil](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Util/RepresentativeColumnFinderUtil.md)<br>
