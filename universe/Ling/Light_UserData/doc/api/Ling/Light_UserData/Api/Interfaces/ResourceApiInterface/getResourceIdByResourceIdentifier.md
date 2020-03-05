[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Api\Interfaces\ResourceApiInterface class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Interfaces/ResourceApiInterface.md)


ResourceApiInterface::getResourceIdByResourceIdentifier
================



ResourceApiInterface::getResourceIdByResourceIdentifier — Returns the id of the luda_resource table.




Description
================


abstract public [ResourceApiInterface::getResourceIdByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Interfaces/ResourceApiInterface/getResourceIdByResourceIdentifier.md)(string $resource_identifier, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed




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
See the source code for method [ResourceApiInterface::getResourceIdByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/Api/Interfaces/ResourceApiInterface.php#L112-L112)


See Also
================

The [ResourceApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Interfaces/ResourceApiInterface.md) class.

Previous method: [getResources](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Interfaces/ResourceApiInterface/getResources.md)<br>Next method: [getAllIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Interfaces/ResourceApiInterface/getAllIds.md)<br>

