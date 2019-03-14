<?php


namespace Ling\Uni2\Command;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Uni2\Helper\OutputHelper as H;
use Ling\UniverseTools\PlanetTool;


/**
 * The CreateMapCommand class.
 *
 * Creates a map file to be used with the @page(import-map), @page(reimport-map), and @page(store-map) commands.
 *
 *
 *
 * The map file is simply a @page(babyYaml) file containing a list of the planets of the current application.
 *
 * Here is an example **map.byml** file:
 *
 * ```yaml
 * - Ling.Bat
 * - Ling.Planet2
 * - Ling.Planet3
 * - MyUniverse.PlanetXX
 * - MyUniverse.Z6PO
 * - ...
 * ```
 *
 * Each item is composed of the galaxy name, followed by a dot, followed by the planet short name.
 *
 *
 * The map is created by default at the root of the application's universe directory.
 *
 * If the map parameter is passed to the command line, then the map will be created at the location
 * defined by that map.
 *
 *
 *
 *
 * How to use
 * ------------
 *
 * ```bash
 * # will create the map in the application's universe/map.byml file.
 * uni map
 *
 * # will create the map in /path/to/my/map.byml.
 * uni map /path/to/my/map.byml
 * ```
 *
 *
 * Options
 * -----------
 *
 * - -f: force mode. By default, the command will not overwrite an existing map.
 *          To overwrite an existing map, set this flag.
 *
 *
 *
 *
 *
 */
class CreateMapCommand extends UniToolGenericCommand
{

    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {

        $forceMode = $input->hasFlag("f");
        $indentLevel = $this->application->getBaseIndent();


        $mapPath = $input->getParameter(2);
        if (null === $mapPath) {
            $mapPath = $this->application->checkUniverseDirectory() . "/map.byml";
        }


        $createTheFile = true;
        if (file_exists($mapPath) && false === $forceMode) {
            $createTheFile = false;
            H::warning(H::i($indentLevel) . "The map <bold>$mapPath</bold> already exists. Use the <bold>-f</bold> option to overwrite an existing map." . PHP_EOL, $output);
        }


        if (true === $createTheFile) {

            $conf = [];
            H::info(H::i($indentLevel) . "Creating the map at <bold>$mapPath</bold>." . PHP_EOL, $output);
            $universeDir = $this->application->checkUniverseDirectory();
            $planetDirs = PlanetTool::getPlanetDirs($universeDir);
            foreach ($planetDirs as $planetDir) {
                $pInfo = PlanetTool::getGalaxyNamePlanetNameByDir($planetDir);
                if (false !== $pInfo) {
                    list($galaxy, $planet) = $pInfo;
                    $conf[] = $galaxy . "." . $planet;

                } else {
                    H::warning(H::i($indentLevel + 1) . "Invalid planet directory <bold>$planetDir</bold>." . PHP_EOL, $output);
                }
            }
            BabyYamlUtil::writeFile($conf, $mapPath);
        }

    }
}