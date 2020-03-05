<?php


namespace Ling\Light_Kit_Admin_Generator\Generator;

use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\CaseTool;
use Ling\Bat\FileSystemTool;
use Ling\Light_ControllerHub\Service\LightControllerHubService;

/**
 * The MenuConfigGenerator class.
 */
class MenuConfigGenerator extends LkaGenBaseConfigGenerator
{

    /**
     * Generates the menu configuration files according to the given @page(configuration block).
     * @param array $config
     * @throws \Exception
     */
    public function generate(array $config)
    {
        $this->setConfig($config);
        $tables = $this->getTables();

        $appDir = $this->container->getApplicationDir();
        $targetFile = $this->getKeyValue("menu.target_file");
        $controllerFormat = $this->getKeyValue("menu.controller_format");
        $targetFile = str_replace('{app_dir}', $appDir, $targetFile);
        $prefixes = $this->getKeyValue("menu.prefixes", false, []);
        $hasKeywords = $this->getKeyValue("menu.has_keywords", false, [
            "has" => '/',
        ]);
        $customItems = $this->getKeyValue("menu.items", false, []);
        $groupByPrefix = $this->getKeyValue("menu.group_by_prefix", false, true);
        $prefix2Rights = $this->getKeyValue("menu.prefix_to_rights", false, []);

        $menuItemPrefixParent = $this->getKeyValue("menu.item_prefix_parent", false, "lka_gen");
        $menuItemPrefixChild = $this->getKeyValue("menu.item_prefix_child", false, "lkagen_id");
        $menuItemPlugin = $this->getKeyValue("menu.item_plugin", false, "Light_Kit_Admin");
        $menuItemDefaultRight = $this->getKeyValue("menu.item_default_right", false, "Light_Kit_Admin.user");

        $bundle = [
            "prefixes" => $prefixes,
            "hasKeywords" => $hasKeywords,
            "customItems" => $customItems,
            "prefix2Rights" => $prefix2Rights,
            "controllerFormat" => $controllerFormat,
            "itemPrefix" => $menuItemPrefixChild,
            "plugin" => $menuItemPlugin,
            "defaultRight" => $menuItemDefaultRight,
        ];

        //--------------------------------------------
        // GROUPING TABLES
        //--------------------------------------------
        $groups = [];
        foreach ($tables as $table) {
            list($prefix, $childItem) = $this->getTableInfo($table, $bundle);
            if (false === $groupByPrefix || null === $prefix) {
                $prefix = '_'; // means no prefix
            }
            if (false === array_key_exists($prefix, $groups)) {
                $groups[$prefix] = [];
            }
            $groups[$prefix][] = $childItem;
        }


        //--------------------------------------------
        // CREATING ITEMS
        //--------------------------------------------
        $items = [];

        $rootChildren = $groups["_"] ?? [];
        unset($groups['_']);

        // adding prefixed tables
        foreach ($groups as $prefix => $tableInfoItems) {
            $children = [];
            foreach ($tableInfoItems as $childItem) {
                $children[] = $childItem;
            }
            $parentLabel = $prefixes[$prefix] ?? ucfirst(strtolower($prefix));
            $parentItem = [
                'id' => $menuItemPrefixParent . '-' . $prefix,
                'icon' => 'fas fa-bars',
                'text' => $parentLabel,
                'route' => null,
                'children' => $children,
            ];
            $items[] = $parentItem;
        }


        // adding all root children
        foreach ($rootChildren as $childItem) {
            $items[] = $childItem;
        }

        FileSystemTool::mkfile($targetFile, BabyYamlUtil::getBabyYamlString($items));
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns an array containing:
     * - prefix: string|null, the prefix of the table if any, or null otherwise
     * - childItem: array, the menu item corresponding to the given table
     *
     * The configBundle contains the following entries:
     * - prefixes
     * - hasKeywords
     * - customItems
     * - prefix2Rights
     * - controllerFormat
     * - itemPrefix
     * - plugin
     * - defaultRight
     *
     *
     *
     * @param string $table
     * @param array $configBundle
     * @return array
     * @throws \Exception
     */
    protected function getTableInfo(string $table, array $configBundle): array
    {

        $prefixes = $configBundle['prefixes'];
        $hasKeywords = $configBundle['hasKeywords'];
        $customItems = $configBundle['customItems'];
        $prefix2Rights = $configBundle['prefix2Rights'];
        $controller = $configBundle['controllerFormat'];
        $itemPrefix = $configBundle['itemPrefix'];
        $menuPlugin = $configBundle['plugin'];
        $itemDefaultRight = $configBundle['defaultRight'];


        /**
         * @var $hubs LightControllerHubService
         */
        $hubs = $this->container->get("controller_hub");


        $tableWithoutPrefix = $table;
        $thePrefix = null;
        foreach ($prefixes as $prefix => $label) {
            if (0 === strpos($table, $prefix . '_')) {
                $tableWithoutPrefix = substr($table, strlen($prefix) + 1);
                $thePrefix = $prefix;
                break;
            }
        }
        $tags = [
            "{Table}" => CaseTool::toPascal($table),
            "{TableNoPrefix}" => CaseTool::toPascal($tableWithoutPrefix),
        ];
        $controller = str_replace(array_keys($tags), array_values($tags), $controller);
        $controller = str_replace('\\', '/', $controller);


        $defaultLabel = $this->getDefaultLabel($tableWithoutPrefix, $hasKeywords);
        $defaultRight = $itemDefaultRight;
        if (null !== $thePrefix && array_key_exists($thePrefix, $prefix2Rights)) {
            $defaultRight = $prefix2Rights[$thePrefix];
        }

        $item = [
            'id' => $itemPrefix . '-' . $table,
            'icon' => 'fas fa-asterisk',
            'text' => $defaultLabel,
            'route' => $hubs->getRouteName(),
            'route_url_params' => [
                "plugin" => $menuPlugin,
                "controller" => $controller,
            ],
            '_right' => $defaultRight,
            'children' => [],
        ];
        if (array_key_exists($table, $customItems)) {
            $item = array_merge($item, $customItems[$table]);
        }


        return [$thePrefix, $item];
    }


    /**
     * Returns the default label from an object.
     * An object is the semantic abstract object behind a table name;
     * Some table names use two objects, such as table1_has_table2 (which has object table1 and object table2).
     *
     *
     * @param string $object
     * @return string
     */
    protected function getDefaultLabelFromObject(string $object): string
    {
        return str_replace('_', ' ', ucfirst(strtolower($object)));
    }


    /**
     * Returns the default item label for the given table.
     *
     * @param string $tableWithoutPrefix
     * @param array $hasKeywords
     * @return string
     */
    protected function getDefaultLabel(string $tableWithoutPrefix, array $hasKeywords): string
    {
        foreach ($hasKeywords as $keyword => $sepLabel) {
            $needle = '_' . $keyword . '_';
            $p = explode($needle, $tableWithoutPrefix);
            if (count($p) > 1) {
                array_walk($p, function (&$v) {
                    $v = $this->getDefaultLabelFromObject($v);
                });
                return implode($sepLabel, $p);
            }
        }
        return $this->getDefaultLabelFromObject($tableWithoutPrefix);
    }
}