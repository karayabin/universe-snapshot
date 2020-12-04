[Back to the Ling/Light_LoginNotifier api](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier.md)<br>
[Back to the Ling\Light_LoginNotifier\Api\Generated\Classes\ConnexionApi class](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Classes/ConnexionApi.md)


ConnexionApi::delete
================



ConnexionApi::delete — Deletes the connexion rows matching the given where conditions, and returns the number of deleted rows.




Description
================


public [ConnexionApi::delete](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Classes/ConnexionApi/delete.md)(?$where = null, ?array $markers = []) : false | int




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
See the source code for method [ConnexionApi::delete](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/Api/Generated/Classes/ConnexionApi.php#L277-L281)


See Also
================

The [ConnexionApi](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Classes/ConnexionApi.md) class.

Previous method: [updateConnexion](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Classes/ConnexionApi/updateConnexion.md)<br>Next method: [deleteConnexionById](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Classes/ConnexionApi/deleteConnexionById.md)<br>

