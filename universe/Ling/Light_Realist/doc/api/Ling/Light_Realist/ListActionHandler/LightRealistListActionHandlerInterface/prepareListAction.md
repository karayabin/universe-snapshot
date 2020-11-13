[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)<br>
[Back to the Ling\Light_Realist\ListActionHandler\LightRealistListActionHandlerInterface class](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface.md)


LightRealistListActionHandlerInterface::prepareListAction
================



LightRealistListActionHandlerInterface::prepareListAction — Prepares the given listAction for the given actionId.




Description
================


abstract public [LightRealistListActionHandlerInterface::prepareListAction](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface/prepareListAction.md)(string $actionId, string $requestId, array &$listAction) : void




Prepares the given listAction for the given actionId.

The goal is to transform the list action in a form that the list renderer will understand.

See more in [details about the list actions](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/2020/list-actions.md).




Parameters
================


- actionId

    

- requestId

    

- listAction

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightRealistListActionHandlerInterface::prepareListAction](https://github.com/lingtalfi/Light_Realist/blob/master/ListActionHandler/LightRealistListActionHandlerInterface.php#L37-L37)


See Also
================

The [LightRealistListActionHandlerInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface.md) class.

Previous method: [doWeShowTrigger](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface/doWeShowTrigger.md)<br>Next method: [execute](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListActionHandler/LightRealistListActionHandlerInterface/execute.md)<br>

