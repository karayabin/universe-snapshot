[Back to the Ling/Light_UserRowRestriction api](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction.md)<br>
[Back to the Ling\Light_UserRowRestriction\Service\LightUserRowRestrictionService class](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction/Service/LightUserRowRestrictionService.md)


LightUserRowRestrictionService::checkRestrictions
================



LightUserRowRestrictionService::checkRestrictions — Checks that the current user is granted to do the crud operation (eventName argument).




Description
================


public [LightUserRowRestrictionService::checkRestrictions](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction/Service/LightUserRowRestrictionService/checkRestrictions.md)(string $eventName, ...$args) : void




Checks that the current user is granted to do the crud operation (eventName argument).
If that's not the case, it throws a RowRestrictionViolationException.




Parameters
================


- eventName

    

- args

    


Return values
================

Returns void.


Exceptions thrown
================

- [RowRestrictionViolationException](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction/Exception/RowRestrictionViolationException.md).&nbsp;







Source Code
===========
See the source code for method [LightUserRowRestrictionService::checkRestrictions](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/Service/LightUserRowRestrictionService.php#L84-L133)


See Also
================

The [LightUserRowRestrictionService](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction/Service/LightUserRowRestrictionService.md) class.

Previous method: [setContainer](https://github.com/lingtalfi/Light_UserRowRestriction/blob/master/doc/api/Ling/Light_UserRowRestriction/Service/LightUserRowRestrictionService/setContainer.md)<br>

