<?php


namespace Ling\LogicalOperator\Tool;

/**
 * The LogicalOperatorExpressionEvaluatorTool class.
 */
class LogicalOperatorExpressionEvaluatorTool
{


    /**
     * Resolves the given expression, using logical operators and the given callables.
     *
     * The callables variable is an array of identifier => php callable.
     *
     * The php callable must resolve to a bool.
     *
     * The identifiers:
     * - must contain only alpha numeric chars
     * - must be such as no identifier can be contained in another identifier.
     * (Otherwise, the str_replace technique we use will be compromised...)
     *      Note: if you use unique one or two letters identifiers you shouldn't have any problem.
     *
     *
     * Note that we use eval under the hood, which means we trust the given expression to be safe.
     *
     * Available options are:
     * - input: mixed=null, an argument to pass to the callable.
     *
     *
     * @param string $expression
     * @param array $callables
     * @param array $options
     * @return bool
     */
    public static function resolve(string $expression, array $callables, array $options = []): bool
    {
        $input = $options['input'] ?? null;

        foreach ($callables as $identifier => $callable) {
            $callableResult = call_user_func($callable, $input);
            $sResult = ($callableResult) ? "+" : "-";
            $expression = str_replace($identifier, $sResult, $expression);
        }


        $expression = str_replace([
            '+',
            '-',
        ], [
            'true',
            'false',
        ], $expression);


        return eval('return ' . $expression . ';');

    }
}