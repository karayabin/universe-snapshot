<?php


namespace Ling\Uni2\Command;


use Ling\Bat\FileSystemTool;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Uni2\Helper\OutputHelper as H;
use Ling\UniverseTools\PlanetTool;


/**
 * The ToLinkCommand class.
 *
 * This class converts all the (non-symlink) planets/items of the application to symlinks pointing to their local server equivalents.
 *
 * If the planet/item of the application doesn't have a local server equivalent, it will be
 * ignored (i.e. the symlink will not be created).
 *
 *
 * So for instance if the application contains 3 planets (from the ling galaxy) and 1 item (from the git dependency system):
 *
 *
 * ```txt
 * - /my_app/universe/
 * ----- Ling/
 * --------- planetA/
 * --------- planetB/
 * --------- planetC/
 * - /my_app/universe-dependencies/
 * ----- git/
 * --------- item10/
 * ```
 *
 * And if the local server contains planetA and item10:
 *
 * ```txt
 * - /local_server/
 * ----- Ling/planetA/
 * ----- git/item10/
 * ```
 *
 * Then after executing the tolink command, the application will look like this:
 * (the "-->" symbol represents a symlink)
 *
 * ```txt
 * - /my_app/universe/
 * ----- Ling/
 * --------- planetA/   -->  /local_server/Ling/planetA/
 * --------- planetB/
 * --------- planetC/
 * - /my_app/universe-dependencies/
 * ----- git/
 * --------- item10/    -->  /local_server/git/item10/
 * ```
 *
 *
 *
 *
 */
class ToLinkCommand extends UniToolGenericCommand
{


    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {
        $indentLevel = $this->application->getBaseIndent();


        //--------------------------------------------
        // PLANETS
        //--------------------------------------------
        $universeDir = $this->application->checkUniverseDirectory();
        $planetDirs = PlanetTool::getPlanetDirs($universeDir);
        $localServer = $this->application->getLocalServer();
        if ($localServer->exists()) {

            foreach ($planetDirs as $planetDir) {
                if (false === is_link($planetDir)) {


                    $planetInfo = PlanetTool::getGalaxyNamePlanetNameByDir($planetDir);
                    if (false !== $planetInfo) {

                        list($galaxy, $planetName) = $planetInfo;


                        if ($localServer->hasItem($galaxy, $planetName)) {
                            $itemDir = $localServer->getItemPath($galaxy, $planetName);
                            FileSystemTool::remove($planetDir);
                            symlink($itemDir, $planetDir);
                        } else {
                            H::info(H::i($indentLevel) . "The planet <bold>$galaxy/$planetName</bold> doesn't exist in the local server. It will be ignored." . PHP_EOL, $output);
                        }

                    } else {
                        H::warning(H::i($indentLevel) . "Invalid planet directory: <bold>$planetDir</bold>." . PHP_EOL, $output);
                    }
                }
            }


            //--------------------------------------------
            // NON PLANETS
            //--------------------------------------------
            $relPaths = $localServer->getNonPlanetItemsDirectoryList();
            if ($relPaths) {
                $universeDepDir = $this->application->getUniverseDependenciesDir();
                foreach ($relPaths as $relPath) {
                    $appItemDir = $universeDepDir . "/" . $relPath;
                    if (is_dir($appItemDir) && false === is_link($appItemDir)) {

                        $p = explode("/", $relPath);
                        $system = array_shift($p);
                        $itemName = implode("/", $p);


                        if ($localServer->hasItem($system, $itemName)) {
                            $localServerItemDir = $localServer->getItemPath($system, $itemName);
                            FileSystemTool::remove($appItemDir);
                            symlink($localServerItemDir, $appItemDir);
                        } else {
                            H::info(H::i($indentLevel) . "The item <bold>$system/$itemName</bold> doesn't exist in the local server. It will be ignored." . PHP_EOL, $output);
                        }

                    }
                }
            }

        } else {
            H::error(H::i($indentLevel) . "The local server's root dir is not defined. Use the <bold>conf</bold> command to set it." . PHP_EOL, $output);
        }
    }
}