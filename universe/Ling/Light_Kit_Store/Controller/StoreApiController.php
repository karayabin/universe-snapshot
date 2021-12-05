<?php


namespace Ling\Light_Kit_Store\Controller;


use Ling\Bat\ConvertTool;
use Ling\Bat\DateTool;
use Ling\Bat\HashTool;
use Ling\Bat\HttpTool;
use Ling\Bat\ValidationTool;
use Ling\HtmlToolbox\HtmlTool;
use Ling\IsoTools\IsoCountryTool;
use Ling\Light\Controller\LightController;
use Ling\Light\Http\HttpJsonResponse;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\Http\HttpResponse;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_Kit_Store\Exception\LightKitStoreException;
use Ling\Light_Kit_Store\Helper\LightKitStoreCartHelper;
use Ling\Light_Kit_Store\Helper\LightKitStoreCheckoutCartHelper;
use Ling\Light_Kit_Store\Helper\LightKitStoreOptionHelper;
use Ling\Light_Kit_Store\Helper\LightKitStorePasswordHelper;
use Ling\Light_Kit_Store\Helper\LightKitStoreRememberMeHelper;
use Ling\Light_Kit_Store\Helper\LightKitStoreUserHelper;
use Ling\Light_Kit_Store\Service\LightKitStoreService;
use Ling\Light_Logger\Service\LightLoggerService;
use Ling\Light_Mailer\Service\LightMailerService;
use Ling\Light_MailStats\Service\LightMailStatsService;
use Ling\Light_PaymentMethods\Service\LightPaymentMethodsService;
use Ling\Light_ProjectVars\Service\LightProjectVarsService;
use Ling\Light_ReverseRouter\Service\LightReverseRouterService;
use Ling\Light_UserManager\Service\LightUserManagerService;
use Ling\SimplePdoWrapper\Util\Where;


/**
 * The StoreApiController class.
 *
 * All methods of this class are alcp ends for clients.
 *
 *
 */
class StoreApiController extends LightController
{


