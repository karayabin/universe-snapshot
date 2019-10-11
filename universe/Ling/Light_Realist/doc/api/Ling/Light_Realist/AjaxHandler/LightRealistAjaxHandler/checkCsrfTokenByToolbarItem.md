[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)<br>
[Back to the Ling\Light_Realist\AjaxHandler\LightRealistAjaxHandler class](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/AjaxHandler/LightRealistAjaxHandler.md)


LightRealistAjaxHandler::checkCsrfTokenByToolbarItem
================



LightRealistAjaxHandler::checkCsrfTokenByToolbarItem — Performs the csrf validation if necessary (i.e.




Description
================


protected [LightRealistAjaxHandler::checkCsrfTokenByToolbarItem](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/AjaxHandler/LightRealistAjaxHandler/checkCsrfTokenByToolbarItem.md)(array $toolbarItem, array $params) : void




Performs the csrf validation if necessary (i.e. if defined in the toolbar item configuration),
and throws an exception in case of failure.
The params array originates from the user (i.e. not trusted).




Parameters
================


- toolbarItem

    

- params

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightRealistAjaxHandler::checkCsrfTokenByToolbarItem](https://github.com/lingtalfi/Light_Realist/blob/master/AjaxHandler/LightRealistAjaxHandler.php#L207-L219)


See Also
================

The [LightRealistAjaxHandler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/AjaxHandler/LightRealistAjaxHandler.md) class.

Previous method: [prepareTags](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/AjaxHandler/LightRealistAjaxHandler/prepareTags.md)<br>Next method: [checkPermissionByToolbarItem](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/AjaxHandler/LightRealistAjaxHandler/checkPermissionByToolbarItem.md)<br>

