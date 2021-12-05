[Back to the Ling/LingTalfi api](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi.md)<br>
[Back to the Ling\LingTalfi\Kaos\Util\CommitWizard class](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard.md)


CommitWizard::commit
================



CommitWizard::commit — Commits the given planet with the given message.




Description
================


public [CommitWizard::commit](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/commit.md)(string $planetDotName, string $commitMessage, ?array $options = []) : void




Commits the given planet with the given message.

Available options are:

- increment: bool=true, whether to increment the version number in the readme's "history log" section
- app: string=null, the path to the host application. If null, the value of the applicationPath property of this class will be used.




Parameters
================


- planetDotName

    

- commitMessage

    

- options

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [CommitWizard::commit](https://github.com/lingtalfi/LingTalfi/blob/master/Kaos/Util/CommitWizard.php#L150-L172)


See Also
================

The [CommitWizard](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard.md) class.

Previous method: [commitPlanets](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/commitPlanets.md)<br>Next method: [commitByPlanetDir](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/CommitWizard/commitByPlanetDir.md)<br>

