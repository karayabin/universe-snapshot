<?php


namespace Ling\Light_DeveloperWizard\Service;


use Ling\Bat\SessionTool;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_DeveloperWizard\Helper\DeveloperWizardGenericHelper;
use Ling\Light_DeveloperWizard\Tool\DeveloperWizardFileTool;
use Ling\Light_DeveloperWizard\Util\serviceManagerUtil;
use Ling\Light_DeveloperWizard\WebWizardTools\Process\Database\AddStandardPermissionsProcess;
use Ling\Light_DeveloperWizard\WebWizardTools\Process\Database\SynchronizeDbProcess;
use Ling\Light_DeveloperWizard\WebWizardTools\Process\Generators\GenerateBreezeApiProcess;
use Ling\Light_DeveloperWizard\WebWizardTools\Process\Generators\GenerateBreezeConfigProcess;
use Ling\Light_DeveloperWizard\WebWizardTools\Process\Light_Cli\CreateCliAppProcess;
use Ling\Light_DeveloperWizard\WebWizardTools\Process\Light_Kit_Admin\CreateLkaGeneratorConfigProcess;
use Ling\Light_DeveloperWizard\WebWizardTools\Process\Light_Kit_Admin\CreateLkaPlanetProcess;
use Ling\Light_DeveloperWizard\WebWizardTools\Process\Light_Kit_Admin\CreateLkaUserMainPage;
use Ling\Light_DeveloperWizard\WebWizardTools\Process\Light_Kit_Admin\CreateLkaUserMainPageList;
use Ling\Light_DeveloperWizard\WebWizardTools\Process\Light_Kit_Admin\ExecuteLkaGeneratorProcess;
use Ling\Light_DeveloperWizard\WebWizardTools\Process\Light_PlanetInstaller\CreatePlanetInstallerExtendingLightDatabaseBasePlanetInstaller;
use Ling\Light_DeveloperWizard\WebWizardTools\Process\Planet\CreateConceptionNotesProcess;
use Ling\Light_DeveloperWizard\WebWizardTools\Process\Planet\CreateExceptionClassProcess;
use Ling\Light_DeveloperWizard\WebWizardTools\Process\Planet\RemovePlanetProcess;
use Ling\Light_DeveloperWizard\WebWizardTools\Process\Service\DisableServiceProcess;
use Ling\Light_DeveloperWizard\WebWizardTools\Process\Service\EnableServiceProcess;
use Ling\Light_DeveloperWizard\WebWizardTools\Process\ServiceClass\AddServiceLingBreeze2GetFactoryMethodProcess;
use Ling\Light_DeveloperWizard\WebWizardTools\Process\ServiceClass\AddServiceLogDebugMethodProcess;
use Ling\Light_DeveloperWizard\WebWizardTools\Process\ServiceClass\CreateLss01ServiceProcess;
use Ling\Light_DeveloperWizard\WebWizardTools\Process\ServiceClass\CreateServiceProcess;
use Ling\Light_DeveloperWizard\WebWizardTools\Process\ServiceConfig\AddPluginInstallerHookProcess;
use Ling\Light_DeveloperWizard\WebWizardTools\Process\ServiceConfig\SortHooksAlphabeticallyProcess;
use Ling\Light_DeveloperWizard\WebWizardTools\Process\Widget\AddBootstrapWidgetLibraryWidgetProcess;
use Ling\Light_DeveloperWizard\WebWizardTools\WebWizard\LightDeveloperWizardWebWizard;
use Ling\Light_PluginInstaller\Service\LightPluginInstallerService;
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
     * This property holds the options for this instance.
     *
     * Available options:
     * - whitelist: array of @page(planetIds) to display
     *
     * Note that the gui should let you toggle between displaying only elements on the whitelist, and all elements, at least
     * that's the intent.
     *
     *
     *
     * @var array
     */
    protected $options;


    /**
     * Builds the LightDeveloperWizardService instance.
     */
    public function __construct()
    {
        $this->container = null;
        $this->serviceManagerUtil = null;
        $this->options = [];
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
     * Sets the options.
     *
     * @param array $options
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
    }


    /**
     * Sets an individual option.
     *
     * @param string $key
     * @param $value
     */
    public function setOption(string $key, $value)
    {
        $this->options[$key] = $value;
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
        $guiDisplay = (int)($_GET['display'] ?? 0);
        $selectedPlanetDir = $_GET['planetdir'] ?? null;
        $task = $_GET['task'] ?? null;


        //--------------------------------------------
        // GUI WIZARD MAIN WINDOW
        //--------------------------------------------
        if (
            0 === $guiDisplay ||
            1 === $guiDisplay
        ) {
            if (null === $selectedPlanetDir) {

                $sessionKey = 'Light_Developer_Wizard.useWhitelist';
                if (array_key_exists("whitelist", $_GET)) {
                    $useWhiteList = (bool)$_GET['whitelist'];
                    SessionTool::set($sessionKey, (string)$useWhiteList);
                } else {
                    $useWhiteList = (bool)SessionTool::get($sessionKey, "0");
                }


                $planetDirs = PlanetTool::getPlanetDirs($universeDir);
                $whiteList = $this->options['whitelist'] ?? [];


                if (true === $useWhiteList && (count($whiteList) > 0)) {
                    $planetDirs = array_filter($planetDirs, function ($planetDir) use ($whiteList) {
                        $p = explode('/', $planetDir);
                        $planet = array_pop($p);
                        $galaxy = array_pop($p);
                        $planetId = $galaxy . "/" . $planet;
                        return in_array($planetId, $whiteList, true);
                    });
                }

            } else {


                $guiDisplay = 1;

                $planetDir = $selectedPlanetDir;
                $preferencesExist = DeveloperWizardFileTool::hasFile($planetDir);
                $preferences = DeveloperWizardFileTool::getPreferences($planetDir);
                list($galaxy, $planet) = PlanetTool::getGalaxyNamePlanetNameByDir($planetDir);
                $tightName = PlanetTool::getTightPlanetName($planet);


                // show lka sibling link?
                $lkaSiblingPlanet = null; // if not null, show it

                $isLkaPlugin = (0 === strpos($planet, 'Light_Kit_Admin_'));
                if (true === $isLkaPlugin) {
                    $lkaSiblingPlanet = 'Light_' . substr($planet, 16);
                } else {
                    $lkaSiblingPlanet = 'Light_Kit_Admin_' . substr($planet, 6);
                }
                $lkaSiblingPlanetDir = $container->getApplicationDir() . "/universe/$galaxy/$lkaSiblingPlanet";
                if (false === is_dir($lkaSiblingPlanetDir)) {
                    $lkaSiblingPlanet = null;
                }


                $createFile = $planetDir . "/assets/fixtures/create-structure.sql";
                $createFileExists = file_exists($createFile);
                $serviceFile = $planetDir . "/Service/${tightName}Service.php";
                $serviceFileExists = file_exists($serviceFile);

//                $serviceName = LightNamesAndPathHelper::getServiceName($planet);
                $serviceConfigFile = $container->getApplicationDir() . "/config/services/$planet.byml";
                $serviceConfigFileExists = file_exists($serviceConfigFile);


                $ww = new LightDeveloperWizardWebWizard();
                $ww->setContainer($container);


                // database
                $ww->setProcess((new SynchronizeDbProcess()));
                $ww->setProcess((new AddStandardPermissionsProcess()));


                // generators
                $ww->setProcess((new GenerateBreezeConfigProcess()));
                $ww->setProcess((new GenerateBreezeApiProcess()));


                // Light_Cli
                $ww->setProcess(new CreateCliAppProcess());



                // lka
                $ww->setProcess((new CreateLkaPlanetProcess()));
                $ww->setProcess((new CreateLkaGeneratorConfigProcess()));
                $ww->setProcess((new ExecuteLkaGeneratorProcess()));
                $ww->setProcess((new CreateLkaUserMainPage()));
                $ww->setProcess((new CreateLkaUserMainPageList()));


                // service
                $ww->setProcess((new EnableServiceProcess()));
                $ww->setProcess((new DisableServiceProcess()));


                // service class
                $ww->setProcess((new CreateServiceProcess()));
                $ww->setProcess((new AddServiceLogDebugMethodProcess()));
                $ww->setProcess((new AddServiceLingBreeze2GetFactoryMethodProcess()));
                $ww->setProcess((new CreateLss01ServiceProcess()));


                // service config
                $ww->setProcess((new AddPluginInstallerHookProcess()));
                $ww->setProcess((new SortHooksAlphabeticallyProcess()));


                // planet
                $ww->setProcess((new RemovePlanetProcess()));
                $ww->setProcess((new CreateConceptionNotesProcess()));
                $ww->setProcess((new CreateExceptionClassProcess()));


                // planet installer
                $ww->setProcess((new CreatePlanetInstallerExtendingLightDatabaseBasePlanetInstaller()));


                // widget
                $ww->setProcess((new AddBootstrapWidgetLibraryWidgetProcess()));


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


                $ww->run();

            }
        }
        //--------------------------------------------
        // PLUGIN INSTALLER WINDOW
        //--------------------------------------------
        elseif (2 === $guiDisplay) {

            /**
             * @var $service LightPluginInstallerService
             */
            $service = $container->get("plugin_installer");


            $action = $_GET['action'] ?? null;
            $plugin = $_GET['plugin'] ?? null;


            switch ($action) {
                case "uninstallall":
                    $service->uninstallAll();
                    break;
                case "installall":
                    $service->installAll();
                    break;
                case "uninstall":
                    $service->uninstall($plugin);
                    break;
                case "install":
                    $service->install($plugin);
                    break;
                case "removecache":
                    $service->removeCacheEntry($plugin);
                    break;
                default:
                    break;
            }


            $pluginNames = $service->getRegisteredPluginNames();
            $useCache = $service->getOption("useCache", false);


            $pluginInfo = [];
            foreach ($pluginNames as $pluginName) {
                $pluginInfo[] = [
                    $pluginName,
                    $service->pluginHasCacheEntry($pluginName),
                ];
            }


        }

        ?>


        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <script src="/libs/universe/Ling/Jquery/3.5.1/jquery.min.js"></script>
            <script src="/libs/universe/Ling/JBee/bee.js"></script>
            <title>Light Developer Wizard</title>
            <style>
                .topmenu {
                    background: #2a2f75;
                    display: flex;
                    padding: 3px;
                    color: white;
                }

                .topmenu .item:not(:last-child) {
                    margin-right: 10px;
                }

                .topmenu .item:not(:last-child)::after {
                    content: "|";
                    margin-left: 10px;
                }

                .topmenu a {
                    color: white;
                }

                .disabled {
                    color: #ccc;
                }

                .form-elements input {

                }

            </style>
        </head>


        <body>

        <div class="topmenu">
            <div class="item"><a href="?display=0">Wizard</a></div>
            <div class="item"><a href="?display=2">Plugin installer</a></div>
            <?php if (1 === $guiDisplay && null !== $lkaSiblingPlanet): ?>
                <div class="item"><a
                            href="?planetdir=<?php echo htmlspecialchars($lkaSiblingPlanetDir); ?>"><?php echo $galaxy . "/" . $lkaSiblingPlanet; ?></a>
                </div>
            <?php endif; ?>
        </div>


        <?php if (0 === $guiDisplay): ?>
            <h1>Welcome to the Light_DeveloperWizard script</h1>
            <div class="form-elements">
                Please select a planet <input id="search-input" type="text" value=""/>
                <label>
                    <input id="input-whitelist-toggle" type="checkbox"
                        <?php if (true === $useWhiteList): ?>
                            checked
                        <?php endif; ?>
                    /> Use whitelist
                </label>

            </div>

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

            <h4><?php echo $galaxy . "/" . $planet; ?> (<a href="?">reset</a> | <a
                        href="?planetdir=<?php echo htmlspecialchars($planetDir); ?>">processes</a>)</h4>

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
        <?php elseif (2 === $guiDisplay): ?>
            <h1>Light_PluginInstaller plugin</h1>


            <p>
                The <b>plugin_installer</b> service is currently
                <?php echo (true === $useCache) ? '' : '<b>NOT</b>'; ?>
                using cache.
            </p>
            <ul>
                <li><a href="?action=uninstallall">Uninstall all</a></li>
                <li><a href="?action=installall">Install all</a></li>
            </ul>

            <table>
                <?php foreach ($pluginInfo as $info):
                    list($name, $hasCache) = $info;
                    $sClass = (true === $hasCache) ? '' : 'disabled';

                    ?>
                    <tr>
                        <td><?php echo $name; ?></td>
                        <td><a href="?display=2&action=install&plugin=<?php echo $name; ?>">Install</a></td>
                        <td><a href="?display=2&action=uninstall&plugin=<?php echo $name; ?>">Uninstall</a></td>
                        <td><a
                                    class="<?php echo htmlspecialchars($sClass); ?>"
                                    href="?display=2&action=removecache&plugin=<?php echo $name; ?>">Remove cache
                                file</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
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
                    jSearch.focus();


                    //----------------------------------------
                    // WHITELIST TOGGLE
                    //----------------------------------------
                    $('#input-whitelist-toggle').on('change', function () {
                        var isChecked = $(this).prop("checked");
                        var whitelist = "0";
                        if (true === isChecked) {
                            whitelist = "1";
                        }
                        var url = window.location.href;
                        var newUrl = bee.url_merge_params(url, {
                            whitelist: whitelist,
                        });
                        window.location.href = newUrl;
                    });

                });
            });
        </script>
        </body>
        </html>
        <?php
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the symbolic version of the given path.
     *
     * @param string $path
     * @return string
     */
    protected function getSymbolicPath(string $path): string
    {
        return DeveloperWizardGenericHelper::getSymbolicPath($path, $this->container->getApplicationDir());
    }

}