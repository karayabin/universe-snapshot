[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Util\UpgradeUtil class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/UpgradeUtil.md)


UpgradeUtil::upgrade
================



UpgradeUtil::upgrade — Try to upgrade the given planets located in the given working dir.




Description
================


public [UpgradeUtil::upgrade](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/UpgradeUtil/upgrade.md)(string $appDir, array $planetDotNames, ?array $options = []) : void




Try to upgrade the given planets located in the given working dir.

The working dir can be either an app directory, or directly an universe directory.

Available options are:

- stopAtFirstError: bool=false. If false, when a problem occurs with a planet, we add it to the errorMessages list.
     If true, this method will interrupt the process after the first error.

     In both cases the error(s) description(s) can be accessed via the errorMessages property.

- useDebug: bool=false. Whether to pass the debug flag to the import util that we use internally.
- install: bool=false. Whether to also trigger the install procedure for each upgraded planet.




Parameters
================


- appDir

    

- planetDotNames

    

- options

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [UpgradeUtil::upgrade](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Util/UpgradeUtil.php#L112-L211)


See Also
================

The [UpgradeUtil](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/UpgradeUtil.md) class.

Previous method: [getErrorMessages](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/UpgradeUtil/getErrorMessages.md)<br>Next method: [error](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/UpgradeUtil/error.md)<br>

