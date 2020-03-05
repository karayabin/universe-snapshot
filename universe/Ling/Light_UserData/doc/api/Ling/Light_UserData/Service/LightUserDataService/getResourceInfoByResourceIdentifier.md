[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Service\LightUserDataService class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md)


LightUserDataService::getResourceInfoByResourceIdentifier
================



LightUserDataService::getResourceInfoByResourceIdentifier — Returns an info array matching the file which resourceIdentifier is given.




Description
================


public [LightUserDataService::getResourceInfoByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getResourceInfoByResourceIdentifier.md)(string $resourceIdentifier, ?array $options = []) : array




Returns an info array matching the file which resourceIdentifier is given.

Throws an exception if the file is private and the user calling the file is not the owner.

The info array is a resource row, with the additional fields added to it:

- abs_path: absolute path to the file
- rel_path: relative path to the file (from the user directory).
- user_identifier: the user identifier
- original_url: string|false. The url to the original file (which might be saved, or not, depending on the configuration).
     If no original url was saved, then false is returned.


The available options are:
- addExtraInfo: bool=false. If true, the following entries are added to the returned array:
     - tags: array of tag names bound to that resource
- original: bool=false. If true, the file paths (absolute and relative) reference the original image rather than the processed one.
     Note: the original image is kept only depending on the plugin configuration.




Parameters
================


- resourceIdentifier

    

- options

    


Return values
================

Returns array.


Exceptions thrown
================

- [LightUserDataException](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Exception/LightUserDataException.md).&nbsp;







Source Code
===========
See the source code for method [LightUserDataService::getResourceInfoByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/Service/LightUserDataService.php#L604-L651)


See Also
================

The [LightUserDataService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md) class.

Previous method: [getResourceUrlByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getResourceUrlByResourceIdentifier.md)<br>Next method: [getResourceInfoByResourceUrl](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getResourceInfoByResourceUrl.md)<br>

