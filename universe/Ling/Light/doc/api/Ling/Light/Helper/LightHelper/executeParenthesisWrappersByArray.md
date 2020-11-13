[Back to the Ling/Light api](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light.md)<br>
[Back to the Ling\Light\Helper\LightHelper class](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/LightHelper.md)


LightHelper::executeParenthesisWrappersByArray
================



LightHelper::executeParenthesisWrappersByArray — Parses the given array, executes the "executeMethod" method on every parenthesis wrapper, and returns the result.




Description
================


public static [LightHelper::executeParenthesisWrappersByArray](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/LightHelper/executeParenthesisWrappersByArray.md)(array $arr, [Ling\Light\ServiceContainer\LightServiceContainerInterface](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/ServiceContainer/LightServiceContainerInterface.md) $container, ?array $identifiers = null) : array




Parses the given array, executes the "executeMethod" method on every parenthesis wrapper, and returns the result.
By default, the identifier is pmp.

See more details in the [ParenthesisMirrorWrapper conception notes](https://github.com/lingtalfi/ParenthesisMirrorParser/blob/master/doc/pages/conception-notes.md).




Parameters
================


- arr

    

- container

    

- identifiers

    


Return values
================

Returns array.








Source Code
===========
See the source code for method [LightHelper::executeParenthesisWrappersByArray](https://github.com/lingtalfi/Light/blob/master/Helper/LightHelper.php#L157-L185)


See Also
================

The [LightHelper](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/LightHelper.md) class.

Previous method: [executeMethod](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Helper/LightHelper/executeMethod.md)<br>

