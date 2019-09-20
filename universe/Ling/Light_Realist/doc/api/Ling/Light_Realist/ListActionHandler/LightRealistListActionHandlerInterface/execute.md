[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)<br>
[Back to the Ling\Light_Realist\ListActionHandler\LightRealistListActionHandlerInterface class](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface.md)


LightRealistListActionHandlerInterface::execute
================



LightRealistListActionHandlerInterface::execute — Executes the list action identified by the given action id.




Description
================


abstract public [LightRealistListActionHandlerInterface::execute](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface/execute.md)(string $actionId, array $params = []) : array




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
See the source code for method [LightRealistListActionHandlerInterface::execute](https://github.com/lingtalfi/Light_Realist/blob/master/ListActionHandler/LightRealistListActionHandlerInterface.php#L35-L35)


See Also
================

The [LightRealistListActionHandlerInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface.md) class.

Previous method: [getHandledIds](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface/getHandledIds.md)<br>Next method: [getButton](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface/getButton.md)<br>

