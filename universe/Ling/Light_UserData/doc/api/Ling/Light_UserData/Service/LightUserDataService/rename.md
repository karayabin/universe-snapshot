[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Service\LightUserDataService class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md)


LightUserDataService::rename
================



LightUserDataService::rename — Renames the file identified by oldRealPath to a new file identified by newRealPath.




Description
================


public [LightUserDataService::rename](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/rename.md)(string $oldRealPath, string $newRealPath, ?$userOrIdentifier = null) : void




Renames the file identified by oldRealPath to a new file identified by newRealPath.

This method will:

- update the luda_resource.real_path column in the database.
         Or, if another entry already exists with this real_path, we remove the old entry (note: real_path is a unique index,
         so we can't have the same value more than once).

- rename the file on the file system

If the user is not passed, the [current user](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/conception-notes.md#current-user) will be assumed.




Parameters
================


- oldRealPath

    

- newRealPath

    

- userOrIdentifier

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightUserDataService::rename](https://github.com/lingtalfi/Light_UserData/blob/master/Service/LightUserDataService.php#L613-L643)


See Also
================

The [LightUserDataService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md) class.

Previous method: [update2SvpResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/update2SvpResource.md)<br>Next method: [getUserDir](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getUserDir.md)<br>

