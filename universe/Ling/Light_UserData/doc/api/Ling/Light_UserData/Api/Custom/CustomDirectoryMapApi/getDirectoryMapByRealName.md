[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Api\Custom\CustomDirectoryMapApi class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/CustomDirectoryMapApi.md)


CustomDirectoryMapApi::getDirectoryMapByRealName
================



CustomDirectoryMapApi::getDirectoryMapByRealName — Returns the directoryMap row identified by the given realName.




Description
================


public [CustomDirectoryMapApi::getDirectoryMapByRealName](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/CustomDirectoryMapApi/getDirectoryMapByRealName.md)(string $realName, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the directoryMap row identified by the given realName.

If the row is not found, this method's return depends on the throwNotFoundEx flag:
- if true, the method throws an exception
- if false, the method returns the given default value




Parameters
================


- realName

    

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
See the source code for method [CustomDirectoryMapApi::getDirectoryMapByRealName](https://github.com/lingtalfi/Light_UserData/blob/master/Api/Custom/CustomDirectoryMapApi.php#L31-L45)


See Also
================

The [CustomDirectoryMapApi](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/Custom/CustomDirectoryMapApi.md) class.



