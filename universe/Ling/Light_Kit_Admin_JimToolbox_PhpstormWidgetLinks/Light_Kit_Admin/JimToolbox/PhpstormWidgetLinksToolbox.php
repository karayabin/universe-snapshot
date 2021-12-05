<?php


namespace Ling\Light_Kit_Admin_JimToolbox_PhpstormWidgetLinks\Light_Kit_Admin\JimToolbox;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Light_Kit_Admin_DebugTrace\Service\LightKitAdminDebugTraceService;


/**
 * The PhpstormWidgetLinksToolbox class.
 */
class PhpstormWidgetLinksToolbox extends \Ling\Light_Kit_JimToolbox_PhpstormWidgetLinks\JimToolbox\PhpstormWidgetLinksToolbox
{
    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the kit conf array for the given uri, and sets the file it came from (if any).
     *
     * @param string $uri
     * @param string|null $file
     * @return array
     * @throws \Exception
     */
    protected function getKitConf(string $uri, string &$file = null): array
    {
        /**
         * @var $deb LightKitAdminDebugTraceService
         */
        $deb = $this->container->get("kit_admin_debugtrace");
        $file = $deb->getTargetDirFilePathByUri($uri);
        if (true === file_exists($file)) {
            return BabyYamlUtil::readFile($file);
        }
        return [];
    }
}