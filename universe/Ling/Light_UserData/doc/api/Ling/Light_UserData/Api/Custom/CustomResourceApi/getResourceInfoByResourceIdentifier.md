[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Api\Custom\CustomResourceApi class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/CustomResourceApi.md)


CustomResourceApi::getResourceInfoByResourceIdentifier
================



CustomResourceApi::getResourceInfoByResourceIdentifier — Returns the resource info identified by the given resource_identifier.




Description
================


public [CustomResourceApi::getResourceInfoByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/CustomResourceApi/getResourceInfoByResourceIdentifier.md)(string $resource_identifier, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the resource info identified by the given resource_identifier.

The resource info is the resource row, with the additional extra-fields:
- user_identifier: the user identifier

If the row is not found, this method's return depends on the throwNotFoundEx flag:
- if true, the method throws an exception
- if false, the method returns the given default value




Parameters
================


- resource_identifier

    

- default

    

- throwNotFoundEx

    


Return values
================

Returns mixed.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [CustomResourceApi::getResourceInfoByResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/Api/Custom/CustomResourceApi.php#L18-L38)


See Also
================

The [CustomResourceApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/CustomResourceApi.md) class.



