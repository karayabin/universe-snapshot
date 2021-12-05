[Back to the Ling/UniverseTools api](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools.md)<br>
[Back to the Ling\UniverseTools\Util\StandardReadmeUtil class](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil.md)


StandardReadmeUtil::addCommitMessageByUniverseDir
================



StandardReadmeUtil::addCommitMessageByUniverseDir — Adds a commit message to the history log section of the README files for each planet in the given universeDir.




Description
================


public [StandardReadmeUtil::addCommitMessageByUniverseDir](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil/addCommitMessageByUniverseDir.md)(string $universeDir, string $message) : void




Adds a commit message to the history log section of the README files for each planet in the given universeDir.
The version number is incremented from the last version found, using a minor version number increment.
The date is set to the current date.




Parameters
================


- universeDir

    

- message

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [StandardReadmeUtil::addCommitMessageByUniverseDir](https://github.com/lingtalfi/UniverseTools/blob/master/Util/StandardReadmeUtil.php#L240-L246)


See Also
================

The [StandardReadmeUtil](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil.md) class.

Previous method: [getPlanetsToCommitListByAppDir](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil/getPlanetsToCommitListByAppDir.md)<br>Next method: [updateDate](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil/updateDate.md)<br>

