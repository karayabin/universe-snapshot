[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)<br>
[Back to the Ling\Light_Realist\ActionHandler\LightRealistActionHandlerInterface class](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ActionHandler/LightRealistActionHandlerInterface.md)


LightRealistActionHandlerInterface::execute
================



LightRealistActionHandlerInterface::execute — Executes the action identified by the given action id.




Description
================


abstract public [LightRealistActionHandlerInterface::execute](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ActionHandler/LightRealistActionHandlerInterface/execute.md)(string $actionId, array $params = []) : mixed




Executes the action identified by the given action id.

If something goes wrong, throw an exception (it will be caught, and the error message will be sent
to the user).

Otherwise, return whatever content you want, it will be translated to its json equivalent for you.




Parameters
================


- actionId

    

- params

    


Return values
================

Returns mixed.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightRealistActionHandlerInterface::execute](https://github.com/lingtalfi/Light_Realist/blob/master/ActionHandler/LightRealistActionHandlerInterface.php#L38-L38)


See Also
================

The [LightRealistActionHandlerInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ActionHandler/LightRealistActionHandlerInterface.md) class.

Previous method: [getHandledIds](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ActionHandler/LightRealistActionHandlerInterface/getHandledIds.md)<br>

