[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)<br>
[Back to the Ling\Uni2\LocalServer\LocalServer class](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer.md)


LocalServer::getNonPlanetItemsDirectoryList
================



LocalServer::getNonPlanetItemsDirectoryList — Returns the list of the relative directory paths for non-planet items stored in the local server.




Description
================


public [LocalServer::getNonPlanetItemsDirectoryList](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer/getNonPlanetItemsDirectoryList.md)() : array




Returns the list of the relative directory paths for non-planet items stored in the local server.

The paths returned are relative to the local server's root dir.

Note: the universe-dependency-marker.txt marker is used under the hood to detect such items.




Parameters
================

This method has no parameters.


Return values
================

Returns array.


Exceptions thrown
================

- [Uni2Exception](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Exception/Uni2Exception.md).&nbsp;
When the root dir is not set.






See Also
================

The [LocalServer](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer.md) class.

Previous method: [importItem](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer/importItem.md)<br>Next method: [getPlanetNames](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer/getPlanetNames.md)<br>

