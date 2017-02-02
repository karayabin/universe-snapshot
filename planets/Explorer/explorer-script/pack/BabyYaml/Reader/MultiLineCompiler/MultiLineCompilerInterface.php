<?php



namespace BabyYaml\Reader\MultiLineCompiler;


/**
 * MultiLineCompilerInterface
 * @author Lingtalfi
 * 2015-02-27
 *
 */
interface MultiLineCompilerInterface
{

    /**
     * @return string
     */
    public function getValue(array $lines, $nodeLevel);
}
