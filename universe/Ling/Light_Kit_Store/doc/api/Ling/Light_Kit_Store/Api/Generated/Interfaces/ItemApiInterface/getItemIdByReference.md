[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Api\Generated\Interfaces\ItemApiInterface class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface.md)


ItemApiInterface::getItemIdByReference
================



ItemApiInterface::getItemIdByReference — Returns the id of the lks_item table.




Description
================


abstract public [ItemApiInterface::getItemIdByReference](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/getItemIdByReference.md)(string $reference, ?$default = null, ?bool $throwNotFoundEx = false) : string | mixed




Returns the id of the lks_item table.

If the row is not found, this method's return depends on the throwNotFoundEx flag:
- if true, the method throws an exception
- if false, the method returns the given default value




Parameters
================


- reference

    

- default

    

- throwNotFoundEx

    


Return values
================

Returns string | mixed.








Source Code
===========
See the source code for method [ItemApiInterface::getItemIdByReference](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Generated/Interfaces/ItemApiInterface.php#L236-L236)


See Also
================

The [ItemApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface.md) class.

Previous method: [getItemIdByProviderAndIdentifier](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/getItemIdByProviderAndIdentifier.md)<br>Next method: [getItemsByAuthorId](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/getItemsByAuthorId.md)<br>

