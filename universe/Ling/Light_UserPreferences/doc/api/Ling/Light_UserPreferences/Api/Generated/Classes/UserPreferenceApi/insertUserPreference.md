[Back to the Ling/Light_UserPreferences api](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences.md)<br>
[Back to the Ling\Light_UserPreferences\Api\Generated\Classes\UserPreferenceApi class](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi.md)


UserPreferenceApi::insertUserPreference
================



UserPreferenceApi::insertUserPreference — Inserts the given userPreference in the database.




Description
================


public [UserPreferenceApi::insertUserPreference](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi/insertUserPreference.md)(array $userPreference, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed




Inserts the given userPreference in the database.
By default, it returns the result of the PDO::lastInsertId method.
If the returnRic flag is set to true, the method will return the ric array instead of the lastInsertId.


If the row you're trying to insert triggers a duplicate error, the behaviour of this method depends on
the ignoreDuplicate flag:
- if true, the error will be caught internally, the return of the method is not affected
- if false, the error will not be caught, and depending on your configuration, it might either
         trigger an exception, or fail silently in which case this method returns false.




Parameters
================


- userPreference

    

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
See the source code for method [UserPreferenceApi::insertUserPreference](https://github.com/lingtalfi/Light_UserPreferences/blob/master/Api/Generated/Classes/UserPreferenceApi.php#L42-L93)


See Also
================

The [UserPreferenceApi](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi/__construct.md)<br>Next method: [insertUserPreferences](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi/insertUserPreferences.md)<br>

