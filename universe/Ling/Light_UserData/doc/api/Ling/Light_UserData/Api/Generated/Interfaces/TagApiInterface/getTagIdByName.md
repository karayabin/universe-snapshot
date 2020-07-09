[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Api\Generated\Interfaces\TagApiInterface class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface.md)


TagApiInterface::getTagIdByName
================



TagApiInterface::getTagIdByName — Returns the id of the luda_tag table.




Description
================


abstract public [TagApiInterface::getTagIdByName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getTagIdByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed




Returns the id of the luda_tag table.

If the row is not found, this method's return depends on the throwNotFoundEx flag:
- if true, the method throws an exception
- if false, the method returns the given default value




Parameters
================


- name

    

- default

    

- throwNotFoundEx

    


Return values
================

Returns string | mixed.








Source Code
===========
See the source code for method [TagApiInterface::getTagIdByName](https://github.com/lingtalfi/Light_UserData/blob/master/Api/Generated/Interfaces/TagApiInterface.php#L159-L159)


See Also
================

The [TagApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface.md) class.

Previous method: [getTagsKey2Value](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getTagsKey2Value.md)<br>Next method: [getTagsByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/TagApiInterface/getTagsByResourceId.md)<br>

