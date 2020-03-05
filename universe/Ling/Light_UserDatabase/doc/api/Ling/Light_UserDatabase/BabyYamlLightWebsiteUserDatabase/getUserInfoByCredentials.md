[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\BabyYamlLightWebsiteUserDatabase class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase.md)


BabyYamlLightWebsiteUserDatabase::getUserInfoByCredentials
================



BabyYamlLightWebsiteUserDatabase::getUserInfoByCredentials — credentials don't match any user.




Description
================


public [BabyYamlLightWebsiteUserDatabase::getUserInfoByCredentials](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/getUserInfoByCredentials.md)(string $identifier, string $password) : array | false




Returns the user info array matching the given credentials, or false if the
credentials don't match any user.

This method will also return the "rights" key populated with the rights
according to the user "profiles".
See more details in the [Light_UserDatabase conception notes](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/pages/conception-notes.md).




Parameters
================


- identifier

    

- password

    


Return values
================

Returns array | false.








Source Code
===========
See the source code for method [BabyYamlLightWebsiteUserDatabase::getUserInfoByCredentials](https://github.com/lingtalfi/Light_UserDatabase/blob/master/BabyYamlLightWebsiteUserDatabase.php#L200-L231)


See Also
================

The [BabyYamlLightWebsiteUserDatabase](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase.md) class.

Previous method: [setContainer](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/setContainer.md)<br>Next method: [getUserInfoByIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/getUserInfoByIdentifier.md)<br>

