<?php


namespace Ling\Light_Kit_Admin_TaskScheduler\Controller\Generated;


use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_Kit\PageConfigurationUpdator\PageConfUpdator;
use Ling\Light_Kit_Admin\Controller\RealAdminPageController;


/**
 * The LtsTaskScheduleController class.
 */
class LtsTaskScheduleController extends RealAdminPageController
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
        $realformId = "Light_Kit_Admin_TaskScheduler:generated/lts_task_schedule";
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
        return $this->renderAdminPage('Light_Kit_Admin_TaskScheduler/kit/zeroadmin/generated/lts_task_schedule_form', [
            "parent_layout" => "Light_Kit_Admin/kit/zeroadmin/dev/mainlayout_base",
            "form" => $form,
        ], PageConfUpdator::create()->updateWidget("body.lka_chloroform", [
            'vars' => $nugget["rendering"],
        ]));
    }
}