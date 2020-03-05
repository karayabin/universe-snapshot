[Back to the Ling/Light_Initializer api](https://github.com/lingtalfi/Light_Initializer/blob/master/doc/api/Ling/Light_Initializer.md)<br>
[Back to the Ling\Light_Initializer\Util\LightInitializerUtil class](https://github.com/lingtalfi/Light_Initializer/blob/master/doc/api/Ling/Light_Initializer/Util/LightInitializerUtil.md)


LightInitializerUtil::registerInitializer
================



LightInitializerUtil::registerInitializer — Registers an initializer to this instance.




Description
================


public [LightInitializerUtil::registerInitializer](https://github.com/lingtalfi/Light_Initializer/blob/master/doc/api/Ling/Light_Initializer/Util/LightInitializerUtil/registerInitializer.md)([Ling\Light_Initializer\Initializer\LightInitializerInterface](https://github.com/lingtalfi/Light_Initializer/blob/master/doc/api/Ling/Light_Initializer/Initializer/LightInitializerInterface.md) $initializer, ?string $slot = null, ?string $parent = null) : void




Registers an initializer to this instance.


The slot should be either:
- install
- (null)


For more information about the slot and parent parameters, please read the [initializer conception notes](https://github.com/lingtalfi/Light_Initializer/blob/master/doc/pages/initializer-conception-notes.md).

Parent is the name of the parent plugin.




Parameters
================


- initializer

    

- slot

    

- parent

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightInitializerUtil::registerInitializer](https://github.com/lingtalfi/Light_Initializer/blob/master/Util/LightInitializerUtil.php#L74-L97)


See Also
================

The [LightInitializerUtil](https://github.com/lingtalfi/Light_Initializer/blob/master/doc/api/Ling/Light_Initializer/Util/LightInitializerUtil.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Light_Initializer/blob/master/doc/api/Ling/Light_Initializer/Util/LightInitializerUtil/__construct.md)<br>Next method: [initialize](https://github.com/lingtalfi/Light_Initializer/blob/master/doc/api/Ling/Light_Initializer/Util/LightInitializerUtil/initialize.md)<br>

