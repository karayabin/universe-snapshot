[Back to the Ling/Light_Kit_Store api](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store.md)<br>
[Back to the Ling\Light_Kit_Store\Controller\Front\Account\YourAccountBaseController class](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/Front/Account/YourAccountBaseController.md)


YourAccountBaseController::renderAccountPage
================



YourAccountBaseController::renderAccountPage — Renders the given page using the [kit service](https://github.com/lingtalfi/Light_Kit).




Description
================


protected [YourAccountBaseController::renderAccountPage](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/Front/Account/YourAccountBaseController/renderAccountPage.md)(string $page, ?array $options = []) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)




Renders the given page using the [kit service](https://github.com/lingtalfi/Light_Kit).
Options are directly forwarded to [the LightKitPageRenderer->renderPage method](https://github.com/lingtalfi/Light_Kit/blob/master/doc/api/Ling/Light_Kit/PageRenderer/LightKitPageRenderer/renderPage.md).

This method also ensures that the user is connected.
If he's not, this method displays a forbidden page.




Parameters
================


- page

    

- options

    


Return values
================

Returns [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md).


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [YourAccountBaseController::renderAccountPage](https://github.com/lingtalfi/Light_Kit_Store/blob/master/Controller/Front/Account/YourAccountBaseController.php#L35-L49)


See Also
================

The [YourAccountBaseController](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/Front/Account/YourAccountBaseController.md) class.

Next method: [getUserRow](https://github.com/lingtalfi/Light_Kit_Store/blob/master/doc/api/Ling/Light_Kit_Store/Controller/Front/Account/YourAccountBaseController/getUserRow.md)<br>

