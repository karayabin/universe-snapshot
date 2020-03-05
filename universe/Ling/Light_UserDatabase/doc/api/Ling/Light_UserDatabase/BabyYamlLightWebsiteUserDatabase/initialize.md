[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\BabyYamlLightWebsiteUserDatabase class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase.md)


BabyYamlLightWebsiteUserDatabase::initialize
================



BabyYamlLightWebsiteUserDatabase::initialize — Listener for the [Light.initialize_1 event](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md).




Description
================


public [BabyYamlLightWebsiteUserDatabase::initialize](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/initialize.md)(Ling\Light\Events\LightEvent $event) : void




Listener for the [Light.initialize_1 event](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md).
It prepares the user database in the babyYaml file (although partially only).
We recommend to use the mysql version instead, because the babyYaml implementation is not complete.

See more details in the [Light_UserDatabase conception notes](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/pages/conception-notes.md).




Parameters
================


- event

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [BabyYamlLightWebsiteUserDatabase::initialize](https://github.com/lingtalfi/Light_UserDatabase/blob/master/BabyYamlLightWebsiteUserDatabase.php#L518-L557)


See Also
================

The [BabyYamlLightWebsiteUserDatabase](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase.md) class.

Previous method: [getPermissionOptionsApi](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/getPermissionOptionsApi.md)<br>Next method: [setRootIdentifier](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/BabyYamlLightWebsiteUserDatabase/setRootIdentifier.md)<br>

