[Back to the Ling/Light_PlanetInstaller api](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller.md)<br>
[Back to the Ling\Light_PlanetInstaller\Util\PlanetImportProcessUtil class](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil.md)


PlanetImportProcessUtil::importToVirtualBin
================



PlanetImportProcessUtil::importToVirtualBin — Imports the given planet and its dependencies recursively to the virtual bin.




Description
================


public [PlanetImportProcessUtil::importToVirtualBin](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/importToVirtualBin.md)(string $planetDot, string $versionExpr, ?array $options = []) : void




Imports the given planet and its dependencies recursively to the virtual bin.

The virtual bin is basically the planets we wish to import.
Whether it's feasible or not is another story.



The outcome of this method depends on whether you set the applicationDir property in this class.
If set, this method will only import the planet (to the virtual bin) if they need to be updated in the target application.
So for instance if you call this method with planet Ling:Bat in version 1.292+ and the target application already
has Ling:Bat in version 1.296, the method will do nothing.
However, if your target application had Ling:Bat in version 1.200 (for instance), then the planet would be added to the virtual bin.




Available options are:
- force: whether to force the reimport of this planet, not recursively.




Parameters
================


- planetDot

    

- versionExpr

    

- options

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [PlanetImportProcessUtil::importToVirtualBin](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/Util/PlanetImportProcessUtil.php#L784-L900)


See Also
================

The [PlanetImportProcessUtil](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil.md) class.

Previous method: [handleCopyWarnings](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/handleCopyWarnings.md)<br>Next method: [planetExistsInVirtualBin](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/api/Ling/Light_PlanetInstaller/Util/PlanetImportProcessUtil/planetExistsInVirtualBin.md)<br>

