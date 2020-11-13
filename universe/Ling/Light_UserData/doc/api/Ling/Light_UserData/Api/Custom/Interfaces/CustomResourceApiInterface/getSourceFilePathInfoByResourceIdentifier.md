[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Api\Custom\Interfaces\CustomResourceApiInterface class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Interfaces/CustomResourceApiInterface.md)


CustomResourceApiInterface::getSourceFilePathInfoByResourceIdentifier
================



CustomResourceApiInterface::getSourceFilePathInfoByResourceIdentifier — Returns an array of information for the resource which identifier is given, or false if not found.




Description
================


abstract public [CustomResourceApiInterface::getSourceFilePathInfoByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Interfaces/CustomResourceApiInterface/getSourceFilePathInfoByResourceIdentifier.md)(string $resourceIdentifier) : array | false




Returns an array of information for the resource which identifier is given, or false if not found.
The returned array contains the following keys:

- path: the relative path to the source file
- user_identifier: the identifier of the user owning this resource




Parameters
================


- resourceIdentifier

    


Return values
================

Returns array | false.








Source Code
===========
See the source code for method [CustomResourceApiInterface::getSourceFilePathInfoByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/Api/Custom/Interfaces/CustomResourceApiInterface.php#L63-L63)


See Also
================

The [CustomResourceApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Interfaces/CustomResourceApiInterface.md) class.

Previous method: [getBaseResourceInfoByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Interfaces/CustomResourceApiInterface/getBaseResourceInfoByResourceIdentifier.md)<br>

