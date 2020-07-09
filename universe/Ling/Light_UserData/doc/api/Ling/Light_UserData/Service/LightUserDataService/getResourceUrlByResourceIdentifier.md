[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Service\LightUserDataService class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md)


LightUserDataService::getResourceUrlByResourceIdentifier
================



LightUserDataService::getResourceUrlByResourceIdentifier — Returns the url to access the resource identified by the given $resourceIdentifier.




Description
================


public [LightUserDataService::getResourceUrlByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getResourceUrlByResourceIdentifier.md)(string $resourceIdentifier, ?array $options = []) : string




Returns the url to access the resource identified by the given $resourceIdentifier.


The options are:

- original: bool=false, whether to query the original file instead




Parameters
================


- resourceIdentifier

    

- options

    


Return values
================

Returns string.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightUserDataService::getResourceUrlByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/Service/LightUserDataService.php#L887-L913)


See Also
================

The [LightUserDataService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md) class.

Previous method: [removeUnlinkedResourcesByUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/removeUnlinkedResourcesByUser.md)<br>Next method: [getResourceInfoByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getResourceInfoByResourceIdentifier.md)<br>

