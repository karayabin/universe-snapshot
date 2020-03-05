[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Service\LightUserDataService class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md)


LightUserDataService::createDirectoryMapByIdentifier
================



LightUserDataService::createDirectoryMapByIdentifier — to the user), based on the given user identifier.




Description
================


private [LightUserDataService::createDirectoryMapByIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/createDirectoryMapByIdentifier.md)(string $identifier) : string




Creates an entry in the directory map table, and returns the obfuscated name (of the directory corresponding
to the user), based on the given user identifier.




Parameters
================


- identifier

    


Return values
================

Returns string.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightUserDataService::createDirectoryMapByIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/Service/LightUserDataService.php#L835-L848)


See Also
================

The [LightUserDataService](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService.md) class.

Previous method: [getUserIdentifierByUserOrIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataService/getUserIdentifierByUserOrIdentifier.md)<br>

