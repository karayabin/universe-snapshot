[Back to the Ling/Light_LoginNotifier api](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier.md)<br>
[Back to the Ling\Light_LoginNotifier\Api\Generated\Interfaces\ConnexionApiInterface class](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Interfaces/ConnexionApiInterface.md)


ConnexionApiInterface::getConnexionsColumns
================



ConnexionApiInterface::getConnexionsColumns — Returns a subset of the connexion rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).




Description
================


abstract public [ConnexionApiInterface::getConnexionsColumns](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Interfaces/ConnexionApiInterface/getConnexionsColumns.md)($columns, $where, ?array $markers = []) : array




Returns a subset of the connexion rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
That subset is an array containing the given $columns.
The columns parameter can be either an array or a string.
If it's an array, the column names will be escaped with back ticks.
If it's a string, no escaping will be done. This lets you write custom expression, such as using aliases for instance.

In both cases, you shall pass the pdo markers when necessary.




Parameters
================


- columns

    

- where

    

- markers

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [ConnexionApiInterface::getConnexionsColumns](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/Api/Generated/Interfaces/ConnexionApiInterface.php#L159-L159)


See Also
================

The [ConnexionApiInterface](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Interfaces/ConnexionApiInterface.md) class.

Previous method: [getConnexionsColumn](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Interfaces/ConnexionApiInterface/getConnexionsColumn.md)<br>Next method: [getConnexionsKey2Value](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Interfaces/ConnexionApiInterface/getConnexionsKey2Value.md)<br>

