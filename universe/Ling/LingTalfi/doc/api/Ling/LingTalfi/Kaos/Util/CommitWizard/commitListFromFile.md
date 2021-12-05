[Back to the Ling/LingTalfi api](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi.md)<br>
[Back to the Ling\LingTalfi\Kaos\Util\CommitWizard class](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard.md)


CommitWizard::commitListFromFile
================



CommitWizard::commitListFromFile — Commits all planets listed in the given file, with the given commit message.




Description
================


public [CommitWizard::commitListFromFile](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/commitListFromFile.md)(string $filePath, string $commitMsg, ?array $options = []) : void




Commits all planets listed in the given file, with the given commit message.

The file is in [babyYaml](https://github.com/lingtalfi/BabyYaml) format.
Each item of the list should be a planetDotName.

More info at https://github.com/karayabin/universe-snapshot#the-planet-dot-name.

Available options are:

- increment: bool=true, whether to increment the version number in the readme's "history log" section




Parameters
================


- filePath

    

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
See the source code for method [CommitWizard::commitListFromFile](https://github.com/lingtalfi/LingTalfi/blob/master/Kaos/Util/CommitWizard.php#L97-L107)


See Also
================

The [CommitWizard](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard.md) class.

Previous method: [setOutput](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/setOutput.md)<br>Next method: [commitPlanets](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/commitPlanets.md)<br>

