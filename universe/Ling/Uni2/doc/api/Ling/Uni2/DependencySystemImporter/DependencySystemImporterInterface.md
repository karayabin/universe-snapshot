[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)



The DependencySystemImporterInterface class
================
2019-03-12 --> 2019-03-14






Introduction
============

The DependencySystemImporterInterface interface.

A dependency system importer will know how to import a package from the web to a local machine.



Class synopsis
==============


abstract class <span class="pl-k">DependencySystemImporterInterface</span>  {

- Methods
    - abstract public [importPackage](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/DependencySystemImporterInterface/importPackage.md)(string $packageImportName, string $destDir, Ling\CliTools\Output\OutputInterface $output, array $options = []) : bool
    - abstract public [getPackageSymbolicName](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/DependencySystemImporterInterface/getPackageSymbolicName.md)(string $packageImportName) : string

}






Methods
==============

- [DependencySystemImporterInterface::importPackage](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/DependencySystemImporterInterface/importPackage.md) &ndash; Imports the $packageImportName under the $destDir, and returns whether or not the import was successful.
- [DependencySystemImporterInterface::getPackageSymbolicName](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/DependencySystemImporterInterface/getPackageSymbolicName.md) &ndash; Returns the package symbolic name from the given $packageImportName.





Location
=============
Ling\Uni2\DependencySystemImporter\DependencySystemImporterInterface


SeeAlso
==============
Previous class: [AbstractGitDependencySystemImporter](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/AbstractGitDependencySystemImporter.md)<br>Next class: [GitGalaxyDependencySystemImporter](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/GitGalaxyDependencySystemImporter.md)<br>
