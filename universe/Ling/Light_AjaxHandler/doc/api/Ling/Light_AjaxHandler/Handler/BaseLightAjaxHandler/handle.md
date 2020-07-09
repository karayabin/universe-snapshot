[Back to the Ling/Light_AjaxHandler api](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler.md)<br>
[Back to the Ling\Light_AjaxHandler\Handler\BaseLightAjaxHandler class](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/BaseLightAjaxHandler.md)


BaseLightAjaxHandler::handle
================



BaseLightAjaxHandler::handle — Handles the given action and returns an [alcp response](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/pages/ajax-light-communication-protocol.md), or throws an exception in case of problems.




Description
================


public [BaseLightAjaxHandler::handle](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/BaseLightAjaxHandler/handle.md)(string $action, Ling\Light\Http\HttpRequestInterface $request) : array




Handles the given action and returns an [alcp response](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/pages/ajax-light-communication-protocol.md), or throws an exception in case of problems.




Parameters
================


- action

    

- request

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [BaseLightAjaxHandler::handle](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/Handler/BaseLightAjaxHandler.php#L33-L55)


See Also
================

The [BaseLightAjaxHandler](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/BaseLightAjaxHandler.md) class.

Previous method: [doHandle](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/BaseLightAjaxHandler/doHandle.md)<br>

