<?php


namespace Ling\Deploy\Command;


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
class HelpCommand extends DeployGenericCommand
{


    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {
        $format = 'white:bgBlack';


        $diff = $this->n('diff');
        $help = $this->n('help');
        $map = $this->n('map');


        $output->write("<$format>" . str_repeat('=', 25) . "</$format>" . PHP_EOL);
        $output->write("<$format>*    Deploy help       </$format>" . PHP_EOL);
        $output->write("<$format>" . str_repeat('=', 25) . "</$format>" . PHP_EOL);
        $output->write(PHP_EOL);
        $output->write("A value preceded by a dollar symbol (\$) is always a variable." . PHP_EOL);


        $output->write(PHP_EOL);
        $output->write("<bold>Global options</bold>:" . PHP_EOL);
        $output->write(str_repeat('-', 17) . PHP_EOL);
        $output->write("The following options apply to all the commands." . PHP_EOL);
        $output->write(PHP_EOL);
        $output->write(H::j(1) . $this->o("dir=\$dir") . ": sets the directory of the project. By default, it's the current directory (getcwd function)." . PHP_EOL);
//        $output->write(H::j(1) . $this->o("indent=\$number") . ": sets the base indentation level used by most commands." . PHP_EOL);


        $output->write(PHP_EOL);
        $output->write("<bold>Commands list</bold>:" . PHP_EOL);
        $output->write(str_repeat('-', 17) . PHP_EOL);
        $output->write(PHP_EOL);

        $output->write("- $diff " . $this->o('remote=$remote') . ": displays the differences between the current application files and the remote files." . PHP_EOL);
        $output->write(H::j(1) . $this->o("-f") . ": if set, the command will create 3 files <b>diff-add.txt</b>, <b>diff-remove.txt</b> and <b>diff-replace.txt</b> in the <b>.deploy</b> dir of the <b>site</b> application, rather than displaying the diff to the screen." . PHP_EOL);

        $output->write("- $help: displays this help message." . PHP_EOL);


        $output->write("- $map: creates a map for the current application." . PHP_EOL);
        $output->write(H::s(1) . "The map will be created at <b>\$app/.deploy/map.txt</b>." . PHP_EOL);

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