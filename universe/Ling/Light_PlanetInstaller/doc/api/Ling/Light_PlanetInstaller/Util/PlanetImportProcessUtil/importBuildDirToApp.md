[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Util\PlanetImportProcessUtil class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil.md)


PlanetImportProcessUtil::importBuildDirToApp
================



PlanetImportProcessUtil::importBuildDirToApp — Imports the planets found in the build dir to the application dir, and returns the planet dot names that have been successfully imported.




Description
================


public [PlanetImportProcessUtil::importBuildDirToApp](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/importBuildDirToApp.md)(?array &$errors = [], ?array $options = []) : array




Imports the planets found in the build dir to the application dir, and returns the planet dot names that have been successfully imported.
The errors variable is filled, if errors occur.


Available options are:
- install: bool=false. If true, the assets/map of the planet(s) will be imported as well




Parameters
================


- errors

    

- options

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [PlanetImportProcessUtil::importBuildDirToApp](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Util/PlanetImportProcessUtil.php#L646-L744)


See Also
================

The [PlanetImportProcessUtil](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil.md) class.

Previous method: [moveVirtualBinToBuildDir](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/moveVirtualBinToBuildDir.md)<br>Next method: [handleCopyWarnings](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/handleCopyWarnings.md)<br>

