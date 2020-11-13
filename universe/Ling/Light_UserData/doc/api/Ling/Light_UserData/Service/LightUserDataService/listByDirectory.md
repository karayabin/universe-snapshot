[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Service\LightUserDataService class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md)


LightUserDataService::listByDirectory
================



LightUserDataService::listByDirectory — Returns an array of information about the resource files contained in the given directory.




Description
================


public [LightUserDataService::listByDirectory](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/listByDirectory.md)(string $directory) : array




Returns an array of information about the resource files contained in the given directory.
Each item is an array with the following structure:

- resource_file_id: string, the id of the resource file entry
- path: string, the relative path of the resource file (relative to the user directory)




Parameters
================


- directory

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [LightUserDataService::listByDirectory](https://github.com/lingtalfi/Light_UserData/blob/master/Service/LightUserDataService.php#L365-L389)


See Also
================

The [LightUserDataService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md) class.

Previous method: [getFactory](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getFactory.md)<br>Next method: [getMaximumCapacityByUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getMaximumCapacityByUser.md)<br>

