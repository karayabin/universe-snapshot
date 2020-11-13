[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Service\LightUserDataService class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md)


LightUserDataService::checkUserMaxStorageCapacity
================



LightUserDataService::checkUserMaxStorageCapacity — Checks that the current user's directory doesn't exceed his/her maximum capacity storage.




Description
================


public [LightUserDataService::checkUserMaxStorageCapacity](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/checkUserMaxStorageCapacity.md)() : void




Checks that the current user's directory doesn't exceed his/her maximum capacity storage.
If it does exceed that limit, we throw an exception.




Parameters
================

This method has no parameters.


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightUserDataService::checkUserMaxStorageCapacity](https://github.com/lingtalfi/Light_UserData/blob/master/Service/LightUserDataService.php#L441-L451)


See Also
================

The [LightUserDataService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md) class.

Previous method: [getCurrentCapacityByUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getCurrentCapacityByUser.md)<br>Next method: [userHasResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/userHasResource.md)<br>

