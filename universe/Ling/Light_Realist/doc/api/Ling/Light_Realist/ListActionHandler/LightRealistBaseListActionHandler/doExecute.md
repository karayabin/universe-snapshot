[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)<br>
[Back to the Ling\Light_Realist\ListActionHandler\LightRealistBaseListActionHandler class](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistBaseListActionHandler.md)


LightRealistBaseListActionHandler::doExecute
================



LightRealistBaseListActionHandler::doExecute — Executes the list action identified by the given action id.




Description
================


public [LightRealistBaseListActionHandler::doExecute](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistBaseListActionHandler/doExecute.md)(string $actionId, array $params = []) : array




Executes the list action identified by the given action id.

If something goes wrong, throw an exception (it will be caught, and the error message will be sent
to the user).

Otherwise, return an array of successful data.




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
See the source code for method [LightRealistBaseListActionHandler::doExecute](https://github.com/lingtalfi/Light_Realist/blob/master/ListActionHandler/LightRealistBaseListActionHandler.php#L32-L47)


See Also
================

The [LightRealistBaseListActionHandler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistBaseListActionHandler.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistBaseListActionHandler/__construct.md)<br>Next method: [getJsActionCode](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistBaseListActionHandler/getJsActionCode.md)<br>

