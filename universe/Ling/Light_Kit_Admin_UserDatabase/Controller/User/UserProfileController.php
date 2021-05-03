<?php


namespace Ling\Light_Kit_Admin_UserDatabase\Controller\User;


use Ling\Chloroform\Field\AjaxFileBoxField;
use Ling\Chloroform\Field\PasswordField;
use Ling\Chloroform\Field\StringField;
use Ling\Chloroform\FormNotification\ErrorFormNotification;
use Ling\Chloroform\Validator\RequiredValidator;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_Database\Service\LightDatabaseService;
use Ling\Light_Kit_Admin\Chloroform\LightKitAdminChloroform;
use Ling\Light_Kit_Admin\Controller\AdminPageController;
use Ling\Light_Kit_Admin\Rights\RightsHelper;
use Ling\Light_Nugget\Service\LightNuggetService;
use Ling\Light_User\LightWebsiteUser;
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

        //--------------------------------------------
        // FORM for pseudo, password and avatar_url
        //--------------------------------------------
        $container = $this->getContainer();
        $flasher = $this->getFlasher();


        /**
         * In this case, we can fetch the user information from the session.
         * I.e. we don't need to fetch the database for that.
         */
        /**
         * @var LightWebsiteUser
         */
        $user = $this->getValidWebsiteUser();


        /**
         * @var $ng LightNuggetService
         */
        $ng = $this->getContainer()->get("nugget");
        $pseudo = $user->getPseudo();
        $password = ""; // never show the password
        $avatar_url = $user->getAvatarUrl();


        //--------------------------------------------
        // FORM
        //--------------------------------------------
        $form = new LightKitAdminChloroform();
        $form->prepare($container);
        $form->setFormId("user_profile");

        // pseudo
        $form->addField(StringField::create("Pseudo", [
            "value" => $pseudo,
        ]), [RequiredValidator::create()]);


        // avatar_url
        $appDir = $container->getApplicationDir();
        $f = $appDir . "/config/data/Ling.Light_Kit_Admin_UserDatabase/nuggets/ajax_file_box/user-profile.byml";
        $conf = $ng->getNuggetByPath($f);
        $avatarConf = array_merge($conf, [
            'urls' => [$avatar_url],
        ]);
        $form->addField(AjaxFileBoxField::create("Avatar url", $avatarConf));


        // password
        $form->addField(PasswordField::create("Password", [
            "value" => $password,
            "hint" => "Don't fill this field unless you want to change your password",
        ]));


        //--------------------------------------------
        // Posting the form and validating data
        //--------------------------------------------
        if (true === $form->isPosted()) {
            if (true === $form->validates()) {

                $vid = $form->getVeryImportantData();


                //--------------------------------------------
                // PROCESS VALID DATA
                //--------------------------------------------

                /**
                 * @var $_db LightWebsiteUserDatabaseInterface
                 */
                $_db = $container->get("user_database");


                /**
                 * @var $db LightDatabaseService
                 */
                $db = $this->getContainer()->get("database");
                /**
                 * @var $exception \Exception
                 */
                $exception = null;
                $res = $db->transaction(function () use ($db, $vid, $container, $user, $_db) {

                    // empty password means we don't update the password
                    $password = $vid['password'];
                    if (empty($password)) {
                        unset($vid['password']);
                    }


                    $_db->updateUserById($user->getId(), $vid);

                }, $exception);


                if (true === $res) {

                    //--------------------------------------------
                    // update the session
                    //--------------------------------------------
                    $userInfo = $_db->getUserInfoByIdentifier($user->getIdentifier());
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
                    return $this->getRedirectResponseByRoute("lka_userdatabase_route-user_profile");

                } else {
                    $form->addNotification(ErrorFormNotification::create($exception->getMessage()));
                }


            } else {
                $form->addNotification(ErrorFormNotification::create("There was a problem with the form validation. Please review the form errors, fix them, and resubmit."));
            }
        }


        //--------------------------------------------
        // DISPLAYING ANY FLASH
        //--------------------------------------------
        if ($flasher->hasFlash("user_profile")) {
            list($message, $type) = $flasher->getFlash("user_profile");
//                $this->getKitAdmin()->addNotification(WiseTool::wiseToLightKitAdmin($type, $message));
            $form->addNotification(WiseTool::wiseToChloroform($type, $message));
        }


        //--------------------------------------------
        // RENDERING
        //--------------------------------------------
        $page = 'Ling.Light_Kit_Admin_UserDatabase/user_profile';
        return $this->renderAdminPage($page, [
            'widgetVariables' => [
                "body.user_profile_form" => [
                    "form" => $form,
                    "is_root" => RightsHelper::isRoot($container),
                    "rights" => RightsHelper::getGroupedRights($user->getRights()),
                ],
            ],
        ]);
    }
}