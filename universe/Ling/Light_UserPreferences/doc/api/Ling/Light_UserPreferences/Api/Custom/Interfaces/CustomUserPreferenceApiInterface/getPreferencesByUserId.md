[Back to the Ling/Light_UserPreferences api](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences.md)<br>
[Back to the Ling\Light_UserPreferences\Api\Custom\Interfaces\CustomUserPreferenceApiInterface class](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Custom/Interfaces/CustomUserPreferenceApiInterface.md)


CustomUserPreferenceApiInterface::getPreferencesByUserId
================



CustomUserPreferenceApiInterface::getPreferencesByUserId — Returns by default all the preferences as rows, for the given user id.




Description
================


abstract public [CustomUserPreferenceApiInterface::getPreferencesByUserId](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Custom/Interfaces/CustomUserPreferenceApiInterface/getPreferencesByUserId.md)(?int $userId = null, ?array $options = []) : array




Returns by default all the preferences as rows, for the given user id.
If the given user id is null, then the current user will be used.

An exception is thrown if no id is given and the current user is not valid [LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md).

Available options are:

- groupByPlugin: bool = false.
     If true, the returned array will have the form plugin => rows, instead of just rows.




Parameters
================


- userId

    

- options

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [CustomUserPreferenceApiInterface::getPreferencesByUserId](https://github.com/lingtalfi/Light_UserPreferences/blob/master/Api/Custom/Interfaces/CustomUserPreferenceApiInterface.php#L35-L35)


See Also
================

The [CustomUserPreferenceApiInterface](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Custom/Interfaces/CustomUserPreferenceApiInterface.md) class.



