[Back to the Ling/Uni2 api](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2.md)



The LocalServer class
================
2019-03-12 --> 2019-03-21






Introduction
============

The LocalServer class.
This class represents [the local server](https://github.com/lingtalfi/Uni2/blob/master/README.md#the-local-server).

By design, one should always check that the server is active (isActive method)
before using it.



Class synopsis
==============


class <span class="pl-k">LocalServer</span>  {

- Properties
    - protected string [$rootDir](#property-rootDir) ;
    - protected bool [$active](#property-active) ;

- Methods
    - public [__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer/__construct.md)() : void
    - public [exists](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer/exists.md)() : bool
    - public [setRootDir](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer/setRootDir.md)(string $rootDir) : void
    - public [getRootDir](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer/getRootDir.md)() : string | null
    - public [setActive](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer/setActive.md)(bool $active) : void
    - public [isActive](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer/isActive.md)() : bool
    - public [hasItem](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer/hasItem.md)(string $dependencySystemName, string $packageSymbolicName) : bool
    - public [getItemPath](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer/getItemPath.md)(string $dependencySystemName, string $packageSymbolicName) : string
    - public [replaceItem](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer/replaceItem.md)(string $localServerRelativeSrcDir, string $applicationDstDir) : bool
    - public [importItem](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer/importItem.md)(string $sourceDir, string $localServerRelativeDestDir, bool $isPlanet) : bool
    - public [getNonPlanetItemsDirectoryList](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer/getNonPlanetItemsDirectoryList.md)() : array
    - public [getPlanetNames](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer/getPlanetNames.md)(array $galaxies, bool $useVersionNumber = false) : array

}




Properties
=============

- <span id="property-rootDir"><b>rootDir</b></span>

    This property holds the rootDir for this instance.
    
    

- <span id="property-active"><b>active</b></span>

    This property holds the active for this instance.
    
    



Methods
==============

- [LocalServer::__construct](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer/__construct.md) &ndash; Builds the LocalServer instance.
- [LocalServer::exists](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer/exists.md) &ndash; Returns whether the local server exists.
- [LocalServer::setRootDir](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer/setRootDir.md) &ndash; Sets the rootDir.
- [LocalServer::getRootDir](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer/getRootDir.md) &ndash; Returns the rootDir of this instance.
- [LocalServer::setActive](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer/setActive.md) &ndash; Sets whether the root server is active.
- [LocalServer::isActive](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer/isActive.md) &ndash; Returns whether the local server is both configured and active.
- [LocalServer::hasItem](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer/hasItem.md) &ndash; Returns whether the local server has the given item.
- [LocalServer::getItemPath](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer/getItemPath.md) &ndash; Returns the path of an item directory in the local server.
- [LocalServer::replaceItem](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer/replaceItem.md) &ndash; and returns whether the operation was successful.
- [LocalServer::importItem](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer/importItem.md) &ndash; Imports the $sourceDir directory from the application to the local server.
- [LocalServer::getNonPlanetItemsDirectoryList](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer/getNonPlanetItemsDirectoryList.md) &ndash; Returns the list of the relative directory paths for non-planet items stored in the local server.
- [LocalServer::getPlanetNames](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/LocalServer/LocalServer/getPlanetNames.md) &ndash; Returns an array containing all the planet long names for the given galaxies.





Location
=============
Ling\Uni2\LocalServer\LocalServer


SeeAlso
==============
Previous class: [OutputHelper](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/Helper/OutputHelper.md)<br>Next class: [PostInstallDirectiveHandler](https://github.com/lingtalfi/Uni2/blob/master/doc/api/Ling/Uni2/PostInstall/DirectiveHandler/PostInstallDirectiveHandler.md)<br>
