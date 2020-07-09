[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Api\Generated\Interfaces\ResourceApiInterface class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface.md)


ResourceApiInterface::getResourceById
================



ResourceApiInterface::getResourceById — Returns the resource row identified by the given id.




Description
================


abstract public [ResourceApiInterface::getResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/getResourceById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the resource row identified by the given id.

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
See the source code for method [ResourceApiInterface::getResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/Api/Generated/Interfaces/ResourceApiInterface.php#L50-L50)


See Also
================

The [ResourceApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface.md) class.

Previous method: [insertResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/insertResource.md)<br>Next method: [getResourceByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/getResourceByResourceIdentifier.md)<br>

