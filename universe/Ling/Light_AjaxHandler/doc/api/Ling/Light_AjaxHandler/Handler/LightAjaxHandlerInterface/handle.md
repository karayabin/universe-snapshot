[Back to the Ling/Light_AjaxHandler api](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler.md)<br>
[Back to the Ling\Light_AjaxHandler\Handler\LightAjaxHandlerInterface class](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/LightAjaxHandlerInterface.md)


LightAjaxHandlerInterface::handle
================



LightAjaxHandlerInterface::handle — Handles the given action and returns an [alcp response](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/pages/ajax-light-communication-protocol.md), or throws an exception in case of problems.




Description
================


abstract public [LightAjaxHandlerInterface::handle](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/LightAjaxHandlerInterface/handle.md)(string $action, Ling\Light\Http\HttpRequestInterface $request) : array




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
See the source code for method [LightAjaxHandlerInterface::handle](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/Handler/LightAjaxHandlerInterface.php#L25-L25)


See Also
================

The [LightAjaxHandlerInterface](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/LightAjaxHandlerInterface.md) class.



