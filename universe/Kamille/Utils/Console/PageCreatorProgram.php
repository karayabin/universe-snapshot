<?php


namespace Kamille\Utils\Console;


use Bat\CaseTool;
use Bat\FileSystemTool;
use Kamille\Architecture\ApplicationParameters\ApplicationParameters;
use Kamille\Exception\KamilleException;
use Kamille\Utils\Routsy\Util\ConfigGenerator\ConfigGenerator;
use Kamille\Utils\Routsy\Util\ConfigGenerator\Exception\ConfigGeneratorException;

class PageCreatorProgram
{

    protected $module;
    protected $routeId;
    protected $url;
    protected $controllerString;
    //
    protected $controllerModelDir;
    protected $controllerModel;
    protected $env;
    protected $appDir;


    public function __construct()
    {
        $this->module = "ThisApp";
        $this->routeId = "my_route";
        $this->url = null;
        $this->controllerString = null;


        $this->controllerModel = "Dummy"; // look in assets directory
        $this->controllerModelDir = null;
        $this->env = "front";
    }

    public static function create()
    {
        return new static();
    }


    public function execute()
    {
        $module = $this->module;
        $routeId = $this->routeId;
        $url = $this->url;
        $controllerString = $this->controllerString;


        if ($module && $routeId && $url && $controllerString) {


            $controllerModel = $this->controllerModel;
            $controllerModelDir = $this->controllerModelDir;
            $env = $this->env;
            if ('front' === $env) {
                $env = "routes";
            }
            $appDir = ApplicationParameters::get("app_dir");


            //--------------------------------------------
            // CREATE ROUTE
            //--------------------------------------------
            if (null === $controllerModelDir) {
                $controllerModelDir = __DIR__ . '/assets';
            }
            $controllerModelDir = str_replace('[app]', $appDir, $controllerModelDir);


            // first, insert a route
            $routeContent = '$routes["' . $routeId . '"] = ["' . $url . '", null, null, \'' . $controllerString . '\'];';
            $routsyFile = $appDir . "/config/routsy/$env.php";
            $section = "Module $module"; //
            ConfigGenerator::addSectionIfNotExist($routsyFile, $section, "MODULES");

            try {
                ConfigGenerator::addRouteToRoutsyFile($routeId, $routeContent, $routsyFile, $section);
            } catch (ConfigGeneratorException $e) {
                // the route already exists probably
            }


            //--------------------------------------------
            // CREATE CONTROLLER
            //--------------------------------------------
            $p = explode(':', $controllerString, 2);
            $controllerNamespaceClass = ltrim($p[0], '\\');


            // namespace and className
            $controllerNamespaceParent = $controllerNamespaceClass;
            $q = explode('\\', $controllerNamespaceParent);
            $className = array_pop($q);
            $controllerNamespaceParent = implode('\\', $q);


            // path to the controller file
            array_shift($q); // remove the Controller prefix
            $pathPart = implode('/', $q);
            $controllerFile = $appDir . "/class-controllers/$pathPart/" . $className . ".php";

            if (false === file_exists($controllerFile)) {


                $controllerModelFile = $controllerModelDir . "/$controllerModel" . "ControllerModel.tpl.php";


                if (file_exists($controllerModelFile)) {
                    $content = file_get_contents($controllerModelFile);
                    $content = str_replace([
                        '_controllerNamespace_',
                        '_controllerClassname_',
                    ], [
                        $controllerNamespaceParent,
                        $className,
                    ], $content);

                    FileSystemTool::mkfile($controllerFile, $content);
                } else {
                    $this->error("controller model not found: $controllerModelFile");
                }
            }


            return [
                "routeId" => $routeId,
                "url" => $url,
                "controllerFile" => $controllerFile,
                "routsyFile" => $routsyFile,
            ];
        } else {
            $this->error("One of the following variable is not set: module, route, uri, controller");
        }
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    public function setControllerModelDir($controllerModelDir)
    {
        $this->controllerModelDir = $controllerModelDir;
        return $this;
    }

    public function setControllerModel($controllerModel)
    {
        $this->controllerModel = $controllerModel;
        return $this;
    }


    public function setModule($module)
    {
        $this->module = $module;
        return $this;
    }

    public function setRouteId($routeId)
    {
        $this->routeId = $routeId;
        return $this;
    }

    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    public function setControllerString($controllerString)
    {
        $this->controllerString = $controllerString;
        return $this;
    }

    public function setEnv($env)
    {
        $this->env = $env;
        return $this;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    protected function error($msg)
    {
        throw new KamilleException($msg);
    }
}