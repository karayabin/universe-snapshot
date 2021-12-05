<?php


namespace Ling\Light_Kit_Store\Controller\Front;


use Ling\Light\Http\HttpRedirectResponse;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_Kit_Store\Controller\StoreBaseController;
use Ling\Light_Kit_Store\Helper\LightKitStoreTokenHelper;
use Ling\Light_ReverseRouter\Service\LightReverseRouterService;


/**
 * The YourAccountConfirmed class.
 */
class YourAccountConfirmed extends StoreBaseController
{


    /**
     * Renders the 404 page, and returns the appropriate http response.
     *
     * @param HttpRequestInterface $request
     * @return HttpResponseInterface
     */
    public function render(HttpRequestInterface $request): HttpResponseInterface
    {
        $error = null;

        $token = $request->getGetValue("token", false);
        $success = $request->getGetValue("success", false);

        if (null !== $success) {

        } elseif (null !== $token) {


            $_ks = $this->getKitStoreService();
            $userApi = $_ks->getFactory()->getUserApi();
            $userRow = $userApi->getUserByToken($token, "signup");
            if (null !== $userRow) {


                if ("1" !== $userRow['active']) {


                    $tokenTime = strtotime($userRow['signup_token_time']);
                    $deadline = $tokenTime + LightKitStoreTokenHelper::getTokenDuration();
                    $now = time();

                    if ($now <= $deadline) {


                        $userApi->updateUserById($userRow['id'], [
                            "active" => 1,
                        ]);


                        /**
                         * @var $rr LightReverseRouterService
                         */
                        $rr = $this->getContainer()->get("reverse_router");
                        $routeName = "lks_route-your_account_confirmed";
                        $urlParams = [
                            "success" => true,
                        ];
                        $url = $rr->getUrl($routeName, $urlParams, true);
                        return HttpRedirectResponse::create($url);
                    } else {
                        $error = "This token has expired. Consider creating a new one.";
                    }
                } else {
                    $error = "This account is already active.";
                }

            } else {
                $error = "Invalid token: $token.";
            }
        } else {
            $error = "Token parameter missing.";
        }


        return $this->renderPage("Ling.Light_Kit_Store/your_account_confirmed", [
            "widgetVariables" => [
                "body.kitstore_your_account_confirmed" => [
                    "error" => $error,
                ],
            ],
        ]);
    }

}

