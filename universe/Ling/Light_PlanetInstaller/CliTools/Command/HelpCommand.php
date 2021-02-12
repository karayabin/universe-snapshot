<?php


namespace Ling\Light_PlanetInstaller\CliTools\Command;


use Ling\Bat\ConsoleTool;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_Cli\Helper\LightCliCommandDocHelper;
use Ling\Light_PlanetInstaller\Helper\LpiFormatHelper;


/**
 * The HelpCommand class.
 * This command will display the help to the user.
 *
 *
 *
 */
class HelpCommand extends LightPlanetInstallerBaseCommand
{


    /**
     * @implementation
     */
    protected function doRun(InputInterface $input, OutputInterface $output)
    {


        ConsoleTool::reset();

        $format = LpiFormatHelper::getBannerFmt();



        $output->write("<$format>" . str_repeat('=', 35) . "</$format>" . PHP_EOL);
        $output->write("<$format>*    Light Planet Installer        </$format>" . PHP_EOL);
        $output->write("<$format>" . str_repeat('=', 35) . "</$format>" . PHP_EOL);
        $output->write(PHP_EOL);
        $output->write("For more information see our conception notes: https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md" . PHP_EOL);


//        $output->write(PHP_EOL);
//        $output->write("<bold>Global options</bold>:" . PHP_EOL);
//        $output->write(str_repeat('-', 17) . PHP_EOL);
//        $output->write("The following options apply to all the commands." . PHP_EOL);
//        $output->write(PHP_EOL);
//        $output->write(H::j(1) . $this->o("indent=\$number") . ": sets the base indentation level used by most commands." . PHP_EOL);


        LightCliCommandDocHelper::printCommandListDocByApp($this->application, $output);

    }




    //--------------------------------------------
    // LightCliCommandInterface
    //--------------------------------------------
    /**
     * @implementation
     */
    public function getDescription(): string
    {
        return "Prints the help of the Light_PlanetInstaller cli.";
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns a formatted command name string.
     *
     * @param string $commandName
     * @return string
     */
    private function n(string $commandName): string
    {
        $fmt = LpiFormatHelper::getCommandFmt();
        return "<$fmt>" . $commandName . "</$fmt>";
    }

    /**
     * Returns a formatted option/parameter string.
     *
     * @param string $option
     * @return string
     */
    private function opt(string $option): string
    {
        $fmt = LpiFormatHelper::getCommandLineOptionFmt();
        return "<$fmt>" . $option . "</$fmt>";
    }

    /**
     * Returns a formatted flag string.
     *
     * @param string $flag
     * @return string
     */
    private function flag(string $flag): string
    {
        $fmt = LpiFormatHelper::getCommandLineFlagFmt();
        return "<$fmt>" . $flag . "</$fmt>";
    }

    /**
     * Returns a formatted configuration directive string.
     *
     * @param string $option
     * @return string
     */
    private function arg(string $option): string
    {
        $fmt = LpiFormatHelper::getCommandLineParameterFmt();
        return "<$fmt>" . $option . "</$fmt>";
    }
}