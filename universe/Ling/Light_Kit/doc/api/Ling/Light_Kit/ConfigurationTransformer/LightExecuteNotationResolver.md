[Back to the Ling/Light_Kit api](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit.md)



The LightExecuteNotationResolver class
================
2019-04-25 --> 2021-07-08






Introduction
============

The LightExecuteNotationResolver class.



Class synopsis
==============


class <span class="pl-k">LightExecuteNotationResolver</span> implements [ConfigurationTransformerInterface](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/ConfigurationTransformer/ConfigurationTransformerInterface.md), [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md) {

- Properties
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/ConfigurationTransformer/LightExecuteNotationResolver/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/ConfigurationTransformer/LightExecuteNotationResolver/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [transform](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/ConfigurationTransformer/LightExecuteNotationResolver/transform.md)(array &$conf) : void

}




Properties
=============

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [LightExecuteNotationResolver::__construct](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/ConfigurationTransformer/LightExecuteNotationResolver/__construct.md) &ndash; Builds the LightExecuteNotationResolver instance.
- [LightExecuteNotationResolver::setContainer](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/ConfigurationTransformer/LightExecuteNotationResolver/setContainer.md) &ndash; Sets the light service container interface.
- [LightExecuteNotationResolver::transform](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/ConfigurationTransformer/LightExecuteNotationResolver/transform.md) &ndash; Transforms the given configuration array in place.





Location
=============
Ling\Light_Kit\ConfigurationTransformer\LightExecuteNotationResolver<br>
See the source code of [Ling\Light_Kit\ConfigurationTransformer\LightExecuteNotationResolver](https://github.com/lingtalfi/Light_Kit/blob/master/ConfigurationTransformer/LightExecuteNotationResolver.php)



SeeAlso
==============
Previous class: [LazyReferenceResolver](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/ConfigurationTransformer/LazyReferenceResolver.md)<br>Next class: [ThemeTransformer](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/ConfigurationTransformer/ThemeTransformer.md)<br>
