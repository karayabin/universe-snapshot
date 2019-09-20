[Back to the Ling/Light_BreezeGenerator api](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator.md)



The LightBreezeGeneratorService class
================
2019-09-11 --> 2019-09-16






Introduction
============

The LightBreezeGeneratorService class.



Class synopsis
==============


class <span class="pl-k">LightBreezeGeneratorService</span>  {

- Properties
    - protected [Ling\Light_BreezeGenerator\Generator\BreezeGeneratorInterface[]](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/BreezeGeneratorInterface.md) [$generators](#property-generators) ;
    - protected array [$conf](#property-conf) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Service/LightBreezeGeneratorService/__construct.md)() : void
    - public [generate](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Service/LightBreezeGeneratorService/generate.md)(string $style) : void
    - public [setConf](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Service/LightBreezeGeneratorService/setConf.md)(array $conf) : void
    - public [setContainer](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Service/LightBreezeGeneratorService/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void

}




Properties
=============

- <span id="property-generators"><b>generators</b></span>

    This property holds the generators for this instance.
    It's an array of generator style => BreezeGeneratorInterface
    
    

- <span id="property-conf"><b>conf</b></span>

    This property holds the conf for this instance.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [LightBreezeGeneratorService::__construct](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Service/LightBreezeGeneratorService/__construct.md) &ndash; Builds the LightBreezeGeneratorService instance.
- [LightBreezeGeneratorService::generate](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Service/LightBreezeGeneratorService/generate.md) &ndash; Calls a generator and uses it to generate some php classes.
- [LightBreezeGeneratorService::setConf](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Service/LightBreezeGeneratorService/setConf.md) &ndash; Sets the conf.
- [LightBreezeGeneratorService::setContainer](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Service/LightBreezeGeneratorService/setContainer.md) &ndash; Sets the container.





Location
=============
Ling\Light_BreezeGenerator\Service\LightBreezeGeneratorService<br>
See the source code of [Ling\Light_BreezeGenerator\Service\LightBreezeGeneratorService](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/Service/LightBreezeGeneratorService.php)



SeeAlso
==============
Previous class: [LingBreezeGenerator](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Generator/LingBreezeGenerator.md)<br>Next class: [LightBreezeGeneratorTool](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/api/Ling/Light_BreezeGenerator/Tool/LightBreezeGeneratorTool.md)<br>
