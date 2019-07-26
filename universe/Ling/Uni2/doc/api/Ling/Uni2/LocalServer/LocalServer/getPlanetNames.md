[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)<br>
[Back to the Ling\Uni2\LocalServer\LocalServer class](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer.md)


LocalServer::getPlanetNames
================



LocalServer::getPlanetNames — Returns an array containing all the planet long names for the given galaxies.




Description
================


public [LocalServer::getPlanetNames](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer/getPlanetNames.md)(array $galaxies, bool $useVersionNumber = false) : array




Returns an array containing all the planet long names for the given galaxies.
If the $useVersionNumber argument is set to true, will return an array of items,
each item being:

- 0: long planet name
- 1: version number (or undefined if not set)




Parameters
================


- galaxies

    Array of galaxy names.

- useVersionNumber

    


Return values
================

Returns array.


Exceptions thrown
================

- [Uni2Exception](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Exception/Uni2Exception.md).&nbsp;
When the root dir is not set.






Source Code
===========
See the source code for method [LocalServer::getPlanetNames](https://github.com/lingtalfi/Uni2/blob/master/LocalServer/LocalServer.php#L257-L286)


See Also
================

The [LocalServer](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer.md) class.

Previous method: [getNonPlanetItemsDirectoryList](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer/getNonPlanetItemsDirectoryList.md)<br>

