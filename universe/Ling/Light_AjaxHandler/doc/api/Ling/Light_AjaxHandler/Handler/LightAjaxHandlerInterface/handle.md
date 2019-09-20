[Back to the Ling/Light_AjaxHandler api](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler.md)<br>
[Back to the Ling\Light_AjaxHandler\Handler\LightAjaxHandlerInterface class](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/LightAjaxHandlerInterface.md)


LightAjaxHandlerInterface::handle
================



LightAjaxHandlerInterface::handle — and returns a json array as specified in the [ajax communication protocol](https://github.com/lingtalfi/AjaxCommunicationProtocol).




Description
================


abstract public [LightAjaxHandlerInterface::handle](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/LightAjaxHandlerInterface/handle.md)(string $actionId, array $params) : array




Handles the action identified by actionId and params,
and returns a json array as specified in the [ajax communication protocol](https://github.com/lingtalfi/AjaxCommunicationProtocol).




Parameters
================


- actionId

    

- params

    


Return values
================

Returns array.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightAjaxHandlerInterface::handle](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/Handler/LightAjaxHandlerInterface.php#L24-L24)


See Also
================

The [LightAjaxHandlerInterface](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Handler/LightAjaxHandlerInterface.md) class.



