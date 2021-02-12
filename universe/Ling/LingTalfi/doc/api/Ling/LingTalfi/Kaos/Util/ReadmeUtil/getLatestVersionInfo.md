[Back to the Ling/LingTalfi api](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi.md)<br>
[Back to the Ling\LingTalfi\Kaos\Util\ReadmeUtil class](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/ReadmeUtil.md)


ReadmeUtil::getLatestVersionInfo
================



ReadmeUtil::getLatestVersionInfo — section of the given README file.




Description
================


public [ReadmeUtil::getLatestVersionInfo](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/ReadmeUtil/getLatestVersionInfo.md)(string $readMeFile) : array | false




Returns information about the latest version found in the **History Log**
section of the given README file.

Returns false if a problem occurred, in which case errors are accessible via the getErrors method.

In case of success, the array has the following structure:

- 0: version
- 1: text




Parameters
================


- readMeFile

    


Return values
================

Returns array | false.








Source Code
===========
See the source code for method [ReadmeUtil::getLatestVersionInfo](https://github.com/lingtalfi/LingTalfi/blob/master/Kaos/Util/ReadmeUtil.php#L146-L197)


See Also
================

The [ReadmeUtil](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/ReadmeUtil.md) class.

Previous method: [createBasicReadmeFile](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/ReadmeUtil/createBasicReadmeFile.md)<br>Next method: [getAllVersionNumbers](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/ReadmeUtil/getAllVersionNumbers.md)<br>

