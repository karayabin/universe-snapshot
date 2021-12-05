<?php


namespace Ling\Light_DeveloperWizard\WebWizardTools\Process;


use Ling\Bat\CaseTool;
use Ling\Bat\FileSystemTool;
use Ling\ClassCooker\FryingPan\FryingPan;
use Ling\ClassCooker\FryingPan\Ingredient\BasicConstructorVariableInitIngredient;
use Ling\ClassCooker\FryingPan\Ingredient\MethodIngredient;
use Ling\ClassCooker\FryingPan\Ingredient\PropertyIngredient;
use Ling\ClassCooker\FryingPan\Ingredient\UseStatementIngredient;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_DeveloperWizard\Exception\LightDeveloperWizardException;
use Ling\Light_DeveloperWizard\Helper\DeveloperWizardGenericHelper;
use Ling\WebWizardTools\Process\WebWizardToolsProcess;


/**
 * The LightDeveloperWizardBaseProcess class.
 */
abstract class LightDeveloperWizardBaseProcess extends WebWizardToolsProcess
{


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
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
        $appDir = $this->getContextVar("container")->getApplicationDir();
        return DeveloperWizardGenericHelper::getSymbolicPath($path, $appDir);
    }


    /**
     * Returns the container instance.
     * @return LightServiceContainerInterface
     */
    protected function getContainer(): LightServiceContainerInterface
    {
        return $this->getContextVar("container");
    }


    /**
     * Returns whether the given planet is a light planet.
     * @param string $planet
     * @return bool
     */
    protected function isLightPlanet(string $planet): bool
    {
        return (0 === strpos($planet, "Light_"));
    }


    /**
     * Returns a FryingPan instance configured to work with the given file.
     * @param string $file
     * @return FryingPan
     */
    protected function getFryingPanByFile(string $file)
    {
        $pan = new FryingPan();
        $pan->setFile($file);
        $pan->setOptions([
            "loggerCallable" => function (string $msg, string $type) {
                switch ($type) {
                    case "add":
                        $this->infoMessage($msg);
                        break;
                    case "skip":
                        $this->traceMessage($msg);
                        break;
                    case "warning":
                        $this->importantMessage($msg);
                        break;
                    case "error":
                        $this->errorMessage($msg);
                        break;
                    default:
                        $this->error("Unknown message type: $type.");
                        break;
                }
            }
        ]);

        return $pan;
    }


    /**
     * Adds incrementally the options property, the options variable init, and the setOptions method to the service container class.
     *
     * Add the moment, this only works properly if the setContainer method and the container property are already there.
     * You can add those using the addServiceContainer method.
     *
     *
     *
     * @param FryingPan $pan
     * @param string $planetName
     */
    protected function addServiceOptions(FryingPan $pan, string $planetName)
    {


        $pan->addIngredient(UseStatementIngredient::create()->setValue('Ling\Bat\BDotTool'));


        $pan->addIngredient(PropertyIngredient::create()->setValue("options", [
            'template' => '
    /**
     * This property holds the options for this instance.
     *
     * Available options are:
     *
     *
     *
     * See the @page(' . $planetName . ' conception notes) for more details.
     *
     *
     * @var array
     */
    protected array $options;
    
',
            'afterProperty' => 'container',
        ]));


        $pan->addIngredient(BasicConstructorVariableInitIngredient::create()->setValue('options', [
            'template' => str_repeat(' ', 8) . '$this->options = [];        
',
        ]));

        $pan->addIngredient(MethodIngredient::create()->setValue("setOptions", [
            'template' => '
    /**
     * Sets the options.
     *
     * @param array $options
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
    }
    
',
            "afterMethod" => 'setContainer',
        ]));


        $pan->addIngredient(MethodIngredient::create()->setValue("getOptions", [
            'template' => '
    /**
     * Returns the options of this instance.
     *
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }
    
',
            "afterMethod" => 'setOptions',
        ]));


        $pan->addIngredient(MethodIngredient::create()->setValue("getOption", [
            'template' => '
    /**
     * Returns the option value corresponding to the given key.
     * If the option is not found, the return depends on the throwEx flag:
     *
     * - if set to true, an exception is thrown
     * - if set to false, the default value is returned
     *
     *
     * @param string $key
     * @param null $default
     * @param bool $throwEx
     * @throws \Exception
     */
    public function getOption(string $key, $default = null, bool $throwEx = false)
    {
        $found = false;
        $value = BDotTool::getDotValue($key, $this->options, $default, $found);

        if (false !== $found) {
            return $value;
        }
        if (true === $throwEx) {
            $this->error("Undefined option: $key.");
        }
        return $default;
    }
    
',
            "afterMethod" => 'getOptions',
        ]));


    }

    /**
     * Adds incrementally the container property, the container variable init, the setContainer method, and the necessary use statements, to the service container class.
     *
     *
     * @param FryingPan $pan
     */
    protected function addServiceContainer(FryingPan $pan)
    {

        $pan->addIngredient(UseStatementIngredient::create()->setValue('Ling\Light\ServiceContainer\LightServiceContainerInterface'));


        $pan->addIngredient(PropertyIngredient::create()->setValue("container", [
            'template' => '         
    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected LightServiceContainerInterface $container;
    
',
            'top' => true,
        ]));


//        $pan->addIngredient(BasicConstructorVariableInitIngredient::create()->setValue('container', [
//            'template' => str_repeat(' ', 8) . '$this->container = null;
//',
//        ]));


        $pan->addIngredient(MethodIngredient::create()->setValue("setContainer", [
            'template' => '
    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }
    
',
            "afterMethod" => '__construct',
        ]));

    }


    /**
     * Adds incrementally the factory property, the factory variable init, the getFactory method, and the necessary use statements.
     *
     *
     * @param FryingPan $pan
     * @param string $galaxyName
     * @param string $planetName
     */
    protected function addServiceFactory(FryingPan $pan, string $galaxyName, string $planetName)
    {

        $factoryName = 'Custom' . CaseTool::toFlexiblePascal($planetName) . 'ApiFactory';
        $useStatementClass = $galaxyName . "\\" . $planetName . '\\Api\\Custom\\' . $factoryName;
        $useStatementClass2 = "Ling\Light_Database\Service\LightDatabaseService";


        $pan->addIngredient(UseStatementIngredient::create()->setValue($useStatementClass));
        $pan->addIngredient(UseStatementIngredient::create()->setValue($useStatementClass2));


        $pan->addIngredient(PropertyIngredient::create()->setValue("factory", [
            'template' => '
    /**
     * This property holds the factory for this instance.
     * @var ' . $factoryName . '|null
     */
    protected ?' . $factoryName . ' $factory;
    
',
        ]));


        $pan->addIngredient(BasicConstructorVariableInitIngredient::create()->setValue('factory', [
            'template' => str_repeat(' ', 8) . '$this->factory = null;
',
        ]));


        $pan->addIngredient(MethodIngredient::create()->setValue("getFactory", [
            'template' => '
    /**
     * Returns the factory for this plugin\'s api.
     *
     * @return ' . $factoryName . '
     */
    public function getFactory(): ' . $factoryName . '
    {
        if (null === $this->factory) {
            $this->factory = new ' . $factoryName . '();
            $this->factory->setContainer($this->container);
            /**
             * @var $db LightDatabaseService
             */
            $db = $this->container->get("database");
            $this->factory->setPdoWrapper($db);
        }
        return $this->factory;
    }
    
',
        ]));

    }


    /**
     * Adds a service config hook, only if it doesn't already exist.
     * It also send message to the logs.
     *
     * If the ifArgs array is passed, it represents the args to use for testing whether the hook already exists.
     * Otherwise, if not set, the args defined in the given methodItem will be used for the testing.
     *
     * Note, this method will only work if the calling class has defined the util property,
     * which is a configured ServiceManagerUtil instance.
     *
     *
     *
     * @param string $serviceName
     * @param array $methodItem
     * @param array|null $ifArgs
     * @throws \Exception
     */
    protected function addServiceConfigHook(string $serviceName, array $methodItem, array $ifArgs = null)
    {
        $util = $this->util;
        if (null === $util) {
            $this->error("The addServiceConfigHook method is only available for processes which defined the util property.");
        }

        $args = (null !== $ifArgs) ? $ifArgs : $methodItem['args'] ?? [];


        if (true === $util->configHasHook($serviceName, [
                "with" => [
                    'method' => $methodItem['method'],
                    'args' => $args,
                ],
            ])) {
            $planet = $util->getPlanetName();
            $this->infoMessage("The service config file already has a hook to the \"$serviceName\" service (for planet \"$planet\").");
        } else {

            $serviceConfigFile = $util->getBasicServiceConfigPath();
            $this->infoMessage("Adding hook to the \"$serviceName\" service in \"$serviceConfigFile\".");
            $util->addConfigHook($serviceName, $methodItem);
        }
    }


    /**
     * Creates the exception class (of the @page(basic service convention)) if necessary.
     */
    protected function createExceptionClass()
    {

        $util = $this->util;
        if (null === $util) {
            $this->error("The createExceptionClass method is only available for processes which defined the util property.");
        }


        $hasExceptionFile = $util->hasBasicServiceExceptionFile();
        $planetIdentifier = $util->getPlanetIdentifier();

        //--------------------------------------------
        // EXCEPTION CLASS
        //--------------------------------------------
        if (true === $hasExceptionFile) {
            $this->infoMessage("The planet $planetIdentifier already has an exception class.");

        } else {
            $this->infoMessage("Creating <a target='_blank' href=\"https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/pages/conventions.md#basic-service\">basic service exception</a> for planet $planetIdentifier.");


            $tpl = __DIR__ . "/../../assets/class-templates/Exception/BasicException.phptpl";


            $planet = $util->getPlanetName();
            $tightName = $util->getTightPlanetName();


            $content = file_get_contents($tpl);
            $content = str_replace([
                "Light_XXX",
                "LightXXX",
            ], [
                $planet,
                $tightName,
            ], $content);
            $dstPath = $util->getBasicServiceExceptionPath();
            FileSystemTool::mkfile($dstPath, $content);
        }

    }

    /**
     * Sets the learnMore property based on the given hash.
     *
     * Note: the label must be set before you can use this method, otherwise results are unpredictable.
     *
     * @param string $hash
     */
    protected function setLearnMoreByHash(string $hash)
    {
        $label = trim($this->getLabel());
        $label = rtrim($label, ".");

        $this->setLearnMore('See the <a target="_blank" href="https://github.com/lingtalfi/Light_DeveloperWizard/blob/master/doc/pages/task-details.md#' . $hash . '">' . $label . ' task detail</a>.');
    }


    /**
     * Throws an exception.
     *
     * @param string $msg
     * @throws LightDeveloperWizardException
     */
    protected function error(string $msg)
    {
        throw new LightDeveloperWizardException($msg);
    }
}