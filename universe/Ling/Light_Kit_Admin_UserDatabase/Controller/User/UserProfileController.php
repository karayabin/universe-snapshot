<?php


namespace Ling\Light_Kit_Admin_UserDatabase\Controller\User;


use Ling\Bat\ConvertTool;
use Ling\Chloroform\Field\AjaxFileBoxField;
use Ling\Chloroform\Field\PasswordField;
use Ling\Chloroform\Field\StringField;
use Ling\Chloroform\Validator\RequiredValidator;
use Ling\GormanJsonDecoder\GormanJsonDecoder;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_CsrfSession\Service\LightCsrfSessionService;
use Ling\Light_Kit_Admin\Chloroform\LightKitAdminChloroform;
use Ling\Light_Kit_Admin\Controller\AdminPageController;
use Ling\Light_Kit_Admin\Rights\RightsHelper;
use Ling\Light_User\LightWebsiteUser;
use Ling\Light_UserData\Service\LightUserDataService;
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






        $renderMode = $_GET['render'] ?? 'default';
        $container = $this->getContainer();
        $flasher = $this->getFlasher();


        //--------------------------------------------
        // FORM FOR pseudo, password and avatar_url
        //--------------------------------------------

        /**
         * @var LightWebsiteUser
         */
        $user = $this->getUser();
        $pseudo = $user->getPseudo();
        $password = ""; // never show the password
        $avatar_url = $user->getAvatarUrl();


        //--------------------------------------------
        // FORM
        //--------------------------------------------
        $form = new LightKitAdminChloroform();
        $form->prepare($container);
        $form->setFormId("user_profile");
        $form->addField(StringField::create("Pseudo", [
            "value" => $pseudo,
        ]), [RequiredValidator::create()]);

        /**
         * @var $csrfService LightCsrfSessionService
         */
        $csrfService = $this->getContainer()->get("csrf_session");

        /**
         * @var $userDataService LightUserDataService
         */
        $userDataService = $this->getContainer()->get("user_data");

        $defaultUrls = [$avatar_url];
        $actionId = "lka_userdatabase-user_profile";


        $form->addField(AjaxFileBoxField::create("Avatar url", GormanJsonDecoder::encode([
            "urls" => $defaultUrls,
            "useBootstrap" => true,
            "lang" => "eng",
            "maxFile" => 1,
            "mimeType" => [
                "image/png",
                "image/jpg",
                "image/gif",
            ],
            "name" => "avatar_url",
            "maxFileSize" => ConvertTool::convertHumanSizeToBytes('2M'),
            'serverUrl' => '/ajax-handler',
            "payload" => [
                "handler" => "Light_UserData",
                "configId" => "Light_Kit_Admin_UserDatabase.user_profile",
                "csrf_token" => $csrfService->getToken()
            ],
            "immediateUpload" => true,
            "useVirtualServer" => true,
            "useDelete" => false,
            "useKeepOriginalImage" => true,
            'isExternalUrl' => <<<EEE
                function (url) {
                    if (0 === url.indexOf('/user-data')) {
                        return false;
                    }
                    return true;
                }
EEE
            ,
            "useFileEditor" => $this->hasService('kit_admin_user_data'),
            "fileEditor" => [
                "fileExtensionCanBeUpdated" => true,
                "directory" > "images",
                "useImageEditor" => true,
                "useOriginalImage" => true,
            ],
        ], ["isExternalUrl"]))
//            ->setDataTransformer(LightUserData2SvpDataTransformer::create()->setContainer($container)), [
//                ValidUserDataUrlValidator::create()->setContainer($container),
//            ]
        );

        $form->addField(PasswordField::create("Password", [
            "value" => $password,
            "hint" => "Don't fill this field unless you want to change your password",
        ]));
        //--------------------------------------------
        // Posting the form and validating data
        //--------------------------------------------
        if (true === $form->isPosted()) {
            if (true === $form->validates()) {


                /**
                 * commit the vfs
                 */
                $userDataService->getFileManagerProtocolHandler()->commit();





                // do something with $postedData;
                $vid = $form->getVeryImportantData();


                $form->executeDataTransformers($vid);



                //--------------------------------------------
                // update the database
                //--------------------------------------------
                // empty password means we don't update the password
                $password = $vid['password'];
                if (empty($password)) {
                    unset($vid['password']);
                }


                /**
                 * @var $userDb LightWebsiteUserDatabaseInterface
                 */
                $userDb = $container->get("user_database");
                $userDb->updateUserById($user->getId(), $vid);


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
                return $this->getRedirectResponseByRoute("lka_userdatabase_route-user_profile");


            } else {

                throw new \Exception("Todo: here with erroneous form.");
                $form->getField("avatar_url")->setProperty("urls", $vm->getUrlsFromCurrentState($actionId));


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
        $page = 'Light_Kit_Admin/kit/zeroadmin/user/user_profile';
        if ('solo' === $renderMode) {
            $page = 'Light_Kit_Admin/kit/zeroadmin/user/user_profile.iframe';
        }
        return $this->renderAdminPage($page, [
            "form" => $form,
            "is_root" => RightsHelper::isRoot($container),
            "rights" => RightsHelper::getGroupedRights($user->getRights()),
        ]);
    }


    /**
     * Work in progress...
     */
    public function processForm()
    {
        /**
         * Todo: test serailize with this..
         * call me with hub
         */
        az(__FILE__, $_GET, $_POST, $_FILES);
    }
}