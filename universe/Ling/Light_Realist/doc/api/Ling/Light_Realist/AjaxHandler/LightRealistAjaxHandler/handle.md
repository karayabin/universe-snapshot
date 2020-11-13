[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)<br>
[Back to the Ling\Light_Realist\AjaxHandler\LightRealistAjaxHandler class](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/AjaxHandler/LightRealistAjaxHandler.md)


LightRealistAjaxHandler::handle
================



LightRealistAjaxHandler::handle — Process the given parameters, and returns the appropriate response.




Description
================


public [LightRealistAjaxHandler::handle](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/AjaxHandler/LightRealistAjaxHandler/handle.md)(string $action, Ling\Light\Http\HttpRequestInterface $request) : array




Process the given parameters, and returns the appropriate response.
The [realist-tag-transfer protocol](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/realist-tag-transfer-protocol.md) is assumed.



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
See the source code for method [LightRealistAjaxHandler::handle](https://github.com/lingtalfi/Light_Realist/blob/master/AjaxHandler/LightRealistAjaxHandler.php#L27-L93)


See Also
================

The [LightRealistAjaxHandler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/AjaxHandler/LightRealistAjaxHandler.md) class.

Next method: [error](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/AjaxHandler/LightRealistAjaxHandler/error.md)<br>

