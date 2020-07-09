<?php


namespace Ling\Light_DeveloperWizard\WebWizardTools\Process;


use Ling\Bat\BDotTool;
use Ling\Light_DeveloperWizard\Exception\LightDeveloperWizardException;
use Ling\Light_DeveloperWizard\Tool\DeveloperWizardFileTool;
use Ling\SqlWizard\Util\MysqlStructureReader;
use Ling\WebWizardTools\Process\WebWizardToolsProcess;


/**
 * The LightDeveloperWizardBaseProcess class.
 */
abstract class LightDeveloperWizardBaseProcess extends WebWizardToolsProcess
{


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Returns the given absolute path, with the application directory replaced by a symbol if found.
     * If not, the path is returned as is.
     *
     *
     * For instance: [app]/my/image.png
     *
     * @param string $path
     * @return string
     */
    protected function getSymbolicPath(string $path): string
    {
        $appDir = $this->getContextVar("container")->getApplicationDir();
        $p = explode($appDir, $path, 2);
        if (2 === count($p)) {
            return '[app]' . array_pop($p);
        }
        return $path;
    }


    /**
     * Returns the table prefix from either the preferences (if found), or guessed from the given createFile otherwise.
     *
     * @param string $planetDir
     * @param string $createFile
     * @return string
     * @throws \Exception
     */
    protected function getTablePrefix(string $planetDir, string $createFile): string
    {
        $preferences = DeveloperWizardFileTool::getPreferences($planetDir);
        $tablePrefix = BDotTool::getDotValue("general.table_prefix", $preferences, null);

        // guessing the table prefix
        //--------------------------------------------
        if (null === $tablePrefix) {
            $reader = new MysqlStructureReader();
            $infos = $reader->readFile($createFile);
            $firstTable = key($infos);
            $p = explode('_', $firstTable, 2);
            if (1 === count($p)) {
                throw new LightDeveloperWizardException("I wasn't able to guess the prefix for table $firstTable.");
            } else {
                $tablePrefix = array_shift($p);
                // memorizing...
                DeveloperWizardFileTool::updateFile($planetDir, [
                    "general" => [
                        "table_prefix" => $tablePrefix,
                    ],
                ]);
            }
        }
        return $tablePrefix;
    }
}