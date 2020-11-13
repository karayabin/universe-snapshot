<?php


namespace Ling\Light_Kit_Admin_TaskScheduler\Controller\Generated;


use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_Kit\PageConfigurationUpdator\PageConfUpdator;
use Ling\Light_UserRowRestriction\Service\LightUserRowRestrictionService;
use Ling\Light_Kit_Admin_TaskScheduler\Controller\Generated\Base\RealGenController;


/**
 * The LtsTaskScheduleController class.
 */
class LtsTaskScheduleController extends RealGenController
{

    /**
     * Renders the task schedule list page.
     *
     * @return HttpResponseInterface|string
     * @throws \Exception
     */
    public function renderList()
    {
        return $this->renderAdminPage('Light_Kit_Admin_TaskScheduler/kit/zeroadmin/generated/lts_task_schedule_list', [], PageConfUpdator::create()->updateWidget("body.light_realist", [
            'vars' => [
                'request_declaration_id' => 'Light_Kit_Admin_TaskScheduler:generated/lts_task_schedule',
            ],
        ]));
    }


    /**
     * Renders the task schedule form page.
     *
     * @return string|HttpResponseInterface
     * @throws \Exception
     */
    public function renderForm()
    {

        $table = "lts_task_schedule";
        $identifier = "Light_Kit_Admin_TaskScheduler.generated/lts_task_schedule";

        $this->lateRealFormRegistration($identifier);

        $parentLayout = "Light_Kit_Admin/kit/zeroadmin/dev/mainlayout_base";
        $vars = [
            "title" => "Task schedule form",
        ];
        if (array_key_exists("solo", $_GET)) {
            $parentLayout = "Light_Kit_Admin/kit/zeroadmin/dev/mainlayout_solo";
            $vars['related_links'] = []; // cancel any existing related links
            $this->setOnSuccessIframeSignal("done");
        }

        $res = $this->processForm($identifier, $table);

        if ($res instanceof HttpResponseInterface) {
            return $res;
        } else {
            $form = $res;
        }

        //--------------------------------------------
        // RENDERING
        //--------------------------------------------
        return $this->renderAdminPage('Light_Kit_Admin_TaskScheduler/kit/zeroadmin/generated/lts_task_schedule_form', [
            "parent_layout" => $parentLayout,
            "form" => $form,
        ], PageConfUpdator::create()->updateWidget("body.lka_chloroform", [
            'vars' => $vars,
        ]));
    }
}