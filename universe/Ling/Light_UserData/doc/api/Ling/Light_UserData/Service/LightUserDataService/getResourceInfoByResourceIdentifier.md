[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Service\LightUserDataService class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md)


LightUserDataService::getResourceInfoByResourceIdentifier
================



LightUserDataService::getResourceInfoByResourceIdentifier — Returns a [resource info array](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/conception-notes.md#the-resource-info-array) for the given resource id, or false if the resource info wasn't found.




Description
================


public [LightUserDataService::getResourceInfoByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getResourceInfoByResourceIdentifier.md)(string $resourceId, ?array $options = []) : array | false




Returns a [resource info array](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/conception-notes.md#the-resource-info-array) for the given resource id, or false if the resource info wasn't found.

Available options are:
- tags: bool=false, whether to append the array of tags to the resulting array
- nickname: string=null, if set, the nickname of the file which info to return.
     If not set, the source file's info will be returned.
- original: bool=false, If true, the abs_path property will be pointing to the original file, if found, or otherwise
     the regular file.




Parameters
================


- resourceId

    

- options

    


Return values
================

Returns array | false.








Source Code
===========
See the source code for method [LightUserDataService::getResourceInfoByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/Service/LightUserDataService.php#L600-L652)


See Also
================

The [LightUserDataService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md) class.

Previous method: [getResourcePathByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getResourcePathByResourceIdentifier.md)<br>Next method: [getUrlByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getUrlByResourceIdentifier.md)<br>

