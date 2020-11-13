[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Service\LightUserDataServiceOld class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld.md)


LightUserDataServiceOld::update2SvpResource
================



LightUserDataServiceOld::update2SvpResource — Removes the 2svp extension from the given resource, and returns the new resource name.




Description
================


public [LightUserDataServiceOld::update2SvpResource](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/update2SvpResource.md)(string $resource, ?$userOrIdentifier = null) : string




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
See the source code for method [LightUserDataServiceOld::update2SvpResource](https://github.com/lingtalfi/Light_UserData/blob/master/Service/LightUserDataServiceOld.php#L1214-L1227)


See Also
================

The [LightUserDataServiceOld](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld.md) class.

Previous method: [getContentByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getContentByResourceId.md)<br>Next method: [getMaximumCapacityByUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getMaximumCapacityByUser.md)<br>

