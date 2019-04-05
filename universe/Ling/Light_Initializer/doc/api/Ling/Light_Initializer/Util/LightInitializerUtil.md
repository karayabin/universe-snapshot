[Back to the Ling/Light_Initializer api](https://github.com/lingtalfi/Light_Initializer/blob/master/doc/api/Ling/Light_Initializer.md)



The LightInitializerUtil class
================
2019-04-05 --> 2019-04-05






Introduction
============

The LightInitializerUtil class.



Class synopsis
==============


class <span class="pl-k">LightInitializerUtil</span>  {

- Properties
    - protected [Ling\Light_Initializer\Initializer\LightInitializerInterface[]](https://github.com/lingtalfi/Light_Initializer/blob/master/doc/api/Ling/Light_Initializer/Initializer/LightInitializerInterface.md) [$initializers](#property-initializers) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Light_Initializer/blob/master/doc/api/Ling/Light_Initializer/Util/LightInitializerUtil/__construct.md)() : void
    - public [registerInitializer](https://github.com/lingtalfi/Light_Initializer/blob/master/doc/api/Ling/Light_Initializer/Util/LightInitializerUtil/registerInitializer.md)([Ling\Light_Initializer\Initializer\LightInitializerInterface](https://github.com/lingtalfi/Light_Initializer/blob/master/doc/api/Ling/Light_Initializer/Initializer/LightInitializerInterface.md) $initializer) : void
    - public [setInitializers](https://github.com/lingtalfi/Light_Initializer/blob/master/doc/api/Ling/Light_Initializer/Util/LightInitializerUtil/setInitializers.md)(array $initializers) : void
    - public [initialize](https://github.com/lingtalfi/Light_Initializer/blob/master/doc/api/Ling/Light_Initializer/Util/LightInitializerUtil/initialize.md)(Ling\Light\Core\Light $light, Ling\Light\Http\HttpRequestInterface $httpRequest) : void

}




Properties
=============

- <span id="property-initializers"><b>initializers</b></span>

    This property holds the callbacks for this instance.
    
    



Methods
==============

- [LightInitializerUtil::__construct](https://github.com/lingtalfi/Light_Initializer/blob/master/doc/api/Ling/Light_Initializer/Util/LightInitializerUtil/__construct.md) &ndash; Builds the LightInitializer instance.
- [LightInitializerUtil::registerInitializer](https://github.com/lingtalfi/Light_Initializer/blob/master/doc/api/Ling/Light_Initializer/Util/LightInitializerUtil/registerInitializer.md) &ndash; Registers an initializer to this instance.
- [LightInitializerUtil::setInitializers](https://github.com/lingtalfi/Light_Initializer/blob/master/doc/api/Ling/Light_Initializer/Util/LightInitializerUtil/setInitializers.md) &ndash; Registers all initializers at once.
- [LightInitializerUtil::initialize](https://github.com/lingtalfi/Light_Initializer/blob/master/doc/api/Ling/Light_Initializer/Util/LightInitializerUtil/initialize.md) &ndash; Triggers the initialize method on all registered initializers.





Location
=============
Ling\Light_Initializer\Util\LightInitializerUtil


SeeAlso
==============
Previous class: [LightInitializerInterface](https://github.com/lingtalfi/Light_Initializer/blob/master/doc/api/Ling/Light_Initializer/Initializer/LightInitializerInterface.md)<br>
