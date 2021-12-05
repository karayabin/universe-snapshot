[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Util\ImportUtil class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil.md)


ImportUtil::moveBuildDirToTargetApp
================



ImportUtil::moveBuildDirToTargetApp — Moves the build dir to the app dir.




Description
================


public [ImportUtil::moveBuildDirToTargetApp](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/moveBuildDirToTargetApp.md)(string $buildDir, string $appDir) : void




Moves the build dir to the app dir.
Note: this method is destructive, it will replace any planet found in the app dir with the one from the build dir without warning.




Parameters
================


- buildDir

    

- appDir

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [ImportUtil::moveBuildDirToTargetApp](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Util/ImportUtil.php#L552-L615)


See Also
================

The [ImportUtil](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil.md) class.

Previous method: [import](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/import.md)<br>Next method: [getWarnings](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/ImportUtil/getWarnings.md)<br>

