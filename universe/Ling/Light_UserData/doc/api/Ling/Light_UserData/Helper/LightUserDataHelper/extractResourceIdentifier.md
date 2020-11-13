[Back to the Ling/Light_UserData api](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData.md)<br>
[Back to the Ling\Light_UserData\Helper\LightUserDataHelper class](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Helper/LightUserDataHelper.md)


LightUserDataHelper::extractResourceIdentifier
================



LightUserDataHelper::extractResourceIdentifier — Returns the components of the resourceIdentifier.




Description
================


public static [LightUserDataHelper::extractResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Helper/LightUserDataHelper/extractResourceIdentifier.md)(string $resourceIdentifier) : array




Returns the components of the resourceIdentifier.

It's an array containing:
- 0: the user id
- 1: the canonical name

See more details in the [Light_UserData conception notes](https://github.com/lingtalfi/Light_UserData/blob/master/doc/pages/conception-notes.md).




Parameters
================


- resourceIdentifier

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightUserDataHelper::extractResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/Helper/LightUserDataHelper.php#L50-L57)


See Also
================

The [LightUserDataHelper](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Helper/LightUserDataHelper.md) class.

Previous method: [getOriginalPath](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Helper/LightUserDataHelper/getOriginalPath.md)<br>Next method: [implodeResourceIdentifier](https://github.com/lingtalfi/Light_UserData/blob/master/doc/api/Ling/Light_UserData/Helper/LightUserDataHelper/implodeResourceIdentifier.md)<br>

