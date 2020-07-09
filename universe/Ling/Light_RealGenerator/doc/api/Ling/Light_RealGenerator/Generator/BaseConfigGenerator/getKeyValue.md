[Back to the Ling/Light_RealGenerator api](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator.md)<br>
[Back to the Ling\Light_RealGenerator\Generator\BaseConfigGenerator class](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator.md)


BaseConfigGenerator::getKeyValue
================



BaseConfigGenerator::getKeyValue — Returns the value associated with the given keyPath.




Description
================


protected [BaseConfigGenerator::getKeyValue](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/getKeyValue.md)(string $keyPath, ?bool $throwEx = true, ?$default = null) : array | mixed | null




Returns the value associated with the given keyPath.
If it doesn't exist, this method either:
- throws an exception (if the throwEx flag is set to false)
- returns the given default value (is the throwEx flag is set to true)




Parameters
================


- keyPath

    

- throwEx

    

- default

    


Return values
================

Returns array | mixed | null.


Exceptions thrown
================

- [LightRealGeneratorException](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Exception/LightRealGeneratorException.md).&nbsp;







Source Code
===========
See the source code for method [BaseConfigGenerator::getKeyValue](https://github.com/lingtalfi/Light_RealGenerator/blob/master/Generator/BaseConfigGenerator.php#L171-L182)


See Also
================

The [BaseConfigGenerator](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator.md) class.

Previous method: [getTables](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/getTables.md)<br>Next method: [setConfig](https://github.com/lingtalfi/Light_RealGenerator/blob/master/doc/api/Ling/Light_RealGenerator/Generator/BaseConfigGenerator/setConfig.md)<br>

