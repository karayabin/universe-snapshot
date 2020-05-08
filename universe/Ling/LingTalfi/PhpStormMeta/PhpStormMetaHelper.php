<?php


namespace Ling\LingTalfi\PhpStormMeta;

use Ling\BabyYaml\BabyYamlUtil;
use Ling\DirScanner\YorgDirScannerTool;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;

/**
 * The PhpStormMetaHelper class.
 *
 *
 *
 */
class PhpStormMetaHelper
{

    /**
     * This method generates the content of a .phpstorm.meta.php file that maps the service names of the given container
     * to the corresponding class, thus allowing us to do this:
     *
     * $container->get("my_service")-> // phpstorm will autocomplete with the methods of that service...
     *
     *
     *
     * See https://www.jetbrains.com/help/phpstorm/ide-advanced-metadata.html#map for more details.
     *
     *
     *
     *
     *
     * @param LightServiceContainerInterface $container
     * @return string
     */
    public static function getPhpStormMetaMapString(LightServiceContainerInterface $container): string
    {


        /**
         * Note: there is currently a bug? in the all method which returns
         * things like row_lookup.methods_collection.0.args.storage as a service if a service reference another
         * that doesn't exist anymore, so I fix that here, just in case.
         *
         *
         */
        $services = $container->all();
        $methods = [
            "getApplicationDir",
            "getLight",
            "setLight",
            "setApplicationDir",
        ];

        $tpl = <<<EEE
<?php


namespace PHPSTORM_META {



    use Ling\Octopus\ServiceContainer\OctopusServiceContainerInterface;



    override(OctopusServiceContainerInterface::get(), map([
        HERE
    ]));


}
EEE;

        $br = PHP_EOL;
        $s = '';

        //--------------------------------------------
        //
        //--------------------------------------------
        $servicesDir = $container->getApplicationDir() . "/config/services";
        $files = YorgDirScannerTool::getFilesWithExtension($servicesDir, "byml", false, true);
        foreach ($files as $file) {
            $config = BabyYamlUtil::readFile($file);
            foreach ($config as $service => $value) {
                if (is_array($value) && array_key_exists('instance', $value)) {
                    $s .= "\t\t" . '"' . $service . '"' . " => \\" . $value['instance'] . "::class,";
                    $s .= $br;
                }
            }


        }

        header("Content-type: text/plain");

        return str_replace('HERE', $s, $tpl);
    }
}