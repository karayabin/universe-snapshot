<?php


namespace Ling\Light_RealGenerator\Service;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\ArrayTool;
use Ling\Bat\BDotTool;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Logger\Service\LightLoggerService;
use Ling\Light_RealGenerator\Exception\LightRealGeneratorException;
use Ling\Light_RealGenerator\Generator\FormConfigGenerator;
use Ling\Light_RealGenerator\Generator\ListConfigGenerator;

/**
 * The LightRealGeneratorService class.
 */
class LightRealGeneratorService
{


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;

    /**
     * This property holds the options for this instance.
     *
     * Available options are:
     *
     * - useDebug: bool = false.
     *      Whether to log debug messages to the logs.
     *      If true, the debug messages are sent via the channel specified with the debugLogChannel option.
     *
     * - debugLogChannel: string=real_generator.debug, the channel used to write the log messages.
     *
     *
     *
     *
     *
     * @var array
     */
    protected $options;


    /**
     * Builds the LightRealGeneratorService instance.
     */
    public function __construct()
    {
        $this->container = null;
        $this->options = [];
    }


    /**
     * Same as generateByConf method, but takes the file path instead of the array.
     * Also, it doesn't have an options argument.
     *
     *
     *
     * @param string $file
     * @return array
     * @throws \Exception
     */
    public function generate(string $file): array
    {
        $conf = BabyYamlUtil::readFile($file);
        return $this->generateByConf($conf, [
            'file' => $file,
        ]);
    }


    /**
     * Generates the configuration files for both the @page(realist) and @page(realform) plugins,
     * according to the @page(configuration block) identified by the given file and identifier.
     *
     * Returns the configuration array used.
     *
     *
     * The default identifier defaults to "main".
     *
     * Available options are:
     * - file: the path to the file from which the conf originated (if it does originate from a file).
     *      This will only be used in debug messages, to provide more info to the debugging developer.
     *
     *
     *
     * @param array $conf
     * @param array $options
     * @throws \Exception
     */
    public function generateByConf(array $conf, array $options = []): array
    {
        $sDebug = '';
        if (array_key_exists("file", $options)) {
            $sDebug .= ", file=" . $this->getSymbolicPath(realpath($options['file']));
        }

        $this->debugLog("--clean--"); // reinitializing the log file
        $this->debugLog("Launching real_generator$sDebug.");


        $genConf = $conf;


        //--------------------------------------------
        // VARIABLE REPLACEMENT
        //--------------------------------------------
        $variables = $genConf['variables'] ?? [];


        $replaceFn = function ($value, $isValue = false) use ($variables) {


            if (false === is_array($value)) {
                if (preg_match_all('!\!\{([a-zA-Z0-9_]*)\}!', $value, $matches)) {

                    $varNames = $matches[1];
                    $ret = $value;


                    foreach ($varNames as $varName) {
                        if (array_key_exists($varName, $variables)) {
                            $newValue = $variables[$varName];
                            if (true === $isValue) {
                                if (true === is_scalar($newValue)) {
                                    $ret = str_replace('!{' . $varName . '}', $newValue, $ret);
                                } else {
                                    $ret = $newValue;
                                }
                            } else {
                                $ret = str_replace('!{' . $varName . '}', $newValue, $ret);
                            }
                        }
                    }
                    return $ret;
                }
            }
            return $value;
        };


        /**
         * replacing keys
         */
        ArrayTool::arrayWalkKeysRecursive($genConf, function ($key) use ($variables, $replaceFn) {
            return $replaceFn($key);
        });


        /**
         * replacing values
         */
        BDotTool::walk($genConf, function (&$v) use ($replaceFn) {
            $v = $replaceFn($v, true);
        });


        $debugCallable = [$this, "debugLog"];


        $useList = $genConf['use_list'] ?? true;

        if (false === $useList) {
            $this->debugLog("use_list=false, skipping list configuration.");
        } else {
            if (array_key_exists("list", $genConf)) {
                $this->debugLog("List configuration found.");
                $listGenerator = $this->getNewListConfigGeneratorInstance();
                $listGenerator->setDebugCallable($debugCallable);
                $listGenerator->setContainer($this->container);
                $listGenerator->generate($genConf);
            } else {
                $this->debugLog("No list configuration found.");
            }
        }


        $useForm = $genConf['use_form'] ?? true;
        if (false === $useForm) {
            $this->debugLog("use_form=false, skipping form configuration.");
        } else {
            if (array_key_exists("form", $genConf)) {
                $this->debugLog("Form configuration found.");
                $formGenerator = new FormConfigGenerator();
                $formGenerator->setDebugCallable($debugCallable);
                $formGenerator->setContainer($this->container);
                $formGenerator->generate($genConf);
            } else {
                $this->debugLog("No form configuration found.");
            }
        }


        $this->onGenerateAfter($genConf);


        return $genConf;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * Sets the options.
     *
     * @param array $options
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
    }


    /**
     * Sends a message to the debugLog, if the **useDebug** option is set to true.
     *
     * @param string $msg
     */
    public function debugLog(string $msg)
    {

        $useDebug = $this->options['useDebug'] ?? false;

        if (true === $useDebug) {
            /**
             * @var $logger LightLoggerService
             */
            $channel = $this->options['debugLogChannel'] ?? "real_generator.debug";
            $logger = $this->container->get("logger");
            $logger->log($msg, $channel);
        }
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Creates and returns the list config generator instance.
     *
     * @return ListConfigGenerator
     */
    protected function getNewListConfigGeneratorInstance(): ListConfigGenerator
    {
        return new ListConfigGenerator();
    }

    /**
     * Returns the given absolute path, with the application directory replaced by a symbol if found.
     * If not, the path is returned as is.
     *
     *
     * For instance: [app]/my/image.png
     *
     * @param string $path
     * @return string
     */
    protected function getSymbolicPath(string $path): string
    {
        $appDir = $this->container->getApplicationDir();
        $p = explode($appDir, $path, 2);
        if (2 === count($p)) {
            return '[app]' . array_pop($p);
        }
        return $path;
    }


    /**
     * Throws an exception with the given error message.
     *
     * @param string $msg
     * @throws LightRealGeneratorException
     */
    protected function error(string $msg)
    {
        $this->debugLog("Error: " . $msg);
        throw new LightRealGeneratorException($msg);
    }


    /**
     * Hook called at the end of the @page(generate method).
     *
     * @param array $configBlock
     * @overrideMe
     */
    protected function onGenerateAfter(array $configBlock)
    {

    }
}