    /**
     * Executes the action given in the GET parameters and returns a response.
     *
     * The "action" parameter should be present in GET.
     *
     * This is designed as a hub/proxy for all the other methods of this class.
     *
     * It's basically the only method that we expose publicly.
     *
     *
     *
     * @param HttpRequestInterface $request
     * @return HttpResponseInterface
     */
    public function execute(HttpRequestInterface $request): HttpResponseInterface
    {
        $action = $request->getGetValue("action", false) ?? "undefined";


        try {

            // alcp actions
            switch ($action) {
                case "addToCart":
                    return $this->addToCart($request);
                case "changePassword":
                    return $this->changePassword($request);
                case "createUpdateAddress":
                    return $this->createUpdateAddress($request);
                case "disconnect":
                    return $this->disconnect($request);
                case "initPayment":
                    return $this->initPayment($request);
                case "registerWebsite":
                    return $this->registerWebsite($request);
                case "removeCartItem":
                    return $this->removeCartItem($request);
                case "resetPassword":
                    return $this->sendResetPasswordEmail($request);
                case "selectPaymentMethod":
                    return $this->selectPaymentMethod($request);
                case "signIn":
                    return $this->signIn($request);
                case "signUp":
                    return $this->signUp($request);
                case "updateBillingInfo":
                    return $this->updateBillingInfo($request);
            }
        } catch (\Exception $e) {

            /**
             * @var $_lo LightLoggerService
             */
            $_lo = $this->getContainer()->get("logger");
            $_lo->error($e);

            return HttpJsonResponse::create([
                "type" => "error",
                "error" => "Oops, an unexpected error occurred. We're working on it right now. Try again later, or contact us. Sorry for the inconvenience.",
            ]);
        }


        // other action types
        switch ($action) {
            default:
                return new HttpResponse("Unknown action: $action.", 404);
                break;
        }
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Disconnects the user, and returns a successful @page(alcp response).
     *
     * @param HttpRequestInterface $request
     * @return HttpJsonResponse
     * @throws \Exception
     */
    private function disconnect(HttpRequestInterface $request): HttpJsonResponse
    {
        /**
         * @var $_um LightUserManagerService
         */
        $_um = $this->getContainer()->get("user_manager");
        $user = $_um->getOpenUser();


        LightKitStoreRememberMeHelper::destroyTokenByValidUser($this->getContainer(), $user);

        $user->disconnect();


        return HttpJsonResponse::create([
            "type" => "success",
        ]);

    }

    /**
     * Initializes the payment phase (when the user clicks the pay button).
     *
     * It does the following:
     *
     * - check that the checkoutCart is correct (i.e., selected payment method and selected billing address, cart contains at least one item).
     * - select the correct payment method handler and triggers its placeOrder method.
     *      If the return of this call is of behaviour openGui, an extra "payment_method" property is returned with the response, which
     *      value is the identifier of the solution provider's payment method.
     *
     *
     * This is an @page(alcp service).
     *
     *
     *
     *
     *
     * @param HttpRequestInterface $request
     * @return HttpJsonResponse
     * @throws \Exception
     */
    private function initPayment(HttpRequestInterface $request): HttpJsonResponse
    {
        /**
         * @var $_um LightUserManagerService
         */
        $_um = $this->getContainer()->get("user_manager");
        $user = $_um->getOpenUser();


        $checkoutCart = LightKitStoreCheckoutCartHelper::getCart();

        $error = null;
        $behaviour = null;
        $extraData = [];


        if (null === $checkoutCart['payment_method']) {
            $error = "Please select a payment method.";
        } elseif (null === $checkoutCart['billing_address']) {
            if (true === $user->isValid()) {
                $error = "Please choose a billing address.";
            } else {
                $error = "Please enter a billing address.";
            }
        } else {

            $paymentInfo = [
                'amount' => $checkoutCart['cartItemsInfo']["total"],
                'currency' => "EUR",
            ];

            $paymentMethodIdentifier = $checkoutCart['payment_method']['identifier'] ?? null;

            /**
             * @var $_pm LightPaymentMethodsService
             */
            $_pm = $this->getContainer()->get("payment_methods");
            $paymentMethodHandlers = $_pm->getHandlers();


            // find the payment method handler
            $chosenPaymentMethodHandler = null;
            $chosenPaymentMethodHandlerIdentifier = null;
            foreach ($paymentMethodHandlers as $identifier => $handler) {
                if ($paymentMethodIdentifier === $identifier) {
                    $chosenPaymentMethodHandler = $handler;
                    $chosenPaymentMethodHandlerIdentifier = $identifier;
                    break;
                }
            }


            //--------------------------------------------
            // PAYMENT METHOD HANDLER ROUTINE
            //--------------------------------------------
            if (null !== $chosenPaymentMethodHandler) {
                $info = $chosenPaymentMethodHandler->placeOrder($paymentInfo);
                if (null !== $info) {
                    if ("success" === $info['type']) {

                        $behaviour = $info['behaviour'];

                        switch ($behaviour) {
                            case "openGui":
                                $extraData = [
                                    "payment_method" => $chosenPaymentMethodHandlerIdentifier,
                                ];
                                break;
                            default:
                                throw new LightKitStoreException("Not handled yet, case without useGui=true.");
                        }
                    } else {
                        $error = $info['error'];
                    }
                }
            } else {
                $error = "No payment method handler found with identifier $paymentMethodIdentifier.";
            }


        }


        //--------------------------------------------
        // ending
        //--------------------------------------------
        if (null !== $error) {
            $response = [
                "type" => "error",
                "error" => $error,

            ];
        } else {
            $response = array_merge([
                "type" => "success",
                "behaviour" => $behaviour,
            ], $extraData);
        }


        return HttpJsonResponse::create($response);

    }


    /**
     * Updates the password of the connected user.
     *
     * This is an @page(alcp service).
     *
     *
     * Expected parameters are:
     *
     * - password
     * - password_confirm
     *
     * If those two are given and match, then the password of the connected user will be updated.
     *
     * If the user is not connected, this alcp service returns an erroneous response.
     *
     *
     * The password cannot be empty.
     *
     * The password is trimmed.
     *
     * In case of success, a "message" property contains the success message.
     *
     *
     * @param HttpRequestInterface $request
     * @return HttpJsonResponse
     * @throws \Exception
     */
    private function changePassword(HttpRequestInterface $request): HttpJsonResponse
    {

        $error = null;
        $successMsg = null;

        /**
         * @var $_um LightUserManagerService
         */
        $_um = $this->getContainer()->get("user_manager");
        $user = $_um->getOpenUser();

        if (true === $user->isValid()) {

            $password = $request->getPostValue("password", false) ?? "";
            $passwordConfirm = $request->getPostValue("password_confirm", false) ?? "";

            $password = trim($password);
            $passwordConfirm = trim($passwordConfirm);


            if ('' !== $password) {
                if ($passwordConfirm === $password) {


                    /**
                     * @var $_ks LightKitStoreService
                     */
                    $_ks = $this->getContainer()->get("kit_store");
                    $userApi = $_ks->getFactory()->getUserApi();
                    $userApi->updatePassword($password);


                    $successMsg = "Your password has been updated :)";


                } else {
                    $error = "The passwords don't match.";
                }
            } else {
                $error = "The password cannot be empty.";
            }
        } else {
            $error = "The user is not connected.";
        }


        //--------------------------------------------
        // ending
        //--------------------------------------------
        if (null !== $error) {
            $response = [
                "type" => "error",
                "error" => $error,

            ];
        } else {
            $response = [
                "type" => "success",
                "message" => $successMsg,
            ];
        }


        return HttpJsonResponse::create($response);

    }

    /**
     * Creates/updates an address for the visitor/connected user.
     *
     * This is an @page(alcp service).
     *
     *
     * Expected parameters are:
     *
     * - country
     * - full_name
     * - address_line_1
     * - address_line_2
     * - city
     * - state
     * - zip
     * - phone
     * - is_default: 0|1 = 0 (only relevant for users, not visitors)
     * - type: insert|update=insert
     *
     *
     * All must be not empty, except for the following:
     * - address_line_2
     * - phone
     *
     *
     * If the user is connected, the address is added in the database.
     * By default, the address is also added in the checkout cart's billing_address property (so that both the
     * user and/or the visitor can make a purchase).
     *
     * In case of success, the following params will be available:
     *
     * - billingAddress: the billing address as stored in the LightKitStoreCheckoutCartHelper class.
     *
     *
     *
     *
     * @param HttpRequestInterface $request
     * @return HttpJsonResponse
     * @throws \Exception
     */
    private function createUpdateAddress(HttpRequestInterface $request): HttpJsonResponse
    {

        $errorLabels = [];
        $errorIds = [];
        $billingAddress = null;


        $country = trim($request->getPostValue("country"));
        $full_name = trim($request->getPostValue("full_name"));
        $address_line_1 = trim($request->getPostValue("address_line_1"));
        $address_line_2 = trim($request->getPostValue("address_line_2"));
        $city = trim($request->getPostValue("city"));
        $state = trim($request->getPostValue("state"));
        $zip = trim($request->getPostValue("zip"));
        $phone = trim($request->getPostValue("phone"));
        $is_default = $request->getPostValue("is_default") ?? "0";
        $type = $request->getPostValue("type") ?? "insert";

        $countryList = IsoCountryTool::getCountryList();

        if (array_key_exists($country, $countryList)) {
            if ('' !== $full_name) {
                if ('' !== $address_line_1) {
                    if ('' !== $city) {
                        if ('' !== $state) {
                            if ('' !== $zip) {

                                $billingAddress = [
                                    "full_name" => $full_name,
                                    "address_line_1" => $address_line_1,
                                    "address_line_2" => $address_line_2,
                                    "zip_postal_code" => $zip,
                                    "city" => $city,
                                    "state_province_region" => $state,
                                    "country" => $country,
                                    "phone" => $phone,
                                ];


                                /**
                                 * @var $_um LightUserManagerService
                                 */
                                $_um = $this->getContainer()->get("user_manager");
                                $user = $_um->getOpenUser();
                                LightKitStoreCheckoutCartHelper::setCartProperty("billing_address", $billingAddress);


                                if (true === $user->isValid()) {
                                    azf("todo here, with valid user");
                                }


                            } else {
                                $errorLabels[] = "The zip code is empty";
                                $errorIds[] = "zip_code";
                            }
                        } else {
                            $errorLabels[] = "Type a state/province/region";
                            $errorIds[] = "state_province_region";
                        }
                    } else {
                        $errorLabels[] = "Type a city";
                        $errorIds[] = "city";
                    }
                } else {
                    $errorLabels[] = "The address line 1 is empty";
                    $errorIds[] = "address_line_1";
                }
            } else {
                $errorLabels[] = "The full name is empty";
                $errorIds[] = "full_name";
            }
        } else {
            $errorLabels[] = "Select a country";
            $errorIds[] = "country";
        }


        //--------------------------------------------
        // ending
        //--------------------------------------------
        if ($errorLabels) {
            $response = [
                "type" => "error",
                "error" => HtmlTool::arrayToHtmlList($errorLabels),
                "errorIds" => $errorIds,

            ];
        } else {
            $response = [
                "type" => "success",
                "billing_address" => $billingAddress,
            ];
        }


        return HttpJsonResponse::create($response);

    }

    /**
     * Updates the billing info of the connected user.
     *
     * This is an @page(alcp service).
     *
     *
     * Expected parameters are:
     *
     * - company
     * - first_name
     * - last_name
     * - address
     * - zip_postal_code
     * - city
     * - state_province_region
     * - country
     * - phone
     *
     * All values are set to an empty string by default.
     *
     * If the user is not connected, this alcp service returns an erroneous response.
     *
     * In case of success, a "message" property contains the success message.
     *
     *
     *
     *
     * @param HttpRequestInterface $request
     * @return HttpJsonResponse
     * @throws \Exception
     */
    private function updateBillingInfo(HttpRequestInterface $request): HttpJsonResponse
    {
        $error = null;
        $successMsg = null;

        /**
         * @var $_um LightUserManagerService
         */
        $_um = $this->getContainer()->get("user_manager");
        $user = $_um->getOpenUser();

        if (true === $user->isValid()) {

            $company = $request->getPostValue("company", false) ?? "";
            $firstName = $request->getPostValue("first_name", false) ?? "";
            $lastName = $request->getPostValue("last_name", false) ?? "";
            $address = $request->getPostValue("address", false) ?? "";
            $zip = $request->getPostValue("zip_postal_code", false) ?? "";
            $city = $request->getPostValue("city", false) ?? "";
            $state = $request->getPostValue("state_province_region", false) ?? "";
            $country = $request->getPostValue("country", false) ?? "";
            $phone = $request->getPostValue("phone", false) ?? "";


            /**
             * @var $_ks LightKitStoreService
             */
            $_ks = $this->getContainer()->get("kit_store");
            $userApi = $_ks->getFactory()->getUserApi();


            $userApi->updateUserById($user->getProp("id"), [
                'company' => $company,
                'first_name' => $firstName,
                'last_name' => $lastName,
                'address' => $address,
                'zip_postal_code' => $zip,
                'city' => $city,
                'state_province_region' => $state,
                'country' => $country,
                'phone' => $phone,
            ]);
            $successMsg = "Your billing information has been updated :)";

        } else {
            $error = "The user is not connected.";
        }


        //--------------------------------------------
        //
        //--------------------------------------------
        if (null !== $error) {
            $response = [
                "type" => "error",
                "error" => $error,

            ];
        } else {
            $response = [
                "type" => "success",
                "message" => $successMsg,
            ];
        }


        return HttpJsonResponse::create($response);

    }


    /**
     * Registers a website to the store database, and returns an @page(alcp response).
     * work in progress...
     *
     *
     * @param HttpRequestInterface $request
     * @return HttpJsonResponse
     */
    private function registerWebsite(HttpRequestInterface $request): HttpJsonResponse
    {

        /**
         * todo: here... open new window (kit_store), and continue implementing "install item process", see config/open/Ling.Light_Kit_Editor to resume ideas...
         * todo: here... open new window (kit_store), and continue implementing "install item process", see config/open/Ling.Light_Kit_Editor to resume ideas...
         * todo: here... open new window (kit_store), and continue implementing "install item process", see config/open/Ling.Light_Kit_Editor to resume ideas...
         * todo: here... open new window (kit_store), and continue implementing "install item process", see config/open/Ling.Light_Kit_Editor to resume ideas...
         */
        return HttpJsonResponse::create([
            "type" => "success",
            "content" => "Boris à la plage",
        ]);
    }


    /**
     * Signs up a new user.
     * This method can be called via ajax from a client website.
     *
     * See the @page(Light_Kit_Store conception notes) for more details.
     *
     * The response is an basic @page(alcp response).
     *
     *
     * Note that we use the google recaptcha v3 system.
     *
     *
     * The expected parameters for the request are:
     *
     * - email
     * - password
     * - password_confirm
     * - g-recaptcha-response
     *
     *
     *
     *
     * @param HttpRequestInterface $request
     * @return HttpJsonResponse
     */
    private function signUp(HttpRequestInterface $request): HttpJsonResponse
    {


        $email = $request->getPostValue("email", false) ?? "";
        $password = $request->getPostValue("password", false) ?? "";
        $passwordConfirm = $request->getPostValue("password_confirm", false) ?? "";
        $recaptcha = $request->getPostValue("g-recaptcha-response", false) ?? "";


        $error = null;
        $successMsg = null;

        if ('' !== $recaptcha) {


            /**
             * @var $_pv LightProjectVarsService
             */
            $_pv = $this->getContainer()->get("project_vars");

            $projectName = $_pv->getVariable("project_name");


            /**
             * @var $_ks LightKitStoreService
             */
            $_ks = $this->getContainer()->get("kit_store");
            $secret = $_ks->getRecaptchaKey($projectName, false);


            $s = HttpTool::post("https://www.google.com/recaptcha/api/siteverify", [
                'secret' => $secret,
                'response' => $recaptcha,
            ]);

            $arr = [];
            if (false !== $s) {
                $arr = (array)json_decode($s);
            }


            if ($arr) {

                $success = $arr['success'] ?? false;
                if (true === $success) {


                    if ('' !== $email) {
                        if (true === ValidationTool::isEmail($email)) {
                            if ("" !== $password) {
                                if ($password === $passwordConfirm) {


                                    /**
                                     * @var $kit_store LightKitStoreService
                                     */
                                    $kit_store = $this->getContainer()->get("kit_store");
                                    $userApi = $kit_store->getFactory()->getUserApi();
                                    $res = $userApi->getUser(Where::inst()->key("email")->equals($email));
                                    if (null === $res) {
                                        // all good.

                                        $password = LightKitStorePasswordHelper::encrypt($password);


                                        //--------------------------------------------
                                        // SIGN UP MODES
                                        //--------------------------------------------
                                        $active = 0;
                                        $signupToken = "";
                                        $signupTokenTime = null;
                                        $signupMode = $_ks->getOption("signup_mode", LightKitStoreOptionHelper::SIGNUP_MODE);
                                        switch ($signupMode) {
                                            case "direct":
                                                $active = 1;
                                                $successMsg = "You've signed up successfully. You can now log in :)";
                                                break;
                                            case "mail":
                                                $signupToken = $_ks->generateUserToken();
                                                $signupTokenTime = date("Y-m-d H:i:s");
                                                $active = 2;
                                                break;
                                            case "moderator":
                                                $active = 3;
                                                $successMsg = "Your request has been registered. A moderator will confirm your account. You will be notified by email.";
                                                break;
                                            default:
                                                $error = "Unknown signup_mode: $signupMode."; // we could change the public message too, but that's ok for now...
                                                $this->logError(__METHOD__ . ": $error");
                                                break;
                                        }


                                        if (null === $error) {
                                            $userId = $userApi->insertUser([
                                                "email" => $email,
                                                "password" => $password,
                                                "signup_token" => $signupToken,
                                                "signup_token_time" => $signupTokenTime,
                                                "active" => $active,
                                            ]);

                                            if ('mail' === $signupMode) {


                                                /**
                                                 * @var $_m LightMailerService
                                                 */
                                                $_m = $this->getContainer()->get("mailer");


                                                /**
                                                 * @var $_pv LightProjectVarsService
                                                 */
                                                $_pv = $this->getContainer()->get("project_vars");


                                                /**
                                                 * @var $_rr LightReverseRouterService
                                                 */
                                                $_rr = $this->getContainer()->get("reverse_router");

                                                $targetUrl = $_rr->getUrl("lks_route-your_account_confirmed", [
                                                    "token" => $signupToken,
                                                ], true);


                                                /**
                                                 * @var $_ms LightMailStatsService
                                                 */
                                                $_ms = $this->getContainer()->get("mail_stats");
                                                $clickTrackerUrl = $_ms->createClickTracker("kitstore.confirm_user_subscription", $targetUrl);
                                                $openTrackerImg = $_ms->createOpenTracker("kitstore.confirm_user_subscription");


                                                $nbSent = $_m->send("Ling.Light_Kit_Store/confirm_user_subscription", $email, [
                                                    'vars' => [
                                                        "fullDate" => date("Y-m-d H:i:s"),
                                                        "link" => $clickTrackerUrl,
                                                        "website" => $_pv->getVariable("website"),
                                                        "tracker" => $openTrackerImg,
                                                    ],
                                                ]);


                                                $successMsg = "Almost there! Check your email to confirm your account.";
                                            }

                                        }


                                    } else {
                                        $error = "An user already exists with the email $email.";
                                    }
                                } else {
                                    $error = "Passwords don't match.";
                                }
                            } else {
                                $error = "The password cannot be empty.";
                            }
                        } else {
                            $error = "Invalid email: $email.";
                        }
                    } else {
                        $error = "The email cannot be empty.";
                    }
                } else {
                    $error = "The recaptcha test failed.";
                }
            } else {
                $error = "The recaptcha's server response was empty.";
            }
        } else {
            $error = "The recaptcha cannot be empty.";
        }


        if (null !== $error) {
            $response = [
                "type" => "error",
                "error" => $error,

            ];
        } else {
            $response = [
                "type" => "success",
                "message" => $successMsg,
            ];
        }


        return HttpJsonResponse::create($response);
    }


    /**
     * Sets a payment method in the checkout cart.
     *
     * See the @page(Light_Kit_Store conception notes) for more details.
     *
     * The response is an basic @page(alcp response).
     *
     * Expected parameters are:
     *
     * - identifier: string, the payment method identifier.
     *
     *
     *
     * @param HttpRequestInterface $request
     * @return HttpJsonResponse
     */
    private function selectPaymentMethod(HttpRequestInterface $request): HttpJsonResponse
    {


        $identifier = $request->getPostValue("identifier") ?? null;
        $error = null;


        if (null !== $identifier) {
            $paymentMethod = [
                "identifier" => $identifier,
            ];
            LightKitStoreCheckoutCartHelper::setCartProperty("payment_method", $paymentMethod);
        } else {
            $error = "Identifier missing.";
        }


        //--------------------------------------------
        // ending
        //--------------------------------------------
        if (null !== $error) {
            $response = [
                "type" => "error",
                "error" => $error,

            ];
        } else {
            $response = [
                "type" => "success",
                "identifier" => $identifier,
            ];
        }


        return HttpJsonResponse::create($response);
    }


    /**
     * Signs in a user.
     *
     * See the @page(Light_Kit_Store conception notes) for more details.
     *
     * The response is an basic @page(alcp response).
     *
     *
     *
     *
     *
     *
     * @param HttpRequestInterface $request
     * @return HttpJsonResponse
     */
    private function signIn(HttpRequestInterface $request): HttpJsonResponse
    {


        $email = $request->getPostValue("email", false) ?? "";
        $password = $request->getPostValue("password", false) ?? "";
        $rememberMe = ConvertTool::toBoolean($request->getPostValue("remember_me", false)) ?? false;


        $error = null;
        $token = null;


        if ('' !== $email) {
            if ("" !== $password) {
                /**
                 * @var $kit_store LightKitStoreService
                 */
                $kit_store = $this->getContainer()->get("kit_store");


                $userApi = $kit_store->getFactory()->getUserApi();
                $res = $userApi->getUser(Where::inst()
                    ->key("email")->equals($email)
                );


                if (null !== $res) {

                    if ('1' === $res['active']) {

                        if (true === LightKitStorePasswordHelper::passwordVerify($password, $res['password'])) {


                            // all good.


                            $token = $kit_store->generateUserToken();
                            $now = date("Y-m-d H:i:s");

                            $userApi->updateUserById($res['id'], [
                                'token' => $token,
                                'token_first_connection_time' => $now,
                                'token_last_connection_time' => $now,
                            ]);


                            /**
                             * @var $_um LightUserManagerService
                             */
                            $_um = $this->getContainer()->get("user_manager");
                            $user = $_um->getOpenUser();
                            LightKitStoreUserHelper::setUserPropsFromRow($user, $res);
                            $user->connect();


                            if (true === $rememberMe) {
                                $rememberMeToken = LightKitStoreRememberMeHelper::generateRememberMeToken();
                                LightKitStoreRememberMeHelper::spreadTokenByValidUser($this->getContainer(), $user, $rememberMeToken);
                            }


                        } else {
                            $error = "No user found with the given credentials.";
                        }

                    } else {
                        $active = $res['active'];
                        switch ($active) {
                            case "2":
                                $error = "This user has not confirmed his/her registration sent by email.";
                                break;
                            case "3":
                                $error = "This user's registration is pending. A moderator shall confirm this account soon.";
                                break;
                            default:
                                $error = "This user is not active.";
                                break;
                        }
                    }
                } else {
                    $error = "No user found with the given credentials.";
                }

            } else {
                $error = "The password cannot be empty.";
            }
        } else {
            $error = "The email cannot be empty.";
        }

        if (null !== $error) {
            $response = [
                "type" => "error",
                "error" => $error,

            ];
        } else {
            $response = [
                "type" => "success",
                "token" => $token,
            ];
        }


        return HttpJsonResponse::create($response);
    }


    /**
     * Sends an email to the user, which contains a link to reset his/her password.
     *
     * See the @page(Light_Kit_Store conception notes) for more details.
     *
     *
     * This is a @page(alcp service).
     *
     *
     * Expected request parameters:
     *
     * - email
     *
     * Possible errors:
     *
     * - x field missing
     * - unknown email
     *
     *
     *
     *
     *
     * @param HttpRequestInterface $request
     * @return HttpJsonResponse
     */
    private function sendResetPasswordEmail(HttpRequestInterface $request): HttpJsonResponse
    {
        $email = $request->getPostValue("email", false);
        $error = null;


        if (null !== $email) {
            /**
             * @var $kit_store LightKitStoreService
             */
            $kit_store = $this->getContainer()->get("kit_store");

            $userApi = $kit_store->getFactory()->getUserApi();
            $res = $userApi->getUser(Where::inst()
                ->key("email")->equals($email)
            );

            if (null !== $res) {

                $datetime = DateTool::getMysqlDatetime();

                /**
                 * @var $_m LightMailerService
                 */
                $_m = $this->getContainer()->get("mailer");


                try {


                    // set resetPassword token
                    $resetPasswordToken = HashTool::getRandomHash64();
                    $userApi->updateUserById($res["id"], [
                        "reset_password_token" => $resetPasswordToken,
                        "reset_password_token_time" => $datetime,
                    ]);


                    /**
                     * @var $_rr LightReverseRouterService
                     */
                    $_rr = $this->getContainer()->get("reverse_router");
                    $url = $_rr->getUrl("lks_route-your_new_password", [
                        "token" => $resetPasswordToken,
                    ], true);


                    /**
                     * @var $_ms LightMailStatsService
                     */
                    $_ms = $this->getContainer()->get("mail_stats");
                    $clickTrackerUrl = $_ms->createClickTracker("kitstore.reset_password", $url);
                    $openTrackerImg = $_ms->createOpenTracker("kitstore.reset_password");


                    $nbSent = $_m->send("Ling.Light_Kit_Store/reset_password", $email, [
                        'vars' => [
                            "fullDate" => $datetime,
                            "link" => $clickTrackerUrl,
                            "tracker" => $openTrackerImg,
                        ],
                    ]);


                    if ($nbSent > 0) {

                    } else {
                        $error = "The mail couldn't be sent: $email.";
                    }
                } catch (\Exception $e) {
                    $error = "Error with mailer: " . $e->getMessage();
                }

            } else {
                $error = "Unknown email: $email.";
            }
        } else {
            $error = "The email is missing.";
        }

        if (null !== $error) {
            $response = [
                "type" => "error",
                "error" => $error,

            ];
        } else {
            $response = [
                "type" => "success",
            ];
        }


        return HttpJsonResponse::create($response);
    }


    /**
     *
     * Adds an item to the cart.
     * If the user/visitor already has the item in his cart, this method does nothing, but returns a success response.
     *
     *
     *
     * This is a @page(alcp service).
     *
     * Expected post params are:
     * - id: int, the item id
     * - quantity: int=1
     *
     *
     *
     *
     * @param HttpRequestInterface $request
     * @return HttpJsonResponse
     */
    private function addToCart(HttpRequestInterface $request): HttpJsonResponse
    {
        $id = $request->getPostValue("id");
//        $quantity = $request->getPostValue("quantity")??1;
        $quantity = 1; // for now in kit store we only have virtual products, quantity doesn't make too much sense.


        $error = null;


        if (null !== $id) {


            /**
             * @var $_ks LightKitStoreService
             */
            $_ks = $this->getContainer()->get("kit_store");
            $uciApi = $_ks->getFactory()->getCartItemApi();

            if (false === $uciApi->userOrVisitorHasCartItem($id)) {
                /**
                 * @var $_um LightUserManagerService
                 */
                $_um = $this->getContainer()->get("user_manager");
                $user = $_um->getOpenUser();

                $userId = null;
                if (true === $user->isValid()) {
                    $userId = (int)$user->getProp("id");
                }

                $uciApi = $_ks->getFactory()->getCartItemApi();
                $insertedId = $uciApi->insertCartItem([
                    "user_id" => $userId,
                    "visitor_identifier" => $_ks->getVisitorIdentifier(),
                    "item_id" => (int)$id,
                    "quantity" => $quantity,
                ]);
            }

        } else {
            $error = "Id missing.";
        }

        if (null !== $error) {
            $response = [
                "type" => "error",
                "error" => $error,

            ];
        } else {
            $response = [
                "type" => "success",
            ];
        }


        return HttpJsonResponse::create($response);
    }


    /**
     *
     * Removes an item from the cart.
     *
     *
     * This is a @page(alcp service).
     *
     * Expected post params are:
     * - id: int, the item id
     *
     *
     *
     *
     * @param HttpRequestInterface $request
     * @return HttpJsonResponse
     */
    private function removeCartItem(HttpRequestInterface $request): HttpJsonResponse
    {
        $id = $request->getPostValue("id");

        $error = null;


        if (null !== $id) {


            /**
             * @var $_ks LightKitStoreService
             */
            $_ks = $this->getContainer()->get("kit_store");
            $uciApi = $_ks->getFactory()->getCartItemApi();
            $uciApi->removeCartItem($id);


        } else {
            $error = "Id missing.";
        }

        if (null !== $error) {
            $response = [
                "type" => "error",
                "error" => $error,

            ];
        } else {
            $response = [
                "type" => "success",
                "data" => LightKitStoreCartHelper::getCartInfo($this->getContainer(), true),
            ];
        }


        return HttpJsonResponse::create($response);
    }


}

