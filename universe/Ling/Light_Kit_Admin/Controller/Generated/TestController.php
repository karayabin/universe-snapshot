<?php


namespace Ling\Light_Kit_Admin\Controller\Generated;


use Ling\Chloroform\FormNotification\ErrorFormNotification;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_Kit\PageConfigurationUpdator\PageConfUpdator;
use Ling\Light_Kit_Admin\Controller\AdminPageController;
use Ling\Light_Realform\Service\LightRealformService;
use Ling\Light_User\WebsiteLightUser;
use Ling\WiseTool\WiseTool;

class TestController extends AdminPageController
{
    /**
     * Renders a page to administer an user.
     *
     * @return string|HttpResponseInterface
     * @throws \Exception
     */
    public function render()
    {
        /**
         * Note: for now the default is to render the list, but it could change (for instance we could
         * want to display both the list and the form, etc...).
         */
        return $this->renderForm();
        return $this->renderList();

    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Renders the user list page.
     *
     * @return HttpResponseInterface|string
     * @throws \Exception
     */
    public function renderList()
    {
        return $this->renderAdminPage('Light_Kit_Admin/kit/zeroadmin/user/user_list', [], PageConfUpdator::create()->updateWidget("body.light_realist", [
            'vars' => [
                'request_declaration_id' => 'Light_Kit_Admin:lud_user',
            ],
        ]));
    }


    /**
     * Renders the user form page.
     *
     * @return string|HttpResponseInterface
     * @throws \Exception
     */
    public function renderForm()
    {


        $this->checkMicroPermission("Light_Kit_Admin.tables.lud_user.create");

        $identifier = "Light_Kit_Admin.generated/lud_user";


        $container = $this->getContainer();
        $flasher = $this->getFlasher();

        //--------------------------------------------
        // FORM FOR pseudo, password and avatar_url
        //--------------------------------------------

        /**
         * @var WebsiteLightUser
         */
        $user = $this->getUser();


        //--------------------------------------------
        // FORM
        //--------------------------------------------
        /**
         * @var $rf LightRealformService
         */
        $rf = $container->get("realform");
        $rfHandler = $rf->getFormHandler($identifier);

        $form = $rfHandler->getFormHandler();

        //--------------------------------------------
        // Posting the form and validating data
        //--------------------------------------------
        if (true === $form->isPosted()) {
            if (true === $form->validates()) {
                // do something with $postedData;
                $vid = $form->getVeryImportantData();


                $form->executeDataTransformers($vid);

                //--------------------------------------------
                // DO SOMETHING WITH THE DATA...
                //--------------------------------------------
                try {

                    $successHandler = $rfHandler->getSuccessHandler();
                    $extraParams = [];
                    if (false === 'update') {
                        /**
                         * todo: here...
                         * todo: here...
                         */
                        $extraParams["updateRic"] = [];
                    }

                    $successHandler->processData($vid, $extraParams);

                a(__FILE__, $_POST);
                az($vid);

                    //--------------------------------------------
                    // redirect
                    //--------------------------------------------
                    /**
                     * We redirect because the user data is used in the gui (for instance in the icon menu in the header.
                     * And so if the user changed her avatar for instance, we want her to notice the changes right away.
                     * Hence we redirect to the same page
                     */
                    $flasher->addFlash("user_profile", "Congrats, the user form was successfully updated.");
                    return $this->redirectByRoute($this->getLight()->getMatchingRoute());

                } catch (\Exception $e) {
                    $form->addNotification(ErrorFormNotification::create($e->getMessage()));
                }

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
        return $this->renderAdminPage('Light_Kit_Admin/kit/zeroadmin/test/test', [
            "form" => $form,
        ], PageConfUpdator::create()->updateWidget("body.chloroform", [
            'vars' => [
                'title' => "My Test...",
            ],
        ]));
    }
}