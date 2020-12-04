[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)<br>
[Back to the Ling\Light_Kit_Admin\Controller\AdminPageController class](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/AdminPageController.md)


AdminPageController::renderAdminPage
================



AdminPageController::renderAdminPage — if she is not connected yet.




Description
================


public [AdminPageController::renderAdminPage](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/AdminPageController/renderAdminPage.md)(string $page, ?$params = [], ?Ling\Light_Kit\PageConfigurationUpdator\PageConfUpdator $updator = null) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)




Renders the given page using the [kit service](https://github.com/lingtalfi/Light_Kit), or redirects the user to the login page
if she is not connected yet.



Example of page values:

- Light_Kit_Admin_UserPreferences/kit/zeroadmin/generated/lup_user_preference_list




Parameters
================


- page

    

- params

    

- updator

    


Return values
================

Returns [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md).


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [AdminPageController::renderAdminPage](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/Controller/AdminPageController.php#L63-L75)


See Also
================

The [AdminPageController](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/AdminPageController.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Controller/AdminPageController/__construct.md)<br>

