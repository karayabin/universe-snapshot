<?php


namespace Ling\Light_Realist\Helper;


use Ling\Bat\BDotTool;
use Ling\Bat\FileSystemTool;
use Ling\CliTools\Output\OutputInterface;
use Ling\DirScanner\YorgDirScannerTool;
use Ling\Light_Realist\Exception\LightRealistException;

/**
 * The RequestDeclarationHelper class.
 */
class RequestDeclarationHelper
{


    /**
     * Registers the planet by copying the given dir content to the expected location.
     *
     * See more details in the @page(open registration system of Ling.Light_Realist).
     *
     * The given dir should contain only babyYaml files representing request declarations.
     * Sub-directories are allowed, but only files will be copied.
     *
     *
     * @param OutputInterface $output
     * @param string $appDir
     * @param string $planetDotName
     * @param string $dir
     */
    public static function registerRequestDeclarationsByDirectory(OutputInterface $output, string $appDir, string $planetDotName, string $dir)
    {
        if (true === is_dir($dir)) {

            $relPaths = YorgDirScannerTool::getFilesWithExtension($dir, "byml", false, true, true);
            $dstDir = $appDir . "/config/open/Ling.Light_Realist/$planetDotName";
            if ($relPaths) {

                $nb = count($relPaths);
                $output->write("Copying <b>$nb</b> request declaration(s) to <blue>$dstDir</blue>." . PHP_EOL);
                foreach ($relPaths as $path) {
                    $dstFile = $dstDir . "/$path";
                    FileSystemTool::copyFile($dir . "/$path", $dstFile);
                }
            }
        }

    }


    /**
     * Unregisters the planet by removing the given dir content from the expected location.
     *
     * See more details in the @page(open registration system of Ling.Light_Realist).
     *
     *
     *
     * @param OutputInterface $output
     * @param string $appDir
     * @param string $planetDotName
     * @param string $dir
     */
    public static function unregisterRequestDeclarationsByDirectory(OutputInterface $output, string $appDir, string $planetDotName, string $dir)
    {
        if (true === is_dir($dir)) {

            $relPaths = YorgDirScannerTool::getFilesWithExtension($dir, "byml", false, true, true);
            $dstDir = $appDir . "/config/open/Ling.Light_Realist/$planetDotName";
            if ($relPaths) {

                $n = 0;
                foreach ($relPaths as $path) {
                    $dstFile = $dstDir . "/$path";
                    if (true === file_exists($dstFile)) {
                        FileSystemTool::remove($dstFile);
                        $n++;
                    }
                }
                $output->write("Removed <b>$n</b> request declaration(s) from <blue>$dstDir</blue>." . PHP_EOL);
            }
        }
    }


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