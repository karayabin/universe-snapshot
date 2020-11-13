<?php


namespace Ling\Light_Realist\Helper;


use Ling\Bat\BDotTool;
use Ling\Light_Realist\Exception\LightRealistException;

/**
 * The RequestDeclarationHelper class.
 */
class RequestDeclarationHelper
{


    /**
     * Returns the ric from the given request declaration.
     * Throws an exception if the ric is not defined.
     *
     * See more details in the @page(realist request declaration page).
     *
     *
     *
     * @param array $conf
     * @return array
     */
    public static function getRicByConf(array $conf): array
    {
        if (array_key_exists("duelist", $conf)) {
            if (array_key_exists('ric', $conf['duelist'])) {
                return $conf['duelist']['ric'];
            }
        }
        throw new LightRealistException("Ric not defined in the given request declaration.");
    }


    /**
     * Returns an array of property name => label representing the headers of the list defined in the given request declaration.
     * Or returns false if no headers were defined.
     *
     * Available options are:
     *
     * - removeNonPrintable: bool = false, whether to remove "non printable" properties.
     *      The "non printable" properties are the one with an open admin table data type of either:
     *      - action
     *      - checkbox
     *
     *
     * @param array $conf
     * @param array $options
     * @return array|false
     */
    public static function getListHeadersByConf(array $conf, array $options = [])
    {
        $ret = [];
        $removeNonPrintable = $options['removeNonPrintable'] ?? false;


        /**
         * Note: this method should know every subtleties/cases of the request declaration.
         *
         * For now (2020-08-31), we only have one possible option combo.
         */
        $rendering = $conf['rendering'] ?? [];
        if (array_key_exists("properties_to_display", $rendering)) {
            $headers = $rendering['properties_to_display'];
            if (array_key_exists("property_labels", $rendering)) {
                // we don't use array_intersect_key below because it would change the order defined by properties_to_display
//                $ret = array_intersect_key($labels, array_flip($headers));
                $labels = $rendering['property_labels'];
                foreach ($headers as $name) {
                    $ret[$name] = $labels[$name] ?? $name;
                }
            } else {
                $ret = array_combine($headers, $headers);
            }
        } else {
            return false;
        }


        if (true === $removeNonPrintable) {

            /**
             * If the list is an open_admin_table,
             * remove checkbox and action properties from the rows
             */
            $types = BDotTool::getDotValue("rendering.open_admin_table.data_types", $conf);
            if (null !== $types) {
                $nonPrintableCols = [];
                foreach ($types as $k => $v) {
                    if ('action' === $v || 'checkbox' === $v) {
                        $nonPrintableCols[] = $k;
                    }
                }
                foreach ($ret as $col => $v) {
                    if (in_array($col, $nonPrintableCols, true)) {
                        unset($ret[$col]);
                    }
                }
            }

        }


        return $ret;
    }
}