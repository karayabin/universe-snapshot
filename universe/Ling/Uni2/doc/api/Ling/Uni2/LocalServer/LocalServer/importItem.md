[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)<br>
[Back to the Ling\Uni2\LocalServer\LocalServer class](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer.md)


LocalServer::importItem
================



LocalServer::importItem — Imports the $sourceDir directory from the application to the local server.




Description
================


public [LocalServer::importItem](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer/importItem.md)(string $sourceDir, string $localServerRelativeDestDir, bool $isPlanet) : bool




Imports the $sourceDir directory from the application to the local server.
Returns true, or false if something went wrong.




Parameters
================


- sourceDir

    The item directory to copy from the application.

- localServerRelativeDestDir

    The relative path to where the item should be placed on the local server.
This path is relative to the local server's root dir.

- isPlanet

    


Return values
================

Returns bool.


Exceptions thrown
================

- [Uni2Exception](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Exception/Uni2Exception.md).&nbsp;
When the root dir is not set.






Source Code
===========
See the source code for method [LocalServer::importItem](https://github.com/lingtalfi/Uni2/blob/master/LocalServer/LocalServer.php#L191-L207)


See Also
================

The [LocalServer](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer.md) class.

Previous method: [replaceItem](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer/replaceItem.md)<br>Next method: [getNonPlanetItemsDirectoryList](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer/getNonPlanetItemsDirectoryList.md)<br>

