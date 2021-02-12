[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Service\LightUserDataService class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md)


LightUserDataService::getResourceIdentifierByUrl
================



LightUserDataService::getResourceIdentifierByUrl — Returns the identifier from a given url.




Description
================


public [LightUserDataService::getResourceIdentifierByUrl](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getResourceIdentifierByUrl.md)(string $url, ?bool $throwEx = true) : string | false




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
See the source code for method [LightUserDataService::getResourceIdentifierByUrl](https://github.com/lingtalfi/Light_UserData/blob/master/Service/LightUserDataService.php#L1107-L1117)


See Also
================

The [LightUserDataService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md) class.

Previous method: [getNewResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getNewResourceIdentifier.md)<br>Next method: [getUserIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getUserIdentifier.md)<br>

