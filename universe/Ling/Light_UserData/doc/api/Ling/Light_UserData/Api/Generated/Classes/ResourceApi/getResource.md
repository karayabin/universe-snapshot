[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Api\Generated\Classes\ResourceApi class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi.md)


ResourceApi::getResource
================



ResourceApi::getResource — Returns the resource row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).




Description
================


public [ResourceApi::getResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/getResource.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the resource row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).

If the row is not found, this method's return depends on the throwNotFoundEx flag:
- if true, the method throws an exception
- if false, the method returns the given default value




Parameters
================


- where

    

- markers

    

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
See the source code for method [ResourceApi::getResource](https://github.com/lingtalfi/Light_UserData/blob/master/Api/Generated/Classes/ResourceApi.php#L120-L139)


See Also
================

The [ResourceApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi.md) class.

Previous method: [getResourceByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/getResourceByResourceIdentifier.md)<br>Next method: [getResources](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/getResources.md)<br>

