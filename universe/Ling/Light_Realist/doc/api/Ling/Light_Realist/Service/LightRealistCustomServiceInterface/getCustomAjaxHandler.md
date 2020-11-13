[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)<br>
[Back to the Ling\Light_Realist\Service\LightRealistCustomServiceInterface class](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistCustomServiceInterface.md)


LightRealistCustomServiceInterface::getCustomAjaxHandler
================



LightRealistCustomServiceInterface::getCustomAjaxHandler — Returns the custom ajax handler to use for the given request id, or false if no custom ajax handler is defined for this request id.




Description
================


abstract public [LightRealistCustomServiceInterface::getCustomAjaxHandler](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistCustomServiceInterface/getCustomAjaxHandler.md)(string $requestId) : false | [AjaxCustomHandlerInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/AjaxCustomHandler/AjaxCustomHandlerInterface.md)




Returns the custom ajax handler to use for the given request id, or false if no custom ajax handler is defined for this request id.




Parameters
================


- requestId

    


Return values
================

Returns false | [AjaxCustomHandlerInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/AjaxCustomHandler/AjaxCustomHandlerInterface.md).








Source Code
===========
See the source code for method [LightRealistCustomServiceInterface::getCustomAjaxHandler](https://github.com/lingtalfi/Light_Realist/blob/master/Service/LightRealistCustomServiceInterface.php#L22-L22)


See Also
================

The [LightRealistCustomServiceInterface](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Service/LightRealistCustomServiceInterface.md) class.



