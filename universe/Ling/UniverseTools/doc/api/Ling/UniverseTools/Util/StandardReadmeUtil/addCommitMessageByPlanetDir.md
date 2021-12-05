[Back to the Ling/UniverseTools api](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools.md)<br>
[Back to the Ling\UniverseTools\Util\StandardReadmeUtil class](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil.md)


StandardReadmeUtil::addCommitMessageByPlanetDir
================



StandardReadmeUtil::addCommitMessageByPlanetDir — Adds a commit message to the history log section of the README files for the given planet..




Description
================


public [StandardReadmeUtil::addCommitMessageByPlanetDir](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil/addCommitMessageByPlanetDir.md)(string $planetDir, string $message, ?array $options = []) : void




Adds a commit message to the history log section of the README files for the given planet..
The version number is incremented from the last version found, using a minor version number increment.
The date is set to the current date.

Available options are:

- increment: bool=false, whether to increment the version number in the readme's "history log" section




Parameters
================


- planetDir

    

- message

    

- options

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [StandardReadmeUtil::addCommitMessageByPlanetDir](https://github.com/lingtalfi/UniverseTools/blob/master/Util/StandardReadmeUtil.php#L299-L319)


See Also
================

The [StandardReadmeUtil](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil.md) class.

Previous method: [updateDate](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil/updateDate.md)<br>Next method: [addError](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil/addError.md)<br>

