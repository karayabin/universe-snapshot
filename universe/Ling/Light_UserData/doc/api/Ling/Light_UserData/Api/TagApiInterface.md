[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)



The TagApiInterface class
================
2019-09-27 --> 2019-12-20






Introduction
============

The TagApiInterface interface.
It implements the ling standard object methods concept.



Class synopsis
==============


abstract class <span class="pl-k">TagApiInterface</span>  {

- Methods
    - abstract public [insertTag](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/TagApiInterface/insertTag.md)(array $tag, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed
    - abstract public [getTagById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/TagApiInterface/getTagById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getTagByName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/TagApiInterface/getTagByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : mixed
    - abstract public [getAllIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/TagApiInterface/getAllIds.md)() : array
    - abstract public [updateTagById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/TagApiInterface/updateTagById.md)(int $id, array $tag) : void
    - abstract public [updateTagByName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/TagApiInterface/updateTagByName.md)(string $name, array $tag) : void
    - abstract public [deleteTagById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/TagApiInterface/deleteTagById.md)(int $id) : void
    - abstract public [deleteTagByName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/TagApiInterface/deleteTagByName.md)(string $name) : void

}






Methods
==============

- [TagApiInterface::insertTag](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/TagApiInterface/insertTag.md) &ndash; Inserts the given tag in the database.
- [TagApiInterface::getTagById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/TagApiInterface/getTagById.md) &ndash; Returns the tag row identified by the given id.
- [TagApiInterface::getTagByName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/TagApiInterface/getTagByName.md) &ndash; Returns the tag row identified by the given name.
- [TagApiInterface::getAllIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/TagApiInterface/getAllIds.md) &ndash; Returns an array of all tag ids.
- [TagApiInterface::updateTagById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/TagApiInterface/updateTagById.md) &ndash; Updates the tag row identified by the given id.
- [TagApiInterface::updateTagByName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/TagApiInterface/updateTagByName.md) &ndash; Updates the tag row identified by the given name.
- [TagApiInterface::deleteTagById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/TagApiInterface/deleteTagById.md) &ndash; Deletes the tag identified by the given id.
- [TagApiInterface::deleteTagByName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/TagApiInterface/deleteTagByName.md) &ndash; Deletes the tag identified by the given name.





Location
=============
Ling\Light_UserData\Api\TagApiInterface<br>
See the source code of [Ling\Light_UserData\Api\TagApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/Api/TagApiInterface.php)



SeeAlso
==============
Previous class: [TagApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/TagApi.md)<br>Next class: [LightUserData2SvpDataTransformer](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Chloroform/DataTransformer/LightUserData2SvpDataTransformer.md)<br>
