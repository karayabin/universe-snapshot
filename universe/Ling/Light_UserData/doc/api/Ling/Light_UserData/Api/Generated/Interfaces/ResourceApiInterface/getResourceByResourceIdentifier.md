[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Api\Generated\Interfaces\ResourceApiInterface class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface.md)


ResourceApiInterface::getResourceByResourceIdentifier
================



ResourceApiInterface::getResourceByResourceIdentifier — Returns the resource row identified by the given resource_identifier.




Description
================


abstract public [ResourceApiInterface::getResourceByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/getResourceByResourceIdentifier.md)(string $resource_identifier, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the resource row identified by the given resource_identifier.

If the row is not found, this method's return depends on the throwNotFoundEx flag:
- if true, the method throws an exception
- if false, the method returns the given default value




Parameters
================


- resource_identifier

    

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
See the source code for method [ResourceApiInterface::getResourceByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/Api/Generated/Interfaces/ResourceApiInterface.php#L66-L66)


See Also
================

The [ResourceApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface.md) class.

Previous method: [getResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/getResourceById.md)<br>Next method: [getResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Interfaces/ResourceApiInterface/getResource.md)<br>

