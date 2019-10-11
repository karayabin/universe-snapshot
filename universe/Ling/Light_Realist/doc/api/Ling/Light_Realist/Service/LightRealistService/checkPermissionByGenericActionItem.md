[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)<br>
[Back to the Ling\Light_Realist\Service\LightRealistService class](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService.md)


LightRealistService::checkPermissionByGenericActionItem
================



LightRealistService::checkPermissionByGenericActionItem — and if so checks whether the user is granted that permission.




Description
================


public [LightRealistService::checkPermissionByGenericActionItem](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/checkPermissionByGenericActionItem.md)(array $item) : void




Checks whether there is a permission restriction for the given [generic action item](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/generic-action-item.md),
and if so checks whether the user is granted that permission.
If not, this method throws an exception.

Note: both the [permission](https://github.com/lingtalfi/Light_User/blob/master/doc/pages/permission-conception-notes.md) and [micro permissions](https://github.com/lingtalfi/Light_MicroPermission) systems are checked.




Parameters
================


- item

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightRealistService::checkPermissionByGenericActionItem](https://github.com/lingtalfi/Light_Realist/blob/master/Service/LightRealistService.php#L747-L770)


See Also
================

The [LightRealistService](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService.md) class.

Previous method: [checkCsrfTokenByGenericActionItem](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/checkCsrfTokenByGenericActionItem.md)<br>Next method: [error](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/error.md)<br>

