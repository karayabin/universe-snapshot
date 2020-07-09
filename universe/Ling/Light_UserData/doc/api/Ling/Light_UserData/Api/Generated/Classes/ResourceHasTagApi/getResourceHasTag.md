[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Api\Generated\Classes\ResourceHasTagApi class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceHasTagApi.md)


ResourceHasTagApi::getResourceHasTag
================



ResourceHasTagApi::getResourceHasTag — Returns the resourceHasTag row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).




Description
================


public [ResourceHasTagApi::getResourceHasTag](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceHasTagApi/getResourceHasTag.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the resourceHasTag row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).

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
See the source code for method [ResourceHasTagApi::getResourceHasTag](https://github.com/lingtalfi/Light_UserData/blob/master/Api/Generated/Classes/ResourceHasTagApi.php#L103-L122)


See Also
================

The [ResourceHasTagApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceHasTagApi.md) class.

Previous method: [getResourceHasTagByResourceIdAndTagId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceHasTagApi/getResourceHasTagByResourceIdAndTagId.md)<br>Next method: [getResourceHasTags](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceHasTagApi/getResourceHasTags.md)<br>

