<?php


namespace Ling\Light_BreezeGenerator\Tool;


use Ling\Bat\CaseTool;

/**
 * The LightBreezeGeneratorTool class.
 */
class LightBreezeGeneratorTool
{

    /**
     * Returns a ClassName from a given table.
     *
     * @param string $table
     * @return string
     */
    public static function getClassNameByTable(string $table): string
    {
        return CaseTool::toPascal($table);
    }
}