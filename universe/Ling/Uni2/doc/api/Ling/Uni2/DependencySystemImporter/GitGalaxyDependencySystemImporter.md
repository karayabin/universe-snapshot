[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)



The GitGalaxyDependencySystemImporter class
================
2019-03-12 --> 2019-03-21






Introduction
============

The GitGalaxyDependencySystemImporter class.

Will import planets from github.com.

See more details in [the universe dependency system page](https://github.com/lingtalfi/TheScientist/blob/master/universe-dependencies-2019.md).

About the importPackage method
-------------

The packageName argument should be the planetName.

The destDir parameter should be the universe directory of the application.
Note that the galaxy doesn't appear here, since all planets share the same universe.


So for instance if the packageName's value is: Bat,
then the planet will ultimately be placed in this directory:

- /my_app/universe/Bat



Class synopsis
==============


class <span class="pl-k">GitGalaxyDependencySystemImporter</span> extends [AbstractGitDependencySystemImporter](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/AbstractGitDependencySystemImporter.md) implements [DependencySystemImporterInterface](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/DependencySystemImporterInterface.md) {

- Properties
    - protected string [$baseRepoName](#property-baseRepoName) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/GitGalaxyDependencySystemImporter/__construct.md)() : void
    - public [getPackageSymbolicName](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/GitGalaxyDependencySystemImporter/getPackageSymbolicName.md)(string $packageImportName) : string
    - public [importPackage](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/GitGalaxyDependencySystemImporter/importPackage.md)(string $packageImportName, string $destDir, Ling\CliTools\Output\OutputInterface $output, array $options = []) : bool
    - public [setBaseRepoName](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/GitGalaxyDependencySystemImporter/setBaseRepoName.md)(string $baseRepoName) : void

- Inherited methods
    - public [AbstractGitDependencySystemImporter::doImportPackage](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/AbstractGitDependencySystemImporter/doImportPackage.md)(string $repoPath, string $destDir, Ling\CliTools\Output\OutputInterface $output, array $options = []) : bool

}




Properties
=============

- <span id="property-baseRepoName"><b>baseRepoName</b></span>

    This property holds the base repo name for this instance.
    
    



Methods
==============

- [GitGalaxyDependencySystemImporter::__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/GitGalaxyDependencySystemImporter/__construct.md) &ndash; Builds the GitGalaxyDependencySystemImporter instance.
- [GitGalaxyDependencySystemImporter::getPackageSymbolicName](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/GitGalaxyDependencySystemImporter/getPackageSymbolicName.md) &ndash; Returns the package symbolic name from the given $packageImportName.
- [GitGalaxyDependencySystemImporter::importPackage](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/GitGalaxyDependencySystemImporter/importPackage.md) &ndash; Imports the $packageImportName under the $destDir, and returns whether or not the import was successful.
- [GitGalaxyDependencySystemImporter::setBaseRepoName](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/GitGalaxyDependencySystemImporter/setBaseRepoName.md) &ndash; Sets the baseRepoName.
- [AbstractGitDependencySystemImporter::doImportPackage](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/AbstractGitDependencySystemImporter/doImportPackage.md) &ndash; Imports the github.com repo which path is $repoPath to the $destDir directory.





Location
=============
Ling\Uni2\DependencySystemImporter\GitGalaxyDependencySystemImporter


SeeAlso
==============
Previous class: [DependencySystemImporterInterface](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/DependencySystemImporterInterface.md)<br>Next class: [GitRepoDependencySystemImporter](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/GitRepoDependencySystemImporter.md)<br>
