[Back to the Ling/EasyConsoleMenu api](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu.md)<br>
[Back to the Ling\EasyConsoleMenu\Helper\VariableHelper class](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/Helper/VariableHelper.md)


VariableHelper::resolveVariables
================



VariableHelper::resolveVariables — Resolves the variables in msg, and returns the resolved msg.




Description
================


public static [VariableHelper::resolveVariables](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/Helper/VariableHelper/resolveVariables.md)(string $msg, array $variables, array &$undefined = []) : string




Resolves the variables in msg, and returns the resolved msg.
If a variable is not found, it's value will be set to "undefined", and the variable name
will be appended to the undefined array.

Note: a variable is written like this: ${variable}.




Parameters
================


- msg

    

- variables

    

- undefined

    


Return values
================

Returns string.








Source Code
===========
See the source code for method [VariableHelper::resolveVariables](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/Helper/VariableHelper.php#L28-L39)


See Also
================

The [VariableHelper](https://github.com/lingtalfi/EasyConsoleMenu/blob/master/doc/api/Ling/EasyConsoleMenu/Helper/VariableHelper.md) class.



