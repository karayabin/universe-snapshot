<?php


namespace Ling\Light_Kit_Editor\Storage;

use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\FileSystemTool;

/**
 * The LightKitEditorBabyYamlStorage class.
 */
class LightKitEditorBabyYamlStorage extends LightKitEditorAbstractStorage
{


    /**
     * This property holds the rootDir for this instance.
     * @var string
     */
    private string $rootDir;


    /**
     * Builds the LightKitEditorBabyYamlStorage instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->rootDir = "/tmp";
    }

    /**
     * Sets the rootDir.
     *
     * @param string $rootDir
     */
    public function setRootDir(string $rootDir)
    {
        $this->rootDir = $rootDir;
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
        $pageName = $this->noEscalation($pageName);


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



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns a path with any double dots stripped out.
     *
     * @param string $string
     * @return string
     */
    private function noEscalation(string $string): string
    {
        return FileSystemTool::removeTraversalDots($string);
    }


    /**
     * Returns the widgets referenced by the given zone alias, or false if the given string is not a zone alias.
     *
     * @param string $str
     * @return array|false
     */
    private function resolveZoneAlias(string $str): array|false
    {
        if (true === str_starts_with($str, 'z$:')) {
            $zoneId = trim(substr($str, 3));
            return $this->getWidgetsByZone($zoneId);
        }
        return false;
    }

    /**
     * Returns the widgets array for the given zone id.
     * @param string $zoneId
     * @return array
     */
    private function getWidgetsByZone(string $zoneId): array
    {
        $arr = [];
        $zoneFile = $this->rootDir . "/zones/$zoneId.byml";
        if (true === file_exists($zoneFile)) {
            $arr = BabyYamlUtil::readFile($zoneFile);
        }
        return $arr;
    }

}