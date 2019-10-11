[Back to the Ling/Light_Realist api](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist.md)<br>
[Back to the Ling\Light_Realist\Tool\LightRealistTool class](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Tool/LightRealistTool.md)


LightRealistTool::ricsToIntegersOnlyInString
================



LightRealistTool::ricsToIntegersOnlyInString — Returns a comma separated list of integers, based on the given rics.




Description
================


public static [LightRealistTool::ricsToIntegersOnlyInString](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Tool/LightRealistTool/ricsToIntegersOnlyInString.md)(array $rics) : string




Returns a comma separated list of integers, based on the given rics.

It's assumed that the given rics comes from the user, and therefore is not trusted.
This method was designed with the goal of providing the string to use inside the IN mysql function,
with rics which has a primary key composed of only one column of type integer (such as a table
with the auto-incremented key as the primary key).




Parameters
================


- rics

    


Return values
================

Returns string.








Source Code
===========
See the source code for method [LightRealistTool::ricsToIntegersOnlyInString](https://github.com/lingtalfi/Light_Realist/blob/master/Tool/LightRealistTool.php#L113-L124)


See Also
================

The [LightRealistTool](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Tool/LightRealistTool.md) class.

Previous method: [checkAjaxToken](https://github.com/lingtalfi/Light_Realist/blob/master/doc/api/Ling/Light_Realist/Tool/LightRealistTool/checkAjaxToken.md)<br>

