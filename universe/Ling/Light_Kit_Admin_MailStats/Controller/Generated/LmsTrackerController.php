<?php


namespace Ling\Light_Kit_Admin_MailStats\Controller\Generated;


use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_Kit\PageConfigurationUpdator\PageConfUpdator;
use Ling\Light_Kit_Admin\Controller\RealAdminPageController;


/**
 * The LmsTrackerController class.
 */
class LmsTrackerController extends RealAdminPageController
{

    /**
     * Renders the tracker list page.
     *
     * @return HttpResponseInterface|string
     * @throws \Exception
     */
    public function renderList()
    {

        return $this->renderAdminPage('Ling.Light_Kit_Admin_MailStats/generated/lms_tracker_list', [
            'widgetVariables' => [
                "body.light_realist" => [
                    'request_declaration_id' => 'Ling.Light_Kit_Admin_MailStats:generated/lms_tracker',
                ],
            ],
        ]);
    }


    /**
     * Renders the tracker form page.
     *
     * @return string|HttpResponseInterface
     * @throws \Exception
     */
    public function renderForm()
    {
        $realformId = "Ling.Light_Kit_Admin_MailStats:generated/lms_tracker";
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

        return $this->renderAdminPage('Ling.Light_Kit_Admin_MailStats/generated/lms_tracker_form', [
            'widgetVariables' => [
                "body.lka_chloroform" => $vars,
            ],
        ]);
    }
}