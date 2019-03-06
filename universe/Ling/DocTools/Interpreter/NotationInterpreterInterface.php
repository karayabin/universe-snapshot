<?php


namespace Ling\DocTools\Interpreter;


use Ling\DocTools\Info\CommentInfo;
use Ling\DocTools\Report\ReportInterface;

/**
 * The NotationInterpreterInterface interface represents a notation interpreter.
 *
 * The default notation interpreter in DocTools is a docTool interpreter.
 *
 * See the @page(docTool markup language page) for more info.
 *
 */
interface NotationInterpreterInterface
{
    /**
     * Resolves the @keyword(inline tags) in the given $string, and returns the result.
     * Also updates the report if given.
     *
     * @param string $string
     * @param ReportInterface|null $report
     * @return string
     */
    public function resolveInlineTags(string $string, ReportInterface $report = null);


    /**
     * Interprets the given $tags, and potentially configures the $comment accordingly.
     *
     *
     * @param array $tags
     * @param CommentInfo $comment
     * @param array $info
     * An array containing the following variables:
     * - declaringClass: the name of the class in which the doc comment was written.
     *
     * @param ReportInterface|null $report
     * @return void
     */
    public function interpretBlockLevelTags(array $tags, CommentInfo $comment, array $info, ReportInterface $report = null);
}