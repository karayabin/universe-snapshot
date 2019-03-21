<?php


namespace Ling\Uni2\Command;


use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Uni2\Helper\OutputHelper as H;


/**
 * The ListStoreCommand class.
 * This command will list the planets of the local server.
 *
 *
 * Example
 * -------------
 *
 * ```bash
 * $ uni liststore
 * - Ling/ArrayRefResolver
 * - Ling/ArrayToString
 * - Ling/ArrayToTable
 * - Ling/Kit
 * - Ling/UniverseTools
 * - Ling/WebBox
 * - Ling/ZeusTemplateEngine
 *
 *
 * $ uni liststore -v
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
class ListStoreCommand extends UniToolGenericCommand
{


    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {
        $indentLevel = $this->application->getBaseIndent();
        $localServer = $this->application->getLocalServer();
        $useVersionNumber = $input->hasFlag("v");


        if ($localServer->exists()) {
            $planetNames = $localServer->getPlanetNames($this->application->getKnownGalaxies(), $useVersionNumber);


            if (false === $useVersionNumber) {
                foreach ($planetNames as $longPlanetName) {
                    $output->write("- $longPlanetName" . PHP_EOL);
                }
            } else {
                foreach ($planetNames as $item) {
                    list($longPlanetName, $version) = $item;
                    $output->write("- $longPlanetName: $version" . PHP_EOL);
                }
            }
        } else {
            H::warning(H::i($indentLevel) . "The local server doesn't exist (the <b>local_server.root_dir</b> key of the configuration is not defined)." . PHP_EOL, $output);
        }


    }

}