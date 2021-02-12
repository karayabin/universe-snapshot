[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Util\LpiRepositoryUtil class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/LpiRepositoryUtil.md)


LpiRepositoryUtil::getFirstMatchingInfo
================



LpiRepositoryUtil::getFirstMatchingInfo — Returns an array of info for the first planet that matches the given arguments, or false if nothing matched.




Description
================


public [LpiRepositoryUtil::getFirstMatchingInfo](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/LpiRepositoryUtil/getFirstMatchingInfo.md)(string $planetDot, string $versionExpression, ?array $options = []) : array | false




Returns an array of info for the first planet that matches the given arguments, or false if nothing matched.

The info array contains the following:

- repo: string, the type of repo that matched; can be one of: app, global, web.
- version: string, the real version that matched the description


This method tries the following techniques in order:

- try from the app repository
- try from the global dir repository
- try from the web repository


Available options are:
- skipApp: bool=false. If true, the app repository won't be searched in.




Parameters
================


- planetDot

    

- versionExpression

    

- options

    


Return values
================

Returns array | false.








Source Code
===========
See the source code for method [LpiRepositoryUtil::getFirstMatchingInfo](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Util/LpiRepositoryUtil.php#L121-L181)


See Also
================

The [LpiRepositoryUtil](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/LpiRepositoryUtil.md) class.

Previous method: [setBuildDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/LpiRepositoryUtil/setBuildDir.md)<br>Next method: [getAppRepository](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/LpiRepositoryUtil/getAppRepository.md)<br>

