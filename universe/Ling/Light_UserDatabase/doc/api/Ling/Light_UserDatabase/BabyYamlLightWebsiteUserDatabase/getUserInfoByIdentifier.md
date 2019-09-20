[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\BabyYamlLightWebsiteUserDatabase class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase.md)


BabyYamlLightWebsiteUserDatabase::getUserInfoByIdentifier
================



BabyYamlLightWebsiteUserDatabase::getUserInfoByIdentifier — doesn't match an user.




Description
================


public [BabyYamlLightWebsiteUserDatabase::getUserInfoByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/getUserInfoByIdentifier.md)(string $identifier) : array | false




Returns the user info array matching the given user identifier, or false if the identifier
doesn't match an user. The returned array structure depends on your application.
Related: getUserInfo method.


Note: this method will not return the related "rights" of the user.




Parameters
================


- identifier

    


Return values
================

Returns array | false.








Source Code
===========
See the source code for method [BabyYamlLightWebsiteUserDatabase::getUserInfoByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/BabyYamlLightWebsiteUserDatabase.php#L208-L217)


See Also
================

The [BabyYamlLightWebsiteUserDatabase](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase.md) class.

Previous method: [getUserInfoByCredentials](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/getUserInfoByCredentials.md)<br>Next method: [getUserInfoById](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/getUserInfoById.md)<br>

