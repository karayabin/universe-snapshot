<?php


namespace Ling\Light_Cli\CliTools\Command;


use Ling\Bat\ConsoleTool;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Light_Cli\Helper\LightCliFormatHelper;


/**
 * The HelpCommand class.
 * This command will display the help to the user.
 *
 *
 *
 */
class HelpCommand extends LightCliBaseCommand
{


    /**
     * @implementation
     */
    protected function doRun(InputInterface $input, OutputInterface $output)
    {


        ConsoleTool::reset();

        $format = 'white:bgBlue';
        $cmdFmt = LightCliFormatHelper::getCommandFmt();
        $concept = LightCliFormatHelper::getConceptFmt();
        $cliOption = LightCliFormatHelper::getCommandLineOptionFmt();
        $cliFlag = LightCliFormatHelper::getCommandLineFlagFmt();
        $cliParam = LightCliFormatHelper::getCommandLineParameterFmt();
        $bannerFmt = LightCliFormatHelper::getBannerFmt();
        $fileFmt = LightCliFormatHelper::getFileFmt();
        $urlFmt = LightCliFormatHelper::getUrlFmt();
        $headerFmt = LightCliFormatHelper::getHeaderFmt();


        $helpCommand = $this->n('help');
        $listCommand = $this->n('list');
        $createAppCommand = $this->n('create_app');

        $flagV = $this->flag('-v');
        $parameterFilter = $this->arg('<filter>');
        $parameterName = $this->arg('<name>');


        $output->write("<$format>" . str_repeat('=', 35) . "</$format>" . PHP_EOL);
        $output->write("<$format>*    Welcome to Light Cli        </$format>" . PHP_EOL);
        $output->write("<$format>" . str_repeat('=', 35) . "</$format>" . PHP_EOL);
        $output->write(PHP_EOL);
        $output->write("For more information see our conception notes: https://github.com/lingtalfi/Light/blob/master/doc/pages/light-cli.md" . PHP_EOL);


        //--------------------------------------------
        // MAIN COMMANDS
        //--------------------------------------------
        $output->write(PHP_EOL);
        $this->section("Commands list", $output);
        $output->write(PHP_EOL);
        $output->write("- $helpCommand: displays this help message." . PHP_EOL);
        $output->write("- $listCommand $parameterFilter?: displays the list of registered third party application commands and aliases." . PHP_EOL);
        $output->write("----- $flagV: verbose, whether to display all the details about each command (flags, options, parameters, etc...)." . PHP_EOL);
        $output->write("----- $parameterFilter: filters the list using either an int or a string." . PHP_EOL);
        $output->write("--------- If it's a string, it filters the list using that string. We search in <b>appId command</b> and <b>aliases</b>." . PHP_EOL);
        $output->write("------------- By default, the filter expression matches any part of the string." . PHP_EOL);
        $output->write("------------- To make it match only the beginning of the string, prefix the string with the dollar symbol ($)." . PHP_EOL);
        $output->write("--------- If it's an int, it's a number given by this list command. Each number represents a unique <b>appId command</b> or <b>alias</b>." . PHP_EOL);
        $output->write("- $createAppCommand $parameterName: creates a new light application with the given name in the current directory." . PHP_EOL);


        //--------------------------------------------
        // OTHER COMMANDS
        //--------------------------------------------
        $output->write(PHP_EOL);
        $output->write(PHP_EOL);
        $this->section("Other commands", $output);
        $output->write(PHP_EOL);
        $output->write("If you are not calling one of our above commands, then we will proxy your request to any registered app." . PHP_EOL);
        $output->write("So for instance if your command is: <$cmdFmt>lpi import Ling.Chronos</$cmdFmt>, then we will look first for an app registered with the identfier <b>lpi</b>." . PHP_EOL);
        $output->write("If such an app was registered, then we will send it the rest of your request (<$cmdFmt>import Ling.Chronos</$cmdFmt> in our example)." . PHP_EOL);
        $output->write(PHP_EOL);
        $output->write("If such an app wasn't registered, then we look at the first word (<$cmdFmt>lpi</$cmdFmt> in our example) and see if it was registered as a <$concept>command alias</$concept>." . PHP_EOL);
        $output->write("An alias is always referring to a registered app's command, so if it's an alias, we proxy your request to the pointed command." . PHP_EOL);
        $output->write(PHP_EOL);
        $output->write("If everything above fails, then we trigger an error, as we don't know how to process your request." . PHP_EOL);


        //--------------------------------------------
        // COLOR CODES
        //--------------------------------------------
        $output->write(PHP_EOL);
        $output->write(PHP_EOL);
        $this->section("Color codes", $output);
        $output->write(PHP_EOL);
        $output->write("We try to promote our code color scheme, which might/might not be respected by third party plugin authors." . PHP_EOL);
        $output->write("It looks like this:" . PHP_EOL);
        $output->write("- <$concept>concept</$concept>: a concept is usually explained in the conception notes of the planet." . PHP_EOL);
        $output->write("- <$cmdFmt>command</$cmdFmt>: a command to execute in the terminal, or in general." . PHP_EOL);
        $output->write("- Command line: (<$urlFmt>https://github.com/lingtalfi/CliTools/blob/master/doc/api/Ling/CliTools/Input/CommandLineInput.md</$urlFmt>)" . PHP_EOL);
        $output->write("    - <$cliOption>option</$cliOption>: a command line option." . PHP_EOL);
        $output->write("    - <$cliFlag>flag</$cliFlag>: a command line flag." . PHP_EOL);
        $output->write("    - <$cliParam>parameter</$cliParam>: a command line parameter." . PHP_EOL);
        $output->write("- <$bannerFmt>banner</$bannerFmt>: such as the one we used at the top of this <$cmdFmt>help</$cmdFmt> command." . PHP_EOL);
        $output->write("- <$fileFmt>file</$fileFmt>: a file location." . PHP_EOL);
        $output->write("- <$urlFmt>url</$urlFmt>: an url." . PHP_EOL);
        $output->write("- <$headerFmt>header</$headerFmt>: for section titles." . PHP_EOL);

        $output->write(PHP_EOL);
        $output->write("See our <b>LightCliFormatHelper</b> class for more info." . PHP_EOL);

        $output->write(PHP_EOL);
        $output->write("Have fun!" . PHP_EOL);
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Writes a formatted section to the given output.
     *
     * @param string $title
     * @param OutputInterface $output
     */
    private function section(string $title, OutputInterface $output)
    {
        $output->write("<bold>$title</bold>:" . PHP_EOL);
        $output->write(str_repeat('-', 17) . PHP_EOL);
    }

    /**
     * Returns a formatted command name string.
     *
     * @param string $commandName
     * @return string
     */
    private function n(string $commandName): string
    {
        $command = LightCliFormatHelper::getCommandFmt();
        return '<' . $command . '>' . $commandName . '</' . $command . '>';
    }

    /**
     * Returns a formatted option/parameter string.
     *
     * @param string $option
     * @return string
     */
    private function opt(string $option): string
    {
        $fmt = LightCliFormatHelper::getCommandLineOptionFmt();
        return '<' . $fmt . '>' . $option . '</' . $fmt . '>';
    }

    /**
     * Returns a formatted flag string.
     *
     * @param string $flag
     * @return string
     */
    private function flag(string $flag): string
    {
        $fmt = LightCliFormatHelper::getCommandLineFlagFmt();
        return '<' . $fmt . '>' . $flag . '</' . $fmt . '>';
    }

    /**
     * Returns a formatted configuration directive string.
     *
     * @param string $option
     * @return string
     */
    private function arg(string $option): string
    {
        $fmt = LightCliFormatHelper::getCommandLineOptionFmt();
        return '<' . $fmt . '>' . $option . '</' . $fmt . '>';
    }
}