<?php


namespace Ling\Light_Kit_Admin\Controller\User;


use Ling\Bat\ArrayTool;
use Ling\Chloroform\Field\AjaxFileBoxField;
use Ling\Chloroform\Field\PasswordField;
use Ling\Chloroform\Field\StringField;
use Ling\CSRFTools\CSRFProtector;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_Flasher\Service\LightFlasher;
use Ling\Light_Kit_Admin\Chloroform\LightKitAdminChloroform;
use Ling\Light_Kit_Admin\Controller\AdminPageController;
use Ling\Light_Kit_Admin\Rights\RightsHelper;
use Ling\Light_User\WebsiteLightUser;
use Ling\Light_UserDatabase\LightWebsiteUserDatabaseInterface;
use Ling\WiseTool\WiseTool;

/**
 * The UserProfileController class.
 */
class UserProfileController extends AdminPageController
{

    /**
     * Renders the user profile page, where the user can change her profile.
     *
     * @return string|HttpResponseInterface
     * @throws \Exception
     */
    public function render()
    {


        $container = $this->getContainer();
        $flasher = $this->getFlasher();

        //--------------------------------------------
        // FORM FOR pseudo, password and avatar_url
        //--------------------------------------------

        /**
         * @var WebsiteLightUser
         */
        $user = $this->getUser();
        $pseudo = $user->getPseudo();
        $password = ""; // never show the password
        $avatar_url = $user->getAvatarUrl();


        //--------------------------------------------
        // FORM
        //--------------------------------------------
        $form = new LightKitAdminChloroform();
        $form->setFormId("user_profile");
        $form->addField(StringField::create("Pseudo", [
            "value" => $pseudo,
        ]));

        $form->addField(AjaxFileBoxField::create("Avatar url", [
            "maxFile" => 1,
            "maxFileSize" => null,
            "mimeType" => null,
            "value" => $avatar_url,
            "postParams" => [
                "id" => "lka_user_profile",
                "csrf_token" => CSRFProtector::inst()->createToken("csrf_ajax_token"),
            ],
        ]));

        $form->addField(PasswordField::create("Password", [
            "value" => $password,
            "hint" => "Don't fill this field unless you want to change your password",
        ]));
        //--------------------------------------------
        // Posting the form and validating data
        //--------------------------------------------
        if (true === $form->isPosted()) {
            if (true === $form->validates()) {
                // do something with $postedData;
                $postedData = $form->getFilteredPostedData();


                $allowed = [
                    "pseudo",
                    "password",
                    "avatar_url",
                ];
                $filteredData = ArrayTool::filterByAllowed($postedData, $allowed);


                //--------------------------------------------
                // update the database
                //--------------------------------------------
                // empty password means we don't update the password
                $password = $filteredData['password'];
                if (empty($password)) {
                    unset($filteredData['password']);
                }


                /**
                 * @var $userDb LightWebsiteUserDatabaseInterface
                 */
                $userDb = $container->get("user_database");
                $userDb->updateUserById($user->getId(), $filteredData);


                //--------------------------------------------
                // update the session
                //--------------------------------------------
                $userInfo = $userDb->getUserInfoByIdentifier($user->getIdentifier());
                $user->updateInfo($userInfo);

                //--------------------------------------------
                // redirect
                //--------------------------------------------
                /**
                 * We redirect because the user data is used in the gui (for instance in the icon menu in the header.
                 * And so if the user changed her avatar for instance, we want her to notice the changes right away.
                 * Hence we redirect to the same page
                 */
                $flasher->addFlash("user_profile", "Congrats, the user form was successfully updated.");
                return $this->redirectByRoute("lka_route-user_profile");


            } else {
//                $form->addNotification(ErrorFormNotification::create("There was a problem."));
            }
        } else {
            $valuesFromDb = []; // get the values from the database if necessary...
            $form->injectValues($valuesFromDb);


            if ($flasher->hasFlash("user_profile")) {
                list($message, $type) = $flasher->getFlash("user_profile");
//                $this->getKitAdmin()->addNotification(WiseTool::wiseToLightKitAdmin($type, $message));
                $form->addNotification(WiseTool::wiseToChloroform($type, $message));
            }

        }

        //--------------------------------------------
        // RENDERING
        //--------------------------------------------
        return $this->renderAdminPage('Light_Kit_Admin/kit/zeroadmin/user/user_profile', [
            "form" => $form,
            "is_root" => RightsHelper::isRoot($user),
            "rights" => RightsHelper::getGroupedRights($user->getRights()),
        ]);
    }
}