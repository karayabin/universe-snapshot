[Back to the Ling/UniverseTools api](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools.md)



The StandardReadmeUtil class
================
2019-02-26 --> 2021-07-30






Introduction
============

The StandardReadmeUtil class.



Class synopsis
==============


class <span class="pl-k">StandardReadmeUtil</span>  {

- Properties
    - protected array [$errors](#property-errors) ;
    - private string [$historyLogRegex](#property-historyLogRegex) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil/__construct.md)() : void
    - public [getLatestVersionInfo](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil/getLatestVersionInfo.md)(string $readMeFile, ?array &$errors = [], ?array $options = []) : array | false
    - public [getErrors](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil/getErrors.md)() : array
    - public [addHistoryLogEntry](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil/addHistoryLogEntry.md)(string $readmePath, string $version, string $date, string $message) : void
    - public [getPlanetsToCommitListByAppDir](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil/getPlanetsToCommitListByAppDir.md)(string $appDir) : array
    - public [addCommitMessageByUniverseDir](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil/addCommitMessageByUniverseDir.md)(string $universeDir, string $message) : void
    - public [updateDate](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil/updateDate.md)(string $readMeFile, ?string $date = null) : void
    - public [addCommitMessageByPlanetDir](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil/addCommitMessageByPlanetDir.md)(string $planetDir, string $message, ?array $options = []) : void
    - protected [addError](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil/addError.md)(string $msg) : void
    - public static [getReadmeVersionsByPlanetDir](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil/getReadmeVersionsByPlanetDir.md)(string $planetDir) : array
    - private static [getAllVersionNumbers](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil/getAllVersionNumbers.md)(string $readmePath) : array

}




Properties
=============

- <span id="property-errors"><b>errors</b></span>

    This property holds the errors for this instance.
    
    

- <span id="property-historyLogRegex"><b>historyLogRegex</b></span>

    This property holds the historyLogRegex for this instance.
    
    



Methods
==============

- [StandardReadmeUtil::__construct](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil/__construct.md) &ndash; Builds the ReadmeUtil instance.
- [StandardReadmeUtil::getLatestVersionInfo](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil/getLatestVersionInfo.md) &ndash; section of the given README file.
- [StandardReadmeUtil::getErrors](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil/getErrors.md) &ndash; Returns the errors of this instance.
- [StandardReadmeUtil::addHistoryLogEntry](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil/addHistoryLogEntry.md) &ndash; Adds an history entry to the given "read me" file, with the given message, date and version.
- [StandardReadmeUtil::getPlanetsToCommitListByAppDir](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil/getPlanetsToCommitListByAppDir.md) &ndash; Returns the array of the planet dot names to commit.
- [StandardReadmeUtil::addCommitMessageByUniverseDir](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil/addCommitMessageByUniverseDir.md) &ndash; Adds a commit message to the history log section of the README files for each planet in the given universeDir.
- [StandardReadmeUtil::updateDate](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil/updateDate.md) &ndash; Updates the date of the README.md file.
- [StandardReadmeUtil::addCommitMessageByPlanetDir](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil/addCommitMessageByPlanetDir.md) &ndash; Adds a commit message to the history log section of the README files for the given planet..
- [StandardReadmeUtil::addError](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil/addError.md) &ndash; Adds a message error.
- [StandardReadmeUtil::getReadmeVersionsByPlanetDir](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil/getReadmeVersionsByPlanetDir.md) &ndash; Returns the array of all version numbers found in the README.md of the given planetDir.
- [StandardReadmeUtil::getAllVersionNumbers](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil/getAllVersionNumbers.md) &ndash; Returns an array of all version numbers found in the in the "History Log" section of the "read me" file.





Location
=============
Ling\UniverseTools\Util\StandardReadmeUtil<br>
See the source code of [Ling\UniverseTools\Util\StandardReadmeUtil](https://github.com/lingtalfi/UniverseTools/blob/master/Util/StandardReadmeUtil.php)



SeeAlso
==============
Previous class: [PlanetTool](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/PlanetTool.md)<br>
