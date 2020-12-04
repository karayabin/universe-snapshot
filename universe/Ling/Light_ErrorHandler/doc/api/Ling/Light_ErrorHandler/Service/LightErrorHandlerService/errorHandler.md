[Back to the Ling/Light_ErrorHandler api](https://github.com/lingtalfi/Light_ErrorHandler/blob/master/doc/api/Ling/Light_ErrorHandler.md)<br>
[Back to the Ling\Light_ErrorHandler\Service\LightErrorHandlerService class](https://github.com/lingtalfi/Light_ErrorHandler/blob/master/doc/api/Ling/Light_ErrorHandler/Service/LightErrorHandlerService.md)


LightErrorHandlerService::errorHandler
================



LightErrorHandlerService::errorHandler — The error handler function.




Description
================


protected [LightErrorHandlerService::errorHandler](https://github.com/lingtalfi/Light_ErrorHandler/blob/master/doc/api/Ling/Light_ErrorHandler/Service/LightErrorHandlerService/errorHandler.md)(int $errno, string $errstr, string $errfile, int $errline) : bool




The error handler function.

https://www.php.net/manual/en/function.set-error-handler.php

Note that we return false (as for now): we don't want to interfere with php error handler, we just
want to log the errors.




Parameters
================


- errno

    

- errstr

    

- errfile

    

- errline

    


Return values
================

Returns bool.








Source Code
===========
See the source code for method [LightErrorHandlerService::errorHandler](https://github.com/lingtalfi/Light_ErrorHandler/blob/master/Service/LightErrorHandlerService.php#L157-L167)


See Also
================

The [LightErrorHandlerService](https://github.com/lingtalfi/Light_ErrorHandler/blob/master/doc/api/Ling/Light_ErrorHandler/Service/LightErrorHandlerService.md) class.

Previous method: [fatalErrorHandler](https://github.com/lingtalfi/Light_ErrorHandler/blob/master/doc/api/Ling/Light_ErrorHandler/Service/LightErrorHandlerService/fatalErrorHandler.md)<br>Next method: [sendError](https://github.com/lingtalfi/Light_ErrorHandler/blob/master/doc/api/Ling/Light_ErrorHandler/Service/LightErrorHandlerService/sendError.md)<br>

