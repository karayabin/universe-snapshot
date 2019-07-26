[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)



The AbstractGitDependencySystemImporter class
================
2019-03-12 --> 2019-07-18






Introduction
============

The BaseGitDependencySystemImporter class.

Will help importing repos from github.com.


Note: I wasn't able to redirect the live output of the git command to the $output object.
As a consequence, whenever the git command is called, the output of the git command is just spitted out
to the console and I loose the pretty indentation formatting.

Note2: solutions might exist to solve this problem but they involve os specific packages, so for now they are not
my priority.



Specific problems
--------------
By design, git redirects everything to stderr.

To capture git multiple lines output:
https://askubuntu.com/questions/989015/how-to-get-git-producing-output-to-a-file/989028#989028


Posix way of redirecting every output to a file.
https://stackoverflow.com/questions/16077918/redirection-in-php-exec-call-creates-empty-file



Implementation vision
-----------------

The git clone command needs an empty directory to work with.
Since we want to clone a repository, we need an empty directory.

A naive approach would be to remove the item (planet or other) dir first,
then clone with the hope that everything goes well.

Well if something goes wrong with the clone command, you end up with having removed the item dir of the user!!
That's not an option.
Furthermore, as with many http based commands, the clone command will fail a lot because of networking/http connection problems.

So, a more sophisticated approach (the one used in this class) is to first clone to a temporary directory,
and then if the clone operation is successful, then (and only then) replace the planet dir with that temporary directory.



Class synopsis
==============


abstract class <span class="pl-k">AbstractGitDependencySystemImporter</span> implements [DependencySystemImporterInterface](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/DependencySystemImporterInterface.md) {

- Methods
    - public [doImportPackage](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/AbstractGitDependencySystemImporter/doImportPackage.md)(string $repoPath, string $destDir, Ling\CliTools\Output\OutputInterface $output, array $options = []) : bool

- Inherited methods
    - abstract public [DependencySystemImporterInterface::importPackage](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/DependencySystemImporterInterface/importPackage.md)(string $packageImportName, string $destDir, Ling\CliTools\Output\OutputInterface $output, array $options = []) : bool
    - abstract public [DependencySystemImporterInterface::getPackageSymbolicName](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/DependencySystemImporterInterface/getPackageSymbolicName.md)(string $packageImportName) : string

}






Methods
==============

- [AbstractGitDependencySystemImporter::doImportPackage](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/AbstractGitDependencySystemImporter/doImportPackage.md) &ndash; Imports the github.com repo which path is $repoPath to the $destDir directory.
- [DependencySystemImporterInterface::importPackage](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/DependencySystemImporterInterface/importPackage.md) &ndash; Imports the $packageImportName under the $destDir, and returns whether or not the import was successful.
- [DependencySystemImporterInterface::getPackageSymbolicName](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/DependencySystemImporterInterface/getPackageSymbolicName.md) &ndash; Returns the package symbolic name from the given $packageImportName.





Location
=============
Ling\Uni2\DependencySystemImporter\AbstractGitDependencySystemImporter<br>
See the source code of [Ling\Uni2\DependencySystemImporter\AbstractGitDependencySystemImporter](https://github.com/lingtalfi/Uni2/blob/master/DependencySystemImporter/AbstractGitDependencySystemImporter.php)



SeeAlso
==============
Previous class: [VersionCommand](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Command/VersionCommand.md)<br>Next class: [DependencySystemImporterInterface](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/DependencySystemImporterInterface.md)<br>
