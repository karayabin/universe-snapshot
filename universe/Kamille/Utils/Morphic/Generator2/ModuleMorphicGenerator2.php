<?php


namespace Kamille\Utils\Morphic\Generator2;


use Kamille\Architecture\ApplicationParameters\ApplicationParameters;
use Kamille\Utils\Morphic\Exception\MorphicException;
use Kamille\Utils\Morphic\Helper\MorphicGeneratorHelper;
use PhpFile\PhpFile;

class ModuleMorphicGenerator2 extends MorphicGenerator2
{


    protected $prefix2Module;
    protected $moduleName;
    protected $baseControllerNamespace;
    /**
     * @var bool=false,
     *      If you are using the multi-module mode (for single module mode I don't know...)
     *      if you wish that your menus and routes contains all possibilities (for every table), then set this to true.
     *      By default, it's set to false, and only menus and routes of the corresponding module will be generated.
     */
    protected $menuRouteGenerateAll;

    public function __construct()
    {
        parent::__construct();
        $this->moduleName = "ThisApp";
        $this->baseControllerNamespace = "Controller\NullosAdmin\Back\NullosMorphicController";
        $this->menuRouteGenerateAll = false;
        $this->prefix2Module = [];
    }

    public function setPrefix2Module(array $prefix2Module)
    {
        $this->prefix2Module = $prefix2Module;
        return $this;
    }

    public function setModuleName(string $moduleName)
    {
        $this->moduleName = $moduleName;
        return $this;
    }

    public function prepareByModuleName(string $moduleName)
    {
        $app = ApplicationParameters::get("app_dir");
        $this->moduleName = $moduleName;
        $this->setControllerBaseDir($app . "/class-controllers/$moduleName/Back/Generated");
        $this->setListConfigFileBaseDir($app . "/config/morphic/$moduleName/generated");
        $this->setFormConfigFileBaseDir($app . "/config/morphic/$moduleName/generated");
        return $this;
    }

    public function setBaseControllerNamespace(string $baseControllerNamespace)
    {
        $this->baseControllerNamespace = $baseControllerNamespace;
        return $this;
    }




    //--------------------------------------------
    //
    //--------------------------------------------

    protected function getTableRouteByTable($table)
    {
        $camel = $this->getCamelByTable($table);
        return $this->moduleName . "_Generated_" . $camel . "_List";
    }


    public function generate()
    {
        parent::generate();
        $this->onGenerateAfter();
    }


    protected function onGenerateAfter() // override me
    {
        $generatedItemFile = MorphicGeneratorHelper::getGeneratedMenuLocation($this->moduleName);
        $generatedRouteFile = MorphicGeneratorHelper::getGeneratedRoutesLocation($this->moduleName);
        $menu = PhpFile::create();
        $route = PhpFile::create();
        $menu->addUseStatement(<<<EEE
use Models\AdminSidebarMenu\Lee\Objects\Item;
use Core\Services\A;
EEE
        );
        $menu->addBodyStatement('$generatedItem');


        if ($this->menuRouteGenerateAll) { // generating all modules menus and routes in the module files
            foreach ($this->db2TableInfo as $db => $tableInfos) {
                $this->addModuleMenusAndRoutes($tableInfos, $menu, $route);
            }
        } else { // generating only the current module's menus and routes in the module files
            $tableInfos = [];
            foreach ($this->db2Tables as $db => $tables) {
                foreach ($tables as $table) {
                    $tableInfos[] = $this->db2TableInfo[$db][$table];
                }
            }
            $this->addModuleMenusAndRoutes($tableInfos, $menu, $route);

        }


        $menu->addBodyStatement(';');
        $menu->render($generatedItemFile);
        $route->render($generatedRouteFile);

    }


    protected function addModuleMenusAndRoutes(array $tableInfos, PhpFile $menu, PhpFile $route)
    {


        foreach ($tableInfos as $tableInfo) {


            if (false !== $tableInfo['ai']) {
                /**
                 * Note: for the label, I prefer the elementTable instead of the elementLabelPlural,
                 * because with multiple modules it makes it easier to spot the module
                 */
                //--------------------------------------------
                // CREATE MENU
                //--------------------------------------------
                $menu->addBodyStatement(<<<EEE
    ->addItem(Item::create()
        ->setActive(true)
        ->setName("$tableInfo[table]")
        ->setLabel("$tableInfo[table]")
        ->setIcon("")
        ->setLink(A::link("$tableInfo[route]"))
    )
EEE
                );
            }


            //--------------------------------------------
            // CREATE ROUTES
            //--------------------------------------------
            $path = 'Controller\\' . $this->moduleName . '\\Back\\Generated\\' . $tableInfo['camel'] . '\\' . $tableInfo['camel'] . 'ListController';
            $route->addBodyStatement(<<<EEE
\$routes["$tableInfo[route]"] = ["/morphic-$this->moduleName/generated/$tableInfo[table]/list", null, null, "$path:render"];
EEE
            );
        }
    }


