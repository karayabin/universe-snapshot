[Back to the Ling/Light_UserPreferences api](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences.md)<br>
[Back to the Ling\Light_UserPreferences\Api\Generated\Interfaces\UserPreferenceApiInterface class](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Interfaces/UserPreferenceApiInterface.md)


UserPreferenceApiInterface::getUserPreference
================



UserPreferenceApiInterface::getUserPreference — Returns the userPreference row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).




Description
================


abstract public [UserPreferenceApiInterface::getUserPreference](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Interfaces/UserPreferenceApiInterface/getUserPreference.md)($where, ?array $markers = [], ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the userPreference row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).

If the row is not found, this method's return depends on the throwNotFoundEx flag:
- if true, the method throws an exception
- if false, the method returns the given default value




Parameters
================


- where

    

- markers

    

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
See the source code for method [UserPreferenceApiInterface::getUserPreference](https://github.com/lingtalfi/Light_UserPreferences/blob/master/Api/Generated/Interfaces/UserPreferenceApiInterface.php#L114-L114)


See Also
================

The [UserPreferenceApiInterface](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Interfaces/UserPreferenceApiInterface.md) class.

Previous method: [getUserPreferenceById](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Interfaces/UserPreferenceApiInterface/getUserPreferenceById.md)<br>Next method: [getUserPreferences](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Generated/Interfaces/UserPreferenceApiInterface/getUserPreferences.md)<br>

