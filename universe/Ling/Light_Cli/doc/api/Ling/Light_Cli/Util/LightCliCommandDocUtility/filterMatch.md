[Back to the Ling/Light_Cli api](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli.md)<br>
[Back to the Ling\Light_Cli\Util\LightCliCommandDocUtility class](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Util/LightCliCommandDocUtility.md)


LightCliCommandDocUtility::filterMatch
================



LightCliCommandDocUtility::filterMatch — Returns whether the given filter matches the given expression.




Description
================


private [LightCliCommandDocUtility::filterMatch](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Util/LightCliCommandDocUtility/filterMatch.md)(string $filter, string $expr) : bool




Returns whether the given filter matches the given expression.
If the dollar symbol ($) is the first char, it means that the expression must start with the rest of the filter.
Otherwise, it means that the expression must contain the filter.




Parameters
================


- filter

    

- expr

    


Return values
================

Returns bool.








Source Code
===========
See the source code for method [LightCliCommandDocUtility::filterMatch](https://github.com/lingtalfi/Light_Cli/blob/master/Util/LightCliCommandDocUtility.php#L435-L443)


See Also
================

The [LightCliCommandDocUtility](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Util/LightCliCommandDocUtility.md) class.

Previous method: [getIndexByCommand](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Util/LightCliCommandDocUtility/getIndexByCommand.md)<br>Next method: [error](https://github.com/lingtalfi/Light_Cli/blob/master/doc/api/Ling/Light_Cli/Util/LightCliCommandDocUtility/error.md)<br>

