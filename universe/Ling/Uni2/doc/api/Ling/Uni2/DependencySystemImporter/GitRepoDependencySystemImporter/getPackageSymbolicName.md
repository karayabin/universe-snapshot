[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)<br>
[Back to the Ling\Uni2\DependencySystemImporter\GitRepoDependencySystemImporter class](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/GitRepoDependencySystemImporter.md)


GitRepoDependencySystemImporter::getPackageSymbolicName
================



GitRepoDependencySystemImporter::getPackageSymbolicName — Returns the package symbolic name from the given $packageImportName.




Description
================


public [GitRepoDependencySystemImporter::getPackageSymbolicName](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/GitRepoDependencySystemImporter/getPackageSymbolicName.md)(string $packageImportName) : string




Returns the package symbolic name from the given $packageImportName.

The package symbolic name is a filesystem portion of the path to an item in the local server, such as:

```txt
- local item path: <local planet path> | <local non-planet path>
- local planet path: <universe root dir> </> <galaxy> </> <package symbolic name>
- local non-planet path: <universe dependencies root dir> </> <dependency system> </> <package symbolic name>

```





Examples of package symbolic names are:

- Bat                    (the planet https://github.com/lingtalfi/Bat)
- tecnickcom/tcpdf       (the non-planet https://github.com/tecnickcom/TCPDF)




Parameters
================


- packageImportName

    


Return values
================

Returns string.








See Also
================

The [GitRepoDependencySystemImporter](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/GitRepoDependencySystemImporter.md) class.

Previous method: [importPackage](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/GitRepoDependencySystemImporter/importPackage.md)<br>Next method: [getRepoPath](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/GitRepoDependencySystemImporter/getRepoPath.md)<br>

