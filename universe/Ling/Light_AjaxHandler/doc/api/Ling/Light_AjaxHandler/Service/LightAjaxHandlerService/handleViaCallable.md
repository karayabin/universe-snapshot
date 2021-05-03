[Back to the Ling/Light_AjaxHandler api](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler.md)<br>
[Back to the Ling\Light_AjaxHandler\Service\LightAjaxHandlerService class](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Service/LightAjaxHandlerService.md)


LightAjaxHandlerService::handleViaCallable
================



LightAjaxHandlerService::handleViaCallable — Handles the given callable and returns an http response.




Description
================


public [LightAjaxHandlerService::handleViaCallable](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Service/LightAjaxHandlerService/handleViaCallable.md)(callable $callable) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)




Handles the given callable and returns an http response.

About the given callable:

- by default we assume that it returns a successful alcp response array (the type: success key/value pair is not required)
- if it throws an exception, then the exception will be turned into an alcp response array of type error (and the exception
will be dispatched as an event to allow further investigation).
- if you want to, you can return the alcp response array manually by setting the first argument (which is passed as reference)
         of the callable. You generally don't want to do that, unless you need to return a particular form of the alcp response,
         such as the "print" type for instance.
- to make the callable return an alcp error response, you can throw a ClientErrorException exception from the callable.


See the [alcp response](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/pages/alcp-response.md) document for more information.




Parameters
================


- callable

    


Return values
================

Returns [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md).


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightAjaxHandlerService::handleViaCallable](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/Service/LightAjaxHandlerService.php#L178-L237)


See Also
================

The [LightAjaxHandlerService](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Service/LightAjaxHandlerService.md) class.

Previous method: [handleViaRegisteredHandlers](https://github.com/lingtalfi/Light_AjaxHandler/blob/master/doc/api/Ling/Light_AjaxHandler/Service/LightAjaxHandlerService/handleViaRegisteredHandlers.md)<br>

