[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)<br>
[Back to the Ling\Light_Kit_Admin\Controller\LoginFormController class](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/LoginFormController.md)


LoginFormController::render
================



LoginFormController::render — Renders the login form, and handles it.




Description
================


public [LoginFormController::render](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/LoginFormController/render.md)() : string | [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)




Renders the login form, and handles it.
If an user connects successfully, she will be redirected to the page defined in the service configuration
by the login.on_success_route option.




Parameters
================

This method has no parameters.


Return values
================

Returns string | [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md).


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LoginFormController::render](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/Controller/LoginFormController.php#L31-L167)


See Also
================

The [LoginFormController](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/LoginFormController.md) class.



