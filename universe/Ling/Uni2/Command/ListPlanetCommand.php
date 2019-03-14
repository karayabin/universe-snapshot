<?php


namespace Ling\Uni2\Command;


use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Uni2\Helper\OutputHelper as H;
use Ling\UniverseTools\MetaInfoTool;
use Ling\UniverseTools\PlanetTool;


/**
 * The ListPlanetCommand class.
 * This command will list the planets available to the current application.
 *
 *
 * Example
 * -------------
 *
 *
 *
 * ```bash
 * $ uni listplanet
 * - Ling/ArrayRefResolver
 * - Ling/ArrayToString
 * - Ling/ArrayToTable
 * - Ling/Kit
 * - Ling/UniverseTools
 * - Ling/WebBox
 * - Ling/ZeusTemplateEngine
 *
 *
 * $ uni listplanet -v
 * - Ling/ArrayRefResolver: 1.0.0
 * - Ling/ArrayToString: 1.4.0
 * - Ling/ArrayToTable: 1.2.0
 * - Ling/Kit: undefined
 * - Ling/UniverseTools: 1.3.0
 * - Ling/WebBox: 1.0.0
 * - Ling/ZeusTemplateEngine: 1.2.0
 *
 * ```
 *
 *
 *
 *
 *
 */
class ListPlanetCommand extends UniToolGenericCommand
{


    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {
        $indentLevel = $this->application->getBaseIndent();
        $universeDir = $this->application->checkUniverseDirectory();
        $useVersionNumber = $input->hasFlag("v");
        $dirs = PlanetTool::getPlanetDirs($universeDir);


        if (false === $useVersionNumber) {
            foreach ($dirs as $planetDir) {

                $pInfo = PlanetTool::getGalaxyNamePlanetNameByDir($planetDir);
                if (false !== $pInfo) {
                    list($galaxy, $planetName) = $pInfo;
                    $output->write("- $galaxy/$planetName" . PHP_EOL);
                } else {
                    H::error(H::i($indentLevel) . "Invalid planet directory: <bold>$planetDir</bold>" . PHP_EOL, $output);
                }


            }
        } else {
            foreach ($dirs as $planetDir) {

                $pInfo = PlanetTool::getGalaxyNamePlanetNameByDir($planetDir);
                if (false !== $pInfo) {

                    list($galaxy, $planetName) = $pInfo;
                    $meta = MetaInfoTool::parseInfo($planetDir);
                    $version = $meta['version'] ?? "undefined";
                    $output->write("- $galaxy/$planetName: $version" . PHP_EOL);

                } else {
                    H::error(H::i($indentLevel) . "Invalid planet directory: <bold>$planetDir</bold>" . PHP_EOL, $output);
                }
            }
        }
    }

}