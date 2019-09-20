[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)<br>
[Back to the Ling\Light_Realist\ListActionHandler\LightRealistAbstractListActionHandler class](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistAbstractListActionHandler.md)


LightRealistAbstractListActionHandler::doExecute
================



LightRealistAbstractListActionHandler::doExecute — Executes the list action identified by the given action id.




Description
================


abstract protected [LightRealistAbstractListActionHandler::doExecute](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistAbstractListActionHandler/doExecute.md)(string $actionId, array $params = []) : array




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
See the source code for method [LightRealistAbstractListActionHandler::doExecute](https://github.com/lingtalfi/Light_Realist/blob/master/ListActionHandler/LightRealistAbstractListActionHandler.php#L33-L33)


See Also
================

The [LightRealistAbstractListActionHandler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistAbstractListActionHandler.md) class.

Next method: [__construct](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistAbstractListActionHandler/__construct.md)<br>

