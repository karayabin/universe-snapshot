<?php


namespace Ling\Light_Realist\Helper;


use Ling\Light_Realist\Exception\LightRealistException;

/**
 * The DuelistHelper class.
 */
class DuelistHelper
{

    /**
     * Returns the raw table name from the given request declaration.
     *
     * See the @page(realist request declaration page) for more details.
     *
     * @param array $conf
     * @return string
     */
    public static function getRawTableNameByRequestDeclaration(array $conf): string
    {
        $table = $conf['duelist']['table'] ?? null;
        if (null === $table) {
            throw new LightRealistException("DuelistHelper: table not found in the given request declaration.");
        }
        $p = explode(' ', $table);
        return array_shift($p);
    }
}