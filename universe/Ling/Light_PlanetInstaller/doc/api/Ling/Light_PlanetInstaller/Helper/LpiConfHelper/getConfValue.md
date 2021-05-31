[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Helper\LpiConfHelper class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiConfHelper.md)


LpiConfHelper::getConfValue
================



LpiConfHelper::getConfValue — Returns a value from the global configuration file.




Description
================


private static [LpiConfHelper::getConfValue](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiConfHelper/getConfValue.md)(string $key, ?$default = null, ?bool $throwEx = false) : mixed




Returns a value from the global configuration file.
If not found returns the default value by default, or throws an exception if $throwEx=true.




Parameters
================


- key

    

- default

    

- throwEx

    


Return values
================

Returns mixed.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LpiConfHelper::getConfValue](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Helper/LpiConfHelper.php#L95-L115)


See Also
================

The [LpiConfHelper](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiConfHelper.md) class.

Previous method: [getGlobalDirPath](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Helper/LpiConfHelper/getGlobalDirPath.md)<br>

