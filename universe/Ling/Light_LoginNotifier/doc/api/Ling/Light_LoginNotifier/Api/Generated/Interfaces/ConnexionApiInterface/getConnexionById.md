[Back to the Ling/Light_LoginNotifier api](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier.md)<br>
[Back to the Ling\Light_LoginNotifier\Api\Generated\Interfaces\ConnexionApiInterface class](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Interfaces/ConnexionApiInterface.md)


ConnexionApiInterface::getConnexionById
================



ConnexionApiInterface::getConnexionById — Returns the connexion row identified by the given id.




Description
================


abstract public [ConnexionApiInterface::getConnexionById](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Interfaces/ConnexionApiInterface/getConnexionById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the connexion row identified by the given id.

If the row is not found, this method's return depends on the throwNotFoundEx flag:
- if true, the method throws an exception
- if false, the method returns the given default value




Parameters
================


- id

    

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
See the source code for method [ConnexionApiInterface::getConnexionById](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/Api/Generated/Interfaces/ConnexionApiInterface.php#L95-L95)


See Also
================

The [ConnexionApiInterface](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Interfaces/ConnexionApiInterface.md) class.

Previous method: [fetch](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Interfaces/ConnexionApiInterface/fetch.md)<br>Next method: [getConnexion](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Interfaces/ConnexionApiInterface/getConnexion.md)<br>

