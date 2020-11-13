[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\FileManager\LightUserDataFileManagerHandlerStacking class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandlerStacking.md)


LightUserDataFileManagerHandlerStacking::getDestinationPath
================



LightUserDataFileManagerHandlerStacking::getDestinationPath — Returns the relative destination path (from the user directory) for the file based on the given request and uploadGem helper.




Description
================


protected [LightUserDataFileManagerHandlerStacking::getDestinationPath](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandlerStacking/getDestinationPath.md)(Ling\Light\Http\HttpRequestInterface $request, Ling\Light_UploadGems\GemHelper\GemHelper $helper) : string




Returns the relative destination path (from the user directory) for the file based on the given request and uploadGem helper.

We use internal heuristics, just look at the code to see how we do it.




Parameters
================


- request

    

- helper

    


Return values
================

Returns string.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightUserDataFileManagerHandlerStacking::getDestinationPath](https://github.com/lingtalfi/Light_UserData/blob/master/FileManager/LightUserDataFileManagerHandlerStacking.php#L665-L696)


See Also
================

The [LightUserDataFileManagerHandlerStacking](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandlerStacking.md) class.

Previous method: [getResourceInfoFromVirtualMachine](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandlerStacking/getResourceInfoFromVirtualMachine.md)<br>Next method: [error](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandlerStacking/error.md)<br>

