[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Service\LightUserDataService class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md)


LightUserDataService::createResourceByFileContent
================



LightUserDataService::createResourceByFileContent — Creates the resource, which info is given, and returns the resource identifier of the created item.




Description
================


public [LightUserDataService::createResourceByFileContent](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/createResourceByFileContent.md)(array $resource, string $fileContent, string $path, ?array $options = []) : string




Creates the resource, which info is given, and returns the resource identifier of the created item.

The path argument is the relative path where the fileContent should be written in.


Available options are:

- keep_original: bool = false, whether to create an original copy for this file.
- tags: array of tags to attach to the created resource




Parameters
================


- resource

    

- fileContent

    

- path

    

- options

    


Return values
================

Returns string.








Source Code
===========
See the source code for method [LightUserDataService::createResourceByFileContent](https://github.com/lingtalfi/Light_UserData/blob/master/Service/LightUserDataService.php#L696-L739)


See Also
================

The [LightUserDataService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md) class.

Previous method: [getUserDir](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getUserDir.md)<br>Next method: [createResourceByFileItems](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/createResourceByFileItems.md)<br>

