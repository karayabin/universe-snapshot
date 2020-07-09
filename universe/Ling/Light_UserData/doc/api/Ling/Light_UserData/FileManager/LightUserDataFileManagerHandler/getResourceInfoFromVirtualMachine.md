[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\FileManager\LightUserDataFileManagerHandler class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandler.md)


LightUserDataFileManagerHandler::getResourceInfoFromVirtualMachine
================



LightUserDataFileManagerHandler::getResourceInfoFromVirtualMachine — Returns the resource info for the given resource.




Description
================


public [LightUserDataFileManagerHandler::getResourceInfoFromVirtualMachine](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandler/getResourceInfoFromVirtualMachine.md)(string $resourceId, ?array $options = []) : void




Returns the resource info for the given resource.
The resource info is an array described in LightUserDataService->getResourceInfoByResourceIdentifier.


The options are:
- original: bool, whether to return the path of the original file (if any) instead of the regular file
- addExtraInfo: bool=false (see the getResourceInfoByResourceIdentifier method for more info)




Parameters
================


- resourceId

    

- options

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightUserDataFileManagerHandler::getResourceInfoFromVirtualMachine](https://github.com/lingtalfi/Light_UserData/blob/master/FileManager/LightUserDataFileManagerHandler.php#L601-L638)


See Also
================

The [LightUserDataFileManagerHandler](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandler.md) class.

Previous method: [handle](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandler/handle.md)<br>Next method: [getDestinationPath](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandler/getDestinationPath.md)<br>

