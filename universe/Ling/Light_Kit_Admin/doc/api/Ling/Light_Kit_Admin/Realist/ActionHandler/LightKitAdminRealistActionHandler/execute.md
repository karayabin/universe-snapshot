[Back to the Ling/Light_Kit_Admin api](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin.md)<br>
[Back to the Ling\Light_Kit_Admin\Realist\ActionHandler\LightKitAdminRealistActionHandler class](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ActionHandler/LightKitAdminRealistActionHandler.md)


LightKitAdminRealistActionHandler::execute
================



LightKitAdminRealistActionHandler::execute — Executes the action identified by the given action id.




Description
================


public [LightKitAdminRealistActionHandler::execute](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ActionHandler/LightKitAdminRealistActionHandler/execute.md)(string $actionId, ?array $params = []) : mixed




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
See the source code for method [LightKitAdminRealistActionHandler::execute](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/Realist/ActionHandler/LightKitAdminRealistActionHandler.php#L32-L41)


See Also
================

The [LightKitAdminRealistActionHandler](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ActionHandler/LightKitAdminRealistActionHandler.md) class.

Previous method: [__construct](https://github.com/lingtalfi/Light_Kit_Admin/blob/master/doc/api/Ling/Light_Kit_Admin/Realist/ActionHandler/LightKitAdminRealistActionHandler/__construct.md)<br>

