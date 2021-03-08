<?php


namespace Ling\Light_Kit_Editor\Storage;

use Ling\BabyYaml\BabyYamlUtil;

/**
 * The LightKitEditorDatabaseStorage class.
 */
class LightKitEditorDatabaseStorage extends LightKitEditorAbstractStorage
{

    /**
     * Builds the LightKitEditorDatabaseStorage instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    //--------------------------------------------
    // LightKitEditorStorageInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function addPage(string $pageName, array $pageConf = [])
    {
        a("adding page $pageName", $pageConf);
    }


    /**
     * @implementation
     */
    public function getPageConf(string $pageName): array|false
    {



        $pageFile = $this->rootDir . "/pages/$pageName.byml";
        if (true === file_exists($pageFile)) {
            $arr = BabyYamlUtil::readFile($pageFile);
            $zones = $arr['zones'] ?? [];
            foreach ($zones as $name => $zoneItem) {
                if (true === is_string($zoneItem)) {
                    if (false !== ($res = $this->resolveZoneAlias($zoneItem))) {
                        $arr['zones'][$name] = $res;
                    }
                } elseif (is_array($zoneItem)) {
                    foreach ($zoneItem as $index => $widgetItem) {
                        if (true === is_string($widgetItem)) {
                            if (false !== ($res = $this->resolveZoneAlias($widgetItem))) {
                                array_splice($arr['zones'][$name], $index, 1, $res);
                            }
                        }
                    }
                }

            }
            return $arr;
        } else {
            $this->addError("File not found: $pageFile.");
        }

        return false;
    }


}