[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Service\LightUserDataService class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md)


LightUserDataService::getIdentifierByUrl
================



LightUserDataService::getIdentifierByUrl — Returns the identifier from a given url.




Description
================


public [LightUserDataService::getIdentifierByUrl](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getIdentifierByUrl.md)(string $url, ?bool $throwEx = true) : string | false




Returns the identifier from a given url.
If the identifier isn't recognized, then it either throws an exception or returns false,
depending on the value of the throwEx flag.




Parameters
================


- url

    

- throwEx

    


Return values
================

Returns string | false.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightUserDataService::getIdentifierByUrl](https://github.com/lingtalfi/Light_UserData/blob/master/Service/LightUserDataService.php#L1389-L1399)


See Also
================

The [LightUserDataService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md) class.

Previous method: [getValidWebsiteUser](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getValidWebsiteUser.md)<br>Next method: [getNewResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getNewResourceIdentifier.md)<br>

