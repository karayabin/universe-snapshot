[Back to the Ling/Light_UserPreferences api](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences.md)<br>
[Back to the Ling\Light_UserPreferences\Api\Generated\Interfaces\UserPreferenceApiInterface class](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Interfaces/UserPreferenceApiInterface.md)


UserPreferenceApiInterface::insertUserPreferences
================



UserPreferenceApiInterface::insertUserPreferences — Inserts the given user preference rows in the database.




Description
================


abstract public [UserPreferenceApiInterface::insertUserPreferences](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Interfaces/UserPreferenceApiInterface/insertUserPreferences.md)(array $userPreferences, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed




Inserts the given user preference rows in the database.
By default, it returns an array of the result of the PDO::lastInsertId method for each insert.
If the returnRic flag is set to true, the method will return an array of the ric array (for each insert) instead of the lastInsertId.


If the rows you're trying to insert triggers a duplicate error, the behaviour of this method depends on
the ignoreDuplicate flag:
- if true, the error will be caught internally, the return of the method is not affected
- if false, the error will not be caught, and depending on your configuration, it might either
         trigger an exception, or fail silently in which case this method returns false.




Parameters
================


- userPreferences

    

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
See the source code for method [UserPreferenceApiInterface::insertUserPreferences](https://github.com/lingtalfi/Light_UserPreferences/blob/master/Api/Generated/Interfaces/UserPreferenceApiInterface.php#L57-L57)


See Also
================

The [UserPreferenceApiInterface](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Interfaces/UserPreferenceApiInterface.md) class.

Previous method: [insertUserPreference](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Interfaces/UserPreferenceApiInterface/insertUserPreference.md)<br>Next method: [fetchAll](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Interfaces/UserPreferenceApiInterface/fetchAll.md)<br>

