<?php


namespace Ling\Light_Cli\CliTools\Command;


use Ling\Bat\ConsoleTool;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_Cli\Helper\LightCliCommandDocHelper;
use Ling\Light_Cli\Helper\LightCliFormatHelper;
use Ling\Light_PlanetInstaller\Helper\LpiFormatHelper;


/**
 * The HelpCommand class.
 * This command will display the help to the user.
 *
 *
 *
 */
class HelpCommand extends LightCliDocCommand
{


    /**
     * @implementation
     */
    protected function doRun(InputInterface $input, OutputInterface $output)
    {


        ConsoleTool::reset();

        $format = LpiFormatHelper::getBannerFmt();



        $output->write("<$format>" . str_repeat('=', 35) . "</$format>" . PHP_EOL);
        $output->write("<$format>*    Light Cli Help        </$format>" . PHP_EOL);
        $output->write("<$format>" . str_repeat('=', 35) . "</$format>" . PHP_EOL);
        $output->write(PHP_EOL);
        $output->write("For more information see our conception notes: https://github.com/lingtalfi/Light_Cli/blob/master/doc/pages/conception-notes.md" . PHP_EOL);

        LightCliCommandDocHelper::printCommandListDocByApp($this->application, $output);
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
        return " displays a help message.";
    }


}