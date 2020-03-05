[Back to the Ling/Light_AjaxHandler api](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler.md)<br>
[Back to the Ling\Light_AjaxHandler\Controller\LightAjaxHandlerController class](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Controller/LightAjaxHandlerController.md)


LightAjaxHandlerController::handle
================



LightAjaxHandlerController::handle — and returns its output as a HttpResponseInterface.




Description
================


public [LightAjaxHandlerController::handle](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Controller/LightAjaxHandlerController/handle.md)() : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)




Calls the handler identified by the given ajax_handler_id, with and the given ajax_action_id params,
and returns its output as a HttpResponseInterface.

We use the [ajax communication protocol](https://github.com/lingtalfi/AjaxCommunicationProtocol), meaning the response is of type json.




Parameters
================

This method has no parameters.


Return values
================

Returns [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md).


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightAjaxHandlerController::handle](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/Controller/LightAjaxHandlerController.php#L35-L102)


See Also
================

The [LightAjaxHandlerController](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Controller/LightAjaxHandlerController.md) class.

Next method: [error](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Controller/LightAjaxHandlerController/error.md)<br>

