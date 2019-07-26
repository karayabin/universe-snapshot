[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)<br>
[Back to the Ling\Uni2\LocalServer\LocalServer class](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer.md)


LocalServer::replaceItem
================



LocalServer::replaceItem — and returns whether the operation was successful.




Description
================


public [LocalServer::replaceItem](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer/replaceItem.md)(string $localServerRelativeSrcDir, string $applicationDstDir) : bool




Replaces an item from the application with the same item from the local server instead,
and returns whether the operation was successful.




Parameters
================


- localServerRelativeSrcDir

    The relative path of the local server; relative to the local server's root dir.
It should be of the form: ```<dependencySystem> </> <itemName>```.

- applicationDstDir

    The path to the application item directory to replace.


Return values
================

Returns bool.


Exceptions thrown
================

- [Uni2Exception](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Exception/Uni2Exception.md).&nbsp;
When something goes wrong.






Source Code
===========
See the source code for method [LocalServer::replaceItem](https://github.com/lingtalfi/Uni2/blob/master/LocalServer/LocalServer.php#L160-L172)


See Also
================

The [LocalServer](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer.md) class.

Previous method: [getItemPath](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer/getItemPath.md)<br>Next method: [importItem](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer/importItem.md)<br>

