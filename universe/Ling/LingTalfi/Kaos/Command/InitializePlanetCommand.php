<?php


namespace Ling\LingTalfi\Kaos\Command;


use Ling\Bat\FileSystemTool;
use Ling\CliTools\Helper\VirginiaMessageHelper as H;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\LingTalfi\Kaos\Util\ReadmeUtil;
use Ling\UniverseTools\PlanetTool;

/**
 * The InitializePlanetCommand class.
 *
 * This command does the following (for the given planet):
 *
 *
 * - if the current planet is not in the local server yet:
 *      - copy the current planet to the local server in /myphp/universe
 *      - replace the current planet with a symlink to the local server version
 * - create a default README.md file at the root of the planet
 * - if the -d option is set, create a DocBuilder class for the given planet in myphp/universe/Ling/LingTalfi/DocBuilder
 *
 *
 */
class InitializePlanetCommand extends KaosGenericCommand
{


    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {

        $indentLevel = $this->application->getBaseIndentLevel();
        $createDocBuilder = $input->hasFlag('d');
        $success = true;

        $planetDir = $this->application->getCurrentDirectory();


        $pInfo = PlanetTool::getGalaxyNamePlanetNameByDir($planetDir);
        if (false !== $pInfo) {

            list($galaxyName, $planetName) = $pInfo;

            H::info(H::i($indentLevel) . "Initializing planet <blue>$galaxyName/$planetName</blue>:" . PHP_EOL, $output);


            //--------------------------------------------
            // MOVING THE PLANET TO THE LOCAL SERVER
            //--------------------------------------------
            $dstDir = "/myphp/universe/$galaxyName/$planetName";

            if (false === is_dir($dstDir)) {
                H::info(H::i($indentLevel + 1) . "Moving planet to the local server...", $output);
                if (true === FileSystemTool::copyDir($planetDir, $dstDir)) {
                    $output->write('<success>ok</success>' . PHP_EOL);


                    //--------------------------------------------
                    // CREATING SYMLINK
                    //--------------------------------------------
                    FileSystemTool::remove($planetDir);
                    H::info(H::i($indentLevel + 1) . "Creating symlink <b>$planetDir</b> --> <b>$dstDir</b>...", $output);
                    if (true === symlink($dstDir, $planetDir)) {
                        $output->write('<success>ok</success>' . PHP_EOL);
                    } else {
                        $output->write('<error>oops</error>' . PHP_EOL);
                        H::warning(H::i($indentLevel + 2) . "Couldn't copy the planet from <b>$planetDir</b> to the local server." . PHP_EOL, $output);
                    }

                } else {
                    $output->write('<error>oops</error>' . PHP_EOL);
                    H::warning(H::i($indentLevel + 2) . "Couldn't copy the planet from <b>$planetDir</b> to the local server." . PHP_EOL, $output);
                }
            } else {
                H::info(H::i($indentLevel + 1) . "Planet already exists in the local server." . PHP_EOL, $output);
            }


            //--------------------------------------------
            // CREATING README.MD
            //--------------------------------------------
            $readMeDst = $planetDir . "/README.md";
            if (false === file_exists($readMeDst)) {
                H::info(H::i($indentLevel + 1) . "Creating <b>README.md</b> file...", $output);
                $readMeUtil = new ReadmeUtil();

                if (true === $readMeUtil->createBasicReadmeFile($readMeDst, [
                        "galaxy" => $galaxyName,
                        "planet" => $planetName,
                        "date" => date("Y-m-d"),
                    ])) {

                    $output->write('<success>ok</success>' . PHP_EOL);


                } else {
                    $output->write('<error>oops</error>' . PHP_EOL);
                    H::error(H::i($indentLevel + 2) . "Couldn't write the <b>README.md</b> file." . PHP_EOL, $output);
                }
            } else {
                H::info(H::i($indentLevel + 1) . "<b>README.md</b> file already exists." . PHP_EOL, $output);
            }


            //--------------------------------------------
            // CREATING DOC BUILDER CLASS
            //--------------------------------------------
            if (true === $createDocBuilder) {
                $docBuilderFile = "/myphp/universe/Ling/LingTalfi/DocBuilder/$planetName/{$planetName}DocBuilder.php";
                if (false === file_exists($docBuilderFile)) {

                    H::info(H::i($indentLevel + 1) . "Creating a <b>DocBuilder</b> class in <b>$docBuilderFile</b>...", $output);

                    $docBuilderTpl = __DIR__ . "/../assets/docbuilder.tpl.php";
                    $content = file_get_contents($docBuilderTpl);
                    $content = str_replace([
                        "CliTools",
                        "2019-02-26",
                    ], [
                        $planetName,
                        date("Y-m-d"),
                    ], $content);
                    if (true === FileSystemTool::mkfile($docBuilderFile, $content)) {
                        $output->write('<success>ok</success>' . PHP_EOL);
                    } else {
                        $success = false;
                        $output->write('<error>oops</error>' . PHP_EOL);
                        H::error(H::i($indentLevel + 2) . "Couldn't create the <b>DocBuilder</b> class." . PHP_EOL, $output);
                    }
                } else {
                    H::info(H::i($indentLevel + 1) . "A <b>DocBuilder</b> class already exists." . PHP_EOL, $output);
                }
            }


            if (true === $success) {
                H::success(H::i($indentLevel) . "The planet <blue>$galaxyName/$planetName</blue> was successfully initialized in <b>$planetDir</b>." . PHP_EOL, $output);
            }


        } else {
            H::error(H::i($indentLevel) . "Invalid planet directory: <bold>$planetDir</bold>." . PHP_EOL, $output);
        }


    }


}