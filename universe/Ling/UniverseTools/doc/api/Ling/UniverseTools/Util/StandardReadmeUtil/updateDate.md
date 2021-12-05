[Back to the Ling/UniverseTools api](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools.md)<br>
[Back to the Ling\UniverseTools\Util\StandardReadmeUtil class](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil.md)


StandardReadmeUtil::updateDate
================



StandardReadmeUtil::updateDate — Updates the date of the README.md file.




Description
================


public [StandardReadmeUtil::updateDate](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil/updateDate.md)(string $readMeFile, ?string $date = null) : void




Updates the date of the README.md file.
The date:
- must be on line 3
- must start at the beginning of the line
- the last char of the line must be part of a date
- can have a first/last date separator being either: -> or -->
- both first and last component must have the mysql date format (i.e. 2021-03-05)

This method always updates the "last" part of the date.




Parameters
================


- readMeFile

    

- date

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [StandardReadmeUtil::updateDate](https://github.com/lingtalfi/UniverseTools/blob/master/Util/StandardReadmeUtil.php#L264-L281)


See Also
================

The [StandardReadmeUtil](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil.md) class.

Previous method: [addCommitMessageByUniverseDir](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil/addCommitMessageByUniverseDir.md)<br>Next method: [addCommitMessageByPlanetDir](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil/addCommitMessageByPlanetDir.md)<br>

