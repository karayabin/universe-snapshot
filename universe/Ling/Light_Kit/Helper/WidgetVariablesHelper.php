<?php


namespace Ling\Light_Kit\Helper;


use Ling\Bat\ArrayTool;
use Ling\Bat\BDotTool;
use Ling\Light_Kit\Exception\LightKitException;

/**
 * The WidgetVariablesHelper class.
 */
class WidgetVariablesHelper
{


    /**
     * Injects the widget variables in the page conf.
     *
     * We use the @page(widget variables system).
     * The widget variables is an array of @page(widget coordinates) => variables (to merge with the existing widget conf's variables).
     *
     *
     *
     * @param array $pageConf
     * @param array $widgetVariables
     */
    public static function injectWidgetVariables(array &$pageConf, array $widgetVariables)
    {
        self::doInjectWidgetVariables($pageConf, $widgetVariables, [
            'target' => 'var',
        ]);
    }


    /**
     * Injects the widget conf in the page conf.
     *
     * We use the @page(widget variables system).
     * The widget conf is an array of @page(widget coordinates) => widget conf (to merge with the existing widget conf).
     *
     *
     * @param array $pageConf
     * @param array $widgetConf
     */
    public static function injectWidgetConf(array &$pageConf, array $widgetConf)
    {
        self::doInjectWidgetVariables($pageConf, $widgetConf, [
            'target' => 'conf',
        ]);
    }


    /**
     * Injects the given widget variables in the page conf.
     *
     * Available options are:
     *
     * - target: string(conf|var)=var, what to replace, it can be either the widget configuration itself, or the vars sub-section of it
     *
     *
     * @param array $pageConf
     * @param array $widgetVariables
     * @param array $options
     * @throws LightKitException
     */
    private static function doInjectWidgetVariables(array &$pageConf, array $widgetVariables, array $options = [])
    {

        $target = $options['target'] ?? 'var';

        foreach ($widgetVariables as $widgetCoordinates => $newWidgetConf) {
            $p = explode(".", $widgetCoordinates, 2);
            if (2 === count($p)) {
                list($position, $widgetId) = $p;

                $positionConf = BDotTool::getDotValue("zones." . $position, $pageConf, null);
                if (null !== $positionConf) {
                    foreach ($positionConf as $index => $widgetConf) {

                        if (

                            (true === array_key_exists('id', $widgetConf) && $widgetId === $widgetConf['id']) ||
                            (true === array_key_exists('name', $widgetConf) && $widgetId === $widgetConf['name'])


                        ) {

                            if (true === is_array($newWidgetConf)) {

                                if ('var' === $target) {
                                    $widgetVars = $widgetConf['vars'] ?? [];
                                    $pageConf["zones"][$position][$index]['vars'] = ArrayTool::arrayMergeReplaceRecursive([$widgetVars, $newWidgetConf]);
                                } else {
                                    // conf === $target
                                    $pageConf["zones"][$position][$index] = ArrayTool::arrayMergeReplaceRecursive([$widgetConf, $newWidgetConf]);
                                }

                            } elseif (is_callable($newWidgetConf)) {
                                if ('var' === $target) {
                                    $widgetVars = $widgetConf['vars'] ?? [];
                                    call_user_func_array($newWidgetConf, [&$widgetVars]);
                                    $pageConf["zones"][$position][$index]['vars'] = $widgetVars;
                                } else {
                                    // conf === $target
                                    call_user_func_array($newWidgetConf, [&$widgetConf]);
                                    $pageConf["zones"][$position][$index] = $widgetConf;
                                }
                            } else {
                                $type = gettype($newWidgetConf);
                                throw new LightKitException("Unknown argument type for newConf, it should be either an array or a callable, $type given.");
                            }
                        }
                    }
                }
            } else {
                throw new LightKitException("Invalid widget coordinates format: $widgetCoordinates.");
            }
        }
    }
}