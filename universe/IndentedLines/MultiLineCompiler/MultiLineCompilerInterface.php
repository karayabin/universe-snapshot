<?php


namespace IndentedLines\MultiLineCompiler;


/**
 * MultiLineCompilerInterface
 * @author Lingtalfi
 * 2015-12-14
 *
 */
interface MultiLineCompilerInterface
{

    /**
     * @return string
     */
    public function getValue(array $lines, $nodeLevel);
}
