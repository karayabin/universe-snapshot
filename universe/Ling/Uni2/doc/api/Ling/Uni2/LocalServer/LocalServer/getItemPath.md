[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)<br>
[Back to the Ling\Uni2\LocalServer\LocalServer class](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer.md)


LocalServer::getItemPath
================



LocalServer::getItemPath — Returns the path of an item directory in the local server.




Description
================


public [LocalServer::getItemPath](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer/getItemPath.md)(string $dependencySystemName, string $packageSymbolicName) : string




Returns the path of an item directory in the local server.
The item is identified by the given $dependencySystemName and $packageSymbolicName.
Note: this returns a theoretical path, even if the item actually doesn't exist.




Parameters
================


- dependencySystemName

    

- packageSymbolicName

    


Return values
================

Returns string.


Exceptions thrown
================

- [Uni2Exception](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Exception/Uni2Exception.md).&nbsp;
When the root dir is not set.






Source Code
===========
See the source code for method [LocalServer::getItemPath](https://github.com/lingtalfi/Uni2/blob/master/LocalServer/LocalServer.php#L135-L142)


See Also
================

The [LocalServer](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer.md) class.

Previous method: [hasItem](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer/hasItem.md)<br>Next method: [replaceItem](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer/replaceItem.md)<br>

