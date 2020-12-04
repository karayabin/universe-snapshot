[Back to the Ling/Light_LoginNotifier api](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier.md)<br>
[Back to the Ling\Light_LoginNotifier\Api\Generated\Interfaces\ConnexionApiInterface class](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Interfaces/ConnexionApiInterface.md)


ConnexionApiInterface::getConnexion
================



ConnexionApiInterface::getConnexion — Returns the connexion row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).




Description
================


abstract public [ConnexionApiInterface::getConnexion](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Interfaces/ConnexionApiInterface/getConnexion.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the connexion row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).

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
See the source code for method [ConnexionApiInterface::getConnexion](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/Api/Generated/Interfaces/ConnexionApiInterface.php#L114-L114)


See Also
================

The [ConnexionApiInterface](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Interfaces/ConnexionApiInterface.md) class.

Previous method: [getConnexionById](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Interfaces/ConnexionApiInterface/getConnexionById.md)<br>Next method: [getConnexions](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Interfaces/ConnexionApiInterface/getConnexions.md)<br>

