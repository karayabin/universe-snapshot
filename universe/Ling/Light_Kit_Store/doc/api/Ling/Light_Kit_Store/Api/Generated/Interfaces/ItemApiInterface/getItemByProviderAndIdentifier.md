[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Api\Generated\Interfaces\ItemApiInterface class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface.md)


ItemApiInterface::getItemByProviderAndIdentifier
================



ItemApiInterface::getItemByProviderAndIdentifier — Returns the item row identified by the given provider and identifier.




Description
================


abstract public [ItemApiInterface::getItemByProviderAndIdentifier](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/getItemByProviderAndIdentifier.md)(string $provider, string $identifier, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the item row identified by the given provider and identifier.

If the row is not found, this method's return depends on the throwNotFoundEx flag:
- if true, the method throws an exception
- if false, the method returns the given default value




Parameters
================


- provider

    

- identifier

    

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
See the source code for method [ItemApiInterface::getItemByProviderAndIdentifier](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Generated/Interfaces/ItemApiInterface.php#L112-L112)


See Also
================

The [ItemApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface.md) class.

Previous method: [getItemById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/getItemById.md)<br>Next method: [getItemByReference](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/ItemApiInterface/getItemByReference.md)<br>

