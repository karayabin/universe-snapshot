[Back to the Ling/UniverseTools api](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools.md)<br>
[Back to the Ling\UniverseTools\Util\StandardReadmeUtil class](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil.md)


StandardReadmeUtil::getLatestVersionInfo
================



StandardReadmeUtil::getLatestVersionInfo — section of the given README file.




Description
================


public [StandardReadmeUtil::getLatestVersionInfo](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil/getLatestVersionInfo.md)(string $readMeFile, ?array &$errors = []) : array | false




Returns information about the latest version found in the **History Log**
section of the given README file.

Returns false if a problem occurred, in which case errors are accessible via the getErrors method.

In case of success, the array has the following structure:

- 0: version
- 1: text


Errors, if any, are put in the errors array.




Parameters
================


- readMeFile

    

- errors

    


Return values
================

Returns array | false.








Source Code
===========
See the source code for method [StandardReadmeUtil::getLatestVersionInfo](https://github.com/lingtalfi/UniverseTools/blob/master/Util/StandardReadmeUtil.php#L61-L113)


See Also
================

The [StandardReadmeUtil](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil.md) class.

Previous method: [__construct](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil/__construct.md)<br>Next method: [getErrors](https://github.com/lingtalfi/UniverseTools/blob/master/doc/api/Ling/UniverseTools/Util/StandardReadmeUtil/getErrors.md)<br>

