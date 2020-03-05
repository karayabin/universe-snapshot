<?php


namespace Ling\Light_Realist\Helper;

use Ling\Bat\BDotTool;

/**
 * The RealistHelper class.
 */
class RealistHelper
{

    /**
     * Returns the name of the action column if used, or false otherwise.
     *
     * @param array $conf
     * @return false|string
     */
    public static function getActionColumnNameByRequestDeclaration(array $conf)
    {
        $actionColumn = BDotTool::getDotValue("rendering.rows_renderer.action_column", $conf, false);
        if (is_array($actionColumn)) {
            return $actionColumn['name'] ?? 'action';
        }
        return false;
    }
}