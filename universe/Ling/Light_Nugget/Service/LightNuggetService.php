<?php


namespace Ling\Light_Nugget\Service;


use Ling\ArrayVariableResolver\ArrayVariableResolverUtil;
use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\BDotTool;
use Ling\Bat\FileSystemTool;
use Ling\Light\Helper\LightHelper;
use Ling\Light\Helper\LightNamesAndPathHelper;
use Ling\Light\ServiceContainer\LightServiceContainerAwareInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_MicroPermission\Service\LightMicroPermissionService;
use Ling\Light_Nugget\Exception\LightNuggetException;
use Ling\Light_Nugget\SecurityHandler\LightNuggetSecurityHandlerInterface;
use Ling\Light_UserManager\Service\LightUserManagerService;


/**
 * The LightNuggetService class.
 */
class LightNuggetService
{

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * Builds the LightNuggetService instance.
     */
    public function __construct()
    {
        $this->container = null;
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
     * Returns the nugget configuration from its path.
     *
     * You can use the [Light execute notation](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/notation/light-execute-notation.md)
     * by wrapping it into this wrapper:
     *
     * - ::()::
     *
     * For instance:
     * - ::(MyClass->methodABC)::
     *
     *
     *
     *
     * Available options are:
     *
     * - varsKey: string=null, The key used to hold the variables (see the conception notes for more info).
     *      If false, the variable replacement system will not be used.
     *      If null, the varsKey will default to "_vars".
     *
     *
     *
     *
     * @param string $path
     * @param array $options
     * @return array
     */
    public function getNuggetByPath(string $path, array $options = []): array
    {
        $varsKey = $options['varsKey'] ?? null;
        $conf = BabyYamlUtil::readFile($path);
        if (false !== $varsKey) {
            $this->resolveVariables($conf, $varsKey);
        }
        $conf = LightHelper::executeParenthesisWrappersByArray($conf, $this->container, ['::']);
        return $conf;
    }


    /**
     * Returns the output of the [getNuggetByPath method](https://github.com/lingtalfi/Light_Nugget/blob/master/doc/api/Ling/Light_Nugget/Service/LightNuggetService/getNuggetByPath.md).
     *
     * Available options are also the ones from the getNuggetByPath method.
     *
     *
     * @param string $nuggetId
     * @param string $relPath
     * @param array $options
     * @return array
     * @throws \Exception
     */
    public function getNugget(string $nuggetId, string $relPath, array $options = []): array
    {
        $p = explode(':', $nuggetId, 2);
        if (2 !== count($p)) {
            $this->error("Invalid nuggetId format, \$plugin:\$suggestionPath was expected.");
        }
        list($plugin, $suggestionPath) = $p;

        $plugin = FileSystemTool::removeTraversalDots($plugin);
        $suggestionPath = FileSystemTool::removeTraversalDots($suggestionPath);


        $conf = null;
        $d = $this->container->getApplicationDir() . "/config/data/$plugin/$relPath";
        $f = $d . "/$suggestionPath.byml";
        if (false !== strpos($suggestionPath, 'generated')) {
            $custom = str_replace("generated", "custom", $suggestionPath);
            $f2 = $d . "/$custom.byml";
            if (true === file_exists($f2)) {
                $f = $f2;
            }
        }

        if (false === file_exists($f)) {
            $symbol = LightNamesAndPathHelper::getSymbolicPath($f, $this->container);
            $this->error("Nugget not found with nuggetId: $nuggetId ($symbol), and relPath: \"$relPath\".");
        }


        return $this->getNuggetByPath($f, $options);
    }


    /**
     * Returns the value of the directive identified by the given nuggetDirectiveId and relPath.
     * An exception is thrown is such directive doesn't exist.
     *
     * Available options are the same as the getNugget method's options.
     *
     *
     *
     * @param string $nuggetDirectiveId
     * @param string $relPath
     * @param array $options
     */
    public function getNuggetDirective(string $nuggetDirectiveId, string $relPath, array $options = [])
    {
        $p = explode(":", $nuggetDirectiveId);
        if (3 !== count($p)) {
            $this->error("Invalid nuggetDirectiveId format, with \"$nuggetDirectiveId\".");
        }
        $directivePath = array_pop($p);
        $nuggetId = implode(":", $p);
        $nugget = $this->getNugget($nuggetId, $relPath, $options);
        $found = false;
        $value = BDotTool::getDotValue($directivePath, $nugget, null, $found);
        if (false === $found) {
            $this->error("Directive not found with nuggetId: \"$nuggetId\", and path: \"$directivePath\".");
        }
        return $value;
    }


    /**
     * Check that the user is granted the permission to execute an action, and throws an exception if that's not the case.
     * This system is described in greater details in the @page(baked in security system section of the Light_Nugget conception notes).
     *
     * The params array is used if you define a custom handler.
     * Your custom handler defines what the params array should contain.
     *
     *
     * @param array $nugget
     * @param array $params
     */
    public function checkSecurity(array $nugget, array $params = [])
    {

        if (array_key_exists("security", $nugget)) {

            $security = $nugget["security"];


            //--------------------------------------------
            // ANY/ALL HANDLING
            //--------------------------------------------
            $any = $security['any'] ?? [];
            $all = $security['all'] ?? [];


            $um = null;
            $mp = null;


            /**
             * Note: the implementation below is not fixed (see conception notes),
             *  maybe we will be able to merge any and all in the future, but for now,
             * as I need to write something, I just execute them one after the other.
             */
            if ($any) {
                $isGranted = false;
                foreach ($any as $type => $value) {
                    switch ($type) {
                        case "permission":

                            if (null === $um) {
                                /**
                                 * @var $um LightUserManagerService
                                 */
                                $um = $this->container->get('user_manager');
                            }
                            $user = $um->getValidWebsiteUser();
                            if ($user->hasRight($value)) {
                                $isGranted = true;
                                break 2;
                            }
                            break;
                        case "micro_permission":
                            if (null === $mp) {
                                /**
                                 * @var $mp LightMicroPermissionService
                                 */
                                $mp = $this->container->get("micro_permission");
                            }
                            if (true === $mp->hasMicroPermission($value)) {
                                $isGranted = true;
                                break 2;
                            }

                            break;
                        default:
                            $this->error("Unknown type: $type.");
                            break;
                    }
                }
                if (false === $isGranted) {
                    $this->error("Permission denied: the current user doesn't have any of the permissions defined by the security directive of the configuration.");
                }

            } elseif ($all) {
                foreach ($all as $type => $value) {
                    switch ($type) {
                        case "permission":

                            if (null === $um) {
                                /**
                                 * @var $um LightUserManagerService
                                 */
                                $um = $this->container->get('user_manager');
                            }
                            $user = $um->getValidWebsiteUser();
                            if (false === $user->hasRight($value)) {
                                $this->error("Permission denied: the current user is doesn't have the \"$value\" permission.");
                            }
                            break;
                        case "micro_permission":
                            if (null === $mp) {
                                /**
                                 * @var $mp LightMicroPermissionService
                                 */
                                $mp = $this->container->get("micro_permission");
                            }
                            if (false === $mp->hasMicroPermission($value)) {
                                $this->error("Permission denied: the current user is doesn't have the \"$value\" micro-permission.");
                            }

                            break;
                        default:
                            $this->error("Unknown type: $type.");
                            break;
                    }
                }
            }


            //--------------------------------------------
            // CUSTOM HANDLER
            //--------------------------------------------
            $handler = $security['handler'] ?? null;
            if (is_string($handler)) {
                $className = $handler;
                $handler = new $className();
                if ($handler instanceof LightServiceContainerAwareInterface) {
                    $handler->setContainer($this->container);
                }

                if (false === $handler instanceof LightNuggetSecurityHandlerInterface) {
                    $type = gettype($handler);
                    $this->error("The handler must be an instance of LightNuggetSecurityHandlerInterface, $type given.");
                }


                if (array_key_exists("handler_params", $security)) {
                    /**
                     * Let the developer params have precedence over the one defined in security.handler_params.
                     */
                    $params = array_merge($security['handler_params'], $params);
                }

                if (false === $handler->isGranted($params)) {
                    $this->error("Permission denied by custom handler ($className).");
                }
            }


        }
    }


    /**
     * Resolve the variables in place in the given nugget.
     *
     * @param array $nugget
     * @param string|null $key
     * @throws \Exception
     */
    public function resolveVariables(array &$nugget, string $key = null)
    {
        if (null === $key) {
            $key = "_vars";
        }
        if (array_key_exists($key, $nugget)) {
            $vars = $nugget[$key];
            $resolver = new ArrayVariableResolverUtil();
            $resolver->setFirstSymbol("");
            $resolver->setOpeningBracket('%{');
            $resolver->setClosingBracket('}');
            $resolver->resolve($nugget, $vars);
        }
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Throws an exception.
     *
     * @param string $msg
     * @throws \Exception
     */
    private function error(string $msg)
    {
        throw new LightNuggetException($msg);
    }

}