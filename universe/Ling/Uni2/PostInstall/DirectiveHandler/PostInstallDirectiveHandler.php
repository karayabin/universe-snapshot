<?php


namespace Ling\Uni2\PostInstall\DirectiveHandler;


use Ling\Bat\ConsoleTool;
use Ling\Bat\FileSystemTool;
use Ling\Bat\OsTool;
use Ling\CliTools\Output\OutputInterface;
use Ling\Uni2\Application\UniToolApplication;
use Ling\Uni2\Helper\OutputHelper as H;
use Ling\Uni2\PostInstall\Handler\PostInstallHandlerInterface;

/**
 * The PostInstallDirectiveHandler class.
 * This class knows how to handle @concept(post install directives).
 */
class PostInstallDirectiveHandler
{


    /**
     * Handles a the given post install directive.
     *
     *
     * The following directives have been implemented:
     *
     * ```txt
     * - handler: array. Delegates the handling to another class.
     * ----- name: string. The class name of the handler to call.
     * ----- ?options: array. An array of options to pass to the handler.
     * - composer: array of composer commands without the composer prefix. For instance:
     * ----- require filp/whoops
     * - map: string|null. Will map a directory found inside the installed planet to the application root directory.
     *          By default: if null, the map value will be: "assets/map".
     *          This means that all files found inside the "assets/map" directory at the root of the installed planet
     *          will be copied to (and overwriting existing files with the same names) the application root directory.
     *
     *
     * ```
     *
     * @param string $directiveName . The directive type/name.
     *
     * @param string|array $directiveConf
     *
     * The post install directive configuration.
     * It can be a string or an array and depends on the type.
     * See the @page(post install directives page) for more info.
     *
     * @param OutputInterface $output
     * The output to writes to.
     *
     * @param array $options
     * An array of options.
     * Available options are:
     * - indentLevel: int = 0. The base indent level for all the output messages.
     *          All the output messages will be indented in relation with this base level.
     * - application: Uni2\Application\UniToolApplication. The application instance.
     * - planetName: string. The name of the planet being processed.
     *
     *
     *
     * @throws \Exception
     */
    public function handleDirective(string $directiveName, $directiveConf, OutputInterface $output, array $options = [])
    {

        $indentLevel = $options['indentLevel'] ?? 0;
        switch ($directiveName) {
            case "map":
                /**
                 * @var $application UniToolApplication
                 */
                $application = $options['application'];
                $appDir = $application->getApplicationDir();
                $planetName = $options['planetName'];
                $planetDir = $options['planetDir'];

                if (false === is_string($directiveConf)) {
                    $directiveConf = "assets/map";
                }

                if (is_dir($appDir)) {

                    $mapDir = $planetDir . "/" . $directiveConf;
                    if (is_dir($mapDir)) {

                        $this->info("Copying the map dir <b>$directiveConf</b> from planet <blue>$planetName</blue> to <b>$appDir</b>.", $indentLevel, $output);
                        FileSystemTool::copyDir($mapDir, $appDir);
                    } else {
                        $this->warn("The map directory doesn't exist: <b>$mapDir</b>. Skipping this directive.", $indentLevel, $output);
                    }
                } else {
                    $this->warn("The application directory doesn't exist: <b>$appDir</b>. Skipping this directive.", $indentLevel, $output);
                }

                break;
            case "handler":
                $this->info("Calling the <bold>handler</bold> directive:", $indentLevel, $output);
                if (is_array($directiveConf)) {


                    if (true === $this->hasOptions(["name"], $directiveConf, $indentLevel, $output)) {


                        $className = $directiveConf['name'];

                        $o = null;
                        try {
                            $o = new $className();
                        } catch (\Error $e) {
                            $this->warn("Couldn't instantiate class <bold>$className</bold>. This directive will not be executed.", $indentLevel + 1, $output);
                        }
                        if (null !== $o) {
                            if ($o instanceof PostInstallHandlerInterface) {

                                $handlerOptions = $directiveConf['options'] ?? [];
                                if (true === $this->checkType('options', $handlerOptions, "array", $indentLevel, $output)) {
                                    $o->handle($handlerOptions, $options, $indentLevel + 1, $output);
                                }
                            } else {
                                $this->warn("The <bold>$className</bold> class must be an instance of <bold>Uni2\PostInstall\Handler\PostInstallHandlerInterface</bold>.", $indentLevel + 1, $output);
                                $this->warn("This directive will not be executed.", $indentLevel + 1, $output);
                            }
                        }
                    }


                } else {
                    $type = gettype($directiveConf);
                    $this->warn("The argument to this directive must be an array, $type given.", $indentLevel + 1, $output);
                }
                break;

            case "composer":
                $this->info("Calling the <bold>$directiveName</bold> directive:", $indentLevel, $output);
                if (false === is_array($directiveConf)) {
                    $directiveConf = [$directiveConf];
                }

                if (true === OsTool::hasProgram("composer")) {
                    foreach ($directiveConf as $cmd) {
                        $cmd = "composer " . $cmd;
                        $this->info("Executing command: <bold>$cmd</bold>:", $indentLevel + 1, $output);
                        ConsoleTool::passThru($cmd);
                    }
                } else {
                    $this->warn("The composer program was not found on this machine. Please install composer (https://getcomposer.org/) and retry. Skipping.", $indentLevel + 1, $output);
                }


                break;
            default:
                $this->warn("Unknown post install directive <bold>$directiveName</bold>. This directive will not be executed.", $indentLevel, $output);
                break;
        }

    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns whether the given $thing is of the $expectedType type.
     * If not, a warning message will be sent to the output.
     *
     *
     *
     * @param string $thingName
     * The name of the thing (for the warning message in case of failure).
     *
     * @param $thing
     * The thing which type is to be tested.
     *
     * @param string $expectedType
     * The expected type.
     *
     * @param int $indentLevel
     * @param OutputInterface $output
     * @return bool
     */
    protected function checkType(string $thingName, $thing, string $expectedType, int $indentLevel, OutputInterface $output)
    {

        $type = gettype($thing);
        if ($expectedType !== $type) {
            $this->warn("The <bold>$thingName</bold> option must be of type $expectedType, $type given. This directive will not be executed.", $indentLevel + 1, $output);
            return false;
        }
        return true;
    }

    /**
     * Returns whether all $requiredOptions are passed in the current options array.
     * If not, a warning message will be sent to the output.
     *
     *
     * @param array $requiredOptions
     * An array of required option names.
     *
     * @param array $currentOptions
     * An array of optionName => optionValue
     *
     * @param int $indentLevel
     * @param OutputInterface $output
     * @return bool
     */
    protected function hasOptions(array $requiredOptions, array $currentOptions, int $indentLevel, OutputInterface $output)
    {
        foreach ($requiredOptions as $optionName) {
            if (false === array_key_exists($optionName, $currentOptions)) {
                $this->warn("An option is missing. Required options are: <bold>" . implode('</bold>, <bold>', $requiredOptions) . "</bold>. This directive will not be executed.", $indentLevel + 1, $output);
                return false;
            }
        }
        return true;
    }


    /**
     * Sends a well formatted warning message to the output.
     *
     * @param string $msg
     * @param int $indentLevel
     * @param OutputInterface $output
     */
    protected function warn(string $msg, int $indentLevel, OutputInterface $output)
    {
        H::warning(H::i($indentLevel) . $msg . PHP_EOL, $output);
    }


    /**
     * Sends a well formatted info message to the output.
     *
     * @param string $msg
     * @param int $indentLevel
     * @param OutputInterface $output
     */

    protected function info(string $msg, int $indentLevel, OutputInterface $output)
    {
        H::info(H::i($indentLevel) . $msg . PHP_EOL, $output);
    }
}