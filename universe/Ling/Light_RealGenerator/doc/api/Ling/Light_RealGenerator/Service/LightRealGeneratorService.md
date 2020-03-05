[Back to the Ling/Light_RealGenerator api](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator.md)



The LightRealGeneratorService class
================
2019-10-24 --> 2020-03-03






Introduction
============

The LightRealGeneratorService class.



Class synopsis
==============


class <span class="pl-k">LightRealGeneratorService</span>  {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService/__construct.md)() : void
    - public [generate](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService/generate.md)(string $file, ?string $identifier = null) : void
    - public [setContainer](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - protected [error](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService/error.md)(string $msg) : void
    - protected [onGenerateAfter](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService/onGenerateAfter.md)(array $configBlock) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [LightRealGeneratorService::__construct](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService/__construct.md) &ndash; Builds the LightRealGeneratorService instance.
- [LightRealGeneratorService::generate](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService/generate.md) &ndash; according to the [configuration block](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/pages/realgen-configuration-block.md) identified by the given file and identifier.
- [LightRealGeneratorService::setContainer](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService/setContainer.md) &ndash; Sets the container.
- [LightRealGeneratorService::error](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService/error.md) &ndash; Throws an exception with the given error message.
- [LightRealGeneratorService::onGenerateAfter](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService/onGenerateAfter.md) &ndash; Hook called at the end of the [generate method](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Service/LightRealGeneratorService/generate.md).





Location
=============
Ling\Light_RealGenerator\Service\LightRealGeneratorService<br>
See the source code of [Ling\Light_RealGenerator\Service\LightRealGeneratorService](https://github.com/lingtalfi/Light_RealGenerator/blob/master/Service/LightRealGeneratorService.php)



SeeAlso
==============
Previous class: [ListConfigGenerator](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/ListConfigGenerator.md)<br>Next class: [RepresentativeColumnFinderUtil](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Util/RepresentativeColumnFinderUtil.md)<br>
