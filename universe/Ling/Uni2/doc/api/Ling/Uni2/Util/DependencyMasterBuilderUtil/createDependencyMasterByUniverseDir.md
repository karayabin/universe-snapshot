[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)<br>
[Back to the Ling\Uni2\Util\DependencyMasterBuilderUtil class](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Util/DependencyMasterBuilderUtil.md)


DependencyMasterBuilderUtil::createDependencyMasterByUniverseDir
================



DependencyMasterBuilderUtil::createDependencyMasterByUniverseDir — Creates the dependency master file for the given $universeDir.




Description
================


public [DependencyMasterBuilderUtil::createDependencyMasterByUniverseDir](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Util/DependencyMasterBuilderUtil/createDependencyMasterByUniverseDir.md)(string $universeDir, string $file, ?array &$errors = [], ?array $allowedGalaxies = null) : void




Creates the dependency master file for the given $universeDir.

The dependency master file will be created at the given $file path.

If the galaxy name of a planet cannot be found, an error message will be appended
to the given $errors array.

Similarly, if the planet does not have a version number, an error message will be appended.



Note: the galaxy name and the version number should be found in the meta info of the planet.
See the [meta-info of a planet](https://github.com/lingtalfi/Uni2/blob/master/README.md#meta-infobyml) for more details.



How to use:
------------
```php
$universeDir = "/myphp/universe";
$file = "/komin/jin_site_demo/tmp/dependency-master.byml";
$errors = [];
$util = new DependencyMasterBuilderUtil();
$util->createDependencyMasterByUniverseDir($universeDir, $file, $errors);
az($errors);
```




Parameters
================


- universeDir

    

- file

    

- errors

    

- allowedGalaxies

    An array of allowed galaxies. If this is null, all galaxies are allowed.
If it's an array, only the galaxies specified in the array are allowed.


Return values
================

Returns void.


Exceptions thrown
================

- [UniverseToolsException](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Exception/UniverseToolsException.md).&nbsp;







Source Code
===========
See the source code for method [DependencyMasterBuilderUtil::createDependencyMasterByUniverseDir](https://github.com/lingtalfi/Uni2/blob/master/Util/DependencyMasterBuilderUtil.php#L66-L115)


See Also
================

The [DependencyMasterBuilderUtil](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Util/DependencyMasterBuilderUtil.md) class.



