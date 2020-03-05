[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Api\Classes\TagApi class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/TagApi.md)


TagApi::getTagById
================



TagApi::getTagById — Returns the tag row identified by the given id.




Description
================


public [TagApi::getTagById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/TagApi/getTagById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the tag row identified by the given id.

If the row is not found, this method's return depends on the throwNotFoundEx flag:
- if true, the method throws an exception
- if false, the method returns the given default value




Parameters
================


- id

    

- default

    

- throwNotFoundEx

    


Return values
================

Returns mixed.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [TagApi::getTagById](https://github.com/lingtalfi/Light_UserData/blob/master/Api/Classes/TagApi.php#L76-L90)


See Also
================

The [TagApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/TagApi.md) class.

Previous method: [insertTag](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/TagApi/insertTag.md)<br>Next method: [getTagByName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Classes/TagApi/getTagByName.md)<br>

