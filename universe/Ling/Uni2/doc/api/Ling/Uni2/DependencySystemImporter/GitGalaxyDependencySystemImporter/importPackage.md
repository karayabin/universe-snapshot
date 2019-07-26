[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)<br>
[Back to the Ling\Uni2\DependencySystemImporter\GitGalaxyDependencySystemImporter class](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/GitGalaxyDependencySystemImporter.md)


GitGalaxyDependencySystemImporter::importPackage
================



GitGalaxyDependencySystemImporter::importPackage — Imports the $packageImportName under the $destDir, and returns whether or not the import was successful.




Description
================


public [GitGalaxyDependencySystemImporter::importPackage](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/GitGalaxyDependencySystemImporter/importPackage.md)(string $packageImportName, string $destDir, Ling\CliTools\Output\OutputInterface $output, array $options = []) : bool




Imports the $packageImportName under the $destDir, and returns whether or not the import was successful.

What's a $packageImportName and a destDir is dependent on the concrete class and therefore should be explained
further in the concrete class documentation.

All messages should be logged to the output whenever possible.




Parameters
================


- packageImportName

    

- destDir

    

- output

    

- options

    - indentLevel: int=0. The base indent level to use for writing messages on the output.


Return values
================

Returns bool.








Source Code
===========
See the source code for method [GitGalaxyDependencySystemImporter::importPackage](https://github.com/lingtalfi/Uni2/blob/master/DependencySystemImporter/GitGalaxyDependencySystemImporter.php#L67-L76)


See Also
================

The [GitGalaxyDependencySystemImporter](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/GitGalaxyDependencySystemImporter.md) class.

Previous method: [getPackageSymbolicName](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/GitGalaxyDependencySystemImporter/getPackageSymbolicName.md)<br>Next method: [setBaseRepoName](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/GitGalaxyDependencySystemImporter/setBaseRepoName.md)<br>

