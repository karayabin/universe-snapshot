[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Api\Generated\Classes\ItemApi class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi.md)


ItemApi::getItemByProviderAndIdentifier
================



ItemApi::getItemByProviderAndIdentifier — Returns the item row identified by the given provider and identifier.




Description
================


public [ItemApi::getItemByProviderAndIdentifier](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/getItemByProviderAndIdentifier.md)(string $provider, string $identifier, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




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
See the source code for method [ItemApi::getItemByProviderAndIdentifier](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Generated/Classes/ItemApi.php#L170-L185)


See Also
================

The [ItemApi](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi.md) class.

Previous method: [getItemById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/getItemById.md)<br>Next method: [getItemByReference](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Classes/ItemApi/getItemByReference.md)<br>

