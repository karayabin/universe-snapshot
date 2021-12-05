<?php


namespace Ling\Light_Kit_Store\Controller\Front;


use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_Kit_Store\Controller\StoreBaseController;
use Ling\Light_Kit_Store\Helper\LightKitStorePasswordHelper;
use Ling\Light_Kit_Store\Helper\LightKitStoreUserHelper;
use Ling\Light_Kit_Store\Service\LightKitStoreService;


/**
 * The StoreYourNewPasswordController class.
 */
class StoreYourNewPasswordController extends StoreBaseController
{


    /**
     * Renders the "your new password" page, and returns the appropriate http response.
     *
     * @param HttpRequestInterface $request
     * @return HttpResponseInterface
     */
    public function render(HttpRequestInterface $request): HttpResponseInterface
    {


        //--------------------------------------------
        // CONFIG
        //--------------------------------------------
        $maxTokenDuration = 60 * 10; // 10 minutes before token expires


        //--------------------------------------------
        // SCRIPT
        //--------------------------------------------
        $error = null;
        $token = $request->getGetValue("token", false);
        $plainPassword = null;


        if (null !== $token) {


            /**
             * @var $_ks LightKitStoreService
             */
            $_ks = $this->getContainer()->get("kit_store");
            $factory = $_ks->getFactory();
            $userApi = $factory->getUserApi();
            $userRow = $userApi->getUserByToken($token, "reset_password");
            if (null !== $userRow) {

                $now = time();

                $tokenDatetime = $userRow['reset_password_token_time'] ?? "1978-06-05 04:55:00";
                $tokenTime = strtotime($tokenDatetime);
                if ($now < $tokenTime + $maxTokenDuration) {
                    $plainPassword = LightKitStoreUserHelper::generateUserPassword();
                    $userApi->updateUserById($userRow['id'], [
                        "password" => LightKitStorePasswordHelper::encrypt($plainPassword),
                        "reset_password_token" => "",
                        "reset_password_token_time" => null,
                    ]);

                } else {
                    $error = "Token expired.";
                }


            } else {
                $error = "Invalid token provided.";
            }
        } else {
            $error = "No token provided.";
        }


        return $this->renderPage("Ling.Light_Kit_Store/your_new_password", [
            "widgetVariables" => [
                "body.kitstore_your_new_password" => [
                    "error" => $error,
                    "password" => $plainPassword,
                ],
            ],
        ]);
    }

}

