<?php


namespace Ling\Light_DeveloperWizard\Service;


use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_DeveloperWizard\Tool\DeveloperWizardFileTool;
use Ling\Light_DeveloperWizard\Util\serviceManagerUtil;
use Ling\Light_DeveloperWizard\WebWizardTools\Process\AddStandardPermissionsProcess;
use Ling\Light_DeveloperWizard\WebWizardTools\Process\CreateServiceProcess;
use Ling\Light_DeveloperWizard\WebWizardTools\Process\GenerateBreezeApiProcess;
use Ling\Light_DeveloperWizard\WebWizardTools\Process\GenerateLkaPlanetProcess;
use Ling\Light_DeveloperWizard\WebWizardTools\Process\SynchronizeDbProcess;
use Ling\Light_DeveloperWizard\WebWizardTools\WebWizard\LightDeveloperWizardWebWizard;
use Ling\UniverseTools\PlanetTool;

/**
 * The LightDeveloperWizardService class.
 */
class LightDeveloperWizardService
{


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;

    /**
     * This property holds the serviceManagerUtil for this instance.
     * @var serviceManagerUtil
     */
    protected $serviceManagerUtil;


    /**
     * Builds the LightDeveloperWizardService instance.
     */
    public function __construct()
    {
        $this->container = null;
        $this->serviceManagerUtil = null;
    }

    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }


    /**
     * Returns a ServiceManagerUtil instance.
     *
     * @return ServiceManagerUtil
     */
    public function getServiceManagerUtil(): ServiceManagerUtil
    {
        if (null === $this->serviceManagerUtil) {
            $this->serviceManagerUtil = new ServiceManagerUtil();
        }
        return $this->serviceManagerUtil;
    }


    /**
     * Runs the wizard.
     *
     *
     *
     * @throws \Exception
     */
    public function runWizard()
    {


        $appDir = $this->container->getApplicationDir();
        $container = $this->container;

        //--------------------------------------------
        // CONFIG
        //--------------------------------------------
        $universeDir = $appDir . "/universe";


        //--------------------------------------------
        //
        //--------------------------------------------
        /**
         * Note to future self:
         *
         * in this script we don't try to catch exceptions, we let them flow.
         * The idea is that we are developers, this is a tool for developers, we want the full trace when a problem occurs.
         *
         *
         */
        $guiDisplay = 0;
        $selectedPlanetDir = $_GET['planetdir'] ?? null;
        $task = $_GET['task'] ?? null;


        if (null === $selectedPlanetDir) {
            $planetDirs = PlanetTool::getPlanetDirs($universeDir);
        } else {
            $guiDisplay = 1;
            $planetDir = $selectedPlanetDir;
            $preferencesExist = DeveloperWizardFileTool::hasFile($planetDir);
            $preferences = DeveloperWizardFileTool::getPreferences($planetDir);
            list($galaxy, $planet) = PlanetTool::getGalaxyNamePlanetNameByDir($planetDir);

            $createFile = $planetDir . "/assets/fixtures/create-structure.sql";
            $createFileExists = file_exists($createFile);

            $ww = new LightDeveloperWizardWebWizard();
            $ww->setContainer($container);

            $ww->setProcess((new SynchronizeDbProcess())->setCategory("database"));
            $ww->setProcess((new GenerateBreezeApiProcess())->setCategory("class generation"));
            $ww->setProcess((new AddStandardPermissionsProcess())->setCategory("database"));
            $ww->setProcess((new GenerateLkaPlanetProcess())->setCategory("class generation"));
            $ww->setProcess((new CreateServiceProcess())->setCategory("service"));


            $ww->setContext([
                "createFile" => $createFile,
                "createFileExists" => $createFileExists,
                "preferencesExist" => $preferencesExist,
                "preferences" => $preferences,
                "container" => $container,
                "galaxy" => $galaxy,
                "planet" => $planet,
                "planetDir" => $planetDir,
            ]);
            $ww->setTriggerExtraParams([
                "planetdir" => $planetDir,
            ]);
            $ww->setOnProcessSuccessMessage('
            <a href="?planetdir=' . htmlspecialchars($planetDir) . '">Click here to continue</a>');

            $ww->setProcessFilter(function ($pName) use ($createFileExists) {
                if (in_array($pName, [
                        "syncdb",
                        "generate-breeze-api",
                        "generate-lka-planet",
                    ]) && false === $createFileExists) {
                    return 'Missing <a target="_blank" href="https://github.com/lingtalfi/TheBar/blob/master/discussions/create-file.md">create file.</a>';
                }
                return true;
            });


            $ww->run();


        }


        ?>


        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <script src="/libs/universe/Ling/Jquery/3.5.1/jquery.min.js"></script>
            <title>Light Developer Wizard</title>
            <style>

            </style>
        </head>


        <body>


        <h1>Welcome to the Light_DeveloperWizard script</h1>

        <?php if (0 === $guiDisplay): ?>
            <p>
                Please select a planet <input id="search-input" type="text" value=""/>
            </p>

            <ul id="planet-list">
                <?php foreach ($planetDirs as $planetDir):

                    list($galaxy, $planet) = PlanetTool::getGalaxyNamePlanetNameByDir($planetDir);
                    ?>

                    <li class="planet-item" data-name="<?php echo htmlspecialchars($galaxy . "/" . $planet); ?>">
                        <a href="?planetdir=<?php echo htmlspecialchars($planetDir); ?>"><?php echo $galaxy . "/" . $planet; ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php elseif (1 === $guiDisplay): ?>

            <h4><?php echo $galaxy . "/" . $planet; ?> (<a href="?">back</a>)</h4>

            <p>
                <?php if (true === $createFileExists): ?>
                    Create file detected
                <?php else: ?>
                    Create file not detected, please consider creating a <a
                            href="https://github.com/lingtalfi/TheBar/blob/master/discussions/create-file.md">create
                        file</a>.
                <?php endif; ?>
            </p>

            <?php $ww->render(); ?>
        <?php endif; ?>


        <script>
            document.addEventListener("DOMContentLoaded", function (event) {
                $(document).ready(function () {


                    //----------------------------------------
                    // SEARCH FILTER
                    //----------------------------------------
                    var jSearch = $('#search-input');
                    var jPlanetList = $('#planet-list');

                    jSearch.on('keydown', function () {
                        var $this = $(this);
                        clearTimeout($.data(this, 'timer'));
                        var wait = setTimeout(function () {
                            var val = $this.val().toLowerCase();
                            jPlanetList.find('.planet-item').each(function () {
                                var planetName = $(this).attr("data-name").toLowerCase();
                                if (-1 !== planetName.indexOf(val)) {
                                    $(this).show();
                                } else {
                                    $(this).hide();
                                }
                            });
                        }, 250);
                        $(this).data('timer', wait);
                    });
                });
            });
        </script>
        </body>
        </html>
        <?php
    }
}