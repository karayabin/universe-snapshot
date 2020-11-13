[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Service\LightUserDataServiceOld class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld.md)


LightUserDataServiceOld::getResourceUrlByResourceIdentifier
================



LightUserDataServiceOld::getResourceUrlByResourceIdentifier — Returns the url to access the resource identified by the given $resourceIdentifier.




Description
================


public [LightUserDataServiceOld::getResourceUrlByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getResourceUrlByResourceIdentifier.md)(string $resourceIdentifier, ?array $options = []) : string




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
See the source code for method [LightUserDataServiceOld::getResourceUrlByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/Service/LightUserDataServiceOld.php#L936-L962)


See Also
================

The [LightUserDataServiceOld](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld.md) class.

Previous method: [removeUnlinkedResourcesByUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/removeUnlinkedResourcesByUser.md)<br>Next method: [getResourceInfoByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getResourceInfoByResourceIdentifier.md)<br>

