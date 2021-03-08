[Back to the Ling/Light_Kit_Admin_Generator api](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator.md)



The LightKitAdminGeneratorService class
================
2019-11-06 --> 2021-03-05






Introduction
============

The LightKitAdminGeneratorService class.



Class synopsis
==============


class <span class="pl-k">LightKitAdminGeneratorService</span> extends [LightRealGeneratorService](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService.md)  {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightRealGeneratorService::$container](#property-container) ;
    - protected array [LightRealGeneratorService::$options](#property-options) ;

- Methods
    - protected [onGenerateAfter](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator/Service/LightKitAdminGeneratorService/onGenerateAfter.md)(array $configBlock) : void
    - protected [getNewListConfigGeneratorInstance](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator/Service/LightKitAdminGeneratorService/getNewListConfigGeneratorInstance.md)() : [ListConfigGenerator](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/ListConfigGenerator.md)

- Inherited methods
    - public LightRealGeneratorService::__construct() : void
    - public LightRealGeneratorService::generate(string $file) : array
    - public LightRealGeneratorService::generateByConf(array $conf, ?array $options = []) : void
    - public LightRealGeneratorService::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public LightRealGeneratorService::setOptions(array $options) : void
    - public LightRealGeneratorService::debugLog(string $msg) : void
    - protected LightRealGeneratorService::getSymbolicPath(string $path) : string
    - protected LightRealGeneratorService::error(string $msg) : void

}






Methods
==============

- [LightKitAdminGeneratorService::onGenerateAfter](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator/Service/LightKitAdminGeneratorService/onGenerateAfter.md) &ndash; Hook called at the end of the [generate method](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService/generate.md).
- [LightKitAdminGeneratorService::getNewListConfigGeneratorInstance](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator/Service/LightKitAdminGeneratorService/getNewListConfigGeneratorInstance.md) &ndash; Creates and returns the list config generator instance.
- LightRealGeneratorService::__construct &ndash; Builds the LightRealGeneratorService instance.
- LightRealGeneratorService::generate &ndash; Same as generateByConf method, but takes the file path instead of the array.
- LightRealGeneratorService::generateByConf &ndash; according to the [configuration block](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/pages/lkagen-configuration-example.md) identified by the given file and identifier.
- LightRealGeneratorService::setContainer &ndash; Sets the container.
- LightRealGeneratorService::setOptions &ndash; Sets the options.
- LightRealGeneratorService::debugLog &ndash; Sends a message to the debugLog, if the **useDebug** option is set to true.
- LightRealGeneratorService::getSymbolicPath &ndash; Returns the given absolute path, with the application directory replaced by a symbol if found.
- LightRealGeneratorService::error &ndash; Throws an exception with the given error message.





Location
=============
Ling\Light_Kit_Admin_Generator\Service\LightKitAdminGeneratorService<br>
See the source code of [Ling\Light_Kit_Admin_Generator\Service\LightKitAdminGeneratorService](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/Service/LightKitAdminGeneratorService.php)



SeeAlso
==============
Previous class: [MenuConfigGenerator](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator/Generator/MenuConfigGenerator.md)<br>
