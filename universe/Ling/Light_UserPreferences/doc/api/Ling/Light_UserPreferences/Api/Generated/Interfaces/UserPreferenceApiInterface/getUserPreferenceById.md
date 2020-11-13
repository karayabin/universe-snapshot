[Back to the Ling/Light_UserPreferences api](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences.md)<br>
[Back to the Ling\Light_UserPreferences\Api\Generated\Interfaces\UserPreferenceApiInterface class](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Interfaces/UserPreferenceApiInterface.md)


UserPreferenceApiInterface::getUserPreferenceById
================



UserPreferenceApiInterface::getUserPreferenceById — Returns the userPreference row identified by the given id.




Description
================


abstract public [UserPreferenceApiInterface::getUserPreferenceById](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Interfaces/UserPreferenceApiInterface/getUserPreferenceById.md)(int $id, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the userPreference row identified by the given id.

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
See the source code for method [UserPreferenceApiInterface::getUserPreferenceById](https://github.com/lingtalfi/Light_UserPreferences/blob/master/Api/Generated/Interfaces/UserPreferenceApiInterface.php#L95-L95)


See Also
================

The [UserPreferenceApiInterface](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Interfaces/UserPreferenceApiInterface.md) class.

Previous method: [fetch](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Interfaces/UserPreferenceApiInterface/fetch.md)<br>Next method: [getUserPreference](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Interfaces/UserPreferenceApiInterface/getUserPreference.md)<br>

