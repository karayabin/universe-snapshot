[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)<br>
[Back to the Ling\Light_Realist\AjaxHandler\LightRealistAjaxHandler class](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/AjaxHandler/LightRealistAjaxHandler.md)


LightRealistAjaxHandler::checkPermissionByToolbarItem
================



LightRealistAjaxHandler::checkPermissionByToolbarItem — and if so check whether the user is granted that permission.




Description
================


protected [LightRealistAjaxHandler::checkPermissionByToolbarItem](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/AjaxHandler/LightRealistAjaxHandler/checkPermissionByToolbarItem.md)(array $toolbarItem) : void




Checks whether there is a permission restriction for the given toolbarItem,
and if so check whether the user is granted that permission.
If so, the method does nothing, if not granted, this method throws an exception.




Parameters
================


- toolbarItem

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightRealistAjaxHandler::checkPermissionByToolbarItem](https://github.com/lingtalfi/Light_Realist/blob/master/AjaxHandler/LightRealistAjaxHandler.php#L230-L244)


See Also
================

The [LightRealistAjaxHandler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/AjaxHandler/LightRealistAjaxHandler.md) class.

Previous method: [checkCsrfTokenByToolbarItem](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/AjaxHandler/LightRealistAjaxHandler/checkCsrfTokenByToolbarItem.md)<br>

