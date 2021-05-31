<?php


namespace Ling\Light_DeveloperWizard\WebWizardTools\Process\Planet;


use Ling\Bat\FileSystemTool;
use Ling\Light_DeveloperWizard\WebWizardTools\Process\LightDeveloperWizardCommonProcess;
use Ling\UniverseTools\PlanetTool;

/**
 * The CreateExceptionClassProcess class.
 */
class CreateExceptionClassProcess extends LightDeveloperWizardCommonProcess
{


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->setName("create-exception-class");
        $this->setLabel("Creates an exception class for this planet.");
        $this->setLearnMoreByHash('create-exception-class');
        $this->mustBeLight = false;
    }


    /**
     * @implementation
     */
    protected function doExecute(array $options = [])
    {
        $util = $this->util;
        $planet = $util->getPlanetName();
        $galaxy = $util->getGalaxyName();

        $appDir = $this->container->getApplicationDir();


        $className = PlanetTool::getTightPlanetName($planet) . "Exception";
        $path = $appDir . "/universe/$galaxy/$planet/Exception/$className.php";


        $content = <<<EEE
<?php


namespace $galaxy\\$planet\\Exception;


/**
 * The $className class.
 */
class $className extends \Exception
{

}


EEE;

        FileSystemTool::mkfile($path, $content);
        $this->infoMessage("Creating exception class at " . $this->getSymbolicPath($path) . ".");

    }

}