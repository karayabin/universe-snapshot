[Back to the Ling/Light_LoginNotifier api](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier.md)<br>
[Back to the Ling\Light_LoginNotifier\Api\Generated\Classes\ConnexionApi class](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Classes/ConnexionApi.md)


ConnexionApi::insertConnexion
================



ConnexionApi::insertConnexion — Inserts the given connexion in the database.




Description
================


public [ConnexionApi::insertConnexion](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Classes/ConnexionApi/insertConnexion.md)(array $connexion, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed




Inserts the given connexion in the database.
By default, it returns the result of the PDO::lastInsertId method.
If the returnRic flag is set to true, the method will return the ric array instead of the lastInsertId.


If the row you're trying to insert triggers a duplicate error, the behaviour of this method depends on
the ignoreDuplicate flag:
- if true, the error will be caught internally, the return of the method is not affected
- if false, the error will not be caught, and depending on your pdo configuration, it might either
         trigger an exception, or fail silently in which case this method returns false.




Parameters
================


- connexion

    

- ignoreDuplicate

    

- returnRic

    


Return values
================

Returns mixed.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [ConnexionApi::insertConnexion](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/Api/Generated/Classes/ConnexionApi.php#L42-L93)


See Also
================

The [ConnexionApi](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Classes/ConnexionApi.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Classes/ConnexionApi/__construct.md)<br>Next method: [insertConnexions](https://github.com/lingtalfi/Light_LoginNotifier/blob/master/doc/api/Ling/Light_LoginNotifier/Api/Generated/Classes/ConnexionApi/insertConnexions.md)<br>

