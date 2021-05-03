[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)



The LightUserDataFileManagerHandlerInterface class
================
2019-09-27 --> 2021-03-22






Introduction
============

The LightUserDataFileManagerHandler class.

The goal of this class is to handle the [file manager protocol](https://github.com/lingtalfi/TheBar/blob/master/discussions/file-manager-protocol.md) for the Light_UserData plugin.
The concrete might/might not use a virtual server under the hood.



Class synopsis
==============


abstract class <span class="pl-k">LightUserDataFileManagerHandlerInterface</span>  {

- Methods
    - abstract public [handle](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandlerInterface/handle.md)(string $action, Ling\Light\Http\HttpRequestInterface $request) : void

}






Methods
==============

- [LightUserDataFileManagerHandlerInterface::handle](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandlerInterface/handle.md) &ndash; Handles the given [file manager protocol](https://github.com/lingtalfi/TheBar/blob/master/discussions/file-manager-protocol.md) action, and returns the appropriate response.





Location
=============
Ling\Light_UserData\FileManager\LightUserDataFileManagerHandlerInterface<br>
See the source code of [Ling\Light_UserData\FileManager\LightUserDataFileManagerHandlerInterface](https://github.com/lingtalfi/Light_UserData/blob/master/FileManager/LightUserDataFileManagerHandlerInterface.php)



SeeAlso
==============
Previous class: [LightUserDataDirectFileManagerHandler](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataDirectFileManagerHandler.md)<br>Next class: [LightUserDataFileManagerHandlerStacking](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/FileManager/LightUserDataFileManagerHandlerStacking.md)<br>
