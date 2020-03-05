[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Service\LightUserDataService class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md)


LightUserDataService::onNewUserBefore
================



LightUserDataService::onNewUserBefore — Listener for the Light_UserDatabase.on_new_user_before.




Description
================


public [LightUserDataService::onNewUserBefore](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/onNewUserBefore.md)(Ling\Light\Events\LightEvent $event) : void




Listener for the Light_UserDatabase.on_new_user_before.
It adds the "directory" key into the extra column.




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
See the source code for method [LightUserDataService::onNewUserBefore](https://github.com/lingtalfi/Light_UserData/blob/master/Service/LightUserDataService.php#L283-L289)


See Also
================

The [LightUserDataService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md) class.

Previous method: [onUserGroupCreate](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/onUserGroupCreate.md)<br>Next method: [list](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/list.md)<br>

