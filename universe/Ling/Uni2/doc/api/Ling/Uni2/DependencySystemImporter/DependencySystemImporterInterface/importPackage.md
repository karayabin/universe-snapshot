[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)<br>
[Back to the Ling\Uni2\DependencySystemImporter\DependencySystemImporterInterface class](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/DependencySystemImporterInterface.md)


DependencySystemImporterInterface::importPackage
================



DependencySystemImporterInterface::importPackage — Imports the $packageImportName under the $destDir, and returns whether or not the import was successful.




Description
================


abstract public [DependencySystemImporterInterface::importPackage](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/DependencySystemImporterInterface/importPackage.md)(string $packageImportName, string $destDir, Ling\CliTools\Output\OutputInterface $output, ?array $options = []) : bool




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
See the source code for method [DependencySystemImporterInterface::importPackage](https://github.com/lingtalfi/Uni2/blob/master/DependencySystemImporter/DependencySystemImporterInterface.php#L39-L39)


See Also
================

The [DependencySystemImporterInterface](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/DependencySystemImporterInterface.md) class.

Next method: [getPackageSymbolicName](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/DependencySystemImporterInterface/getPackageSymbolicName.md)<br>

