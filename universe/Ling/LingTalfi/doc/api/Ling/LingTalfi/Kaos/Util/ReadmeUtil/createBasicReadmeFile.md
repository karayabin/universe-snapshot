[Back to the Ling/LingTalfi api](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi.md)<br>
[Back to the Ling\LingTalfi\Kaos\Util\ReadmeUtil class](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/ReadmeUtil.md)


ReadmeUtil::createBasicReadmeFile
================



ReadmeUtil::createBasicReadmeFile — was successful.




Description
================


public [ReadmeUtil::createBasicReadmeFile](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/ReadmeUtil/createBasicReadmeFile.md)($readmeFile, array $tags) : bool




Writes a basic README file at the given location, and returns whether the creation of the file
was successful.




Parameters
================


- readmeFile

    

- tags

    Must contains the following tags:

- galaxy: the name of the galaxy
- planet: the name of the planet
- ?date: the starting (mysql) date of the project (the current date will be used by default)


Return values
================

Returns bool.








Source Code
===========
See the source code for method [ReadmeUtil::createBasicReadmeFile](https://github.com/lingtalfi/LingTalfi/blob/master/Kaos/Util/ReadmeUtil.php#L83-L116)


See Also
================

The [ReadmeUtil](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/ReadmeUtil.md) class.

Previous method: [setServiceContent](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/ReadmeUtil/setServiceContent.md)<br>Next method: [getLatestVersionInfo](https://github.com/lingtalfi/LingTalfi/blob/master/doc/api/Ling/LingTalfi/Kaos/Util/ReadmeUtil/getLatestVersionInfo.md)<br>

