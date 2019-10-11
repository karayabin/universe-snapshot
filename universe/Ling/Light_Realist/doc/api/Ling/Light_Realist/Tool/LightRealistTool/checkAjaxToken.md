[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)<br>
[Back to the Ling\Light_Realist\Tool\LightRealistTool class](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Tool/LightRealistTool.md)


LightRealistTool::checkAjaxToken
================



LightRealistTool::checkAjaxToken — Checks whether the given token is valid.




Description
================


public static [LightRealistTool::checkAjaxToken](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Tool/LightRealistTool/checkAjaxToken.md)(array $token, string $tokenValue, [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container) : void




Checks whether the given token is valid.
The token is given as an array:

- name: the token name
- value: the token value (not used in this method, but that's the unofficial notation of a token in realist)




Parameters
================


- token

    

- tokenValue

    

- container

    


Return values
================

Returns void.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [LightRealistTool::checkAjaxToken](https://github.com/lingtalfi/Light_Realist/blob/master/Tool/LightRealistTool.php#L82-L97)


See Also
================

The [LightRealistTool](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Tool/LightRealistTool.md) class.

Previous method: [getListGeneralActionItemByActionId](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Tool/LightRealistTool/getListGeneralActionItemByActionId.md)<br>Next method: [ricsToIntegersOnlyInString](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Tool/LightRealistTool/ricsToIntegersOnlyInString.md)<br>

