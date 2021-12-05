<?php


namespace Ling\Light_Kit_Store\Service;


use Ling\Bat\HashTool;
use Ling\Light\Events\LightEvent;
use Ling\Light\Exception\LightException;
use Ling\Light\Helper\ControllerHelper;
use Ling\Light\Http\HttpRedirectResponse;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Database\Service\LightDatabaseService;
use Ling\Light_Kit_Store\Api\Custom\CustomLightKitStoreApiFactory;
use Ling\Light_Kit_Store\Exception\LightKitStoreException;
use Ling\Light_Kit_Store\Helper\LightKitStoreCheckoutCartHelper;
use Ling\Light_Kit_Store\Helper\LightKitStoreRememberMeHelper;
use Ling\Light_Kit_Store\Helper\LightKitStoreUserHelper;
use Ling\Light_PasswordProtector\Service\LightPasswordProtector;
use Ling\Light_ReverseRouter\Service\LightReverseRouterService;
use Ling\Light_User\LightOpenUser;
use Ling\Light_User\LightUserInterface;
use Ling\Light_Vars\Service\LightVarsService;


/**
 * The LightKitStoreService class.
 */
class LightKitStoreService
{

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected LightServiceContainerInterface $container;


    /**
     * This property holds the options for this instance.
     *
     * Available options are:
     *
     *
     *
     * See the @page(Light_Kit_Store conception notes) for more details.
     *
     *
     * @var array
     */
    protected array $options;


    /**
     * This property holds a passwordProtector for this instance.
     * See the Light_PasswordProtector planet for mor info: https://github.com/lingtalfi/Light_PasswordProtector.
     *
     * Note that we use our own instance, so that it's not altered by the user/maintainer configuration.
     *
     *
     * @var LightPasswordProtector|null $passwordProtector
     */
    protected $passwordProtector;

    /**
     * This property holds the factory for this instance.
     * @var CustomLightKitStoreApiFactory|null
     */
    protected ?CustomLightKitStoreApiFactory $factory;


