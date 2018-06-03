<?php


namespace Kamille\Utils\ModuleUtils;


use Bat\FileSystemTool;
use Kamille\Architecture\ApplicationParameters\ApplicationParameters;
use Kamille\Utils\ModuleUtils\Exception\ModuleUtilsException;
use Kamille\Utils\Morphic\Generator2\Helper\LingFrenchMorphicGeneratorHelper;
use Komin\Component\Db\QuickPdo\QuickPdo;
use QuickPdo\QuickPdoInfoTool;

class NewModuleProgram
{

    protected $moduleName;
    protected $features;
    protected $params;

    public function __construct()
    {
        $this->features = [];
        $this->params = [];
    }


    public static function create()
    {
        return new static();
    }

    public function setModuleName($moduleName)
    {
        $this->moduleName = $moduleName;
        return $this;
    }

    public function addParam($name, $value)
    {
        $this->params[$name] = $value;
        return $this;
    }


    public function addFeature(string $featureName)
    {
        $this->features[] = $featureName;
        return $this;
    }

    /**
     * @throws ModuleUtilsException
     * @throws \Kamille\Architecture\ApplicationParameters\Exception\ApplicationParametersException
     */
    public function execute()
    {
        $appDir = ApplicationParameters::get("app_dir");
        if ($this->moduleName) {
            $moduleName = $this->moduleName;

            $moduleDir = $appDir . "/class-modules/$moduleName";
            FileSystemTool::mkdir($moduleDir, 0777, true);


            $modulePath = $moduleDir . "/$moduleName" . "Module.php";

            //--------------------------------------------
            // create the module file (only if not exist)
            //--------------------------------------------
            if (!file_exists($modulePath)) {
                $content = $this->getTemplateContent("module", [
                    'moduleName' => $moduleName,
                ]);
                FileSystemTool::mkfile($modulePath, $content);
            }


            //--------------------------------------------
            // import the default pack
            //--------------------------------------------
            $dest = $moduleDir . "/_pack.txt";
            if (!file_exists($dest)) {
                $source = __DIR__ . "/assets/_pack.txt";
                copy($source, $dest);
            }

            //--------------------------------------------
            // import the default conf
            //--------------------------------------------
            $dest = $moduleDir . "/conf.php";
            if (!file_exists($dest)) {
                $source = __DIR__ . "/assets/conf.php";
                copy($source, $dest);
            }

            //--------------------------------------------
            // import the Hooks
            //--------------------------------------------
            $dest = $moduleDir . "/$moduleName" . "Hooks.php";
            if (!file_exists($dest)) {
                $content = $this->getTemplateContent("hooks", [
                    'moduleName' => $moduleName,
                    'ecp' => $this->hasFeature('ecp'),
                ]);
                FileSystemTool::mkfile($dest, $content);
            }

            //--------------------------------------------
            // import the Services
            //--------------------------------------------
            $dest = $moduleDir . "/$moduleName" . "Services.php";
            if (!file_exists($dest)) {
                $content = $this->getTemplateContent("services", [
                    'moduleName' => $moduleName,
                ]);
                FileSystemTool::mkfile($dest, $content);
            }

            //--------------------------------------------
            // import the README.md
            //--------------------------------------------
            $dest = $moduleDir . "/README.md";
            if (!file_exists($dest)) {
                $content = $this->getTemplateContent("readme", [
                    'moduleName' => $moduleName,
                    'theDate' => date('Y-m-d'),
                ]);
                FileSystemTool::mkfile($dest, $content);
            }


            //--------------------------------------------
            // Create HooksHelper
            //--------------------------------------------
            $dest = $moduleDir . "/Helper/$moduleName" . "HooksHelper.php";
            if (!file_exists($dest)) {
                $content = $this->getTemplateContent("hookshelper", [
                    'moduleName' => $moduleName,
                ]);
                FileSystemTool::mkfile($dest, $content);
            }

            //--------------------------------------------
            // Create BackHooksHelper
            //--------------------------------------------
            $dest = $moduleDir . "/Helper/$moduleName" . "BackHooksHelper.php";
            if (!file_exists($dest)) {
                $content = $this->getTemplateContent("backhookshelper", [
                    'moduleName' => $moduleName,
                ]);
                FileSystemTool::mkfile($dest, $content);
            }

            //--------------------------------------------
            // Create ThemeHelper
            //--------------------------------------------
            $dest = $moduleDir . "/Helper/$moduleName" . "ThemeHelper.php";
            if (!file_exists($dest)) {
                $content = $this->getTemplateContent("themehelper", [
                    'moduleName' => $moduleName,
                ]);
                FileSystemTool::mkfile($dest, $content);
            }


            //--------------------------------------------
            // FEATURES
            //--------------------------------------------
            if ($this->hasFeature('ecp')) {

                // create service util
                $dest = $moduleDir . "/Ecp/$moduleName" . "EcpServiceUtil.php";
                if (!file_exists($dest)) {
                    $content = $this->getTemplateContent("ecp", [
                        'moduleName' => $moduleName,
                    ]);
                    FileSystemTool::mkfile($dest, $content);
                }


                // also create the ecp service in files if it doesn't exist (the files will be copied
                // to their final destination when the module is installed (that's how the install of
                // a kamille module works...)
                $dest = $moduleDir . "/files/app/service/$moduleName/ecp/api.php";
                if (!file_exists($dest)) {
                    $content = $this->getTemplateContent("ecp-service", [
                        'moduleName' => $moduleName,
                    ]);
                    FileSystemTool::mkfile($dest, $content);
                }
            }

            if ($this->hasFeature('morphic')) {

                // create service util
                $morphicPrefix = $this->getParam('morphicPrefix');
                $morphicDatabase = $this->params['morphicDatabase'] ?? null;

                $colTranslationFile = $moduleDir . "/assets/morphic/fra/$morphicPrefix-morphic-cols.xml";
                if (!file_exists($colTranslationFile)) {
                    $content = $this->getTemplateContent("morphic-cols", [
                        'moduleName' => $moduleName,
                        'prefix' => $morphicPrefix,
                        'db' => $morphicDatabase,
                    ]);
                    FileSystemTool::mkfile($colTranslationFile, $content);
                }

                $tableTranslationFile = $moduleDir . "/assets/morphic/fra/$morphicPrefix-morphic-tables.xml";
                if (!file_exists($tableTranslationFile)) {
                    $content = $this->getTemplateContent("morphic-tables", [
                        'moduleName' => $moduleName,
                        'prefix' => $morphicPrefix,
                        'db' => $morphicDatabase,
                    ]);
                    FileSystemTool::mkfile($tableTranslationFile, $content);
                }

            }

        } else {
            $this->error("Module name not set");
        }
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    protected function getTemplateContent($type, array $params = [])
    {
        switch ($type) {
            case "module":
                $moduleName = $params['moduleName'];
                $tpl = __DIR__ . "/assets/DefaultModule.php";
                $content = file_get_contents($tpl);
                return str_replace('PeiPei', $moduleName, $content);
                break;
            case "hooks":
                $moduleName = $params['moduleName'];
                $ecp = $params['ecp'];
                $ecpContent = '';
                if (true === $ecp) {
                    $ecpContent = <<<EEE
    protected static function ApplicationLogMonitor_Ecp_logInvalidArgumentException(\Ecp\Exception\EcpInvalidArgumentException \$e)
    {

    }
EEE;

                }

                $tpl = __DIR__ . "/assets/DefaultHooks.php";
                $content = file_get_contents($tpl);
                return str_replace([
                    'PeiPei',
                    '// with-ecp',
                ], [
                    $moduleName,
                    $ecpContent,
                ], $content);
                break;
            case "services":
                $moduleName = $params['moduleName'];
                $tpl = __DIR__ . "/assets/DefaultServices.php";
                $content = file_get_contents($tpl);
                return str_replace('PeiPei', $moduleName, $content);
                break;
            case "readme":
                $moduleName = $params['moduleName'];
                $theDate = $params['theDate'];
                $tpl = __DIR__ . "/assets/README.md";
                $content = file_get_contents($tpl);
                return str_replace([
                    'PeiPei',
                    'theDate',
                ], [
                    $moduleName,
                    $theDate,
                ], $content);
                break;
            case "hookshelper":
                $moduleName = $params['moduleName'];
                $tpl = __DIR__ . "/assets/Helper/DefaultHooksHelper.php";
                $content = file_get_contents($tpl);
                return str_replace('PeiPei', $moduleName, $content);
                break;
            case "backhookshelper":
                $moduleName = $params['moduleName'];
                $tpl = __DIR__ . "/assets/Helper/DefaultBackHooksHelper.php";
                $content = file_get_contents($tpl);
                return str_replace('PeiPei', $moduleName, $content);
                break;
            case "themehelper":
                $moduleName = $params['moduleName'];
                $tpl = __DIR__ . "/assets/Helper/DefaultThemeHelper.php";
                $content = file_get_contents($tpl);
                return str_replace('PeiPei', $moduleName, $content);
                break;
            case "ecp":
                $moduleName = $params['moduleName'];
                $tpl = __DIR__ . "/assets/Ecp/DefaultEcpServiceUtil.php";
                $content = file_get_contents($tpl);
                return str_replace('PeiPei', $moduleName, $content);
                break;
            case "ecp-service":
                $moduleName = $params['moduleName'];
                $tpl = __DIR__ . "/assets/files/app/service/PeiPei/ecp/api.php";
                $content = file_get_contents($tpl);
                return str_replace('PeiPei', $moduleName, $content);
                break;
            case "morphic-cols":
                $prefix = $params['prefix'];
                $db = $params['db'];
                ob_start();
                LingFrenchMorphicGeneratorHelper::dumpColsBluePrint($prefix, $db);
                return ob_get_clean();
                break;
            case "morphic-tables":
                $prefix = $params['prefix'];
                $db = $params['db'];
                ob_start();
                LingFrenchMorphicGeneratorHelper::dumpTableBluePrint($prefix, $db);
                return ob_get_clean();
                break;
            default:
                $this->error("Unknown template with type=$type");
                break;
        }
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    private function error($msg)
    {
        throw new ModuleUtilsException($msg);
    }

    private function hasFeature(string $featureName): bool
    {
        return (in_array($featureName, $this->features, true));
    }


    private function getParam($name)
    {
        if (array_key_exists($name, $this->params)) {
            return $this->params[$name];
        }
        $this->error("Logic error: param not set: $name");
    }
}