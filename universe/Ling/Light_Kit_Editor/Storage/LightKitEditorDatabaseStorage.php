<?php


namespace Ling\Light_Kit_Editor\Storage;

use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\ArrayTool;
use Ling\Light_Kit_Editor\Api\Custom\CustomLightKitEditorApiFactory;
use Ling\Light_Kit_Editor\Service\LightKitEditorService;

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

        $arr = ArrayTool::superimpose($pageConf, [
            'label' => '',
            'layout' => '',
            'layout_vars' => '',
            'title' => '',
            'description' => '',
            'bodyClass' => '',
        ]);
        $arr['identifier'] = $pageName;
        $factory = $this->getFactory();
        $pageApi = $factory->getPageApi();
        $page = $pageApi->getPageByIdentifier($pageName);
        if (null === $page) {
            $pageApi->insertPage($arr);
        } else {
            $pageApi->updatePage($arr, [
                'identifier' => $pageName,
            ]);
        }
    }


    /**
     * @implementation
     */
    public function addBlock(string $identifier)
    {
        az("h", $identifier);
    }


    /**
     * @implementation
     */
    public function getPageConf(string $pageName): array|false
    {


        /**
         * @var $ed LightKitEditorService
         */
        $ed = $this->getContainer()->get("kit_editor");
        $pageApi = $ed->getFactory()->getPageApi();
        $arr = $pageApi->getAllWidgetsByPage($pageName);
        if (null !== $arr) {
            if (false === empty($arr)) {
                $firstItem = $arr[0];

                $ret = [
                    "label" => $firstItem['page_label'],
                    "layout" => $firstItem['page_layout'],
                    "layout_vars" => $this->toBaby($firstItem['page_layout_vars']),
                    "title" => $firstItem['page_title'],
                    "description" => $firstItem['page_description'],
                    "bodyClass" => $firstItem['page_bodyclass'],
                    "zones" => [],
                ];


                //--------------------------------------------
                // FIRST ORDER THE BLOCKS
                //--------------------------------------------
                /**
                 * Make sure items are ordered by ascending block_index,
                 * so that the blocks are already in the correct order.
                 *
                 * Note: this is tricky, be sure to understand how the schema works to understand
                 * what I'm doing here...
                 */
                usort($arr, function ($item1, $item2) {
                    if ($item1['block_index'] > $item2['block_index']) {
                        return 1;
                    }
                    if ($item1['block_index'] < $item2['block_index']) {
                        return -1;
                    }
                    return 0;
                });


                $zones = [];
                foreach ($arr as $item) {
                    $positionName = $item['position_name'];
                    if (false === array_key_exists($positionName, $zones)) {
                        $zones[$positionName] = [];
                    }

                    $zones[$positionName][] = [
                        "_position" => $item['widget_position'],
                        "id" => $item['widget_id'],
                        "name" => $item['widget_name'],
                        "type" => $item['widget_type'],
                        "identifier" => $item['widget_identifier'],
                        "className" => $item['widget_classname'],
                        "widgetDir" => $item['widget_dir'],
                        "template" => $item['widget_template'],
                        "js" => $item['widget_js'],
                        "skin" => $item['widget_skin'],
                        "vars" => $this->toBaby($item['widget_vars']),
                        "active" => (bool)$item['widget_active'],
                    ];
                }


                //--------------------------------------------
                // THEN ORDER THE WIDGETS
                //--------------------------------------------
                foreach ($zones as $zoneName => $widgets) {
                    /**
                     * filtering out non-widgets that come from the query
                     */
                    foreach ($widgets as $index => $widget) {
                        if (null === $widget['id']) {
                            unset($widgets[$index]);
                        }
                    }

                    if ($widgets) {
                        usort($widgets, function ($w1, $w2) {
                            return (int)($w1['_position'] > $w2['_position']);
                        });
                    }


                    // clean up one last time
                    foreach ($widgets as $index => $widget) {
                        unset($widgets[$index]['id']);
                        unset($widgets[$index]['_position']);
                    }

                    $zones[$zoneName] = $widgets;


                }


                //--------------------------------------------
                //
                //--------------------------------------------
                $ret['zones'] = $zones;


//                az($ret);
                return $ret;
            } else {
                $this->addError("LightKitEditorDatabaseStorage: page not bound to anything yet: $pageName.");
            }
        } else {
            $this->addError("LightKitEditorDatabaseStorage: page not found: $pageName.");
        }

        return false;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Resolves the given babyYaml string to its original form and returns the result.
     *
     * @param string | null $str
     * @return mixed
     * @throws \Exception
     *
     */
    private function toBaby(?string $str): mixed
    {
        if (null === $str) {
            return null;
        }
        return BabyYamlUtil::readBabyYamlString($str);
    }


    /**
     * Returns the kit editor api factory.
     * @return CustomLightKitEditorApiFactory
     */
    private function getFactory(): CustomLightKitEditorApiFactory
    {
        return $this->getContainer()->get("kit_editor")->getFactory();
    }

}