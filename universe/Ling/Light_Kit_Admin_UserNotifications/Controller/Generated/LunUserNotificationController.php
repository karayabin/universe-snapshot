<?php


namespace Ling\Light_Kit_Admin_UserNotifications\Controller\Generated;


use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_Kit\PageConfigurationUpdator\PageConfUpdator;
use Ling\Light_Kit_Admin\Controller\RealAdminPageController;


/**
 * The LunUserNotificationController class.
 */
class LunUserNotificationController extends RealAdminPageController
{

    /**
     * Renders the user notification list page.
     *
     * @return HttpResponseInterface|string
     * @throws \Exception
     */
    public function renderList()
    {

        return $this->renderAdminPage('Ling.Light_Kit_Admin_UserNotifications/generated/lun_user_notification_list', [
            'widgetVariables' => [
                "body.light_realist" => [
                    'request_declaration_id' => 'Ling.Light_Kit_Admin_UserNotifications:generated/lun_user_notification',
                ],
            ],
        ]);
    }


    /**
     * Renders the user notification form page.
     *
     * @return string|HttpResponseInterface
     * @throws \Exception
     */
    public function renderForm()
    {
        $realformId = "Ling.Light_Kit_Admin_UserNotifications:generated/lun_user_notification";
        $nugget = [];
        $res = $this->processForm($realformId, $nugget);

        if ($res instanceof HttpResponseInterface) {
            return $res;
        } else {
            $form = $res;
        }

        //--------------------------------------------
        // RENDERING
        //--------------------------------------------
        $vars = $nugget["rendering"] ?? [];
        $vars['form'] = $form;

        return $this->renderAdminPage('Ling.Light_Kit_Admin_UserNotifications/generated/lun_user_notification_form', [
            'widgetVariables' => [
                "body.lka_chloroform" => $vars,
            ],
        ]);
    }
}