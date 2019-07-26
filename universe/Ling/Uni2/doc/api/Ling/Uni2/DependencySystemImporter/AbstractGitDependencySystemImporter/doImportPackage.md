[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)<br>
[Back to the Ling\Uni2\DependencySystemImporter\AbstractGitDependencySystemImporter class](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/AbstractGitDependencySystemImporter.md)


AbstractGitDependencySystemImporter::doImportPackage
================



AbstractGitDependencySystemImporter::doImportPackage — Imports the github.com repo which path is $repoPath to the $destDir directory.




Description
================


public [AbstractGitDependencySystemImporter::doImportPackage](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/AbstractGitDependencySystemImporter/doImportPackage.md)(string $repoPath, string $destDir, Ling\CliTools\Output\OutputInterface $output, array $options = []) : bool




Imports the github.com repo which path is $repoPath to the $destDir directory.
Logs the messages to the output.

Note: the output of the git command, as for now, is not passed to the output (due to technical
difficulties I encountered which I couldn't resolve) but is spitted out directly to the terminal.


The repo path is the part of the repository url after the "https://github.com/" string.




Parameters
================


- repoPath

    

- destDir

    

- output

    

- options

    - ?indentLevel: int = 0. The base indent level to start with


Return values
================

Returns bool.








Source Code
===========
See the source code for method [AbstractGitDependencySystemImporter::doImportPackage](https://github.com/lingtalfi/Uni2/blob/master/DependencySystemImporter/AbstractGitDependencySystemImporter.php#L84-L131)


See Also
================

The [AbstractGitDependencySystemImporter](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/DependencySystemImporter/AbstractGitDependencySystemImporter.md) class.



