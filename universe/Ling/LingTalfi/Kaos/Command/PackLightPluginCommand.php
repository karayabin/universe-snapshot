<?php


namespace Ling\LingTalfi\Kaos\Command;


use Ling\Bat\FileSystemTool;
use Ling\CliTools\Helper\VirginiaMessageHelper as H;
use Ling\CliTools\Input\InputInterface;
use Ling\CliTools\Output\OutputInterface;
use Ling\DirScanner\YorgDirScannerTool;

/**
 * The PackLightPluginCommand class.
 *
 *
 * This command basically copies some special files from the application
 * to the map directory of the Light plugin, so that the Light plugin planet can then use the
 * post_install.map = true directive in its dependencies.byml file.
 *
 * It is assumed that you are calling this command from the light plugin directory (i.e.
 * the current working directory should be the light plugin directory/planet).
 *
 *
 * It copies the following, based on a plugin named Light_MyPlugin (for instance):
 *
 * - $app/config/services/Light_MyPlugin.byml
 * - $app/config/kit/pages/Light_MyPlugin/
 * - $app/templates/Light_MyPlugin/
 * - $app/www/plugins/Light_MyPlugin/
 *
 *
 *
 *
 * Options
 * ------------
 *
 * - a: the application dir path
 *
 *
 *
 */
class PackLightPluginCommand extends KaosGenericCommand
{

    /**
     * This property holds the applicationDir for this instance.
     * @var string
     */
    private $_applicationDir;
    /**
     *
     * This property holds the mapDir for this instance.
     * @var string
     */
    private $_mapDir;


    /**
     * @implementation
     */
    public function run(InputInterface $input, OutputInterface $output)
    {

        $applicationDir = $input->getOption("a");
        $pluginDir = $this->application->getCurrentDirectory();
        $mapDir = $pluginDir . "/assets/map";
        $indentLevel = $this->application->getBaseIndentLevel();
        $p = explode("/", $pluginDir);
        $pluginName = array_pop($p);
        $galaxyName = array_pop($p);


        if (null !== $applicationDir) {

            H::info(H::i($indentLevel) . "Packing the map for plugin <b>$pluginName</b>:" . PHP_EOL, $output);


            $this->_applicationDir = $applicationDir;
            $this->_mapDir = $mapDir;

            $items = [
                "config/services/$pluginName.byml",
                "config/data/$pluginName",
                "templates/$pluginName",
                "templates/Light_Mailer/$pluginName",
                "www/plugins/$pluginName",
                "www/libs/universe/$galaxyName/$pluginName",
                "scripts/$galaxyName/$pluginName",
            ];





            foreach ($items as $relPath) {
                $this->copyItem($relPath, $output, $indentLevel + 1);
            }

        } else {
            H::error(H::i($indentLevel) . "Option a missing (application path)." . PHP_EOL, $output);
        }
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Copies the item which relative path was given to the map assets directory.
     *
     * @param string $relPath
     * @param OutputInterface $output
     * @param int $indentLevel
     */
    protected function copyItem(string $relPath, OutputInterface $output, int $indentLevel)
    {
        $item = $this->_applicationDir . "/" . $relPath;
        $dst = $this->_mapDir . "/" . $relPath;
        if (is_dir($item)) {
            H::info(H::i($indentLevel) . "Copying <b>$item</b>...", $output);
            if (true === FileSystemTool::copyDir($item, $dst)) {
                $output->write('<success>ok</success>.' . PHP_EOL);
            } else {
                $output->write('<error>oops</error>.' . PHP_EOL);
                H::info(H::i($indentLevel + 1) . "Couldn't copy the dir." . PHP_EOL, $output);
            }
        } elseif (is_file($item)) {
            H::info(H::i($indentLevel) . "Copying <b>$item</b>...", $output);
            if (true === FileSystemTool::copyFile($item, $dst)) {
                $output->write('<success>ok</success>.' . PHP_EOL);
            } else {
                $output->write('<error>oops</error>.' . PHP_EOL);
                H::info(H::i($indentLevel + 1) . "Couldn't copy the file." . PHP_EOL, $output);
            }
        }
    }

}