    /**
     * Builds the LightKitStoreService instance.
     */
    public function __construct()
    {
        /**
         * todo: here add passwordProtector system, like (lka->addUser on the right); and finish signUp process
         * todo: here add passwordProtector system, like (lka->addUser on the right); and finish signUp process
         * todo: here add passwordProtector system, like (lka->addUser on the right); and finish signUp process
         * todo: here add passwordProtector system, like (lka->addUser on the right); and finish signUp process
         * todo: here add passwordProtector system, like (lka->addUser on the right); and finish signUp process
         * todo: here add passwordProtector system, like (lka->addUser on the right); and finish signUp process
         * todo: here add passwordProtector system, like (lka->addUser on the right); and finish signUp process
         */
        $this->options = [];
        $this->passwordProtector = null;
        $this->factory = null;
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
     */
    public function getOption(string $key, $default = null, bool $throwEx = false)
    {
        if (true === array_key_exists($key, $this->options)) {
            return $this->options[$key];
        }
        if (true === $throwEx) {
            $this->error("Undefined option: $key.");
        }
        return $default;
    }


    /**
     * Returns the recaptcha key corresponding to the given project, or an empty string if nothing matches.
     * If isSite is true, the site key is returned, otherwise the secret key is returned.
     *
     * https://www.google.com/recaptcha/about/
     *
     *
     * @param string $project
     * @param bool $isSite
     * @return string
     */
    public function getRecaptchaKey(string $project, bool $isSite = true): string
    {
        $cat = (true === $isSite) ? "site" : "secret";
        return $this->options["captcha_keys"][$project][$cat] ?? "";
    }


    /**
     * Generates a token.
     *
     * See the @page(Light_Kit_Store conception notes) for more details.
     *
     * @return string
     */
    public function generateUserToken(): string
    {
        return HashTool::getRandomHash64();
    }


    /**
     * This is the callback for the user_manager->addPrepareUserCallback method.
     * You shouldn't use this method manually.
     *
     * What this does is it handles the remember_me system like this:
     *
     * - if the user is not connected, we check whether he has a remember_me token.
     *      If he does,
     *          if it's valid, we connect him, and regenerate a new remember_me token that
     *              we store in the db and in the user cookies.
     *          if it's not valid, we remove the token
     *              Note: some systems will blame the user for identity theft, but we don't
     *      If he doesn't have a remember_me token, this method does nothing.
     *
     *
     *
     *
     * @param LightUserInterface $user
     */
    public function prepareUser(LightUserInterface $user)
    {
        if (true === $user instanceof LightOpenUser) {

            if (false === $user->isValid()) {

                $rememberMeToken = LightKitStoreRememberMeHelper::getRememberMeTokenFromCookies();
                if (null !== $rememberMeToken) {
                    $userRow = LightKitStoreRememberMeHelper::getUserRowByToken($this->container, $rememberMeToken);

                    if (null === $userRow) {
                        LightKitStoreRememberMeHelper::removeRememberMeTokenFromCookies();
                    } else {
                        LightKitStoreUserHelper::setUserPropsFromRow($user, $userRow);
                        $user->connect();
                    }
                }
            }
        }
    }


    /**
     * Registers a website from a directory.
     * work in progress...
     */
    public function registerWebsiteFromDirectory()
    {
        /**
         * todo: here... is the method name correct?
         * todo: here... is the method name correct?
         * todo: here... is the method name correct?
         */
    }


    /**
     * Shortcut to the api url.
     *
     * @param string $action
     * @return string
     * @throws \Exception
     */
    public function getApiUrl(string $action): string
    {
        /**
         * @var $_rr LightReverseRouterService
         */
        $_rr = $this->container->get("reverse_router");
        $useAbsolute = false;
        $urlParams = [
            /**
             * Note that we try to keep the api store controller design such that the only GET parameter required is action.
             * Other params should be passed via POST.
             */
            "action" => $action,
        ];
        return $_rr->getUrl("lks_route-api", $urlParams, $useAbsolute);
    }


    /**
     * Returns the unique visitor identifier.
     *
     * @return string
     */
    public function getVisitorIdentifier(): string
    {
        $visitorIdentifier = $_COOKIE['visitor_identifier'] ?? null;
        if (null === $visitorIdentifier) {
            $visitorIdentifier = md5(microtime(true) . "-" . rand(0, 100000));
            setcookie("visitor_identifier", $visitorIdentifier, [
                'expires' => 0,
                'httponly' => true,
                'secure' => true,
            ]);
        }
        return $visitorIdentifier;
    }


    /**
     * Returns the factory for this plugin's api.
     *
     * @return CustomLightKitStoreApiFactory
     */
    public function getFactory(): CustomLightKitStoreApiFactory
    {
        if (null === $this->factory) {
            $this->factory = new CustomLightKitStoreApiFactory();
            $this->factory->setContainer($this->container);
            /**
             * @var $db LightDatabaseService
             */
            $db = $this->container->get("database");
            $this->factory->setPdoWrapper($db);
        }
        return $this->factory;
    }


    /**
     * Returns a configured instance of LightPasswordProtector.
     * Note: the returned instance is always configured internally (i.e. its configuration does not depend on an external factor).
     *
     * @return LightPasswordProtector
     */
    public function getPasswordProtector(): LightPasswordProtector
    {
        if (null === $this->passwordProtector) {
            $this->passwordProtector = new LightPasswordProtector();
            $this->passwordProtector->setAlgorithmName("bcrypt");
            $this->passwordProtector->setAlgorithmOptions([]);
        }
        return $this->passwordProtector;
    }

    /**
     * Returns the callback info for the Ling.Light_PaymentMethods planet (service->getCartInfo method).
     *
     *
     * @param LightServiceContainerInterface $container
     * @return callable
     * @throws \Exception
     */
    public function getPaymentMethodsCartInfoCallback(LightServiceContainerInterface $container): callable
    {
        return function () {
            $checkoutCart = LightKitStoreCheckoutCartHelper::getCart();
            $cart = $checkoutCart['cartItemsInfo'];
            $total = $cart['total'];
            $items = $cart['rows'];
            $_items = [];
            foreach ($items as $item) {
                $_items[] = [
                    "reference" => $item['reference'],
                ];
            }
            return [
                'amount' => $total,
                'currency' => 'EUR',
                'items' => $_items,
            ];
        };
    }

    //--------------------------------------------
    // EVENTS
    //--------------------------------------------
    /**
     *
     * Handles the following light error codes in a special way:
     *
     * - 404: redirects the user to the "default page" defined in our service (which defaults to 404 page)
     *
     *
     * @param LightEvent $event
     * @throws \Exception
     *
     */
    public function onLightExceptionCaught(LightEvent $event): void
    {


        $e = $event->getVar("exception");
        $exceptionHandled = false;
        if (true === $e instanceof LightException) {
            if ("404" === $e->getLightErrorCode()) {


                /**
                 * We can either redirect the user to the 404 page, or just render the 404 page in place (keeping the same uri).
                 *
                 * For now, we choose the second option.
                 */


                $useRedirect = false;
                $notFoundRouteName = $this->options['not_found_route'] ?? null;

                if (null !== $notFoundRouteName) {

                    if (false === $useRedirect) {
                        $response = ControllerHelper::executeControllerByRouteName($notFoundRouteName, $this->container);
                        $event->setVar("httpResponse", $response);
                        $exceptionHandled = true;

                    } else {

                        $urlParams = [];
                        /**
                         * @var $rr LightReverseRouterService
                         */
                        $rr = $this->container->get("reverse_router");
                        $url = $rr->getUrl($notFoundRouteName, $urlParams, true);
                        $response = HttpRedirectResponse::create($url);
                        $event->setVar("httpResponse", $response);
                        $exceptionHandled = true;
                    }

                }
            }
        }


        if (false === $exceptionHandled) {


            /**
             * @var $_lv LightVarsService
             */
            $_lv = $this->container->get("vars");
            $_lv->setVar("kit_store.unhandledException", $e);

            $exceptionRouteName = $this->options['exception_route'] ?? null;
            $response = ControllerHelper::executeControllerByRouteName($exceptionRouteName, $this->container);
            $event->setVar("httpResponse", $response);
        }
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Throws an exception.
     * @param string $msg
     * @param int|null $code
     * @throws \Exception
     */
    private function error(string $msg, int $code = null)
    {
        throw new LightKitStoreException(static::class . ": " . $msg, $code);
    }


}