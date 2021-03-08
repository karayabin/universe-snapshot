<?php


namespace Ling\Light_Kit_Admin\Controller;


use Ling\Bat\CookieTool;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_Events\Helper\LightEventsHelper;
use Ling\Light_Kit\PageConfigurationUpdator\PageConfUpdator;
use Ling\Light_UserDatabase\LightUserDatabaseInterface;

/**
 * The LoginFormController class.
 */
class LoginFormController extends LightKitAdminController
{


    /**
     * Renders the login form, and handles it.
     * If an user connects successfully, she will be redirected to the page defined in the service configuration
     * by the login.on_success_route option.
     *
     *
     *
     * @return string|HttpResponseInterface
     * @throws \Exception
     */
    public function render()
    {


        $updator = null;
        $rememberMe = (bool)($_POST['remember_me'] ?? false);

        if (
            array_key_exists("zeroadmin_login_form", $_POST) &&
            array_key_exists("username", $_POST) &&
            array_key_exists("password", $_POST)
        ) {
            $userName = $_POST['username'];
            $password = $_POST['password'];


            /**
             * @var $userDb LightUserDatabaseInterface
             */
            $userDb = $this->getContainer()->get('user_database');

            $userInfo = $userDb->getUserInfoByCredentials($userName, $password);

            if (false !== $userInfo) {
                //--------------------------------------------
                // ON FORM VALID
                //--------------------------------------------

                //--------------------------------------------
                // CONNECTING THE USER
                //--------------------------------------------
                $user = $this->getUser();

                $user->setId($userInfo['id']);
                $user->setIdentifier($userInfo['identifier']);
                $user->setEmail($userInfo['email']);
                $user->setPseudo($userInfo['pseudo']);
                $user->setAvatarUrl($userInfo['avatar_url']);
                $user->setRights($userInfo['rights']);
                $user->setExtra($userInfo['extra']);
                $user->connect();


                if (session_status() === PHP_SESSION_NONE) { // reduce risk of session fixation
                    session_start();
                    session_regenerate_id();
                }


                if (true === $rememberMe) {
                    $cookieNbDays = 365;
                    CookieTool::add('lka-login-remember_me-username', $userName, $cookieNbDays);
                    CookieTool::add('lka-login-remember_me-password', $password, $cookieNbDays);
                } else {
                    CookieTool::delete([
                        'lka-login-remember_me-username',
                        'lka-login-remember_me-password',
                    ]);
                }


                //--------------------------------------------
                // HOOKS
                //--------------------------------------------
                LightEventsHelper::dispatchEvent($this->getContainer(), "Light_Kit_Admin.on_user_successful_connexion", [
                    'user' => $user,
                ]);


                //--------------------------------------------
                // REDIRECTING THE CONNECTED USER
                //--------------------------------------------
                $redirectRoute = $this->getKitAdmin()->getOption("login.on_success_route");
                return $this->getRedirectResponseByRoute($redirectRoute);

            } else {

                //--------------------------------------------
                // ON FORM NOT VALID
                //--------------------------------------------
                // update the widget's template
                $updator = PageConfUpdator::create();
                $updates = [
                    "zones" => [
                        "body" => [
                            0 => [
                                "vars" => [
                                    "field_username" => [
                                        "value" => $_POST['username'],
                                    ],
                                    "field_password" => [
                                        "value" => $_POST['password'],
                                    ],
                                    "error_no_match_show" => true,
                                ],
                            ],
                        ],
                    ],
                ];
                $updator->setMergeArray($updates);
            }
        } else {
            //--------------------------------------------
            // FORM NOT POSTED YET, DO WE INFER VALUES FROM COOKIES?
            //--------------------------------------------
            if (true === CookieTool::has("lka-login-remember_me-username")) {
                $userName = CookieTool::get("lka-login-remember_me-username");
                $password = CookieTool::get("lka-login-remember_me-password");
                $updator = PageConfUpdator::create();
                $updates = [
                    "zones" => [
                        "body" => [
                            0 => [
                                "vars" => [
                                    "field_username" => [
                                        "value" => $userName,
                                    ],
                                    "field_password" => [
                                        "value" => $password,
                                    ],
                                    "field_remember_me" => [
                                        "value" => 1,
                                    ],
                                ],
                            ],
                        ],
                    ],
                ];
                $updator->setMergeArray($updates);
            }


        }


        return $this->renderPage('Light_Kit_Admin/kit/zeroadmin/zeroadmin_login', [], $updator);
    }
}