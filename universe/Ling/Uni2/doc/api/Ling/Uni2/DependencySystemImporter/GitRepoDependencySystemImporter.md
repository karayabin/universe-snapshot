[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)



The GitRepoDependencySystemImporter class
================
2019-03-12 --> 2019-04-05






Introduction
============

The GitRepoDependencySystemImporter class.

Will import repos from github.com.

See more details in [the universe dependency system page](https://github.com/lingtalfi/TheScientist/blob/master/universe-dependencies-2019.md).


About the importPackage method
-------------

The packageName argument should be the github.com repo url.

The destDir parameter of the importPackage method should be the path to the universe-dependencies directory.
The importPackage method will then append the repo path to this directory to obtain the exact dependency directory.

So for instance if the packageName's value is: https://github.com/tecnickcom/tcpdf
Then the repo path will be "tecnickcom/tcpdf",
and then the item will be ultimately placed into the following directory:

- /my_app/universe-dependencies/tecnickcom/tcpdf



Class synopsis
==============


class <span class="pl-k">GitRepoDependencySystemImporter</span> extends [AbstractGitDependencySystemImporter](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/AbstractGitDependencySystemImporter.md) implements [DependencySystemImporterInterface](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/DependencySystemImporterInterface.md) {

- Methods
    - public [importPackage](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/GitRepoDependencySystemImporter/importPackage.md)(string $packageImportName, string $destDir, Ling\CliTools\Output\OutputInterface $output, array $options = []) : bool
    - public [getPackageSymbolicName](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/GitRepoDependencySystemImporter/getPackageSymbolicName.md)(string $packageImportName) : string
    - protected [getRepoPath](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/GitRepoDependencySystemImporter/getRepoPath.md)(string $packageImportName) : string

- Inherited methods
    - public [AbstractGitDependencySystemImporter::doImportPackage](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/AbstractGitDependencySystemImporter/doImportPackage.md)(string $repoPath, string $destDir, Ling\CliTools\Output\OutputInterface $output, array $options = []) : bool

}






Methods
==============

- [GitRepoDependencySystemImporter::importPackage](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/GitRepoDependencySystemImporter/importPackage.md) &ndash; Imports the $packageImportName under the $destDir, and returns whether or not the import was successful.
- [GitRepoDependencySystemImporter::getPackageSymbolicName](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/GitRepoDependencySystemImporter/getPackageSymbolicName.md) &ndash; Returns the package symbolic name from the given $packageImportName.
- [GitRepoDependencySystemImporter::getRepoPath](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/GitRepoDependencySystemImporter/getRepoPath.md) &ndash; Returns the repo path from the given $packageImportName.
- [AbstractGitDependencySystemImporter::doImportPackage](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/AbstractGitDependencySystemImporter/doImportPackage.md) &ndash; Imports the github.com repo which path is $repoPath to the $destDir directory.





Location
=============
Ling\Uni2\DependencySystemImporter\GitRepoDependencySystemImporter


SeeAlso
==============
Previous class: [GitGalaxyDependencySystemImporter](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/GitGalaxyDependencySystemImporter.md)<br>Next class: [ErrorSummary](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/ErrorSummary/ErrorSummary.md)<br>
