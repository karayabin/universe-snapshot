[Back to the Ling/LogicalOperator api](https://github.com/lingtalfi/LogicalOperator/blob/master/doc/api/Ling/LogicalOperator.md)<br>
[Back to the Ling\LogicalOperator\Tool\LogicalOperatorExpressionEvaluatorTool class](https://github.com/lingtalfi/LogicalOperator/blob/master/doc/api/Ling/LogicalOperator/Tool/LogicalOperatorExpressionEvaluatorTool.md)


LogicalOperatorExpressionEvaluatorTool::resolve
================



LogicalOperatorExpressionEvaluatorTool::resolve — Resolves the given expression, using logical operators and the given callables.




Description
================


public static [LogicalOperatorExpressionEvaluatorTool::resolve](https://github.com/lingtalfi/LogicalOperator/blob/master/doc/api/Ling/LogicalOperator/Tool/LogicalOperatorExpressionEvaluatorTool/resolve.md)(string $expression, array $callables, ?array $options = []) : bool




Resolves the given expression, using logical operators and the given callables.

The callables variable is an array of identifier => php callable.

The php callable must resolve to a bool.

The identifiers:
- must contain only alpha numeric chars
- must be such as no identifier can be contained in another identifier.
(Otherwise, the str_replace technique we use will be compromised...)
     Note: if you use unique one or two letters identifiers you shouldn't have any problem.


Note that we use eval under the hood, which means we trust the given expression to be safe.

Available options are:
- input: mixed=null, an argument to pass to the callable.




Parameters
================


- expression

    

- callables

    

- options

    


Return values
================

Returns bool.








Source Code
===========
See the source code for method [LogicalOperatorExpressionEvaluatorTool::resolve](https://github.com/lingtalfi/LogicalOperator/blob/master/Tool/LogicalOperatorExpressionEvaluatorTool.php#L38-L60)


See Also
================

The [LogicalOperatorExpressionEvaluatorTool](https://github.com/lingtalfi/LogicalOperator/blob/master/doc/api/Ling/LogicalOperator/Tool/LogicalOperatorExpressionEvaluatorTool.md) class.



