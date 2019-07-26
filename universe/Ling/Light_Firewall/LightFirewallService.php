<?php


namespace Ling\Light_Firewall;


use Ling\Light\Core\Light;
use Ling\Light\Http\HttpRedirectResponse;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light\ReverseRouter\LightReverseRouterInterface;
use Ling\Light\Router\LightRouterInterface;
use Ling\Light_Firewall\Exception\LightFirewallException;
use Ling\Light_PrerouteHub\Runner\LightPrerouteHubRunnerInterface;
use Ling\Light_User\LightUserInterface;

/**
 * The LightFirewallService class.
 * See the @page(conception notes) for more details.
 */
class LightFirewallService implements LightPrerouteHubRunnerInterface
{

    /**
     * This property holds the modules for this instance.
     * See the class description for more details.
     * @var array
     */
    protected $modules;

    /**
     * Builds the LightFirewallService instance.
     */
    public function __construct()
    {
        $this->modules = [];
    }


    /**
     * Sets the modules.
     *
     * @param array $modules
     */
    public function setModules(array $modules)
    {
        $this->modules = $modules;
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @implementation
     */
    public function run(Light $light, HttpRequestInterface $httpRequest, HttpResponseInterface &$httpResponse = null)
    {
        foreach ($this->modules as $module) {
            $this->executeModule($module, $light, $httpRequest, $httpResponse);
        }
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Execute the given module.
     *
     *
     * @param array $module
     * @param Light $light
     * @param HttpRequestInterface $httpRequest
     * @param HttpResponseInterface|null $response
     * @throws \Exception
     */
    protected function executeModule(array $module, Light $light, HttpRequestInterface $httpRequest, HttpResponseInterface &$response = null)
    {
        if (true === $this->checkDomain($module, $light, $httpRequest)) {
            if (true === $this->checkCondition($module, $light, $httpRequest)) {
                $this->executeAction($module, $light, $httpRequest, $response);
            }
        }


    }


    /**
     * Returns whether the http request is inside the given domain.
     *
     * @param array $module
     * @param Light $light
     * @param HttpRequestInterface $httpRequest
     * @return bool
     * @throws \Exception
     */
    protected function checkDomain(array $module, Light $light, HttpRequestInterface $httpRequest): bool
    {
        $domain = $module['domain'];
        $domainSubtractRoutes = $module['domain_subtract_routes'] ?? [];
        if ('*' === $domain) {
            if ($domainSubtractRoutes) {

                $container = $light->getContainer();
                /**
                 * @var $router LightRouterInterface
                 */
                $router = $container->get("router");
                $routes = $light->getRoutes();
                $matchRoutes = array_intersect_key($routes, array_flip($domainSubtractRoutes));
                $routeName = $router->match($httpRequest, $matchRoutes);
                if (false !== $routeName) {
                    return false;
                }
            }
            return true;
        } else {
            throw new LightFirewallException("Unknown domain syntax.");
        }
    }


    /**
     * Returns whether the given condition is met or not.
     *
     *
     * @param array $module
     * The module array which must contain the condition key.
     * See the @page(conception notes) for more details.
     *
     * If the condition is an array, it's an array of built-in capabilities to use.
     * The condition is successful only if all declared capabilities return true.
     * In other words, capabilities are combined using an AND logic operation.
     * The available capabilities are the following:
     *
     * - is_logged_in_equals: bool. This condition checks whether the user is logged in using the
     *      "user_manager" service, and checks that the value set by you (or the app maintainer app) matches
     *      the login status of the current user.
     *      Note: if the user_manager service is not set, this whole process will obviously fail.
     *      See the https://github.com/lingtalfi/Light_UserManager/ plugin for more details about the user_manager service.
     *
     *
     *
     *
     *
     *
     * @param Light $light
     * @param HttpRequestInterface $httpRequest
     * @return bool
     * @throws \Exception
     */
    protected function checkCondition(array $module, Light $light, HttpRequestInterface $httpRequest): bool
    {
        $condition = $module['condition'];
        if (is_array($condition)) {
            $ret = true;
            $container = $light->getContainer();
            foreach ($condition as $key => $value) {
                switch ($key) {
                    case "is_logged_in_equals":
                        $userManager = $container->get("user_manager");
                        /**
                         * @var $user LightUserInterface
                         */
                        $user = $userManager->getUser();
                        $isValid = $user->isValid();
                        if ((bool)$value !== $isValid) {
                            $ret = false;
                            break;
                        }
                        break;
                    default:
                        throw new LightFirewallException("Unknown condition $key.");
                        break;
                }
            }
            return $ret;
        } else {
            throw new LightFirewallException("Unknown condition syntax.");
        }
    }

    /**
     * Executes the given action.
     * If the action is an array, it's an array of built-in capabilities.
     *
     * The available built-in capabilities are:
     *
     * - redirect_to_route: string. The route to redirect to.
     *      This capability uses the "reverse_router" service under the hood (i.e. make sure the service is in your container
     *      before you can use this capability).
     *
     *
     *
     *
     *
     * @param array $module
     * The module array must contain the action key.
     * See the @page(conception notes) for more details.
     *
     * @param Light $light
     * @param HttpRequestInterface $httpRequest
     * @param HttpResponseInterface|null $response
     * @throws \Exception
     */
    protected function executeAction(array $module, Light $light, HttpRequestInterface $httpRequest, HttpResponseInterface &$response = null)
    {
        $action = $module['action'];
        if (is_array($action)) {
            foreach ($action as $name => $value) {
                switch ($name) {
                    case "redirect_to_route":

                        /**
                         * Let's be polite and respect previous work if any
                         */
                        if (null === $response) {

                            $container = $light->getContainer();
                            /**
                             * @var $router LightReverseRouterInterface
                             */
                            $router = $container->get("reverse_router");
                            $url = $router->getUrl($value, [], true);
                            $response = HttpRedirectResponse::create($url);
                        }

                        break;
                    default:
                        throw new LightFirewallException("Unknown action $name.");
                        break;
                }
            }
        } else {
            throw new LightFirewallException("Unknown action syntax.");
        }
    }

}