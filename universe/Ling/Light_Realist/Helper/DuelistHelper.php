<?php


namespace Ling\Light_Realist\Helper;


/**
 * The DuelistHelper class.
 */
class DuelistHelper
{

    /**
     * Returns the raw table name from the @page(duelist) table property.
     *
     * @param string $table
     * @return string
     */
    public static function getRawTableName(string $table): string
    {
        $p = explode(' ', $table);
        return array_shift($p);
    }
}