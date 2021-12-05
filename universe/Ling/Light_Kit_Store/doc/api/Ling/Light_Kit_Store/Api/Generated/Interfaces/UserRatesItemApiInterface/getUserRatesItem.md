[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Api\Generated\Interfaces\UserRatesItemApiInterface class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface.md)


UserRatesItemApiInterface::getUserRatesItem
================



UserRatesItemApiInterface::getUserRatesItem — Returns the userRatesItem row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).




Description
================


abstract public [UserRatesItemApiInterface::getUserRatesItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface/getUserRatesItem.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the userRatesItem row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).

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
See the source code for method [UserRatesItemApiInterface::getUserRatesItem](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Api/Generated/Interfaces/UserRatesItemApiInterface.php#L114-L114)


See Also
================

The [UserRatesItemApiInterface](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface.md) class.

Previous method: [getUserRatesItemById](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface/getUserRatesItemById.md)<br>Next method: [getUserRatesItems](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Api/Generated/Interfaces/UserRatesItemApiInterface/getUserRatesItems.md)<br>

