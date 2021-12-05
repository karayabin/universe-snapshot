<?php


namespace Ling\Light_Kit_Admin\Service;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\BabyYaml\Helper\BdotTool;
use Ling\Light\Events\LightEvent;
use Ling\Light\Helper\LightNamesAndPathHelper;
use Ling\Light\Http\HttpRedirectResponse;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_ControllerHub\Service\LightControllerHubService;
use Ling\Light_Kit_Admin\Exception\LightKitAdminException;
use Ling\Light_Kit_Admin\Exception\LightKitAdminMicroPermissionDeniedException;
use Ling\Light_Kit_Admin\Helper\LightKitAdminHelper;
use Ling\Light_Kit_Admin\Light_Realform\SuccessHandler\LightKitAdminEditorRealformSuccessHandler;
use Ling\Light_Kit_Admin\LightKitAdminPlugin\LightKitAdminPluginInterface;
use Ling\Light_Kit_Admin\Notification\LightKitAdminNotification;
use Ling\Light_Kit_Editor\Light_Realist\DuelistEngine\LightKitEditorBabyYamlDuelistEngine;
use Ling\Light_Realform\Service\LightRealformLateServiceRegistrationInterface;
use Ling\Light_Realform\SuccessHandler\RealformSuccessHandlerInterface;
use Ling\Light_Realist\DuelistEngine\DuelistEngineInterface;
use Ling\Light_ReverseRouter\Service\LightReverseRouterService;
use Ling\Light_User\LightWebsiteUser;
use Ling\Light_UserDatabase\Service\LightUserDatabaseService;
use Ling\Light_UserManager\Service\LightUserManagerService;
use Ling\UrlSmuggler\UrlSmugglerTool;


/**
 * The LightKitAdminService class.
 * This is the main service of the Light_Kit_Admin plugin.
 *
 * It serves as the holder of all the configuration related to (light) kit admin,
 * and in general is the central point of many things related to the light kit admin plugin.
 *
 * For instance, this service holds the notifications.
 *
 *
 */
class LightKitAdminService
{


    /**
     * This property holds the notifications for this instance.
     *
     * @var LightKitAdminNotification[]
     */
    protected $notifications;


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * This property holds the options for this instance.
     * This array is the configuration of the light kit admin plugin.
     * @var array
     */
    protected $options;

    /**
     *
     * This property holds the lkaPlugins for this instance.
     * It's an array of pluginName => LightKitAdminPluginInterface.
     * @var LightKitAdminPluginInterface[]
     */
    protected $lkaPlugins;

    /**
     * This property holds the lkaPluginOptions for this instance.
     * @var array
     */
    protected $lkaPluginOptions;


    /**
     * This property holds the array of plugin names dynamically registering to some other services.
     * @var array
     */
    private $lateRegister;


//    /**
//     * This property holds the userRowOwnershipManager for this instance.
//     * @var LightKitAdminUserRowOwnershipManager
//     */
//    protected $userRowOwnershipManager;


    /**
     * Builds the LightKitAdminService instance.
     */
    public function __construct()
    {
        $this->notifications = [];
        $this->options = [];
        $this->lkaPlugins = [];
        $this->lkaPluginOptions = [];
        $this->container = null;
        $this->lateRegister = [];
    }


    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     * @throws \Exception
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }


    /**
     * Set the options for this light kit admin service instance.
     *
     * @param array $options
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
    }


    /**
     * Gets the option identified by the given key (@page(bdot path)),
     * or returns the given $default otherwise (if the key is not found in the options array).
     *
     *
     * @param string $key
     * @param null $default
     * @return mixed
     */
    public function getOption(string $key, $default = null)
    {
        return BdotTool::getDotValue($key, $this->options, $default);
    }


    /**
     * Registers the given plugin to the light kit admin service.
     *
     * @param string $pluginName
     * @param LightKitAdminPluginInterface $plugin
     */
    public function registerPlugin(string $pluginName, LightKitAdminPluginInterface $plugin)
    {
        $this->lkaPlugins[$pluginName] = $plugin;
        $this->lkaPluginOptions = array_replace_recursive($this->lkaPluginOptions, $plugin->getPluginOptions());
    }

    /**
     * Returns the lka plugin option value identified by the given key (@page(bdot path)),
     * or returns the given $default otherwise (if the key is not found).
     *
     *
     * @param string $key
     * @param null $default
     * @return mixed
     */
    public function getPluginOption(string $key, $default = null)
    {
        return BdotTool::getDotValue($key, $this->lkaPluginOptions, $default);
    }


    /**
     * Returns the notifications of this instance.
     *
     * @return LightKitAdminNotification[]
     */
    public function getNotifications(): array
    {
        return $this->notifications;
    }

