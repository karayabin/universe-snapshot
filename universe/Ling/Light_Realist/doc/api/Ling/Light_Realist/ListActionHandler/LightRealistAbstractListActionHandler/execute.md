[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)<br>
[Back to the Ling\Light_Realist\ListActionHandler\LightRealistAbstractListActionHandler class](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistAbstractListActionHandler.md)


LightRealistAbstractListActionHandler::execute
================



LightRealistAbstractListActionHandler::execute — Executes the list action identified by the given action id.




Description
================


public [LightRealistAbstractListActionHandler::execute](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistAbstractListActionHandler/execute.md)(string $actionId, array $params = []) : array




Executes the list action identified by the given action id.

If something goes wrong, throw an exception (it will be caught, and the error message will be sent
to the user).

Otherwise, return a standard [ajax communication protocol](https://github.com/lingtalfi/AjaxCommunicationProtocol) response.




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
See the source code for method [LightRealistAbstractListActionHandler::execute](https://github.com/lingtalfi/Light_Realist/blob/master/ListActionHandler/LightRealistAbstractListActionHandler.php#L56-L70)


See Also
================

The [LightRealistAbstractListActionHandler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistAbstractListActionHandler.md) class.

Previous method: [getHandledIds](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistAbstractListActionHandler/getHandledIds.md)<br>Next method: [setHandledIds](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistAbstractListActionHandler/setHandledIds.md)<br>

