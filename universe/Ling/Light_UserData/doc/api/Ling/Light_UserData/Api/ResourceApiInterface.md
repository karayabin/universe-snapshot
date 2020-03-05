[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)



The ResourceApiInterface class
================
2019-09-27 --> 2019-12-20






Introduction
============

The ResourceApiInterface interface.
It implements the ling standard object methods concept.



Class synopsis
==============


abstract class <span class="pl-k">ResourceApiInterface</span>  {

- Methods
    - abstract public [insertResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/ResourceApiInterface/insertResource.md)(array $resource, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [getResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/ResourceApiInterface/getResourceById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getResourceByRealPath](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/ResourceApiInterface/getResourceByRealPath.md)(string $real_path, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getAllIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/ResourceApiInterface/getAllIds.md)() : array
    - abstract public [updateResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/ResourceApiInterface/updateResourceById.md)(int $id, array $resource) : void
    - abstract public [updateResourceByRealPath](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/ResourceApiInterface/updateResourceByRealPath.md)(string $real_path, array $resource) : void
    - abstract public [deleteResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/ResourceApiInterface/deleteResourceById.md)(int $id) : void
    - abstract public [deleteResourceByRealPath](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/ResourceApiInterface/deleteResourceByRealPath.md)(string $real_path) : void

}






Methods
==============

- [ResourceApiInterface::insertResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/ResourceApiInterface/insertResource.md) &ndash; Inserts the given resource in the database.
- [ResourceApiInterface::getResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/ResourceApiInterface/getResourceById.md) &ndash; Returns the resource row identified by the given id.
- [ResourceApiInterface::getResourceByRealPath](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/ResourceApiInterface/getResourceByRealPath.md) &ndash; Returns the resource row identified by the given real_path.
- [ResourceApiInterface::getAllIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/ResourceApiInterface/getAllIds.md) &ndash; Returns an array of all resource ids.
- [ResourceApiInterface::updateResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/ResourceApiInterface/updateResourceById.md) &ndash; Updates the resource row identified by the given id.
- [ResourceApiInterface::updateResourceByRealPath](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/ResourceApiInterface/updateResourceByRealPath.md) &ndash; Updates the resource row identified by the given real_path.
- [ResourceApiInterface::deleteResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/ResourceApiInterface/deleteResourceById.md) &ndash; Deletes the resource identified by the given id.
- [ResourceApiInterface::deleteResourceByRealPath](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/ResourceApiInterface/deleteResourceByRealPath.md) &ndash; Deletes the resource identified by the given real_path.





Location
=============
Ling\Light_UserData\Api\ResourceApiInterface<br>
See the source code of [Ling\Light_UserData\Api\ResourceApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/Api/ResourceApiInterface.php)



SeeAlso
==============
Previous class: [ResourceApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/ResourceApi.md)<br>Next class: [ResourceHasTagApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/ResourceHasTagApi.md)<br>
