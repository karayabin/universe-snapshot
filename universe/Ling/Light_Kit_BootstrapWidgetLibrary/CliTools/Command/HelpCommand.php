<?php


namespace Ling\Light_Kit_BootstrapWidgetLibrary\CliTools\Command;


use Ling\Bat\ConsoleTool;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_Cli\Helper\LightCliCommandDocHelper;
use Ling\Light_Cli\Helper\LightCliFormatHelper;


/**
 * The HelpCommand class.
 * This command will display the help to the user.
 *
 *
 *
 */
class HelpCommand extends LightKitBootstrapWidgetLibraryBaseCommand
{


    /**
     * @implementation
     */
    protected function doRun(InputInterface $input, OutputInterface $output)
    {


        ConsoleTool::reset();


        $verbose = $input->hasFlag("v");

        $format = LightCliFormatHelper::getBannerFmt();


        $output->write("<$format>" . str_repeat('=', 35) . "</$format>" . PHP_EOL);
        $output->write("<$format>*    Light Kit BootstrapWidgetLibrary        </$format>" . PHP_EOL);
        $output->write("<$format>" . str_repeat('=', 35) . "</$format>" . PHP_EOL);
        $output->write(PHP_EOL);
        $output->write("For more information see our planet: https://github.com/lingtalfi/Light_Kit_BootstrapWidgetLibrary" . PHP_EOL);


//        $output->write(PHP_EOL);
//        $output->write("<bold>Global options</bold>:" . PHP_EOL);
//        $output->write(str_repeat('-', 17) . PHP_EOL);
//        $output->write("The following options apply to all the commands." . PHP_EOL);
//        $output->write(PHP_EOL);
//        $output->write(H::j(1) . $this->o("indent=\$number") . ": sets the base indentation level used by most commands." . PHP_EOL);


        LightCliCommandDocHelper::printCommandListDocByApp($this->application, $output, [
            "verbose" => $verbose,
        ]);

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
        return " shows the help for the <b>Light_Kit_BootstrapWidgetLibrary</b> cli tool. ";
    }

    /**
     * @overrides
     */
    public function getFlags(): array
    {
        $co = LightCliFormatHelper::getConceptFmt();
        $url = LightCliFormatHelper::getUrlFmt();

        return [
            "v" => " display a more verbose help",
        ];
    }

}