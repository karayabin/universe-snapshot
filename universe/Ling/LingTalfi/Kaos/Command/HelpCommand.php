<?php


namespace Ling\LingTalfi\Kaos\Command;


use Ling\CliTools\Helper\VirginiaMessageHelper as H;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;


/**
 * The HelpCommand class.
 * This command will display the kaos help to the user.
 *
 *
 *
 */
class HelpCommand extends KaosGenericCommand
{


    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {
        $format = 'white:bgBlack';


        $init = $this->n('init');
        $packPushUni = $this->n('packpushuni');
        $push = $this->n('push');
        $pushUni = $this->n('pushuni');
        $help = $this->n('help');


        $output->write("<$format>" . str_repeat('=', 25) . "</$format>" . PHP_EOL);
        $output->write("<$format>*    Kaos help       </$format>" . PHP_EOL);
        $output->write("<$format>" . str_repeat('=', 25) . "</$format>" . PHP_EOL);
        $output->write(PHP_EOL);
        $output->write("A value preceded by a dollar symbol (\$) is always a variable." . PHP_EOL);


//        $output->write(PHP_EOL);
//        $output->write("<bold>Global options</bold>:" . PHP_EOL);
//        $output->write(str_repeat('-', 17) . PHP_EOL);
//        $output->write("The following options apply to all the commands." . PHP_EOL);
//        $output->write(PHP_EOL);
//        $output->write(H::j(1) . $this->o("indent=\$number") . ": sets the base indentation level used by most commands." . PHP_EOL);


        $output->write(PHP_EOL);
        $output->write("<bold>Commands list</bold>:" . PHP_EOL);
        $output->write(str_repeat('-', 17) . PHP_EOL);
        $output->write(PHP_EOL);


        $output->write("- $init: initializes the current planet. It will do the following:" . PHP_EOL);
        $output->write(H::s(1) . "- Place the planet to the local server (if it's not there already), and create a link back to the current directory." . PHP_EOL);
        $output->write(H::s(1) . "- Create a default <b>README.md</b> file." . PHP_EOL);
        $output->write(H::j(1) . $this->o("-d") . ": docBuilder. With this option, will also create a default <b>docBuilder</b> class if it doesn't exist already." . PHP_EOL);


        $output->write("- $packPushUni: recreates the <b>uni-tool</b> (aka universe naive importer) and pushes the new version to <b>github.com</b>." . PHP_EOL);
        $output->write(H::s(1) . "It will rebuild the <b>dependency-master</b> file, the <b>universe-meta</b> file, ..., and the <b>README.md</b> file with an updated \"History Log\" section." . PHP_EOL);

        $output->write("- $push: pushes the current planet to <b>github.com</b>, and executes the <b>$packPushUni</b> command if the planet is newer than before (based on the \"History Log\" information)." . PHP_EOL);
        $output->write(H::s(1) . "It will also create a <b>sitemap.txt</b> and <b>robots.txt</b> files, and ask <b>google.com</b> to crawl the sitemap." . PHP_EOL);
        $output->write(H::j(1) . $this->o('?planet=$planet') . ": the path of the planet to push. If not set, the current planet will be pushed (current directory)." . PHP_EOL);
        $output->write(H::j(1) . $this->o('n') . ": no packing. If set, it will NOT execute the <b>$packPushUni</b> command, even if the planet is newer than before." . PHP_EOL);


        $output->write("- $pushUni: recreates the <b>universe-snapshot</b> directory and pushes it to <b>github.com</b>." . PHP_EOL);


        $output->write("- $help: displays this help message." . PHP_EOL);
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
        return '<bold:red>' . $commandName . '</bold:red>';
    }

    /**
     * Returns a formatted option/parameter string.
     *
     * @param string $option
     * @return string
     */
    private function o(string $option): string
    {
        return '<bold:bgLightYellow>' . $option . '</bold:bgLightYellow>';
    }

    /**
     * Returns a formatted configuration directive string.
     *
     * @param string $option
     * @return string
     */
    private function d(string $option): string
    {
        return '<bold:blue>' . $option . '</bold:blue>';
    }
}