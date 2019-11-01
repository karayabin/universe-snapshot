[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)<br>
[Back to the Ling\Light_Realist\Service\LightRealistService class](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService.md)


LightRealistService::registerListGeneralActionHandler
================



LightRealistService::registerListGeneralActionHandler — Registers a list general action handler.




Description
================


public [LightRealistService::registerListGeneralActionHandler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/registerListGeneralActionHandler.md)(string $pluginName, [Ling\Light_Realist\ListGeneralActionHandler\LightRealistListGeneralActionHandlerInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/ListGeneralActionHandler/LightRealistListGeneralActionHandlerInterface.md) $handler) : void




Registers a list general action handler.
List general action ids should be formatted like this:

- list general action id: {pluginName}.{listGeneralActionName}




Parameters
================


- pluginName

    

- handler

    


Return values
================

Returns void.








Source Code
===========
See the source code for method [LightRealistService::registerListGeneralActionHandler](https://github.com/lingtalfi/Light_Realist/blob/master/Service/LightRealistService.php#L484-L490)


See Also
================

The [LightRealistService](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService.md) class.

Previous method: [registerListActionHandler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/registerListActionHandler.md)<br>Next method: [registerDynamicInjectionHandler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistService/registerDynamicInjectionHandler.md)<br>

