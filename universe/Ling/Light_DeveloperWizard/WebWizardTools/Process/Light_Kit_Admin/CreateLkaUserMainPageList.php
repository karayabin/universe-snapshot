<?php


namespace Ling\Light_DeveloperWizard\WebWizardTools\Process\Light_Kit_Admin;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\FileSystemTool;
use Ling\ClassCooker\FryingPan\Ingredient\MethodIngredient;
use Ling\ClassCooker\FryingPan\Ingredient\ParentIngredient;
use Ling\ClassCooker\FryingPan\Ingredient\UseStatementIngredient;
use Ling\Light_DeveloperWizard\Helper\DeveloperWizardGenericHelper;
use Ling\Light_DeveloperWizard\Helper\DeveloperWizardLkaHelper;
use Ling\Light_Kit_Admin_Generator\Service\LightKitAdminGeneratorService;

/**
 * The CreateLkaUserMainPageList class.
 *
 */
class CreateLkaUserMainPageList extends CreateLkaUserMainPage
{


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->setName("create-lka-user-mainpage-with-list");
        $this->setLabel("Creates the lka user main page with basic list.");
        $this->setLearnMoreByHash('create-the-lka-user-main-page-with-basiclist');
    }


    /**
     * @overrides
     */
    public function prepare()
    {
        parent::prepare();
        $planetName = $this->getContextVar("planet");

        if (0 !== strpos($planetName, "Light_Kit_Admin_")) {
            $this->setDisabledReason("The planet name must start with the \"Light_Kit_Admin_\" prefix.");
        }


        if (true === empty($this->getDisabledReason())) {

            $originPlanet = str_replace("_Kit_Admin", '', $planetName);
            $galaxy = $this->getContextVar("galaxy");
            $originCreateFile = $this->container->getApplicationDir() . "/universe/$galaxy/$originPlanet/assets/fixtures/create-structure.sql";

            if (false === file_exists($originCreateFile)) {
                $this->setDisabledReason('Missing <a target="_blank" href="https://github.com/lingtalfi/TheBar/blob/master/discussions/create-file.md">create file.</a> in the origin planet ("' . $originPlanet . '")');
            }
        }
    }

    /**
     * @implementation
     */
    protected function doExecute(array $options = [])
    {


        //--------------------------------------------
        // CONTROLLER
        //--------------------------------------------
        $planet = $this->getContextVar("planet");
        $galaxy = $this->getContextVar("galaxy");
        $tight = $this->util->getTightPlanetName();
        $serviceName = $this->util->getServiceName();
        $humanName = $this->util->getHumanPlanetName();
        $appDir = $this->container->getApplicationDir();


        $dst = $appDir . "/universe/$galaxy/$planet/Controller/Custom/${tight}UserMainPageController.php";
        $symbol = DeveloperWizardGenericHelper::getSymbolicPath($dst, $appDir);
        if (true === file_exists($dst)) {


            $this->infoMessage("The controller file already exist in $symbol.");
            $pan = $this->getFryingPanByFile($dst);


            $useStatementClasses = [
                'Ling\Light\Http\HttpResponseInterface',
                'Ling\Light_Kit\PageConfigurationUpdator\PageConfUpdator',
            ];
            foreach ($useStatementClasses as $useStatementClass) {
                $pan->addIngredient(UseStatementIngredient::create()->setValue($useStatementClass));
            }

            $useStatementClass = 'Ling\Light_Kit_Admin\Controller\AdminPageController';
            $pan->addIngredient(ParentIngredient::create()->setValue('AdminPageController', [
                'useStatement' => $useStatementClass,
            ]));

            $pan->addIngredient(MethodIngredient::create()->setValue("render", [
                'addAsComment' => true,
                'template' => '
    /**
     * Renders the user main page, with a list.
     *
     * @return HttpResponseInterface|string
     * @throws \Exception
     */
    public function render()
    {
        $parentLayout = "Light_Kit_Admin/Ling.Light_Kit/zeroadmin/dev/mainlayout_base";
        $title = "' . $humanName . ' main page";
        $page = "' . $planet . '/Ling.Light_Kit/zeroadmin/generated/' . $serviceName . '_mainpage";

        return $this->renderAdminPage($page, [
            "parent_layout" => $parentLayout,
            "title" => $title,
        ], PageConfUpdator::create()->updateWidget("body.light_realist", [
            "vars" => [
                "request_declaration_id" => "' . $planet . ':custom/' . $serviceName . '_mainpage",
            ],
        ]));
    }
',
            ]));
            $pan->cook();


        } else {

            $this->infoMessage("Creating the controller in \"$symbol\".");

            $tpl = __DIR__ . "/../../../assets/class-templates/Controller/UserMainPageControllerList.phptpl";
            $content = file_get_contents($tpl);
            $content = str_replace([
                'Light_Kit_Admin_XXX',
                'LightKitAdminXXX',
                'kit_admin_xxx',
                'pluginHuman',
            ], [
                $planet,
                $tight,
                $serviceName,
                $humanName,
            ], $content);
            FileSystemTool::mkfile($dst, $content);
        }


        //--------------------------------------------
        // CALL THE PARENT METHOD...
        //--------------------------------------------
        $options['createController'] = false;
        $options['kit_page_tpl'] = __DIR__ . "/../../../assets/conf-template/data/Ling.Light_Kit/usermainpage_list.byml";
        parent::doExecute($options);


        //--------------------------------------------
        // LIGHT REALIST CONFIG NUGGET
        //--------------------------------------------
        $lkaGenConfigPath = "/tmp/universe/Light_Developer_Wizard/CreateLkaUserMainPageList-lka-generator-config.byml";
        DeveloperWizardLkaHelper::createLkaGeneratorConfigFile([
            "galaxy" => $galaxy,
            "planet" => $planet,
            "path" => $lkaGenConfigPath,
            "tplPath" => __DIR__ . "/../../../assets/conf-template/lka-gen-config-mainpage-list.byml",
            "container" => $this->container,
        ], [
            'recreateEverything' => true,
        ]);

        $conf = BabyYamlUtil::readFile($lkaGenConfigPath);
        $tables = $conf['main']['variables']['tables'];
        /**
         * Generate the list for the first table only
         */
        $tables = array_shift($tables);
        $conf['main']['variables']['tables'] = $tables;


        $this->infoMessage("Launching Light_Kit_Admin_Generator with temporary config file " . $lkaGenConfigPath);
        /**
         * @var $lkaGenerator LightKitAdminGeneratorService
         */
        $lkaGenerator = $this->container->get("kit_admin_generator");

        $lkaGenerator->generateByConf($conf); // assuming identifier=main


    }
}