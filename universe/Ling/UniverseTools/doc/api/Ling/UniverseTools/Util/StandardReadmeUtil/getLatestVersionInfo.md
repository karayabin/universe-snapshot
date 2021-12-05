[Back to the Ling/UniverseTools api](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools.md)<br>
[Back to the Ling\UniverseTools\Util\StandardReadmeUtil class](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil.md)


StandardReadmeUtil::getLatestVersionInfo
================



StandardReadmeUtil::getLatestVersionInfo — section of the given README file.




Description
================


public [StandardReadmeUtil::getLatestVersionInfo](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil/getLatestVersionInfo.md)(string $readMeFile, ?array &$errors = [], ?array $options = []) : array | false




Returns information about the latest version found in the **History Log**
section of the given README file.

Returns false if a problem occurred, in which case errors are accessible via the getErrors method.

In case of success, the array has the following structure:

- 0: version
- 1: text
- 2: isDoubleDash (bool)


Errors, if any, are put in the errors array.


Available options are:

- considerDoubleDash: bool=false, if true, the first version found might be a double dash. If false (by default),
     the first version found can never be a double dash version.

Note: double dash is a convention I use to indicate that the planet needs to be committed (like a todo hint).




Parameters
================


- readMeFile

    

- errors

    

- options

    


Return values
================

Returns array | false.








Source Code
===========
See the source code for method [StandardReadmeUtil::getLatestVersionInfo](https://github.com/lingtalfi/UniverseTools/blob/master/Util/StandardReadmeUtil.php#L71-L134)


See Also
================

The [StandardReadmeUtil](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil.md) class.

Previous method: [__construct](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil/__construct.md)<br>Next method: [getErrors](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil/getErrors.md)<br>

