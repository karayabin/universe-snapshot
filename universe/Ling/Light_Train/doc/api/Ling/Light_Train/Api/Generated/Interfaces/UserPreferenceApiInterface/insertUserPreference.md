[Back to the Ling/Light_Train api](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train.md)<br>
[Back to the Ling\Light_Train\Api\Generated\Interfaces\UserPreferenceApiInterface class](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Interfaces/UserPreferenceApiInterface.md)


UserPreferenceApiInterface::insertUserPreference
================



UserPreferenceApiInterface::insertUserPreference — Inserts the given userPreference in the database.




Description
================


abstract public [UserPreferenceApiInterface::insertUserPreference](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Interfaces/UserPreferenceApiInterface/insertUserPreference.md)(array $userPreference, ?bool $ignoreDuplicate = true, ?bool $returnRic = false) : mixed




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
See the source code for method [UserPreferenceApiInterface::insertUserPreference](https://github.com/lingtalfi/Light_Train/blob/master/Api/Generated/Interfaces/UserPreferenceApiInterface.php#L35-L35)


See Also
================

The [UserPreferenceApiInterface](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Interfaces/UserPreferenceApiInterface.md) class.

Next method: [insertUserPreferences](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Interfaces/UserPreferenceApiInterface/insertUserPreferences.md)<br>

