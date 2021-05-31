<?php


namespace Ling\Light_PlanetInstaller\CliTools\Command;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\FileSystemTool;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_Cli\Helper\LightCliFormatHelper;
use Ling\Light_PlanetInstaller\Helper\LpiFormatHelper;
use Ling\Light_PlanetInstaller\Helper\LpiHelper;
use Ling\Light_PlanetInstaller\Helper\LpiPlanetHelper;


/**
 * The CreateMapCommand class.
 *
 */
class CreateMapCommand extends LightPlanetInstallerBaseCommand
{

    /**
     * Builds the CreateMapCommand instance.
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

        $currentDirectory = getcwd();


        $dstFile = $input->getParameter(2);
        if (null === $dstFile) {
            $dstFile = FileSystemTool::getUniqueTimeStringedEntry(LpiHelper::getUniverseMapsDir($currentDirectory), "byml");
        }


        $uniDir = $currentDirectory . "/universe";
        if (is_dir($uniDir)) {
            $planets = LpiPlanetHelper::getPlanetsVersionsByUniverseDir($uniDir);
            $output->write("Writing map to <b>$dstFile</b>...");
            BabyYamlUtil::writeFile($planets, $dstFile);
            $output->write("<green>Ok</green>." . PHP_EOL);

        } else {
            $output->write("The universe directory wasn't found in <b>$uniDir</b>. Aborting." . PHP_EOL);
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
 Creates a <$co>universe map</$co>(<$url>https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#universe-maps</$url>) that you can then use to help restore the app to that state.
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
            "dstFile" => [
                " the path where to write the map. If null (by default), we put it in a <b>_universe_maps</b> directory at the root of your app.",
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
            "map " => "lpi create_map",
        ];
    }


}