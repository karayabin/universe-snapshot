[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Api\Generated\Classes\TagApi class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi.md)


TagApi::getTagIdByName
================



TagApi::getTagIdByName — Returns the id of the luda_tag table.




Description
================


public [TagApi::getTagIdByName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/getTagIdByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed




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
See the source code for method [TagApi::getTagIdByName](https://github.com/lingtalfi/Light_UserData/blob/master/Api/Generated/Classes/TagApi.php#L194-L209)


See Also
================

The [TagApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi.md) class.

Previous method: [getTagsKey2Value](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/getTagsKey2Value.md)<br>Next method: [getTagsByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/TagApi/getTagsByResourceId.md)<br>

