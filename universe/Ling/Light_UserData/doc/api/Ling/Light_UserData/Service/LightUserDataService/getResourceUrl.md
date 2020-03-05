[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Service\LightUserDataService class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md)


LightUserDataService::getResourceUrl
================



LightUserDataService::getResourceUrl — Returns the url to access the resource identified by the given userIdentifier and relativePath.




Description
================


public [LightUserDataService::getResourceUrl](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getResourceUrl.md)(string $userIdentifier, string $relativePath) : string




Returns the url to access the resource identified by the given userIdentifier and relativePath.
The relativePath is the path relative from the user directory.




Parameters
================


- userIdentifier

    

- relativePath

    


Return values
================

Returns string.


Exceptions thrown
================

- [LightUserDataException](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Exception/LightUserDataException.md).&nbsp;

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightUserDataService::getResourceUrl](https://github.com/lingtalfi/Light_UserData/blob/master/Service/LightUserDataService.php#L409-L448)


See Also
================

The [LightUserDataService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md) class.

Previous method: [save](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/save.md)<br>Next method: [getContent](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getContent.md)<br>

