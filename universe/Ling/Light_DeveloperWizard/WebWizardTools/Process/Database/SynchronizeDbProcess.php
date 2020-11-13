<?php


namespace Ling\Light_DeveloperWizard\WebWizardTools\Process\Database;


use Ling\Bat\BDotTool;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Database\Service\LightDatabaseService;
use Ling\Light_DbSynchronizer\Service\LightDbSynchronizerService;
use Ling\Light_DeveloperWizard\Tool\DeveloperWizardFileTool;
use Ling\Light_DeveloperWizard\WebWizardTools\Process\LightDeveloperWizardBaseProcess;
use Ling\SimplePdoWrapper\Util\MysqlInfoUtil;
use Ling\SqlWizard\Util\MysqlStructureReader;


/**
 * The SynchronizeDbProcess class.
 */
class SynchronizeDbProcess extends LightDeveloperWizardBaseProcess
{

    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->setName("syncdb");
        $this->setLabel("Synchronize the current db with the create file (using Light_DbSynchronizer)");
        $this->setLearnMoreByHash('synchronize-db');
    }

    /**
     * @overrides
     */
    public function prepare()
    {
        parent::prepare();
        $createFileExists = $this->getContextVar("createFileExists");
        if (false === $createFileExists) {
            return 'Missing <a target="_blank" href="https://github.com/lingtalfi/TheBar/blob/master/discussions/create-file.md">create file.</a>';
        }

    }


    /**
     * @implementation
     */
    protected function doExecute(array $options = [])
    {


        $createFileExists = $this->getContextVar("createFileExists");
        $preferencesExist = $this->getContextVar("preferencesExist");
        $preferences = $this->getContextVar("preferences");
        $createFile = $this->getContextVar("createFile");
        $planetDir = $this->getContextVar("planetDir");
        $planet = $this->getContextVar("planet");
        /**
         * @var $container LightServiceContainerInterface
         */
        $container = $this->getContextVar("container");


        if (true === $createFileExists) {
            $infos = null;
            if (false === $preferencesExist) {
                /**
                 * Let's gather the created tables and memorize them as scope for the next time
                 */
                $this->infoMessage("creating developer-wizard preferences file in " . DeveloperWizardFileTool::getFilePath($planetDir));
                $reader = new MysqlStructureReader();
                $infos = $reader->readFile($createFile);
                $tables = array_keys($infos);
                DeveloperWizardFileTool::updateFile($planetDir, [
                    "db_synchronizer" => [
                        "scope" => [], // old version: $tables, but now we use the scope_use_prefix instead...
                        "scope_use_prefix" => true,
                    ]
                ]);
                $preferences = DeveloperWizardFileTool::getPreferences($planetDir);
            }


            $usePrefixForScope = $preferences['scope_use_prefix'] ?? true;
            if (false === $usePrefixForScope) {
                $scope = BDotTool::getDotValue("db_synchronizer.scope", $preferences, []);
            } else {
                if (null === $infos) {
                    $reader = new MysqlStructureReader();
                    $infos = $reader->readFile($createFile);
                }
                $tables = array_keys($infos);
                if (count($tables) < 1) {
                    $this->errorMessage("I cannot guess the table prefix, because there was no table defined in the create file.");
                }
                $anyTable = current($tables);
                $p = explode("_", $anyTable, 2);
                if (2 !== count($p)) {
                    $this->errorMessage("I assumed that every tables had a prefix, but this one doesn't: $anyTable. Aborting process...");
                }
                $prefix = array_shift($p);
                /**
                 * @var $db LightDatabaseService
                 */
                $db = $container->get("database");
                $util = new MysqlInfoUtil();
                $util->setWrapper($db);
                $scope = $util->getTables($prefix);
            }


            $sScope = '';
            if (empty($scope)) {
                $sScope = 'empty scope';
            } else {
                $sScope = 'scope: ' . implode(', ', $scope);
            }
            $this->infoMessage("Synchronizing db for planet $planet, with $sScope.");
            /**
             * @var $synchronizer LightDbSynchronizerService
             */
            $synchronizer = $container->get("db_synchronizer");
            $synchronizer->synchronize($createFile, [
                'scope' => $scope,
            ]);
            $debugMsgs = $synchronizer->getLogDebugMessages();
            foreach ($debugMsgs as $msg) {
                $this->traceMessage($msg);
            }

        } else {
            $this->errorMessage("Create file not found, cannot synchronize the database.");
        }

    }

}