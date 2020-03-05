[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Api\TagApiInterface class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/TagApiInterface.md)


TagApiInterface::getTagByName
================



TagApiInterface::getTagByName — Returns the tag row identified by the given name.




Description
================


abstract public [TagApiInterface::getTagByName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/TagApiInterface/getTagByName.md)(string $name, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the tag row identified by the given name.

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

Returns mixed.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [TagApiInterface::getTagByName](https://github.com/lingtalfi/Light_UserData/blob/master/Api/TagApiInterface.php#L66-L66)


See Also
================

The [TagApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/TagApiInterface.md) class.

Previous method: [getTagById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/TagApiInterface/getTagById.md)<br>Next method: [getAllIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/TagApiInterface/getAllIds.md)<br>

