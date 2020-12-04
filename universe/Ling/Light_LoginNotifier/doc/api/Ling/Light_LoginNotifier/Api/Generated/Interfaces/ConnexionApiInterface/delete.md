[Back to the Ling/Light_LoginNotifier api](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier.md)<br>
[Back to the Ling\Light_LoginNotifier\Api\Generated\Interfaces\ConnexionApiInterface class](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Interfaces/ConnexionApiInterface.md)


ConnexionApiInterface::delete
================



ConnexionApiInterface::delete — Deletes the connexion rows matching the given where conditions, and returns the number of deleted rows.




Description
================


abstract public [ConnexionApiInterface::delete](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Interfaces/ConnexionApiInterface/delete.md)(?$where = null, ?array $markers = []) : false | int




Deletes the connexion rows matching the given where conditions, and returns the number of deleted rows.
If where is null, all the rows of the table will be deleted.

False might be returned in case of a problem and if you don't catch db exceptions.




Parameters
================


- where

    

- markers

    


Return values
================

Returns false | int.








Source Code
===========
See the source code for method [ConnexionApiInterface::delete](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/Api/Generated/Interfaces/ConnexionApiInterface.php#L232-L232)


See Also
================

The [ConnexionApiInterface](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Interfaces/ConnexionApiInterface.md) class.

Previous method: [updateConnexion](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Interfaces/ConnexionApiInterface/updateConnexion.md)<br>Next method: [deleteConnexionById](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Interfaces/ConnexionApiInterface/deleteConnexionById.md)<br>

