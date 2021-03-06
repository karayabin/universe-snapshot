[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Api\ResourceApiInterface class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/ResourceApiInterface.md)


ResourceApiInterface::getResourceByRealPath
================



ResourceApiInterface::getResourceByRealPath — Returns the resource row identified by the given real_path.




Description
================


abstract public [ResourceApiInterface::getResourceByRealPath](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/ResourceApiInterface/getResourceByRealPath.md)(string $real_path, ?$default = null, ?bool $throwNotFoundEx = false) : mixed




Returns the resource row identified by the given real_path.

If the row is not found, this method's return depends on the throwNotFoundEx flag:
- if true, the method throws an exception
- if false, the method returns the given default value




Parameters
================


- real_path

    

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
See the source code for method [ResourceApiInterface::getResourceByRealPath](https://github.com/lingtalfi/Light_UserData/blob/master/Api/ResourceApiInterface.php#L66-L66)


See Also
================

The [ResourceApiInterface](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/ResourceApiInterface.md) class.

Previous method: [getResourceById](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/ResourceApiInterface/getResourceById.md)<br>Next method: [getAllIds](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Api/ResourceApiInterface/getAllIds.md)<br>

