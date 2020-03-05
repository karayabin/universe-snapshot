[Back to the Ling/Light_Kit_Admin_Generator api](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator.md)



The LightKitAdminGeneratorService class
================
2019-11-06 --> 2020-03-05






Introduction
============

The LightKitAdminGeneratorService class.



Class synopsis
==============


class <span class="pl-k">LightKitAdminGeneratorService</span> extends [LightRealGeneratorService](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService.md)  {

- Inherited properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [LightRealGeneratorService::$container](#property-container) ;

- Methods
    - protected [onGenerateAfter](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator/Service/LightKitAdminGeneratorService/onGenerateAfter.md)(array $configBlock) : void

- Inherited methods
    - public LightRealGeneratorService::__construct() : void
    - public LightRealGeneratorService::generate(string $file, ?string $identifier = null) : void
    - public LightRealGeneratorService::setContainer([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - protected LightRealGeneratorService::error(string $msg) : void

}






Methods
==============

- [LightKitAdminGeneratorService::onGenerateAfter](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator/Service/LightKitAdminGeneratorService/onGenerateAfter.md) &ndash; Hook called at the end of the [generate method](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService/generate.md).
- LightRealGeneratorService::__construct &ndash; Builds the LightRealGeneratorService instance.
- LightRealGeneratorService::generate &ndash; according to the [configuration block](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/pages/lkagen-configuration-example.md) identified by the given file and identifier.
- LightRealGeneratorService::setContainer &ndash; Sets the container.
- LightRealGeneratorService::error &ndash; Throws an exception with the given error message.





Location
=============
Ling\Light_Kit_Admin_Generator\Service\LightKitAdminGeneratorService<br>
See the source code of [Ling\Light_Kit_Admin_Generator\Service\LightKitAdminGeneratorService](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/Service/LightKitAdminGeneratorService.php)



SeeAlso
==============
Previous class: [MenuConfigGenerator](https://github.com/lingtalfi/Light_Kit_Admin_Generator/blob/master/doc/api/Ling/Light_Kit_Admin_Generator/Generator/MenuConfigGenerator.md)<br>
