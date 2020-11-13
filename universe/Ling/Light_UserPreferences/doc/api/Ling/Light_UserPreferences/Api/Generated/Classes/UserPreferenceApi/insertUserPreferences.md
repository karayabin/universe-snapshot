[Back to the Ling/Light_UserPreferences api](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences.md)<br>
[Back to the Ling\Light_UserPreferences\Api\Generated\Classes\UserPreferenceApi class](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi.md)


UserPreferenceApi::insertUserPreferences
================



UserPreferenceApi::insertUserPreferences — Inserts the given userPreference rows in the database.




Description
================


public [UserPreferenceApi::insertUserPreferences](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi/insertUserPreferences.md)(array $userPreferences, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed




Inserts the given userPreference rows in the database.
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
See the source code for method [UserPreferenceApi::insertUserPreferences](https://github.com/lingtalfi/Light_UserPreferences/blob/master/Api/Generated/Classes/UserPreferenceApi.php#L98-L109)


See Also
================

The [UserPreferenceApi](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi.md) class.

Previous method: [insertUserPreference](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi/insertUserPreference.md)<br>Next method: [fetchAll](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi/fetchAll.md)<br>

