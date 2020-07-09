[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Api\Generated\Classes\ResourceApi class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi.md)


ResourceApi::getResourceIdByResourceIdentifier
================



ResourceApi::getResourceIdByResourceIdentifier — Returns the id of the luda_resource table.




Description
================


public [ResourceApi::getResourceIdByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/getResourceIdByResourceIdentifier.md)(string $resource_identifier, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed




Returns the id of the luda_resource table.

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

Returns string | mixed.








Source Code
===========
See the source code for method [ResourceApi::getResourceIdByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/Api/Generated/Classes/ResourceApi.php#L194-L209)


See Also
================

The [ResourceApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi.md) class.

Previous method: [getResourcesKey2Value](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/getResourcesKey2Value.md)<br>Next method: [getAllIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Generated/Classes/ResourceApi/getAllIds.md)<br>