//    /**
//     * Returns the userRowOwnershipManager of this instance.
//     *
//     * @return LightKitAdminUserRowOwnershipManager
//     */
//    public function getUserRowOwnershipManager(): LightKitAdminUserRowOwnershipManager
//    {
//        return $this->userRowOwnershipManager;
//    }
//
//    /**
//     * Sets the userRowOwnershipManager.
//     *
//     * @param LightKitAdminUserRowOwnershipManager $userRowOwnershipManager
//     */
//    public function setUserRowOwnershipManager(LightKitAdminUserRowOwnershipManager $userRowOwnershipManager)
//    {
//        $this->userRowOwnershipManager = $userRowOwnershipManager;
//    }


    /**
     * Adds a notification to this instance.
     *
     * @param LightKitAdminNotification $notif
     * @return void
     */
    public function addNotification(LightKitAdminNotification $notif)
    {
        $this->notifications[] = $notif;
    }


    /**
     * Returns the url corresponding to the given controller.
     * The @page(controller hub service) will be used under the hood.
     *
     * @param string $controller
     * @return string
     * @throws \Exception
     */
    public function getUrlByController(string $controller): string
    {
        /**
         * @var $hub LightControllerHubService
         */
        $hub = $this->container->get("controller_hub");
        $route = $hub->getRouteName();
        $params = [
            "plugin" => "Light_Kit_Admin",
            "controller" => $controller,
        ];

        /**
         * @var $rr LightReverseRouterService
         */
        $rr = $this->container->get("reverse_router");
        $useAbsolute = false;
        return $rr->getUrl($route, $params, $useAbsolute);
    }


    /**
     * Creates and returns an HttpRedirectResponse, based on the given arguments.
     *
     * @param string $route
     * @param array $urlParams
     * @return HttpRedirectResponse
     * @throws \Exception
     */
    public function getRedirectResponseByRoute(string $route, array $urlParams = [])
    {
        /**
         * @var $rr LightReverseRouterService
         */
        $rr = $this->container->get("reverse_router");
        $url = $rr->getUrl($route, $urlParams, true);
        return HttpRedirectResponse::create($url);
    }


    /**
     *
     * Handles the following exceptions in a special way:
     *
     * - LightKitAdminMicroPermissionDeniedException:
     *      redirect the user to the "access denied" page (access_denied.access_denied_route in the service configuration)
     *
     *
     *
     *
     * @param LightEvent $event
     *
     */
    public function onLightExceptionCaught(LightEvent $event): void
    {
        $e = $event->getVar("exception");
        if ($e instanceof LightKitAdminMicroPermissionDeniedException) {
            $redirectRoute = $this->getOption("access_denied.access_denied_route");
            $urlParams = $_GET;
            $this->container->get("flasher")->addFlash("AdminPageControllerForbidden", $e->getMessage(), "w");
            $response = $this->getRedirectResponseByRoute($redirectRoute, $urlParams);
            $event->setVar("httpResponse", $response);
        }
    }


    /**
     *
     * This method is called by default when a website user logs in.
     * What we do is the following:
     *
     * - if the Light_LoginNotifier plugin is installed, we call its onWebsiteUserLogin method.
     *
     *
     *
     * @param LightEvent $event
     *
     */
    public function onWebsiteUserLogin(LightEvent $event): void
    {
        $user = $event->getVar("user");
        if ($user instanceof LightWebsiteUser) {


            if (true === $this->container->has("login_notifier")) {
                /**
                 * @var $ln \Ling\Light_LoginNotifier\Service\LightLoginNotifierService
                 */
                $ln = $this->container->get("login_notifier");
                $ln->onWebsiteUserLogin($user);
            }
        }
    }


    /**
     * Returns a @page(duelist engine) instance.
     *
     *
     * @return DuelistEngineInterface
     */
    public function getDuelistEngine(): DuelistEngineInterface
    {
        $o = new LightKitEditorBabyYamlDuelistEngine();
        $o->setRootDir(LightKitAdminHelper::getLightKitEditorRootPath($this->container->getApplicationDir()));
        return $o;
    }


    /**
     * Returns the kit editor's realform' success handler instance.
     * Type is either:
     *
     * - db
     * - babyYaml
     *
     * @param string $type
     * @return RealformSuccessHandlerInterface
     */
    public function getKitEditorRealformSuccessHandler(string $type): RealformSuccessHandlerInterface
    {
        $o = new LightKitAdminEditorRealformSuccessHandler();
        $o->setEngineType($type);
        return $o;
    }


    /**
     * Returns a valid lka user, or false if such user doesn't exist.
     *
     * @return LightWebsiteUser|false
     */
    public function getValidLightKitAdminUser(): LightWebsiteUser|false
    {
        /**
         * @var $_um LightUserManagerService
         */
        $_um = $this->container->get("user_manager");
        try {
            return $_um->getValidWebsiteUser();
        } catch (\Exception) {
            return false;
        }
    }

    /**
     * Updates the given user in the storage (probably a database).
     *
     * @param LightWebsiteUser $user
     * @param array $updateInfo
     */
    public function updateLightKitAdminUser(LightWebsiteUser $user, array $updateInfo = [])
    {
        /**
         * @var $_ud LightUserDatabaseService
         */
        $_ud = $this->getContainer()->get("user_database");
        $_ud->updateUserById($user->getId(), $updateInfo);
    }


    /**
     * Allows lka plugins to register their services to some plugins in a dynamic way.
     *
     * See the @page(late registration concept) for more details.
     *
     * The services plugins can register to are defined in the type, which can be one of:
     *
     * - realform: @page(the realform service)
     *
     *
     * If the type is realform, then the identifier must be of the form:
     *
     * - planet.formIdentifier
     *
     * With:
     *
     * - planet: the planet name
     * - formIdentifier: an arbitrary identifier representing the form
     *
     *
     *
     *
     * @param string $type
     * @param string $identifier
     */
    public function lateRegistration(string $type, string $identifier)
    {
        switch ($type) {
            case "realform":
                if (false === in_array('realform-' . $identifier, $this->lateRegister, true)) {

                    $p = explode('.', $identifier, 2);
                    if (2 === count($p)) {
                        $planet = array_shift($p);
                        $serviceName = LightNamesAndPathHelper::getServiceName($planet);

                        if (true === $this->container->has($serviceName)) {
                            $this->lateRegister[] = 'realform-' . $identifier;
                            /**
                             * @var $service LightRealformLateServiceRegistrationInterface
                             */
                            $service = $this->container->get($serviceName);
                            if ($service instanceof LightRealformLateServiceRegistrationInterface) {
                                $service->registerRealformByIdentifier($identifier);
                            }
                        }
                    }
                }
                break;
            default:
                break;
        }
    }


}