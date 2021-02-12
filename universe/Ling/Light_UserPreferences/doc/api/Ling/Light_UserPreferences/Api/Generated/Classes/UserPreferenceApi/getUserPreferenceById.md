[Back to the Ling/Light_UserPreferences api](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences.md)<br>
[Back to the Ling\Light_UserPreferences\Api\Generated\Classes\UserPreferenceApi class](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi.md)


UserPreferenceApi::getUserPreferenceById
================



UserPreferenceApi::getUserPreferenceById — Returns the user preference row identified by the given id.




Description
================


public [UserPreferenceApi::getUserPreferenceById](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi/getUserPreferenceById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the user preference row identified by the given id.

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
See the source code for method [UserPreferenceApi::getUserPreferenceById](https://github.com/lingtalfi/Light_UserPreferences/blob/master/Api/Generated/Classes/UserPreferenceApi.php#L144-L158)


See Also
================

The [UserPreferenceApi](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi.md) class.

Previous method: [fetch](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi/fetch.md)<br>Next method: [getUserPreference](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Classes/UserPreferenceApi/getUserPreference.md)<br>

