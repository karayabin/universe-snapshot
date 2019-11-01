[Back to the Ling/Light_ControllerHub api](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub.md)<br>
[Back to the Ling\Light_ControllerHub\ControllerHubHandler\LightBaseControllerHubHandler class](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/ControllerHubHandler/LightBaseControllerHubHandler.md)


LightBaseControllerHubHandler::doHandle
================



LightBaseControllerHubHandler::doHandle — Executes the controller identified by the given controllerDir and controllerIdentifier, and returns the appropriate http response.




Description
================


protected [LightBaseControllerHubHandler::doHandle](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/ControllerHubHandler/LightBaseControllerHubHandler/doHandle.md)(string $controllerDir, string $controllerIdentifier, Ling\Light\Http\HttpRequestInterface $request) : [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md)




Executes the controller identified by the given controllerDir and controllerIdentifier, and returns the appropriate http response.

The controller dir is the directory where to find the controller.
The controller identifier is a string representing the controller, it has the following notation:

- $controllerPath  (->$method)?


For instance:

- Generated/TestController
- Generated/TestController->render
- ControllerABC->myMethod

If the method is not specified, the "render" method will be assumed.




Parameters
================


- controllerDir

    

- controllerIdentifier

    

- request

    


Return values
================

Returns [HttpResponseInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Http/HttpResponseInterface.md).


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightBaseControllerHubHandler::doHandle](https://github.com/lingtalfi/Light_ControllerHub/blob/master/ControllerHubHandler/LightBaseControllerHubHandler.php#L80-L109)


See Also
================

The [LightBaseControllerHubHandler](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/ControllerHubHandler/LightBaseControllerHubHandler.md) class.

Previous method: [setContainer](https://github.com/lingtalfi/Light_ControllerHub/blob/master/doc/api/Ling/Light_ControllerHub/ControllerHubHandler/LightBaseControllerHubHandler/setContainer.md)<br>

