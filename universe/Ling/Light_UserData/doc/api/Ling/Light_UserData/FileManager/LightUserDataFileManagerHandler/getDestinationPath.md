[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\FileManager\LightUserDataFileManagerHandler class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandler.md)


LightUserDataFileManagerHandler::getDestinationPath
================



LightUserDataFileManagerHandler::getDestinationPath — Returns the relative destination path (from the user directory) for the file based on the given request and uploadGem helper.




Description
================


protected [LightUserDataFileManagerHandler::getDestinationPath](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandler/getDestinationPath.md)(Ling\Light\Http\HttpRequestInterface $request, Ling\Light_UploadGems\GemHelper\GemHelperInterface $helper) : string




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
See the source code for method [LightUserDataFileManagerHandler::getDestinationPath](https://github.com/lingtalfi/Light_UserData/blob/master/FileManager/LightUserDataFileManagerHandler.php#L653-L684)


See Also
================

The [LightUserDataFileManagerHandler](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandler.md) class.

Previous method: [getResourceInfoFromVirtualMachine](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandler/getResourceInfoFromVirtualMachine.md)<br>Next method: [error](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandler/error.md)<br>

