[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Service\LightUserDataServiceOld class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld.md)


LightUserDataServiceOld::getContent
================



LightUserDataServiceOld::getContent — Returns the content of the file of the current user which relative path is given.




Description
================


public [LightUserDataServiceOld::getContent](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getContent.md)(string $path, ?bool $throwEx = true) : string | false




Returns the content of the file of the current user which relative path is given.
If the file doesn't exist, the method:

- returns false if the throwEx flag is set to false
- throws an exception if the throwEx flag is set to true




Parameters
================


- path

    

- throwEx

    


Return values
================

Returns string | false.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightUserDataServiceOld::getContent](https://github.com/lingtalfi/Light_UserData/blob/master/Service/LightUserDataServiceOld.php#L1140-L1151)


See Also
================

The [LightUserDataServiceOld](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld.md) class.

Previous method: [getResourceInfoByResourceUrl](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getResourceInfoByResourceUrl.md)<br>Next method: [getContentByResourceId](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Service/LightUserDataServiceOld/getContentByResourceId.md)<br>

