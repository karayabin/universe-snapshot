<?php


namespace Ling\Light_DeveloperWizard\Util;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\BDotTool;
use Ling\Bat\CaseTool;
use Ling\Bat\ClassTool;
use Ling\ClassCooker\ClassCooker;
use Ling\Light\Helper\LightNamesAndPathHelper;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_DeveloperWizard\Exception\LightDeveloperWizardException;
use Ling\Light_DeveloperWizard\Helper\ConfigHelper;
use Ling\TokenFun\TokenFinder\Tool\TokenFinderTool;
use Ling\UniverseTools\PlanetTool;
use Ling\WebWizardTools\Process\WebWizardToolsProcess;

/**
 * The ServiceManagerUtil class.
 */
class ServiceManagerUtil
{


    /**
     * This property holds the galaxy name for this instance.
     * @var string
     */
    protected $galaxy;

    /**
     * This property holds the planet name for this instance.
     * @var string
     */
    protected $planet;


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;

    /**
     * This property holds the cooker for this instance.
     * @var ClassCooker
     */
    protected $cooker;


    /**
     * Builds the ServiceManagerUtil instance.
     */
    public function __construct()
    {
        $this->galaxy = null;
        $this->planet = null;
        $this->container = null;
        $this->cooker = null;
    }


    /**
     * Sets the planet and galaxy for this instance.
     *
     * @param string $planet
     * @param string|null $galaxy
     */
    public function setPlanet(string $planet, string $galaxy = null)
    {
        if (null === $galaxy) {
            $galaxy = 'Ling';
        }
        $this->planet = $planet;
        $this->galaxy = $galaxy;
    }

    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Adds a method to the service class, if it's not there already.
     *
     * @param string $methodName
     * @param string $content
     * @throws \Exception
     */
    public function addMethod(string $methodName, string $content)
    {
        $cooker = $this->getCooker();
        if (false === $this->serviceHasMethod($methodName)) {
            $cooker->addMethod($methodName, $content);
        }
    }


