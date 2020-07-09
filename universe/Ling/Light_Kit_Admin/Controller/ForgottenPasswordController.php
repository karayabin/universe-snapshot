<?php


namespace Ling\Light_Kit_Admin\Controller;


use Ling\Bat\ValidationTool;
use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\Http\HttpResponseInterface;

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


        if ("1" === $httpRequest->getPostValue("forgotten_password_key", false)) {

            $email = $httpRequest->getPostValue("email", false) ?? null;
            if (empty($email)) {
                $error = "The email can't be empty.";
            }

            if (false === ValidationTool::isEmail($email)) {
                $error = "The email is not valid.";
            }


            if ('' === $error) {
                $matchingUsers = $this->getContainer()->get("user_database")->getFactory()->getUserApi()->getUsersByEmail($email);
                if ($matchingUsers) {

                    az($matchingUsers);


                } else {
                    $error = "This email wasn't found in our database, please consider registering first.";
                }
            }

        }


        return $this->renderPage('Light_Kit_Admin/kit/zeroadmin/zeroadmin_forgotten_password', [
            "inputEmailError" => $error,
            "inputEmailValue" => $email,
        ]);
    }
}