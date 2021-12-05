[Back to the Ling/LingTalfi api](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi.md)<br>
[Back to the Ling\LingTalfi\Kaos\Util\CommitWizard class](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard.md)


CommitWizard::commitPlanets
================



CommitWizard::commitPlanets — Commits all the given planets with the given commit message.




Description
================


public [CommitWizard::commitPlanets](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/commitPlanets.md)(array $planetDotNames, string $commitMsg, ?array $options = []) : void




Commits all the given planets with the given commit message.

Note: use this from the terminal.


Available options are:

- increment: bool=true, whether to increment the version number in the readme's "history log" section




Parameters
================


- planetDotNames

    

- commitMsg

    

- options

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [CommitWizard::commitPlanets](https://github.com/lingtalfi/LingTalfi/blob/master/Kaos/Util/CommitWizard.php#L128-L133)


See Also
================

The [CommitWizard](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard.md) class.

Previous method: [commitListFromFile](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/commitListFromFile.md)<br>Next method: [commit](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/commit.md)<br>

