<?php


namespace Ling\Light_PlanetInstaller\CliTools\Command;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\CliTools\Helper\QuestionHelper;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\DirScanner\YorgDirScannerTool;
use Ling\Light_Cli\Helper\LightCliFormatHelper;
use Ling\Light_PlanetInstaller\Helper\LpiHelper;
use Ling\Light_PlanetInstaller\Util\ImportUtil;


/**
 * The RestoreMapCommand class.
 *
 */
class RestoreMapCommand extends LightPlanetInstallerBaseCommand
{

    /**
     * Builds the RestoreMapCommand instance.
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * @implementation
     */
    protected function doRun(InputInterface $input, OutputInterface $output)
    {


        $mapPath = $input->getParameter(2);
        $currentDirectory = getcwd();
        $mapsDir = LpiHelper::getUniverseMapsDir($currentDirectory);


        if (null === $mapPath) {
            if (true === is_dir($mapsDir)) {
                $mapFiles = YorgDirScannerTool::getFilesWithExtension($mapsDir, "byml");
                if ($mapFiles) {

                    $s = '';
                    foreach ($mapFiles as $k => $mapFile) {
                        $s .= "<b>$k</b>. $mapFile" . PHP_EOL;
                    }


                    $f = function ($_answer) use ($mapFiles, $output) {

                        if (
                            false === is_numeric($_answer) ||
                            true === empty(trim($_answer)) ||
                            (int)$_answer < 0 ||
                            (int)$_answer > (count($mapFiles) - 1)
                        ) {
                            return false;
                        }
                        return true;
                    };

                    $retryMsg = "<error>Invalid number, try again (type a number): </error>";
                    $answer = QuestionHelper::askClear($output,
                        "The following maps were found: " .
                        PHP_EOL .
                        $s .
                        "Which map do you want to restore? (type a number): "
                        , $retryMsg, $f);


                    $mapPath = $mapFiles[$answer];
                }
            }

        }


        if (null === $mapPath) {
            $output->write("No map file specified, and no map file found in the maps default directory (<b>$mapsDir</b>). Aborting." . PHP_EOL);
        }


        $output->write("Restoring map <b>$mapPath</b>." . PHP_EOL);
        if (true === is_file($mapPath)) {

            $planets = BabyYamlUtil::readFile($mapPath, ['numbersAsString' => true]);


            $util = new ImportUtil();
            $util->setDebug(false);
            $util->setOutput($output);
            $util->import("from map", [
                "tim" => $planets,
                "deps" => false,
            ]);

            $output->write("<success>The map has been restored.</success>" . PHP_EOL);


        } else {
            $output->write('<error>The map is not a valid file (<b>' . $mapPath . '</b>). Aborting.</error>' . PHP_EOL);
        }
    }

    //--------------------------------------------
    // LightCliCommandInterface
    //--------------------------------------------
    /**
     * @overrides
     */
    public function getDescription(): string
    {
        $co = LightCliFormatHelper::getConceptFmt();
        $url = LightCliFormatHelper::getUrlFmt();
        return "
 Restore a <$co>universe map</$co>(<$url>https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#universe-maps</$url>) into your application.
 ";
    }

    /**
     * @overrides
     */
    public function getParameters(): array
    {
        $co = LightCliFormatHelper::getConceptFmt();
        $url = LightCliFormatHelper::getUrlFmt();

        return [
            "mapPath" => [
                " the path to the map to restore. If null (by default), we use the last map found in the <b>_universe_maps</b> directory if it exists (at the root of your application). ",
                false,
            ],
        ];
    }

    /**
     * @overrides
     */
    public function getAliases(): array
    {
        $co = LightCliFormatHelper::getConceptFmt();
        $url = LightCliFormatHelper::getUrlFmt();

        return [
            "restore_map" => "lpi restore_map",
        ];
    }


}