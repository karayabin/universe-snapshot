[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Service\LightUserDataService class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md)


LightUserDataService::getResourcePathByResourceIdentifier
================



LightUserDataService::getResourcePathByResourceIdentifier — Returns the absolute path to the source file of the resource which identifier is given.




Description
================


public [LightUserDataService::getResourcePathByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getResourcePathByResourceIdentifier.md)(string $resourceIdentifier, ?array $options = []) : string




Returns the absolute path to the source file of the resource which identifier is given.
Throws an exception if the file doesn't exist in the database.

Available options are:
- original: bool=false. Whether to try the original image first.
     If this is true:
         - if the original image exists, its path will be returned
         - otherwise the normal image's path will be returned




Parameters
================


- resourceIdentifier

    

- options

    


Return values
================

Returns string.








Source Code
===========
See the source code for method [LightUserDataService::getResourcePathByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/Service/LightUserDataService.php#L403-L425)


See Also
================

The [LightUserDataService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md) class.

Previous method: [removeResourceByUrl](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/removeResourceByUrl.md)<br>Next method: [getFileContentByResourceFileId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getFileContentByResourceFileId.md)<br>

