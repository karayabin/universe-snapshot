<?php


namespace Ling\Light_Kit_Admin_Generator\Generator;

use Ling\BabyYaml\BabyYamlUtil;

/**
 * The RouteGenerator class.
 *
 */
class DeprecatedRouteGenerator extends LkaGenBaseConfigGenerator
{

    /**
     * Generates the route configuration file according to the given @page(configuration block).
     * @param array $config
     * @throws \Exception
     */
    public function generate(array $config)
    {
        $this->setConfig($config);
        $tables = $this->getTables();

        $appDir = $this->container->getApplicationDir();
        $targetFile = $this->getKeyValue("route.target_file");
        $targetFile = str_replace('{app_dir}', $appDir, $targetFile);
        $patternFmtList = $this->getKeyValue("route.pattern_format_list");
        $patternFmtForm = $this->getKeyValue("route.pattern_format_form");
        $urlParamsList = $this->getKeyValue("route.url_params_list", false, []);
        $urlParamsForm = $this->getKeyValue("route.url_params_form", false, []);
        $methodList = $this->getKeyValue("route.method_list", false, "render");
        $methodForm = $this->getKeyValue("route.method_form", false, "render");



        $routes = [];
        foreach ($tables as $table) {



            $routeNameList = $this->getRouteNameByTable($table, $config, true);
            $routeNameForm = $this->getRouteNameByTable($table, $config, false);

            $routes[$routeNameList] = [
                "pattern" => 0,
                "controller" => 0,
            ];
        }


        //--------------------------------------------
        //
        //--------------------------------------------
        $data = [
            "Light_Kit_Admin" => [
                "routes" => $routes,
            ],
        ];
        BabyYamlUtil::writeFile($data, $targetFile);
    }
}