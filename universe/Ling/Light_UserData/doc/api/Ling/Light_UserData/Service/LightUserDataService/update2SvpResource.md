[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Service\LightUserDataService class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md)


LightUserDataService::update2SvpResource
================



LightUserDataService::update2SvpResource — Removes the 2svp extension from the given resource, and returns the new resource name.




Description
================


public [LightUserDataService::update2SvpResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/update2SvpResource.md)(string $resource, ?$userOrIdentifier = null) : string




Removes the 2svp extension from the given resource, and returns the new resource name.


The resource is a relative path from the user directory to the desired file.

Note: the user is identified by the given userOrIdentifier.



In more details, this method:
- updates the resource in the luda_resource table
- renames the file on the file system




Parameters
================


- resource

    

- userOrIdentifier

    


Return values
================

Returns string.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightUserDataService::update2SvpResource](https://github.com/lingtalfi/Light_UserData/blob/master/Service/LightUserDataService.php#L1110-L1123)


See Also
================

The [LightUserDataService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md) class.

Previous method: [getContent](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getContent.md)<br>Next method: [getMaximumCapacityByUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getMaximumCapacityByUser.md)<br>

