<?php


namespace Ling\Light_Kit_Admin_Generator\Generator;

use Ling\Bat\CaseTool;
use Ling\Bat\FileSystemTool;
use Ling\Bat\StringTool;
use Ling\Light_Kit_Admin_Generator\Exception\LightKitAdminGeneratorException;

/**
 * The ControllerGenerator class.
 *
 * The philosophy is that this tool is just a basic helper, it helps the developer getting 90% of the way,
 * but there is still work to do for the developer.
 *
 * In other words, this tool doesn't try to fine tune every settings that the developer wish for, but rather
 * helps getting the developer in the ball park.
 *
 * Note to myself: remember this philosophy when extending this class: don't overdo it...
 *
 *
 *
 */
class ControllerGenerator extends LkaGenBaseConfigGenerator
{

    /**
     * Generates the controller classes according to the given @page(configuration block).
     * @param array $config
     * @throws \Exception
     */
    public function generate(array $config)
    {
        $this->setConfig($config);

        $variables = $config['variables'] ?? [];
        $planetName = $variables['plugin'] ?? null;
        $galaxyName = $variables['galaxyName'] ?? null;

        if (null === $planetName) {
            throw new LightKitAdminGeneratorException("This generator only works when the \"variables.plugin\" variable is set.");
        }
        if (null === $galaxyName) {
            throw new LightKitAdminGeneratorException("This generator only works when the \"variables.galaxyName\" variable is set.");
        }


        $tables = $this->getTables();

        $appDir = $this->container->getApplicationDir();
        $tablePrefixes = $this->getKeyValue("table_prefixes", false, []);
        $classRootDir = $this->getKeyValue("controller.class_root_dir");
        $classRootDir = str_replace('{app_dir}', $appDir, $classRootDir);
        $useCustomController = $this->getKeyValue("controller.use_custom_controller", false, false);
        $controllerClassName = $this->getKeyValue("controller.controller_classname");
        $customControllerClassName = $this->getKeyValue("controller.custom_controller_classname", false, null);
        $baseControllerClassName = $this->getKeyValue("controller.base_controller_classname");
        $parentController = $this->getKeyValue("controller.parent_controller");
        $controllerVars = $this->getKeyValue("controller.controller_vars");
        $formTitle = $this->getKeyValue("form.title", false, "{Label} form");


        //--------------------------------------------
        $tplController = file_get_contents(__DIR__ . "/../assets/models/classes/controller.php.tpl");
        $tplCustomController = file_get_contents(__DIR__ . "/../assets/models/classes/customController.php.tpl");
        $tplBaseController = file_get_contents(__DIR__ . "/../assets/models/classes/baseController.php.tpl");
        $tplFormConf = file_get_contents(__DIR__ . "/../assets/models/kit_page_conf/form.byml");
        $tplListConf = file_get_contents(__DIR__ . "/../assets/models/kit_page_conf/list.byml");
        //--------------------------------------------

        $requestDeclarationIdFmt = $controllerVars['realist_request_declaration_id_format'] ?? 'Ling.Light_Kit_Admin:generated/{table}';
        $listPageFmt = $controllerVars['list_page_format'] ?? $galaxyName . '.' . $planetName . '/generated/{table}_list';
        $formIdentifierFmt = $controllerVars['form_identifier_format'] ?? 'Ling.Light_Kit_Admin:generated/{table}';
        $formPageFmt = $controllerVars['form_page_format'] ?? 'Ling.Light_Kit_Admin/Ling.Light_Kit/zeroadmin/generated/{table}_form';
        $formConfigPathFmt = $controllerVars['form_config_path_format'] ?? "config/open/Ling.Light_Kit_Admin/lke/pages/$galaxyName.$planetName/generated/{table}_form.byml";
        $listConfigPathFmt = $controllerVars['list_config_path_format'] ?? "config/open/Ling.Light_Kit_Admin/lke/pages/$galaxyName.$planetName/generated/{table}_list.byml";


        foreach ($tables as $table) {


            //--------------------------------------------
            $uses = [];
            $usesCustom = [];
            $tableNoPrefix = $table;
            $p = explode('_', $tableNoPrefix);
            foreach ($tablePrefixes as $prefix) {
                if (0 === strpos($tableNoPrefix, $prefix)) {
                    $tableNoPrefix = substr($tableNoPrefix, strlen($prefix . "_"));
                }
            }
            $tableLabel = str_replace('_', ' ', $tableNoPrefix);
            $TableLabel = ucfirst($tableLabel);
            $Table = CaseTool::toPascal($table);
            $TableNoPrefix = ucfirst($tableNoPrefix);
            $tags = [
                '{Table}' => $Table,
                '{TableNoPrefix}' => $TableNoPrefix,
            ];
            $resolvedControllerClassName = $this->resolveTags($controllerClassName, $tags);
            $p = explode('\\', $resolvedControllerClassName);
            $controllerShortClassName = array_pop($p);
            $controllerNamespace = implode('\\', $p);

            $resolvedBaseControllerClassName = $this->resolveTags($baseControllerClassName, $tags);
            $p = explode('\\', $resolvedBaseControllerClassName);
            $baseControllerShortClassName = array_pop($p);
            $baseControllerNamespace = implode('\\', $p);
            if ($baseControllerNamespace !== $controllerNamespace) {
                $uses[] = "use $resolvedBaseControllerClassName;";
            }
            $sUse = implode(PHP_EOL, $uses);

            if (true === $useCustomController) {
                $resolvedCustomControllerClassName = $this->resolveTags($customControllerClassName, $tags);
                $p = explode('\\', $resolvedCustomControllerClassName);
                $customControllerShortClassName = array_pop($p);
                $customControllerNamespace = implode('\\', $p);
                if ($customControllerNamespace !== $controllerNamespace) {
                    $usesCustom[] = "use $resolvedControllerClassName;";
                }
                $sUseCustom = implode(PHP_EOL, $usesCustom);
            }
            $requestDeclarationId = str_replace('{table}', $table, $requestDeclarationIdFmt);
            $requestDeclarationId = str_replace('{tableNoPrefix}', $tableNoPrefix, $requestDeclarationId);

            $controllerListPage = str_replace('{table}', $table, $listPageFmt);
            $controllerListPage = str_replace('{tableNoPrefix}', $tableNoPrefix, $controllerListPage);

            $formIdentifier = str_replace('{table}', $table, $formIdentifierFmt);
            $formIdentifier = str_replace('{tableNoPrefix}', $tableNoPrefix, $formIdentifier);

            $formPage = str_replace('{table}', $table, $formPageFmt);
            $formPage = str_replace('{tableNoPrefix}', $tableNoPrefix, $formPage);

            $formConfigPath = str_replace('{table}', $table, $formConfigPathFmt);
            $formConfigPath = str_replace('{tableNoPrefix}', $tableNoPrefix, $formConfigPath);

            $listConfigPath = str_replace('{table}', $table, $listConfigPathFmt);
            $listConfigPath = str_replace('{tableNoPrefix}', $tableNoPrefix, $listConfigPath);


            $theFormTitle = $formTitle;
            $genericTags = $this->getGenericTagsByTable($table);
            $theFormTitle = str_replace(array_keys($genericTags), array_values($genericTags), $theFormTitle);
            //--------------------------------------------


            //--------------------------------------------
            // CREATING CONTROLLER
            //--------------------------------------------
            $_tplController = str_replace('TheNamespace', $controllerNamespace, $tplController);
            $_tplController = str_replace('//->use', $sUse, $_tplController);
            $_tplController = str_replace('TheController', $controllerShortClassName, $_tplController);
            $_tplController = str_replace('TheBaseController', $baseControllerShortClassName, $_tplController);
            $_tplController = str_replace('{tableLabel}', $tableLabel, $_tplController);
            $_tplController = str_replace('{TableLabel}', $TableLabel, $_tplController);
            $_tplController = str_replace('{table}', $table, $_tplController);
            $_tplController = str_replace('{request_declaration_id}', $requestDeclarationId, $_tplController);
            $_tplController = str_replace('{list_page}', $controllerListPage, $_tplController);
            $_tplController = str_replace('{form_identifier}', $formIdentifier, $_tplController);
            $_tplController = str_replace('{form_page}', $formPage, $_tplController);
            $_tplController = str_replace('{formTitle}', $theFormTitle, $_tplController);
            $f = $classRootDir . "/" . str_replace('\\', '/', $resolvedControllerClassName) . ".php";
            FileSystemTool::mkfile($f, $_tplController);
            $this->debugLog("Creating Controller $controllerShortClassName in \"" . $this->getSymbolicPath($f) . "\".");


            //--------------------------------------------
            // CREATING CUSTOM CONTROLLER
            //--------------------------------------------
            if (true === $useCustomController) {
                $_tplCustomController = str_replace('TheNamespace', $customControllerNamespace, $tplCustomController);
                $_tplCustomController = str_replace('//->use', $sUseCustom, $_tplCustomController);
                $_tplCustomController = str_replace('TheCustomController', $customControllerShortClassName, $_tplCustomController);
                $_tplCustomController = str_replace('TheController', $controllerShortClassName, $_tplCustomController);


                $f = $classRootDir . "/" . str_replace('\\', '/', $resolvedCustomControllerClassName) . ".php";
                /**
                 * Never overwrite a custom file!!
                 */
                if (false === file_exists($f)) {
                    FileSystemTool::mkfile($f, $_tplCustomController);
                    $this->debugLog("Creating CustomController $controllerShortClassName in \"" . $this->getSymbolicPath($f) . "\".");
                }
            }


            //--------------------------------------------
            // CREATE KIT PAGE CONFIGURATION FOR FORM AND LIST
            //--------------------------------------------
            /**
             * So far, we are using hardcoded paths, works fine.
             */
            $kitTags = [
                // put the related links first, as they can use the following tags, this is just for form though (lazy me...)
//                '{relatedLinks}' => $sRelatedLinks,
                '{tableLabel}' => $tableLabel,
                '{tablePlural}' => StringTool::getPlural($tableLabel),
                '{TableLabel}' => $TableLabel,
                '{Table}' => $Table,
                '{planetDotName}' => $galaxyName . "." . $planetName,
            ];


            $pathForm = $appDir . "/" . $formConfigPath;
            $pathList = $appDir . "/" . $listConfigPath;
            $_tplFormConf = $this->resolveTags($tplFormConf, $kitTags);
            $_tplListConf = $this->resolveTags($tplListConf, $kitTags);
            FileSystemTool::mkfile($pathForm, $_tplFormConf);
            FileSystemTool::mkfile($pathList, $_tplListConf);
            $this->debugLog("Creating form widget config in \"" . $this->getSymbolicPath($pathForm) . "\".");
            $this->debugLog("Creating list widget config in \"" . $this->getSymbolicPath($pathList) . "\".");

        }


        //--------------------------------------------
        // CREATING BASE CONTROLLER
        //--------------------------------------------
        /**
         * deprecated, we extend RealAdminPageController now...
         */
//        $p = explode('\\', $baseControllerClassName);
//        $baseControllerShortClassName = array_pop($p);
//        $baseControllerNamespace = implode('\\', $p);
//
//
//        $p = explode('\\', $parentController);
//        $parentControllerShortClassName = array_pop($p);
//        $parentControllerNamespace = implode('\\', $p);
//        $sUse = '';
//        if ($parentControllerNamespace !== $baseControllerNamespace) {
//            $sUse = "use $parentController;" . PHP_EOL;
//        }
//
//        $tplBaseController = str_replace('TheNamespace', $baseControllerNamespace, $tplBaseController);
//        $tplBaseController = str_replace('//->use', $sUse, $tplBaseController);
//        $tplBaseController = str_replace('TheBaseController', $baseControllerShortClassName, $tplBaseController);
//        $tplBaseController = str_replace('TheParentController', $parentControllerShortClassName, $tplBaseController);
//
//
//        $f = $classRootDir . "/" . str_replace('\\', '/', $baseControllerClassName) . ".php";
//
//        FileSystemTool::mkfile($f, $tplBaseController);
//        $this->debugLog("Creating BaseController in \"". $this->getSymbolicPath($f) ."\".");
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Replace the tags by their values in the given string, and returns the result.
     *
     * @param string $str
     * @param array $tags
     * @return string
     */
    private function resolveTags(string $str, array $tags): string
    {
        return str_replace(array_keys($tags), array_values($tags), $str);
    }
}