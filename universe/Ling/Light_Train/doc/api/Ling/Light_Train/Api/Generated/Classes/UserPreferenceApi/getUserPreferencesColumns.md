[Back to the Ling/Light_Train api](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train.md)<br>
[Back to the Ling\Light_Train\Api\Generated\Classes\UserPreferenceApi class](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Classes/UserPreferenceApi.md)


UserPreferenceApi::getUserPreferencesColumns
================



UserPreferenceApi::getUserPreferencesColumns — Returns a subset of the userPreference rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).




Description
================


public [UserPreferenceApi::getUserPreferencesColumns](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Classes/UserPreferenceApi/getUserPreferencesColumns.md)($columns, $where, ?array $markers = []) : array




Returns a subset of the userPreference rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
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
See the source code for method [UserPreferenceApi::getUserPreferencesColumns](https://github.com/lingtalfi/Light_Train/blob/master/Api/Generated/Classes/UserPreferenceApi.php#L210-L219)


See Also
================

The [UserPreferenceApi](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Classes/UserPreferenceApi.md) class.

Previous method: [getUserPreferencesColumn](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Classes/UserPreferenceApi/getUserPreferencesColumn.md)<br>Next method: [getUserPreferencesKey2Value](https://github.com/lingtalfi/Light_Train/blob/master/doc/api/Ling/Light_Train/Api/Generated/Classes/UserPreferenceApi/getUserPreferencesKey2Value.md)<br>

