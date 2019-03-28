<?php


namespace Ling\Uni2\Command;


use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\Uni2\Helper\OutputHelper as H;


/**
 * The HelpCommand class.
 * This command will display the uni-tool help to the user.
 *
 *
 *
 */
class HelpCommand extends UniToolGenericCommand
{


    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {
        $format = 'white:bgBlack';


        $check = $this->n('check');
        $clean = $this->n('clean');
        $conf = $this->n('conf');
        $confPath = $this->n('confpath');
        $createMaster = $this->n('create-master');
        $help = $this->n('help');

        $import = $this->n('import');
        $importAll = $this->n('import-all');
        $importGalaxy = $this->n('import-galaxy');
        $importMap = $this->n('import-map');
        $importUniverse = $this->n('import-universe');

        $infoApplication = $this->n('info');
        $infoUniverse = $this->n('info-universe');


        $initLocal = $this->n('init-local');

        $listplanet = $this->n('listplanet');
        $liststore = $this->n('liststore');

        $map = $this->n('map');

        $master = $this->n('master');
        $masterPath = $this->n('masterpath');

        $reimport = $this->n('reimport');
        $reimportAll = $this->n('reimport-all');
        $reimportGalaxy = $this->n('reimport-galaxy');
        $reimportMap = $this->n('reimport-map');
        $reimportUniverse = $this->n('reimport-universe');

        $store = $this->n('store');
        $storeAll = $this->n('store-all');
        $storeGalaxy = $this->n('store-galaxy');
        $storeMap = $this->n('store-map');

        $todir = $this->n('todir');
        $tolink = $this->n('tolink');

        $upgrade = $this->n('upgrade');
        $version = $this->n('version');


        $output->write("<$format>" . str_repeat('=', 25) . "</$format>" . PHP_EOL);
        $output->write("<$format>*    Uni-tool help       </$format>" . PHP_EOL);
        $output->write("<$format>" . str_repeat('=', 25) . "</$format>" . PHP_EOL);
        $output->write(PHP_EOL);
        $output->write("A value preceded by a dollar symbol (\$) is always a variable." . PHP_EOL);


        $output->write(PHP_EOL);
        $output->write("<bold>Global options</bold>:" . PHP_EOL);
        $output->write(str_repeat('-', 17) . PHP_EOL);
        $output->write("The following options apply to all the commands." . PHP_EOL);
        $output->write(PHP_EOL);
        $output->write(H::j(1) . $this->o("application-dir=\$path") . ": sets the application directory to use. If not set, the current directory will be used." . PHP_EOL);
        $output->write(H::j(1) . $this->o("-e") . ": error verbose mode. When an error occurs, the whole exception trace is displayed." . PHP_EOL);
        $output->write(H::j(1) . $this->o("indent=\$number") . ": sets the base indentation level used by most commands." . PHP_EOL);


        $output->write(PHP_EOL);
        $output->write("<bold>Commands list</bold>:" . PHP_EOL);
        $output->write(str_repeat('-', 17) . PHP_EOL);
        $output->write(PHP_EOL);


        $output->write("- $check: checks the application planets for various problems (unresolved dependencies, invalid meta)." . PHP_EOL);
        $output->write(H::j(1) . $this->o("-r") . ": resolve. Attempts to resolve the unresolved planet dependencies on the fly." . PHP_EOL);


        $output->write("- $clean: cleans the application planets/items from the items defined by the " . $this->d("clean_items") . " configuration directive." . PHP_EOL);
        $output->write(H::s(1) . "Use the <bold>conf</bold> command to set/get the value of the " . $this->d("clean_items") . " configuration directive (the default is: .git, .gitignore)." . PHP_EOL);

        $output->write("- $conf: displays the configuration of this local copy of uni-tool." . PHP_EOL);
        $output->write(H::j(1) . $this->o('$name=$value') . ": sets the entry \$name to \$value in the configuration file." . PHP_EOL);
        $output->write(H::s(2) . "<bold>\$name</bold> uses bdot notation." . PHP_EOL);
        $output->write(H::s(2) . "For instance: <bold>local_server.root_dir</bold>=/path/to/my/root_dir" . PHP_EOL);

        $output->write("- $confPath: displays the path to the configuration of this local copy of uni-tool." . PHP_EOL);

        $output->write("- $createMaster " . $this->o('$path') . " : creates a <bold>dependency master file</bold> at the given <bold>\$path</bold>, for the planets of the current application or the local server." . PHP_EOL);
        $output->write(H::s(1) . "By default, the <bold>dependency master file</bold> is created from the planets of the current application." . PHP_EOL);
        $output->write(H::j(1) . $this->o("-s") . ": local server. If this flag is set, the <bold>dependency master file</bold> will be created from the planets of the local server." . PHP_EOL);
        $output->write(H::s(1) . "Note: if a file or directory exists at the <bold>\$path</bold> location, it will be removed and replaced by the dependency master file without further warning!" . PHP_EOL);

        $output->write("- $help: displays this help message." . PHP_EOL);

        $output->write("- $import " . $this->o('$planet') . ": imports the <bold>\$planet</bold> only if it doesn't exist in the application yet." . PHP_EOL);
        $output->write(H::s(1) . "The same applies to the planet dependencies if any." . PHP_EOL);
        $output->write(H::j(1) . $this->o("-f") . ": force mode. Forces the reimporting of the planet and its dependencies no matter what." . PHP_EOL);
        $output->write(H::j(1) . $this->o("-n") . ": do not boot. By default, the command creates the primary universe if necessary. If this flag is set, the primary universe is not created." . PHP_EOL);

        $output->write("- $importAll: executes the <bold>import</bold> command to all the planets of the current application." . PHP_EOL);
        $output->write(H::j(1) . $this->o("-f") . ": force mode. Forces the reimporting of the planets and their dependencies no matter what." . PHP_EOL);
        $output->write(H::j(1) . $this->o("-n") . ": do not boot. By default, the command creates the primary universe if necessary. If this flag is set, the primary universe is not created." . PHP_EOL);

        $output->write("- $importGalaxy " . $this->o('$galaxy') . ": executes the <bold>import</bold> command for all the planets of the <bold>\$galaxy</bold>." . PHP_EOL);
        $output->write(H::s(1) . "The planet list is taken from the local dependency master file." . PHP_EOL);
        $output->write(H::j(1) . $this->o("-f") . ": force mode. Forces the reimporting of all planets (and dependencies) no matter what." . PHP_EOL);
        $output->write(H::j(1) . $this->o("-n") . ": do not boot. By default, the command creates the primary universe if necessary. If this flag is set, the primary universe is not created." . PHP_EOL);


        $output->write("- $importMap " . $this->o('?$mapPath') . ": executes the <bold>import</bold> command for all the planets defined in the <bold>\$mapPath</bold> file." . PHP_EOL);
        $output->write(H::s(1) . "The map is a babyYaml file containing the list of planet ids to import." . PHP_EOL);
        $output->write(H::s(1) . "If the \$mapPath is not specified, this command will search for the <bold>map.byml</bold> file at the root of the application's <bold>universe</bold> directory." . PHP_EOL);
        $output->write(H::j(1) . $this->o("-f") . ": force mode. Forces the importing of all planets (and dependencies) no matter what." . PHP_EOL);
        $output->write(H::j(1) . $this->o("-n") . ": do not boot. By default, the command creates the primary universe if necessary. If this flag is set, the primary universe is not created." . PHP_EOL);


        $output->write("- $importUniverse : executes the <bold>import</bold> command for all the planets of the universe." . PHP_EOL);
        $output->write(H::s(1) . "The planet list is taken from the local dependency master file." . PHP_EOL);
        $output->write(H::j(1) . $this->o("-f") . ": force mode. Forces the reimporting of all planets (and dependencies) no matter what." . PHP_EOL);
        $output->write(H::j(1) . $this->o("-n") . ": do not boot. By default, the command creates the primary universe if necessary. If this flag is set, the primary universe is not created." . PHP_EOL);


        $output->write("- $infoApplication : displays information about the current application (the number of galaxies, the number of planets, and the percentage of planets having dependencies)." . PHP_EOL);
        $output->write("- $infoUniverse : displays information about the universe (the number of galaxies, the number of planets, and the percentage of planets having dependencies)." . PHP_EOL);
        $output->write(H::s(1) . "Also displays similar information for each galaxy." . PHP_EOL);


        $output->write("- $initLocal : creates the <b>bigbang.php</b> at the root of the local server if it doesn't already exist." . PHP_EOL);

        $output->write("- $listplanet: displays the list of planets of the current application." . PHP_EOL);
        $output->write(H::j(1) . $this->o("-v") . ": displays the version number next to the planet names." . PHP_EOL);


        $output->write("- $liststore: displays the list of planets of the local server." . PHP_EOL);
        $output->write(H::j(1) . $this->o("-v") . ": displays the version number next to the planet names." . PHP_EOL);


        $output->write("- $map " . $this->o('?$mapPath') . ": creates a map file to be used by the <bold>import-map</bold>, <bold>reimport-map</bold> and <bold>store-map</bold> commands." . PHP_EOL);
        $output->write(H::s(1) . "The map is created at the <bold>\$mapPath</bold> location if provided, or at the root of the application's <bold>universe</bold> directory otherwise." . PHP_EOL);
        $output->write(H::s(1) . "The map is a babyYaml file containing the list of planet ids of the current application." . PHP_EOL);


        $output->write("- $master: displays the content of the local dependency-master file." . PHP_EOL);
        $output->write("- $masterPath: displays the path to the local dependency-master file." . PHP_EOL);

        $output->write("- $reimport " . $this->o('$planet') . ": reimports the <bold>\$planet</bold> only if it doesn't exist in the application yet, " . PHP_EOL);
        $output->write(H::s(1) . "or if a newer version is available (version defined in the local dependency-master file)." . PHP_EOL);
        $output->write(H::s(1) . "The same applies to the planet dependencies if any." . PHP_EOL);
        $output->write(H::j(1) . $this->o("-f") . ": force mode. Forces the reimporting of the planet and its dependencies no matter what." . PHP_EOL);
        $output->write(H::j(1) . $this->o("-n") . ": do not boot. By default, the command creates the primary universe if necessary. If this flag is set, the primary universe is not created." . PHP_EOL);


        $output->write("- $reimportAll: executes the <bold>reimport</bold> command to all the planets of the current application." . PHP_EOL);
        $output->write(H::j(1) . $this->o("-f") . ": force mode. Forces the reimporting of the planets and their dependencies no matter what." . PHP_EOL);
        $output->write(H::j(1) . $this->o("-n") . ": do not boot. By default, the command creates the primary universe if necessary. If this flag is set, the primary universe is not created." . PHP_EOL);


        $output->write("- $reimportGalaxy " . $this->o('$galaxy') . ": executes the <bold>reimport</bold> command for all the planets of the <bold>\$galaxy</bold>." . PHP_EOL);
        $output->write(H::s(1) . "The planet list is taken from the local dependency master file." . PHP_EOL);
        $output->write(H::j(1) . $this->o("-f") . ": force mode. Forces the reimporting of all planets (and dependencies) no matter what." . PHP_EOL);
        $output->write(H::j(1) . $this->o("-n") . ": do not boot. By default, the command creates the primary universe if necessary. If this flag is set, the primary universe is not created." . PHP_EOL);


        $output->write("- $reimportMap " . $this->o('?$mapPath') . ": executes the <bold>reimport</bold> command for all the planets defined in the <bold>\$mapPath</bold> file." . PHP_EOL);
        $output->write(H::s(1) . "The map is a babyYaml file containing the list of planet ids to reimport." . PHP_EOL);
        $output->write(H::s(1) . "If the \$mapPath is not specified, this command will search for the <bold>map.byml</bold> file at the root of the application's <bold>universe</bold> directory." . PHP_EOL);
        $output->write(H::j(1) . $this->o("-f") . ": force mode. Forces the reimporting of all planets (and dependencies) no matter what." . PHP_EOL);
        $output->write(H::j(1) . $this->o("-n") . ": do not boot. By default, the command creates the primary universe if necessary. If this flag is set, the primary universe is not created." . PHP_EOL);


        $output->write("- $reimportUniverse : executes the <bold>reimport</bold> command for all the planets of the universe." . PHP_EOL);
        $output->write(H::s(1) . "The planet list is taken from the local dependency master file." . PHP_EOL);
        $output->write(H::j(1) . $this->o("-f") . ": force mode. Forces the reimporting of all planets (and dependencies) no matter what." . PHP_EOL);
        $output->write(H::j(1) . $this->o("-n") . ": do not boot. By default, the command creates the primary universe if necessary. If this flag is set, the primary universe is not created." . PHP_EOL);


        $output->write("- $store " . $this->o('$planet') . ": reimports the <bold>\$planet</bold> in the local server." . PHP_EOL);
        $output->write(H::s(1) . "If the planet is already stored in the local server, it will not be re-imported unless a newer version is available (version defined in the local dependency-master file)," . PHP_EOL);
        $output->write(H::s(1) . "or if the force flag (-f) is set." . PHP_EOL);
        $output->write(H::s(1) . "The same logic applies recursively to the planet dependencies if any." . PHP_EOL);
        $output->write(H::j(1) . $this->o("-f") . ": force mode. Forces the reimporting (i.e. re-downloading) of the planet and its dependencies no matter what." . PHP_EOL);


        $output->write("- $storeAll: reimports all the planets of the local server." . PHP_EOL);
        $output->write(H::s(1) . "If the planet is already stored in the local server, it will not be re-imported unless a newer version is available (version defined in the local dependency-master file)," . PHP_EOL);
        $output->write(H::s(1) . "or if the force flag (-f) is set." . PHP_EOL);
        $output->write(H::s(1) . "The same logic applies recursively to the planet dependencies if any." . PHP_EOL);
        $output->write(H::j(1) . $this->o("-f") . ": force mode. Forces the reimporting (i.e. re-downloading) of the planet and its dependencies no matter what." . PHP_EOL);


        $output->write("- $storeGalaxy " . $this->o('$galaxy') . ": executes the <bold>store</bold> command for all the planets of the <bold>\$galaxy</bold>." . PHP_EOL);
        $output->write(H::s(1) . "The planet list is taken from the local dependency master file." . PHP_EOL);
        $output->write(H::j(1) . $this->o("-f") . ": force mode. Forces the reimporting of all planets (and dependencies) no matter what." . PHP_EOL);

        $output->write("- $storeMap " . $this->o('?$mapPath') . ": executes the <bold>store</bold> command for all the planets defined in the <bold>\$mapPath</bold> file." . PHP_EOL);
        $output->write(H::s(1) . "The map is a babyYaml file containing the list of planet ids to store." . PHP_EOL);
        $output->write(H::s(1) . "If the \$mapPath is not specified, this command will search for the <bold>map.byml</bold> file at the root of the application's <bold>universe</bold> directory." . PHP_EOL);
        $output->write(H::j(1) . $this->o("-f") . ": force mode. Forces the reimporting of all planets (and dependencies) no matter what." . PHP_EOL);


        $output->write("- $todir: replaces all planets/items symlinks (to their local server equivalents) with the actual directories they are pointing to." . PHP_EOL);
        $output->write(H::s(1) . "If a planet/item doesn't exist in the local server, nothing will be done for this planet/item." . PHP_EOL);
        $output->write(H::s(1) . "See also: the <bold>tolink</bold> command, which does the opposite." . PHP_EOL);

        $output->write("- $tolink: replaces all planets/items of the current application with symlinks pointing to the local server equivalents." . PHP_EOL);
        $output->write(H::s(1) . "If a planet/item doesn't exist in the local server, nothing will be done for this planet/item." . PHP_EOL);
        $output->write(H::s(1) . "See also: the <bold>todir</bold> command, which does the opposite." . PHP_EOL);

        $output->write("- $upgrade: upgrade thes <b>uni-tool</b> if a newer version is available, and if so upgrades the <bold>upgradable</bold> planets in the local server (if defined) and in the current application." . PHP_EOL);
        $output->write(H::s(1) . "Upgradable means that there is a newer version of the planet on the web." . PHP_EOL);
        $output->write(H::j(1) . $this->o("-f") . ": force mode. Forces the re-installing of the <b>uni-tool</b>." . PHP_EOL);


        $output->write("- $version: displays the version number of this local copy of uni-tool." . PHP_EOL);


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