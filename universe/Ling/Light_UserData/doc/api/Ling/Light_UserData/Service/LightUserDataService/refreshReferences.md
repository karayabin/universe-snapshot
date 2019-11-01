[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Service\LightUserDataService class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md)


LightUserDataService::refreshReferences
================



LightUserDataService::refreshReferences — You should call this method every time you change the obfuscating method.




Description
================


public [LightUserDataService::refreshReferences](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/refreshReferences.md)() : void




This method will do two things:

- recreate the correlation between user identifier and directory names in the luda_directory_map table
- update the lud_user table ([Light_UserDatabase](https://github.com/lingtalfi/Light_UserDatabase)) to add the extra.directory property

You should call this method every time you change the obfuscating method.




Parameters
================

This method has no parameters.


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightUserDataService::refreshReferences](https://github.com/lingtalfi/Light_UserData/blob/master/Service/LightUserDataService.php#L474-L519)


See Also
================

The [LightUserDataService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md) class.

Previous method: [isPrivate](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/isPrivate.md)<br>Next method: [getUserRealDirectoryName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getUserRealDirectoryName.md)<br>