    /**
     * Adds the given property to the service class, and optionally with its initialization and accessor methods.
     *
     * By default, the property is written below the last property if any.
     * If not, it's written before the first method of the class if any.
     * If not, it's added at the beginning of the class (just after the class declaration).
     *
     * Or, you can decide exactly where to put it with the **afterProperty** option.
     *
     *
     *
     *
     *
     * Available options are:
     * - constructorInit: string, the initialization string to append to the constructor method body (if any).
     *      Note that the constructor must be there, it will not be added if it's not there, and in fact,
     *      an exception will be thrown if that's the case.
     *      Note2: by default, if the constructorInit string is found in the constructor, it will not be added again.
     *
     *
     * - accessors: string, the methods to add to the class, those will just be appended to the class by default,
     *      or appended after the method name defined with the accessorsAfter property if set
     * - accessorsAfter: string, the name of the method after which the accessors string shall be appended.
     * - afterProperty: string, the property after which to insert the new property. See the @page(class cooker's addProperty documentation) for more details.
     * - onError: callable|null|false = null, how to react when an error occurs, or when we try to add something that already exists.
     *      If callable, the signature is:
     *      - fn ( errorMessage, errorType ): void
     *      The errorType is one of:
     *      - propertyAlreadyExists
     *      - noConstructorFound
     *      - constructorStringFound
     *      - accessorMethodAlreadyExists
     *      - useStatementAlreadyExists
     *
     *      If it's null, an exception will be thrown.
     *      If it's false, this method will fail silently.
     *
     * - useStatements: array of (complete) use statements to add
     * - process: WebWizardToolsProcess=null. If passed, the trace messages will be added directly to that process via the addLogMessage method of the process.
     *
     *
     *
     *
     * @param string $propertyName
     * @param string $templateContent
     * @param array $options
     */
    public function addPropertyByTemplate(string $propertyName, string $templateContent, array $options = [])
    {
        $onError = $options['onError'] ?? null;
        $process = $options['process'] ?? null;
        $processCallable = function () {
        };

        if ($process instanceof WebWizardToolsProcess) {
            $processCallable = function (string $msg, string $type) use ($process) {
                $process->addLogMessage($msg, $type);
            };
        }

        $cooker = $this->getCooker();


        //--------------------------------------------
        // property
        //--------------------------------------------
        if (false === $this->serviceHasProperty($propertyName)) {
            $cooker->addProperty($propertyName, $templateContent, $options);
            call_user_func($processCallable, "Adding property \"$propertyName\" to the service class.", "trace");
        } else {
            $this->specialError("The property \"$propertyName\" already exists in this service class.", "propertyAlreadyExists", $onError, $process);
        }


        //--------------------------------------------
        // use statements
        //--------------------------------------------
        if (array_key_exists('useStatements', $options)) {
            $useStatements = $options['useStatements'];
            foreach ($useStatements as $useStatement) {

                $useStatementClass = ClassTool::getUseStatementClassByUseStatement($useStatement);


                if (true === $this->serviceHasUseStatement($useStatementClass)) {
                    $this->specialError("The use statement for \"$useStatementClass\" already exists in the service class.", "useStatementAlreadyExists", $onError, $process);
                } else {
                    call_user_func($processCallable, "Adding useStatement for \"$useStatementClass\" to the service class.", "trace");
                    $this->addUseStatements($useStatement);
                }
            }
        }

        //--------------------------------------------
        // initialization
        //--------------------------------------------
        if (array_key_exists('constructorInit', $options)) {
            $methods = $cooker->getMethodsBasicInfo();
            if (false === array_key_exists("__construct", $methods)) {
                $this->specialError("The __construct method was not found in this class.", 'noConstructorFound', $onError, $process);
            } else {
                $s = $options['constructorInit'];
                $cooker->updateMethodContent('__construct', function (string $innerContent) use ($s, $onError, $process, $processCallable) {
                    if (false === strpos($innerContent, $s)) {
                        $innerContent .= $s;
                        call_user_func($processCallable, "Adding content \"$s\" to the __construct method's body.", "trace");
                    } else {
                        $this->specialError("The string \"$s\" was already found inside the constructor method.", 'constructorStringFound', $onError, $process);
                    }
                    return $innerContent;
                });
            }
        }


        //--------------------------------------------
        // accessors
        //--------------------------------------------
        if (array_key_exists('accessors', $options)) {
            $accessors = $options['accessors'];
            $sAcc = '<?php ' . PHP_EOL . $accessors;
            $tokens = token_get_all($sAcc);
            $methodsInfo = TokenFinderTool::getMethodsInfo($tokens);
            $methods = array_keys($cooker->getMethodsBasicInfo());


            // let the user fix his own mistakes
            foreach ($methodsInfo as $info) {
                $methodName = $info['name'];
                if (in_array($methodName, $methods, true)) {
                    $this->specialError("The accessors string contains the \"$methodName\" method, which is already in the class.", 'accessorMethodAlreadyExists', $onError, $process);
                } else {
                    call_user_func($processCallable, "Adding accessor for \"$methodName\" to the service class.", "trace");
                }
            }

            $addContentOptions = [];
            if (array_key_exists('accessorsAfter', $options)) {
                $addContentOptions['afterMethod'] = $options['accessorsAfter'];
            }
            $cooker->addContent($accessors . PHP_EOL, $addContentOptions);
        }
    }


    /**
     * Adds the given use statement(s) to the service class, if it/they doesn't exist.
     *
     * The statement must look like this (including the semi-colon at the end, but not the PHP_EOL at the very end):
     *
     * - use Ling\Light_Logger\Service\LightLoggerService;
     *
     *
     * @param string|array $useStatements
     */
    public function addUseStatements($useStatements)
    {
        $this->getCooker()->addUseStatements($useStatements);
    }


