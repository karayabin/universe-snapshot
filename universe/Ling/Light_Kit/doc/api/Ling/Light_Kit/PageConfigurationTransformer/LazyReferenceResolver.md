[Back to the Ling/Light_Kit api](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit.md)



The LazyReferenceResolver class
================
2019-04-25 --> 2021-03-05






Introduction
============

The LazyReferenceResolver class.

Note: this class is old and note used anymore.
It has been replaced entirely with the LightExecuteNotationResolver, which can do more and is more unified with the light framework.

I keep the code below just for a reference for myself, and as an example of what transformers can do, but it should probably be removed.



Class synopsis
==============


class <span class="pl-k">LazyReferenceResolver</span> implements [PageConfigurationTransformerInterface](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/PageConfigurationTransformerInterface.md), [LightServiceContainerAwareInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerAwareInterface.md) {

- Properties
    - protected array [$resolvers](#property-resolvers) ;
    - protected bool [$strictMode](#property-strictMode) ;
    - protected [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) [$container](#property-container) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/LazyReferenceResolver/__construct.md)() : void
    - public [setContainer](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/LazyReferenceResolver/setContainer.md)([Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void
    - public [setStrictMode](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/LazyReferenceResolver/setStrictMode.md)(bool $strictMode) : void
    - public [setResolvers](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/LazyReferenceResolver/setResolvers.md)(array $resolvers) : void
    - public [registerResolver](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/LazyReferenceResolver/registerResolver.md)(string $token, callable $resolver) : void
    - public [transform](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/LazyReferenceResolver/transform.md)(array &$pageConfiguration) : void

}




Properties
=============

- <span id="property-resolvers"><b>resolvers</b></span>

    This property holds the resolvers for this instance.
    Each resolver is a callable.
    
    

- <span id="property-strictMode"><b>strictMode</b></span>

    This property holds the strictMde for this instance.
    See the resolve method for more details.
    
    

- <span id="property-container"><b>container</b></span>

    This property holds the container for this instance.
    
    



Methods
==============

- [LazyReferenceResolver::__construct](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/LazyReferenceResolver/__construct.md) &ndash; Builds the LazyReferenceResolver instance.
- [LazyReferenceResolver::setContainer](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/LazyReferenceResolver/setContainer.md) &ndash; Sets the light service container interface.
- [LazyReferenceResolver::setStrictMode](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/LazyReferenceResolver/setStrictMode.md) &ndash; Sets the strictMde.
- [LazyReferenceResolver::setResolvers](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/LazyReferenceResolver/setResolvers.md) &ndash; Sets the resolvers.
- [LazyReferenceResolver::registerResolver](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/LazyReferenceResolver/registerResolver.md) &ndash; Registers the resolver and assigns it to the given token.
- [LazyReferenceResolver::transform](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/LazyReferenceResolver/transform.md) &ndash; Transforms the given page configuration array in place.





Location
=============
Ling\Light_Kit\PageConfigurationTransformer\LazyReferenceResolver<br>
See the source code of [Ling\Light_Kit\PageConfigurationTransformer\LazyReferenceResolver](https://github.com/lingtalfi/Light_Kit/blob/master/PageConfigurationTransformer/LazyReferenceResolver.php)



SeeAlso
==============
Previous class: [RouteResolver](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/LazyReferenceResolver/RouteResolver.md)<br>Next class: [LightExecuteNotationResolver](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageConfigurationTransformer/LightExecuteNotationResolver.md)<br>
