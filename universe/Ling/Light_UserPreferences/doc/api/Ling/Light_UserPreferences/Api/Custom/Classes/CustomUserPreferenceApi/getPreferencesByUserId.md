[Back to the Ling/Light_UserPreferences api](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences.md)<br>
[Back to the Ling\Light_UserPreferences\Api\Custom\Classes\CustomUserPreferenceApi class](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Custom/Classes/CustomUserPreferenceApi.md)


CustomUserPreferenceApi::getPreferencesByUserId
================



CustomUserPreferenceApi::getPreferencesByUserId — Returns by default all the preferences as rows, for the given user id.




Description
================


public [CustomUserPreferenceApi::getPreferencesByUserId](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Custom/Classes/CustomUserPreferenceApi/getPreferencesByUserId.md)(?int $userId = null, ?array $options = []) : array




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
See the source code for method [CustomUserPreferenceApi::getPreferencesByUserId](https://github.com/lingtalfi/Light_UserPreferences/blob/master/Api/Custom/Classes/CustomUserPreferenceApi.php#L33-L56)


See Also
================

The [CustomUserPreferenceApi](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Custom/Classes/CustomUserPreferenceApi.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Custom/Classes/CustomUserPreferenceApi/__construct.md)<br>Next method: [error](https://github.com/lingtalfi/Light_UserPreferences/blob/master/doc/api/Ling/Light_UserPreferences/Api/Custom/Classes/CustomUserPreferenceApi/error.md)<br>

