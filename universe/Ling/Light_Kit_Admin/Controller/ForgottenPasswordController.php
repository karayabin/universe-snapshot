<?php


namespace Ling\Light_Kit_Admin\Controller;


use Ling\Bat\RandomTool;
use Ling\Bat\ValidationTool;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_Mailer\Service\LightMailerService;
use Ling\Light_UserDatabase\Service\LightUserDatabaseService;

/**
 * The ForgottenPasswordController class.
 */
class ForgottenPasswordController extends LightKitAdminController
{


    /**
     * Renders the forgot password page and returns the result.
     *
     * @param HttpRequestInterface $httpRequest
     * @return string|HttpResponseInterface
     * @throws \Exception
     */
    public function render(HttpRequestInterface $httpRequest)
    {

        $email = "";
        $error = "";
        $hasMultipleAccounts = false;
        $userIdentifiers2Labels = [];
        $successMessage = null;
        $backToLoginUrl = $this->getContainer()->get("reverse_router")->getUrl("lka_route-login");


        if ("1" === $httpRequest->getPostValue("forgotten_password_key", false)) {


            $email = $httpRequest->getPostValue("email", false) ?? null;
            $userIdentifier = $httpRequest->getPostValue("user_identifier", false) ?? null;


            if (empty($email)) {
                $error = "The email can't be empty.";
            }

            if (false === ValidationTool::isEmail($email)) {
                $error = "The email is not valid.";
            }


            if ('' === $error) {
                $matchingUsers = $this->getContainer()->get("user_database")->getFactory()->getUserApi()->getUsersByEmail($email);
                if ($matchingUsers) {


                    $matchingUser = null;

                    if (count($matchingUsers) > 1) {
                        $hasMultipleAccounts = true;
                        foreach ($matchingUsers as $_matchingUser) {
                            $userIdentifiers2Labels[$_matchingUser['identifier']] = $_matchingUser['identifier'];
                            if (
                                null === $matchingUser &&
                                $userIdentifier === $_matchingUser['identifier']
                            ) {
                                $matchingUser = $_matchingUser;
                            }
                        }
                    } else {
                        $matchingUser = array_shift($matchingUsers);
                    }


                    //--------------------------------------------
                    // RESET THE PASSWORD AND SEND IT VIA EMAIL
                    //--------------------------------------------
                    if (null !== $matchingUser) {


                        $newPassword = RandomTool::randomPassword(20);

                        /**
                         * @var $ud LightUserDatabaseService
                         */
                        $ud = $this->getContainer()->get("user_database");
                        $ud->updateUserById($matchingUser['id'], [
                            'password' => $newPassword,
                        ]);


                        /**
                         * @var $mailer LightMailerService
                         */
                        $mailer = $this->getContainer()->get("mailer");
                        $mailer->send("Ling.Light_Kit_Admin/new_password", [$matchingUser['email']], [
                            'vars' => [
                                'datetime' => date('Y-m-d H:i:s'),
                                'user_identifier' => $matchingUser['identifier'],
                                'newPassword' => $newPassword,
                            ],
                        ]);

                        $successMessage = 'Your password has been reset and sent to your email address.';

                    }


                } else {
                    $error = "This email wasn't found in our database, please consider registering first.";
                }
            }

        }


        return $this->renderPage('Ling.Light_Kit_Admin/forgotten_password', [
            "inputEmailError" => $error,
            "inputEmailValue" => $email,
            "hasMultipleAccounts" => $hasMultipleAccounts,
            "userIdentifiers2Labels" => $userIdentifiers2Labels,
            "successMessage" => $successMessage,
            "backToLoginUrl" => $backToLoginUrl,
        ]);
    }
}