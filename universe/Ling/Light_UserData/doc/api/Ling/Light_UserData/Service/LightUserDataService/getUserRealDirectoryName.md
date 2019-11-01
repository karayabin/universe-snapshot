[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Service\LightUserDataService class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md)


LightUserDataService::getUserRealDirectoryName
================



LightUserDataService::getUserRealDirectoryName — or returns false if no directory matches.




Description
================


public [LightUserDataService::getUserRealDirectoryName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getUserRealDirectoryName.md)(string $obfuscatedName) : string | false




Returns the real name of the user directory, which obfuscated name was given,
or returns false if no directory matches.




Parameters
================


- obfuscatedName

    


Return values
================

Returns string | false.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightUserDataService::getUserRealDirectoryName](https://github.com/lingtalfi/Light_UserData/blob/master/Service/LightUserDataService.php#L530-L538)


See Also
================

The [LightUserDataService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md) class.

Previous method: [refreshReferences](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/refreshReferences.md)<br>Next method: [getUserObfuscatedDirectoryName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getUserObfuscatedDirectoryName.md)<br>