    /**
     * Proxy to the ClassCooker->updatePropertyComment method.
     *
     *
     * @param string $propertyName
     * @param callable $fn
     * @param array $options
     */
    public function updatePropertyComment(string $propertyName, callable $fn, array $options = [])
    {
        return $this->getCooker()->updatePropertyComment($propertyName, $fn, $options);
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the galaxy of this instance.
     *
     * @return string
     */
    public function getGalaxyName(): string
    {
        return $this->galaxy;
    }

    /**
     * Returns the planet of this instance.
     *
     * @return string
     */
    public function getPlanetName(): string
    {
        return $this->planet;
    }


    /**
     * Returns the @page(planet identifier).
     *
     * @return string
     */
    public function getPlanetIdentifier(): string
    {
        return "$this->galaxy/$this->planet";
    }


    /**
     * Returns the service name.
     *
     * @return string
     */
    public function getServiceName(): string
    {
        return LightNamesAndPathHelper::getServiceName($this->planet);
    }


    /**
     * Returns the absolute path to the @page(basic service) class path.
     * @return string
     */
    public function getBasicServiceClassPath(): string
    {
        $tightName = PlanetTool::getTightPlanetName($this->planet);
        return $this->container->getApplicationDir() . "/universe/$this->galaxy/$this->planet/Service/$tightName" . "Service.php";
    }

    /**
     * Returns the absolute path to the @page(basic service) exception path.
     * @return string
     */
    public function getBasicServiceExceptionPath(): string
    {
        $tightName = PlanetTool::getTightPlanetName($this->planet);
        return $this->container->getApplicationDir() . "/universe/$this->galaxy/$this->planet/Exception/$tightName" . "Exception.php";
    }


    /**
     * Returns the absolute path to the @page(basic service) config path.
     * @return string
     */
    public function getBasicServiceConfigPath(): string
    {
        return $this->container->getApplicationDir() . "/config/services/$this->galaxy.$this->planet.byml";
    }


    /**
     * Returns the path to the create file for this service.
     * See more about [create file](https://github.com/lingtalfi/TheBar/blob/master/discussions/create-file.md).
     *
     * @return string
     */
    public function getCreateFilePath(): string
    {
        return $this->container->getApplicationDir() . "/universe/$this->galaxy/$this->planet/assets/fixtures/create-structure.sql";
    }

    /**
     * Returns the @page(tight planet name).
     *
     * @return string
     */
    public function getTightPlanetName(): string
    {
        return PlanetTool::getTightPlanetName($this->planet);
    }

    /**
     * Returns a human version of the planet name.
     *
     * @return string
     */
    public function getHumanPlanetName(): string
    {
        $planet = $this->getPlanetName();
        if (0 === strpos($planet, 'Light_Kit_Admin_')) {
            $planet = substr($planet, 16);
        } elseif (0 === strpos($planet, 'Light_')) {
            $planet = substr($planet, 6);
        }
        $planet = ucwords(CaseTool::toHumanFlatCase($planet));
        return $planet;
    }


    /**
     * Returns whether there is a @page(basic service) class file for the planet.
     * @return bool
     */
    public function hasBasicServiceClassFile(): bool
    {
        $file = $this->getBasicServiceClassPath();
        return file_exists($file);
    }

    /**
     * Returns whether there is a @page(basic service) exception file for the planet.
     * @return bool
     */
    public function hasBasicServiceExceptionFile(): bool
    {
        $file = $this->getBasicServiceExceptionPath();
        return file_exists($file);
    }

    /**
     * Returns whether there is a @page(basic service) config file for the planet.
     * @return bool
     */
    public function hasBasicServiceConfigFile(): bool
    {
        $file = $this->getBasicServiceConfigPath();
        return file_exists($file);
    }


    /**
     * Returns whether the service class has the given method.
     * @param string $methodName
     * @return bool
     */
    public function serviceHasMethod(string $methodName): bool
    {
        if (true === $this->hasBasicServiceClassFile()) {
            $tightName = $this->getTightPlanetName();
            $className = "$this->galaxy\\$this->planet\\Service\\$tightName" . "Service";
            return ClassTool::hasMethod($className, $methodName);
        }
        return false;
    }


    /**
     * Returns whether the service class has the given property.
     *
     * @param string $property
     * @return bool
     */
    public function serviceHasProperty(string $property): bool
    {
        return $this->getCooker()->hasProperty($property);
    }


    /**
     * Returns whether the service class has the given use statement.
     * @param string $useStatement
     *
     * @return bool
     */
    public function serviceHasUseStatement(string $useStatement): bool
    {
        return $this->getCooker()->hasUseStatement($useStatement);
    }


    /**
     * Returns whether the service config file has an option of the given name defined with the setOptions method.
     *
     *
     * Returns false if the service doesn't use the setOptions method.
     *
     * @param string $optionName
     * @return bool
     */
    public function configHasOption(string $optionName): bool
    {
        $serviceFile = $this->getBasicServiceConfigPath();
        $conf = BabyYamlUtil::readFile($serviceFile);
        $serviceName = $this->getServiceName();
        if (array_key_exists($serviceName, $conf)) {
            $serviceConf = $conf[$serviceName];
            if (array_key_exists('methods', $serviceConf)) {
                $methods = $serviceConf["methods"];
                if (array_key_exists('setOptions', $methods)) {
                    $args = $methods["setOptions"];
                    $optionArgs = current($args);
                    if (array_key_exists($optionName, $optionArgs)) {
                        return true;
                    }
                }
            }


            if (array_key_exists("methods_collection", $serviceConf)) {
                $methods = $serviceConf['methods_collection'];
                foreach ($methods as $method) {
                    if ('setOptions' === $method['method']) {
                        $optionArgs = array_shift($method['args']);
                        if (is_array($optionArgs) && array_key_exists($optionName, $optionArgs)) {
                            return true;
                        }
                    }
                }
            }
        }
        return false;
    }


    /**
     * Returns whether the service config has a hook to the given service.
     *
     * Available options are:
     * - with: array defining a method that the hook service must have (i.e. if the service doesn't have that method, this method returns false)
     *      It's an array with the following entries:
     *      - method: string, the method name
     *      - ?args: array of key value pairs representing the arguments that the defined method must have for this method to return true.
     *          If args is defined, this method returns true only if all those args are present in the config file
     *
     *
     *
     * @param string $serviceName
     * @param array $options
     * @return bool
     */
    public function configHasHook(string $serviceName, array $options = []): bool
    {
        $with = $options['with'] ?? [];
        $withMethod = $with['method'] ?? null;
        $withArgs = $with['args'] ?? null;


        $serviceFile = $this->getBasicServiceConfigPath();
        if (file_exists($serviceFile)) {

            $conf = BabyYamlUtil::readFile($serviceFile);
            $hookKey = '$' . $serviceName . ".methods_collection"; // assuming the hooks are using methods_collection technique (i.e. not setMethods)
            if (array_key_exists($hookKey, $conf)) {
                if (null === $withMethod) {
                    return true;
                } else {

                    $methods = $conf[$hookKey];
                    foreach ($methods as $method) {

                        if ($withMethod === $method['method']) {
                            if (null === $withArgs) {
                                return true;
                            } else {

                                if (array_key_exists("args", $method)) {
                                    $args = $method['args'];
                                    foreach ($withArgs as $withKey => $withValue) {
                                        if (true === array_key_exists($withKey, $args) && $withValue === $args[$withKey]) {
                                            return true;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        return false;
    }


    /**
     * Returns whether the service config file contains the banner comment which name is given.
     *
     * See more details in the @page(standard service config file) section.
     *
     *
     * @param $bannerName
     * @return bool
     */
    public function configHasBannerComment($bannerName): bool
    {
        $serviceFile = $this->getBasicServiceConfigPath();
        return ConfigHelper::hasSectionComment($serviceFile, $bannerName);
    }


    /**
     * Adds the option with the given name and value to the "setOptions" method in the service configuration file.
     *
     * Available options are:
     * - inlineComment: string=null, a comment to add inline, next to the value. Its first non-whitespace char must be a hash.
     *
     *
     * @param string $name
     * @param $value
     * @param array $options
     */
    public function addConfigOption(string $name, $value, array $options = [])
    {
        $inlineComment = $options['inlineComment'] ?? null;

        $serviceName = $this->getServiceName();
        $serviceFile = $this->getBasicServiceConfigPath();

        list($config, $nodeInfoMap) = BabyYamlUtil::parseNodeInfoByFile($serviceFile);


        $config[$serviceName]['methods']['setOptions']['options'][$name] = $value;
        $writeOptions = [
            "nodeInfoMap" => $nodeInfoMap,
        ];
        if (null !== $inlineComment) {
            $bdotOptionName = BDotTool::escape($name);
            $writeOptions['comments'] = [
                "$serviceName.methods.setOptions.options.$bdotOptionName" => [
                    "inline" => $inlineComment,
                ],
            ];
        }


        BabyYamlUtil::writeFile($config, $serviceFile, $writeOptions);
    }


    /**
     * Adds a hook to the given service name, with the given methodItem.
     * It assumes a @page(standard service config file) environment.
     *
     * The methodItem structure:
     *
     * - method: string, the name of the method (we will use the methods_collection technique see the @page(Light documentation) for more info).
     * - ?args: array of arguments, if any, for the aforementioned method
     *
     *
     *
     * @param string $serviceName
     * @param array $methodItem
     */
    public function addConfigHook(string $serviceName, array $methodItem)
    {


        $addHooksBanner = false;
        if (false === $this->configHasBannerComment("hooks")) {
            $addHooksBanner = true;
        }


        $serviceFile = $this->getBasicServiceConfigPath();
        list($config, $nodeInfoMap) = BabyYamlUtil::parseNodeInfoByFile($serviceFile);


        $path = '$' . $serviceName . "\.methods_collection";
        $curValue = BDotTool::getDotValue($path, $config, null);
        if (null === $curValue) {
            $curValue = [];
        }
        $curValue[] = $methodItem;
        BDotTool::setDotValue($path, $curValue, $config);

        $writeOptions = [
            "nodeInfoMap" => $nodeInfoMap,
        ];
        if (true === $addHooksBanner) {
            $writeOptions['comments'] = [
                '$' . $serviceName . '\.methods_collection' => [
                    "block" => [
                        '# --------------------------------------',
                        '# hooks',
                        '# --------------------------------------',
                    ],
                ],

            ];
        }
        BabyYamlUtil::writeFile($config, $serviceFile, $writeOptions);
    }


    /**
     * Adds a banner comment, as defined in the @page(standard service config file) section.
     *
     *
     * Available options are:
     *
     * - before: string=null, if null, the banner comment will be appended to the file.
     *      If not null, it's the banner comment name before which the new banner comment will be inserted.
     *      So for instance, if before=others, then the banner will be inserted BEFORE the others banner, if it exists,
     *      or otherwise it will just be appended to the end of the file.
     * - verticalBefore: int=3, the number of empty lines to add before the banner comment.
     *      Note that this number's minimum is 1 (even if you set 0), because otherwise it could degrade the comment display.
     * - verticalAfter: int=5, the number of empty lines to add after the banner comment
     *
     *
     *
     *
     * @param string $bannerName
     * @param array $options
     */
//    public function addConfigBannerComment(string $bannerName, array $options = [])
//    {
//        $serviceFile = $this->getBasicServiceConfigPath();
//        $c = file_get_contents($serviceFile);
//
//        $before = $options['before'] ?? null;
//        $verticalBefore = $options['verticalBefore'] ?? 3;
//        if ($verticalBefore < 1) {
//            $verticalBefore = 1;
//        }
//        $verticalAfter = $options['verticalAfter'] ?? 5;
//
//
//        $banner = $this->getBannerContent($bannerName);
//        $banner =
//            str_repeat(PHP_EOL, $verticalBefore) .
//            $banner .
//            str_repeat(PHP_EOL, $verticalAfter);
//
//
//        $bannerInjected = false;
//
//        if (null !== $before) {
//            if (true === $this->configHasBannerComment($before)) {
//                $beforeBanner = $this->getBannerContent($before);
//                $newContent = $banner . $beforeBanner;
//                $c = str_replace($beforeBanner, $newContent, $c);
//                $bannerInjected = true;
//            }
//        }
//
//        if (false === $bannerInjected) {
//            $c .= $banner;
//        }
//        FileSystemTool::mkfile($serviceFile, $c);
//
//
//    }

    /**
     * Returns a cooker instance.
     * It's assuming the service class file exists.
     *
     * @return ClassCooker
     * @throws \Exception
     */
    public function getCooker(): ClassCooker
    {
        if (null === $this->cooker) {
            $classFile = $this->getBasicServiceClassPath();
            if (false === file_exists($classFile)) {
                $this->error("Service file not found: $classFile.");
            }
            $this->cooker = new ClassCooker();
            $this->cooker->setFile($classFile);
        }
        return $this->cooker;
    }


    //--------------------------------------------
    //
    //--------------------------------------------


    /**
     * Throws an exception.
     * @param string $msg
     * @throws \Exception
     */
    private function error(string $msg)
    {
        throw new LightDeveloperWizardException($msg);
    }


    /**
     * Returns a banner comment.
     *
     * @param string $bannerName
     * @return string
     */
    private function getBannerContent(string $bannerName): string
    {
        return ConfigHelper::getBannerContent($bannerName);
    }


    /**
     * Do something with the given error.
     * See the addPropertyByTemplate method's source code for more details.
     *
     *
     * @param string $msg
     * @param string $msgType
     * @param WebWizardToolsProcess|null $process
     * @param $onError
     */
    private function specialError(string $msg, string $msgType, $onError = null, WebWizardToolsProcess $process = null)
    {
        if (null !== $process) {
            $process->addLogMessage($msg, "trace");
        }
        if (null === $onError) {
            $this->error($msg);
        } elseif (is_callable($onError)) {
            call_user_func($onError, $msg, $msgType);
        }
    }


}