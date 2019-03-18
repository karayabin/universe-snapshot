<?php


namespace Ling\Deploy\Command;


use Ling\CliTools\Helper\VirginiaMessageHelper as H;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\DirScanner\YorgDirScannerTool;

/**
 * The CreateMapCommand class.
 *
 * This command creates a map for the current site.
 *
 *
 */
class CreateMapCommand extends DeployGenericCommand
{


    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {


        $mapFile = "/komin/jin_site_demo/tmp/map.txt";
        $dir = "/komin/jin_site_demo";
        $files = YorgDirScannerTool::getFiles($dir, true, false);
        foreach($files as $file){
            a($file);
        }



        az("jjj");
        $indentLevel = $this->application->getBaseIndentLevel();
        $createDocBuilder = $input->hasFlag('d');


        $appDir = $this->application->getCurrentDirectory();


        if (false !== $pInfo) {

            list($galaxyName, $planetName) = $pInfo;

            H::info(H::i($indentLevel) . "Initializing planet <blue>$galaxyName/$planetName</blue>:" . PHP_EOL, $output);


        } else {
            H::error(H::i($indentLevel) . "Invalid planet directory: <bold>$planetDir</bold>." . PHP_EOL, $output);
        }


    }


}