    protected function _getControllerClassHeader(array $tableInfo)
    {

        $p = explode('\\', $this->baseControllerNamespace);
        $className = array_pop($p);

        $s = <<<EEE
<?php

namespace Controller\\$this->moduleName\Back\Generated\\$tableInfo[camel];

use $this->baseControllerNamespace;
EEE;
        $s .= '
use Kamille\Services\XConfig;        
        ';

        $s .= <<<EEE

use Kamille\Utils\Morphic\Exception\MorphicException;
use Core\Services\A;
use Bat\UriTool;
use Models\DropDown\SimpleDropDownModel;

class $tableInfo[camel]ListController extends $className
{

EEE;

        return $s;

    }


    protected function _getControllerAfterContent(array $tableInfo)
    {

        $title = str_replace('"', '\"', ucfirst($tableInfo["labelPlural"]));
        $originalTable = $tableInfo['table'];
        $db = $tableInfo['db'];

        $s = <<<EEE
        
    public function preparePageTop()
    {        
            
        \$pageTop = \$this->pageTop();
        \$pageTop->setTitle("$title");    
        \$pageTop->breadcrumbs()->addLink("$originalTable", UriTool::uri(null, [], false));   
              
EEE;

        // related tables?
        $relatedTables = $tableInfo['relatedTables'];
        if ($relatedTables) {

            $sItems = '';
            $sortedRelatedItems = [];
            foreach ($relatedTables as $table) {
                $tableLabel = str_replace('"', '\"', ucfirst($this->db2TableInfo[$db][$table]['label']));
                $sortedRelatedItems[$tableLabel] = $table;
            }
            ksort($sortedRelatedItems);

            foreach ($sortedRelatedItems as $tableLabel => $table) {
                $tableRoute = $this->db2TableInfo[$db][$table]['route'];
                $sItems .= PHP_EOL;
                $sItems .= <<<EEE
                "$table" => [
                    'label' => "$tableLabel ($table)",
                    'route' => "$tableRoute",
                ],
EEE;

            }

            $sRelated = PHP_EOL;
            $sRelated .= <<<EEE
            
            
            
            
        \$boundItems = [];
        \$items = [
$sItems
        ];

        \$boundTables = \$this->configValues['boundTables'] ?? [];
        foreach (\$items as \$tableName => \$info) {

            if (array_key_exists(\$tableName, \$boundTables)) {
                \$data = \$boundTables[\$tableName];
                if (is_string(\$data)) {
                    \$info['route'] = \$data;
                } else {
                    \$info = \$data;
                }
            }

            \$boundItems[\$tableName] = [
                "label" => \$info['label'],
                "link" => A::link(\$info['route']),
            ];
        }            
            
            
            
            
        \$pageTop->rightBar()->addDropDown(SimpleDropDownModel::create()
            ->setLabel(XConfig::get("ApplicationMorphicGenerator.boundTablesLabel"))
            ->setItems(\$boundItems)->getArray()
        );
EEE;


            $s .= $sRelated;
        }


        $s .= <<<EEE
        
    }
    
EEE;


        return $s;
    }


    protected function _getControllerRenderMethodHeader(array $tableInfo)
    {
        return <<<EEE
\$this->preparePageTop();
EEE;

    }


    protected function getAutocompleteControlContent($column, $autocompletePrefix, array $tableInfo)
    {
        if ('_id' === substr($column, -3)) {
            $column = substr($column, 0, -3);
        }

        if (array_key_exists($autocompletePrefix, $this->prefix2Module)) {
            $moduleName = $this->prefix2Module[$autocompletePrefix];
        } else {
            throw new MorphicException("Undefined prefix2Module relationship with prefix: $autocompletePrefix");
        }

        return <<<EEE
            ->setAutocompleteOptions([
                'action' => "auto.$column",
                'source' => "/service/$moduleName/ecp/api?action=auto.$column",
                /**
                * 0 is good because if the user has no idea of what she is looking for,
                * she can just press arrow down/up and be suggested the whole list...
                */                
                'minLength' => 0,
            ])                      
EEE;
    }


    protected function getControllerConstructorExtraStatements()
    {
        return '$this->moduleName = "' . $this->moduleName . '";';
    }

}




