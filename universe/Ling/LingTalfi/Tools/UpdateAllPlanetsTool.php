<?php


namespace Ling\LingTalfi\Tools;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\FileSystemTool;
use Ling\CliTools\Output\Output;
use Ling\DirScanner\YorgDirScannerTool;
use Ling\Light_PlanetInstaller\Helper\LpiDepsFileHelper;
use Ling\Light_PlanetInstaller\Helper\LpiHelper;
use Ling\LingTalfi\Kaos\Util\CommitWizard;
use Ling\UniverseTools\DependencyTool;
use Ling\UniverseTools\MetaInfoTool;
use Ling\UniverseTools\PlanetTool;


/**
 * The UpdateAllPlanetsTool class.
 */
class UpdateAllPlanetsTool
{


    /**
     * Upgrades the given planet's lpi-deps file, and commit them.
     *
     *
     * @param array $planets
     */
    public static function upgradePlanetsLpiDepsFileAndCommit(array $planets)
    {
        $u = new CommitWizard();
        $u->setOutput(new Output());
        foreach ($planets as $planetDotName) {
            a("processing $planetDotName");
            $planetDir = "/myphp/universe/" . PlanetTool::getPlanetSlashNameByDotName($planetDotName);
            $newVersion = MetaInfoTool::incrementVersion($planetDir);
            LpiDepsFileHelper::updateLpiDepsByPlanetDir($planetDir);
            $u->commit($planetDotName, "upgrade dependencies");
        }

    }


    /**
     * If for some reason you loose all your .git directories in your local server,
     * you can use this method to "repair" that.
     *
     *
     * This method will reclone every planets based on my github repo https://github.com/lingtalfi.
     *
     *
     *
     * @throws \Ling\UniverseTools\Exception\UniverseToolsException
     */
    public static function recloneAll()
    {
        $universeDir = "/myphp/universe";
        $baseUrl = "https://github.com/lingtalfi";
        $planetDirs = PlanetTool::getPlanetDirs($universeDir);

        ini_set("max_execution_time", 0);
        foreach ($planetDirs as $planetDir) {

            $galaxyDir = dirname($planetDir);

            $pInfo = PlanetTool::getGalaxyNamePlanetNameByDir($planetDir);
            if (false !== $pInfo) {
                list($galaxy, $planet) = $pInfo;
                echo "parsing $planet<br>";

                FileSystemTool::remove($planetDir);
                $cmd = "cd \"$galaxyDir\"; git clone $baseUrl/$planet.git";
                passthru($cmd);
            } else {
                a("invalid planet dir: $planetDir");
            }
        }
    }


    /**
     *
     * An old method I used to push all planets to github.
     * Note: now there is the better PushCommand.
     * Todo: create a pushAll command instead of this method.
     *
     * @throws \Ling\UniverseTools\Exception\UniverseToolsException
     */
    public static function updateAllPlanets()
    {
        $universeDir = "/myphp/universe";
        ini_set("max_execution_time", 0);
        $planetDirs = PlanetTool::getPlanetDirs($universeDir);
        foreach ($planetDirs as $planetDir) {
            $cmd = 'cd "' . $planetDir . '"; php -f /myphp/git-smart-update/smart-update.php';
            echo $cmd . PHP_EOL;
            passthru($cmd);
        }
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * An old method I used to update links when when I introduced the galaxy concept into the universe.
     * Should not be used anymore but I keep it just in case.
     */
    public static function alterLinks()
    {
        //--------------------------------------------
        // BELOW IS A SNIPPET I USED TO ALTER THE UNIVERSE STRUCTURE...,
        // I KEEP IT AS A MEMO JUST IN CASE...
        //--------------------------------------------
        ini_set('max_execution_time', 0);
        $lingDir = "/myphp/universe/Ling";
        $files = YorgDirScannerTool::getFiles($lingDir, true);
        foreach ($files as $file) {
            $content = file_get_contents($file);
            if (preg_match('!https://github\.com/karayabin/universe-snapshot/(tree|blob)/master/universe/([a-zA-Z0-9_]*)!', $content, $match)) {
                $newContent = preg_replace('!https://github\.com/karayabin/universe-snapshot/(tree|blob)/master/universe/([a-zA-Z0-9_]*)!',
                    'https://github.com/karayabin/universe-snapshot/$1/master/universe/Ling/$2', $content);
                FileSystemTool::mkfile($file, $newContent);
            }
        }
    }

    /**
     * An old script I used when galaxies were introduced to the universe,
     * to convert the old system with package-info.yml to meta-info.byml and dependencies.byml...
     *
     * Should not be used anymore, but I keep it here just in case.
     *
     *
     * @throws \Ling\UniverseTools\Exception\UniverseToolsException
     */
    public static function alter()
    {

        //--------------------------------------------
        // BELOW IS A SNIPPET I USED TO ALTER THE UNIVERSE STRUCTURE...,
        // I KEEP IT AS A MEMO JUST IN CASE...
        //--------------------------------------------
        ini_set("max_execution_time", 0);
        $galaxyDir = "/myphp/universe/Ling";
        $planetDirs = YorgDirScannerTool::getDirs($galaxyDir);
        $allFiles = [];
        foreach ($planetDirs as $planetDir) {
            $planetName = basename($planetDir);
            $planetFiles = YorgDirScannerTool::getFiles($planetDir, true);
            foreach ($planetFiles as $file) {
                $allFiles[] = $file;
            }
        }


        foreach ($planetDirs as $planetDir) {
            $planetName = basename($planetDir);
            $planetFiles = YorgDirScannerTool::getFiles($planetDir, true);

            foreach ($planetFiles as $file) {
                $content = file_get_contents($file);
                $newContent = str_replace('namespace ' . $planetName, 'namespace Ling\\' . $planetName, $content);
                FileSystemTool::mkfile($file, $newContent);
            }


            $readMeFile = $planetDir . "/README.md";
            if (file_exists($readMeFile)) {
                $content = file_get_contents($readMeFile);
                $newContent = str_replace('uni import ' . $planetName, 'uni import Ling/' . $planetName, $content);
                FileSystemTool::mkfile($readMeFile, $newContent);
            }

            $depItem = DependencyTool::getDependencyItem($planetDir);
            if (array_key_exists("dependencies", $depItem)) {
                $deps = $depItem['dependencies'];
                if (array_key_exists("ling", $deps)) {
                    if (!empty($deps['ling'])) {
                        $deps['Ling'] = $deps['ling'];
                    }
                    unset($deps['ling']);
                }
                $newDepItem = [
                    "dependencies" => $deps,
                    "post_install" => [],
                ];
                BabyYamlUtil::writeFile($newDepItem, $planetDir . "/dependencies.byml");
            }


            $metaInfo = MetaInfoTool::parseInfo($planetDir);
            if ($metaInfo) {
                if (array_key_exists("galaxy", $metaInfo)) {
                    unset($metaInfo['galaxy']);
                }
                BabyYamlUtil::writeFile($metaInfo, $planetDir . "/meta-info.byml");
            }


            foreach ($allFiles as $file) {
                $content = file_get_contents($file);
                $newContent = str_replace('use ' . $planetName . '\\', 'use Ling\\' . $planetName . '\\', $content);
                FileSystemTool::mkfile($file, $newContent);
            }

        }

    }
}