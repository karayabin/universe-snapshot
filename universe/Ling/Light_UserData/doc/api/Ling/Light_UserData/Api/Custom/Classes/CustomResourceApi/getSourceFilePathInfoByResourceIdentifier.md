[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Api\Custom\Classes\CustomResourceApi class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Classes/CustomResourceApi.md)


CustomResourceApi::getSourceFilePathInfoByResourceIdentifier
================



CustomResourceApi::getSourceFilePathInfoByResourceIdentifier — Returns an array of information for the resource which identifier is given, or false if not found.




Description
================


public [CustomResourceApi::getSourceFilePathInfoByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Classes/CustomResourceApi/getSourceFilePathInfoByResourceIdentifier.md)(string $resourceIdentifier) : array | false




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
See the source code for method [CustomResourceApi::getSourceFilePathInfoByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/Api/Custom/Classes/CustomResourceApi.php#L147-L171)


See Also
================

The [CustomResourceApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Classes/CustomResourceApi.md) class.

Previous method: [getBaseResourceInfoByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/Classes/CustomResourceApi/getBaseResourceInfoByResourceIdentifier.md)<br>

