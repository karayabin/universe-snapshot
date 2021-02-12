[Back to the Ling/Light_UserDatabase api](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase.md)<br>
[Back to the Ling\Light_UserDatabase\Service\LightUserDatabaseService class](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Service/LightUserDatabaseService.md)


LightUserDatabaseService::onCreateFileChange
================



LightUserDatabaseService::onCreateFileChange — This method is executed when a change is detected in our createFile.




Description
================


public [LightUserDatabaseService::onCreateFileChange](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Service/LightUserDatabaseService/onCreateFileChange.md)() : void




This method is executed when a change is detected in our createFile.

We use the [Light_FileWatcher plugin](https://github.com/lingtalfi/Light_FileWatcher) to detect changes.


Upon a change, we to the followings:

- synchronize the database with the new create file
- re-generate the api (using [Ling breeze generator 2](https://github.com/lingtalfi/Light_BreezeGenerator/blob/master/doc/pages/ling-breeze-generator-2.md))




Parameters
================

This method has no parameters.


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightUserDatabaseService::onCreateFileChange](https://github.com/lingtalfi/Light_UserDatabase/blob/master/Service/LightUserDatabaseService.php#L99-L126)


See Also
================

The [LightUserDatabaseService](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Service/LightUserDatabaseService.md) class.

Previous method: [pluginOptionTablesAreReady](https://github.com/lingtalfi/Light_UserDatabase/blob/master/doc/api/Ling/Light_UserDatabase/Service/LightUserDatabaseService/pluginOptionTablesAreReady.md)<br>

