<?php


namespace Ling\Light_Kit_Admin\Controller\User;


use Ling\Chloroform\Field\AjaxFileBoxField;
use Ling\Chloroform\Field\PasswordField;
use Ling\Chloroform\Field\StringField;
use Ling\Chloroform\FormNotification\ErrorFormNotification;
use Ling\Chloroform\FormNotification\SuccessFormNotification;
use Ling\CSRFTools\CSRFProtector;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_Kit_Admin\Chloroform\LightKitAdminChloroform;
use Ling\Light_Kit_Admin\Controller\ProtectedPageController;
use Ling\Light_UserDatabase\LightUserDatabaseInterface;

/**
 * The UserProfileController class.
 */
class UserProfileController extends ProtectedPageController
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

        /**
         * @var $userDb LightUserDatabaseInterface
         */
        $userDb = $container->get("user_database");


        $user = $this->getUser();


        //--------------------------------------------
        // UPDATE THE SESSION USER FROM THE DATABASE USER
        //--------------------------------------------
        /**
         * In this particular case where we update the user information,
         * we don't use the user from the session, since its info might be outdated by the data
         * posted in the form.
         * So we need to query the database every time, and update the session if the data changes.
         */
        $userInfo = $userDb->getUserInfoByIdentifier($user->getIdentifier());
        $user->updateInfo($userInfo);







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
                $form->addNotification(SuccessFormNotification::create("ok"));
                // do something with $postedData;
                $postedData = $form->getPostedData();
            } else {
                $form->addNotification(ErrorFormNotification::create("There was a problem."));
            }
        } else {
            $valuesFromDb = []; // get the values from the database if necessary...
            $form->injectValues($valuesFromDb);
        }

        //--------------------------------------------
        // RENDERING
        //--------------------------------------------
        return $this->renderProtectedPage('Light_Kit_Admin/zeroadmin/user/user_profile', [
            "form" => $form,
        ]);
    }
}